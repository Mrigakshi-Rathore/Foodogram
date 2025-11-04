<?php
/**
 * User Login Page
 * Handles user authentication with security measures
 */

require_once 'config.php';
require_once 'Database.php';
require_once 'Session.php';
require_once 'Security.php';

// Initialize session and database
$session = Session::getInstance();
$db = Database::getInstance()->getConnection();

$error = '';

// Process login form
if (Security::isPostRequest()) {
    // Validate CSRF token
    $csrfToken = Security::getPostData('csrf_token');
    if (!Security::validateCSRFToken($csrfToken)) {
        $error = 'Invalid request. Please try again.';
    } else {
        $email = Security::sanitizeEmail(Security::getPostData('email'));
        $password = Security::getPostData('password');

        // Check rate limiting
        if (!Security::checkRateLimit($email, 5, 900)) { // 5 attempts per 15 minutes
            $error = "Too many login attempts. Please try again later.";
        } elseif (empty($email) || empty($password)) {
            $error = "Please enter both email and password";
        } elseif (!Security::validateEmail($email)) {
            $error = "Please enter a valid email address";
        } else {
            try {
                $stmt = $db->prepare("SELECT id, name, password FROM users WHERE email = ?");
                $stmt->execute([$email]);
                $user = $stmt->fetch();

                if ($user && Security::verifyPassword($password, $user['password'])) {
                    // Reset rate limit on successful login
                    Security::resetRateLimit($email);

                    // Set session data
                    $session->setLoginStatus(true, [
                        'id' => $user['id'],
                        'name' => $user['name']
                    ]);

                    $session->setFlashMessage("Welcome back, " . $user['name'] . "! 🎉", 'success');

                    header("Location: index.php");
                    exit();
                } else {
                    $error = "Invalid email or password";
                }
            } catch (Exception $e) {
                error_log("Login error: " . $e->getMessage());
                $error = "Login failed. Please try again.";
            }
        }
    }
}

// Generate CSRF token for form
$csrfToken = Security::generateCSRFToken();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Login - Foodogram</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body { background-image: linear-gradient(to top, #30cfd0 0%, #330867 100%); font-family: "Segoe UI", sans-serif; }
        .card { border-radius: 12px; }
        h2 { font-weight: bold; }
    </style>
</head>
<body>
<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="card shadow p-4" style="max-width: 400px; width: 100%">
        <h2 class="text-center mb-4 text-dark">Login to Foodogram</h2>
        
        <?php if (!empty($error)): ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>

        <form action="login.php" method="POST">
            <input type="hidden" name="csrf_token" value="<?php echo $csrfToken; ?>">

            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email"
                       placeholder="you@example.com" required
                       value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>" />
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password"
                       name="password" placeholder="Enter password" required />
            </div>

            <div class="mb-3 text-end">
                <a href="forgotpswd.php" class="text-decoration-none">Forgot Password?</a>
            </div>

            <button type="submit" class="btn btn-dark w-100">Login</button>
        </form>

        <p class="mt-4 text-center">Don't have an account? <a href="signup.php">Sign Up</a></p>
    </div>
</div>
</body>
</html>
=