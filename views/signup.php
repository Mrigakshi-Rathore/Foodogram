<?php
/**
 * User Registration Page
 * Handles user signup with validation and database insertion
 */

require_once 'config.php';
require_once 'Database.php';
require_once 'Session.php';
require_once 'Security.php';

// Initialize session and database
$session = Session::getInstance();
$db = Database::getInstance()->getConnection();

$errors = [];

// Process registration form
if (Security::isPostRequest()) {
    // Validate CSRF token
    $csrfToken = Security::getPostData('csrf_token');
    if (!Security::validateCSRFToken($csrfToken)) {
        $errors['csrf'] = 'Invalid request. Please try again.';
    }

    // Get and sanitize form data
    $name = Security::getPostData('name');
    $email = Security::sanitizeEmail(Security::getPostData('email'));
    $phone = Security::getPostData('phone');
    $password = Security::getPostData('password');
    $confirmPassword = Security::getPostData('confirm_password');

    // Validation
    if (empty($name)) {
        $errors['name'] = 'Full name is required';
    }

    if (empty($email) || !Security::validateEmail($email)) {
        $errors['email'] = 'Valid email is required';
    }

    if (empty($phone)) {
        $errors['phone'] = 'Phone number is required';
    }

    if (!Security::validatePassword($password)) {
        $errors['password'] = 'Password must be at least ' . PASSWORD_MIN_LENGTH . ' characters';
    }

    if ($password !== $confirmPassword) {
        $errors['confirm_password'] = 'Passwords do not match';
    }

    // Check if email exists
    if (empty($errors) && !empty($email)) {
        $stmt = $db->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->execute([$email]);
        if ($stmt->fetch()) {
            $errors['email'] = 'Email is already registered';
        }
    }

    // Check if phone exists
    if (empty($errors) && !empty($phone)) {
        $stmt = $db->prepare("SELECT id FROM users WHERE phone = ?");
        $stmt->execute([$phone]);
        if ($stmt->fetch()) {
            $errors['phone'] = 'Phone number is already registered';
        }
    }

    // Insert user if no errors
    if (empty($errors)) {
        try {
            $hashedPassword = Security::hashPassword($password);

            $stmt = $db->prepare("INSERT INTO users
                (name, email, phone, password, notif_email, notif_sms, privacy)
                VALUES (?, ?, ?, ?, 1, 0, 'Public')");

            if ($stmt->execute([$name, $email, $phone, $hashedPassword])) {
                $userId = $db->lastInsertId();

                // Set session data
                $session->setLoginStatus(true, [
                    'id' => $userId,
                    'name' => $name
                ]);

                $session->setFlashMessage("Welcome to " . APP_NAME . ", $name!", 'success');

                header("Location: index.php");
                exit();
            } else {
                $errors['database'] = 'Registration failed, please try again';
            }
        } catch (Exception $e) {
            error_log("Registration error: " . $e->getMessage());
            $errors['database'] = 'Registration failed, please try again';
        }
    }
}

// Generate CSRF token for form
$csrfToken = Security::generateCSRFToken();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Sign Up - Foodogram</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    html, body { height: 100%; }
    body {
      background-image: linear-gradient(to top, #30cfd0 0%, #330867 100%);
      font-family: 'Segoe UI', sans-serif;
    }
    .signup-card {
      max-width: 450px;
      margin: 70px auto;
      padding: 30px;
      border-radius: 12px;
      background-color: #fff;
      box-shadow: 0 6px 20px rgba(0,0,0,0.1);
      border: 2px solid #1a3e76;
    }
    .btn-custom {
      background-color: #0f347c;
      color: #fff;
      border: none;
    }
    .btn-custom:hover { background-color: #163697; }
    .logo {
      font-size: 30px;
      font-weight: bold;
      color: #0f294e;
    }
    .error-message {
      color: #dc3545;
      font-size: 0.875em;
    }
  </style>
</head>
<body>

  <div class="signup-card text-center">
    <div class="logo mb-2"> Foodogram</div>
    <h3>Create Your Account</h3>

    <?php if (!empty($errors['database'])): ?>
      <div class="alert alert-danger"><?php echo $errors['database']; ?></div>
    <?php endif; ?>

    <form method="POST" action="signup.php">
      <input type="hidden" name="csrf_token" value="<?php echo $csrfToken; ?>">

      <div class="mb-3 text-start">
        <label for="name" class="form-label">Full Name</label>
        <input type="text" class="form-control <?php echo isset($errors['name']) ? 'is-invalid' : ''; ?>"
               id="name" name="name" placeholder="John Doe"
               value="<?php echo htmlspecialchars($name ?? ''); ?>" required>
        <?php if (isset($errors['name'])): ?>
          <div class="error-message"><?php echo $errors['name']; ?></div>
        <?php endif; ?>
      </div>

      <div class="mb-3 text-start">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control <?php echo isset($errors['email']) ? 'is-invalid' : ''; ?>"
               id="email" name="email" placeholder="you@example.com"
               value="<?php echo htmlspecialchars($email ?? ''); ?>" required>
        <?php if (isset($errors['email'])): ?>
          <div class="error-message"><?php echo $errors['email']; ?></div>
        <?php endif; ?>
      </div>

      <div class="mb-3 text-start">
        <label for="phone" class="form-label">Phone</label>
        <input type="text" class="form-control <?php echo isset($errors['phone']) ? 'is-invalid' : ''; ?>"
               id="phone" name="phone" placeholder="9876543210"
               value="<?php echo htmlspecialchars($phone ?? ''); ?>" required>
        <?php if (isset($errors['phone'])): ?>
          <div class="error-message"><?php echo $errors['phone']; ?></div>
        <?php endif; ?>
      </div>

      <div class="mb-3 text-start">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control <?php echo isset($errors['password']) ? 'is-invalid' : ''; ?>"
               id="password" name="password" placeholder="Create password" required>
        <?php if (isset($errors['password'])): ?>
          <div class="error-message"><?php echo $errors['password']; ?></div>
        <?php endif; ?>
      </div>

      <div class="mb-3 text-start">
        <label for="confirm_password" class="form-label">Confirm Password</label>
        <input type="password" class="form-control <?php echo isset($errors['confirm_password']) ? 'is-invalid' : ''; ?>"
               id="confirm_password" name="confirm_password" placeholder="Confirm password" required>
        <?php if (isset($errors['confirm_password'])): ?>
          <div class="error-message"><?php echo $errors['confirm_password']; ?></div>
        <?php endif; ?>
      </div>

      <button type="submit" class="btn btn-custom w-100 mb-3">Sign Up</button>

      <p class="mt-3 mb-0">Already a member? <a href="login.php">Log in</a></p>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
