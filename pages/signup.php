<?php
session_start();

// DB connection
$host = "sql100.infinityfree.com";       // MySQL Hostname
$dbname = "if0_39795005_foodogram";      // Database Name
$username = "if0_39795005";              // MySQL Username
$password = "foodogram"; 

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';

    // Validation
    if (empty($name)) $errors['name'] = 'Full name is required';
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors['email'] = 'Valid email is required';
    if (empty($phone)) $errors['phone'] = 'Phone number is required';
    if (empty($password) || strlen($password) < 8) $errors['password'] = 'Password must be at least 8 characters';
    if ($password !== $confirm_password) $errors['confirm_password'] = 'Passwords do not match';

    // Check if email exists
    if (empty($errors)) {
        $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->execute([$email]);
        if ($stmt->fetch()) {
            $errors['email'] = 'Email is already registered';
        }
    }

    // Check if phone exists
    if (empty($errors)) {
        $stmt = $pdo->prepare("SELECT id FROM users WHERE phone = ?");
        $stmt->execute([$phone]);
        if ($stmt->fetch()) {
            $errors['phone'] = 'Phone number is already registered';
        }
    }

    // Insert user
    if (empty($errors)) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $pdo->prepare("INSERT INTO users 
            (name, email, phone, password, notif_email, notif_sms, privacy) 
            VALUES (?, ?, ?, ?, 1, 0, 'Public')");
        
        if ($stmt->execute([$name, $email, $phone, $hashed_password])) {
            $_SESSION['user_id'] = $pdo->lastInsertId();
            $_SESSION['name'] = $name;
            $_SESSION['logged_in'] = true;
            $_SESSION['welcome_message'] = "Welcome to Foodogram, $name!";
            header("Location: ../index.php");
            exit();
        } else {
            $errors['database'] = 'Registration failed, please try again';
        }
    }
}
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

    /* 1. Global Scrollbar */
    ::-webkit-scrollbar {
        width: 10px;
    }
    ::-webkit-scrollbar-track {
        background: #f1f1f1; 
    }
    ::-webkit-scrollbar-thumb {
        background: #888; 
        border-radius: 5px;
        border: 2px solid #f1f1f1;
    }
    ::-webkit-scrollbar-thumb:hover {
        background: #555; 
    }

    /* 2. Side Menu (Offcanvas) Scrollbar */
    .offcanvas-body {
        overflow-y: auto !important;
        max-height: 100vh;
    }
    .offcanvas-body::-webkit-scrollbar {
        width: 6px;
    }
    .offcanvas-body::-webkit-scrollbar-track {
        background: #212529; /* Dark background */
    }
    .offcanvas-body::-webkit-scrollbar-thumb {
        background: #666; 
        border-radius: 4px;
    }
    .offcanvas-body::-webkit-scrollbar-thumb:hover {
        background: #999; 
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

      <p class="mt-3 mb-0">Already a member? <a href="../login.php">Log in</a></p>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
