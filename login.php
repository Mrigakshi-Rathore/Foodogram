<?php
session_start();

// DB connection (InfinityFree)
$host = "sql100.infinityfree.com";       // MySQL Hostname from cPanel
$dbname = "if0_39795005_foodogram";      // Your database name
$username = "if0_39795005";              // MySQL Username
$password = "foodogram";      // The password you use to log into InfinityFree

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if (!empty($email) && !empty($password)) {
        $stmt = $pdo->prepare("SELECT id, name, password FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['name'] = $user['name'];
            $_SESSION['logged_in'] = true;
            $_SESSION['welcome_message'] = "Welcome back, " . $user['name'] . "! 🎉";

            header("Location: index.php");
            exit();
        } else {
            $error = "Invalid email or password";
        }
    } else {
        $error = "Please enter both email and password";
    }
}
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
<form method="POST" onsubmit="showLoader()">

</body>
</html>
=