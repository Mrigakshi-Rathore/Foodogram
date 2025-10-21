<?php
// Simple forgot password PHP file
$email = '';
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    
    if (empty($email)) {
        $message = '<div class="alert alert-danger">Please enter your email address</div>';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = '<div class="alert alert-danger">Please enter a valid email address</div>';
    } else {
        // Store the success state in session to show after redirect
        session_start();
        $_SESSION['reset_email'] = $email;
        $_SESSION['reset_success'] = true;
        
        // Redirect back to this page
        header("Location: forgot-password.php");
        exit();
    }
}

// Check for success message from redirect
session_start();
if (isset($_SESSION['reset_success']) ){
    $email = $_SESSION['reset_email'];
    $message = '<div class="alert alert-success">Password reset link has been sent to '.htmlspecialchars($email).'</div>';
    unset($_SESSION['reset_success']);
    unset($_SESSION['reset_email']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Forgot Password - Foodogram</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    html, body {
      height: 100%;
    }
    body {
      background-image: linear-gradient(-225deg, #473B7B 0%, #3584A7 51%, #30D2BE 100%);
      margin: 0;
    }
    .forgot-container {
      max-width: 500px;
      margin: 80px auto;
      padding: 2rem;
      background-color: white;
      border-radius: 8px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.05);
    }
    .btn-orange {
      background: linear-gradient(to right, #052549, #49b7e6);
      color: white;
      border: none;
    }
    .btn-orange:hover {
      background: linear-gradient(to right, #49b7e6, #052549);
    }
  </style>
</head>
<body>

  <div class="forgot-container text-center " id="success-message">
    <h2 class="mb-4">🔐 Forgot Your Password?</h2>
    <p class="text-muted mb-4">Enter your registered email and we'll send you a reset link.</p>
    
    <?php echo $message; ?>
    
    <form method="POST" action="forgotpswd.php" onsubmit="return showConfirmation(this)">
      <div class="mb-3 text-start">
        <label for="email" class="form-label">Email address</label>
        <input type="email" class="form-control" id="email" name="email" 
               value="<?php echo htmlspecialchars($email); ?>" 
               placeholder="name@foodogram.com" required />
      </div>
      <button type="submit" class="btn btn-orange w-100 mt-3">Send Reset Link</button>
    </form>
    <p class="mt-4"><a href="login.php">← Back to Login</a></p>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  
  <script>
    function showConfirmation(form) {
  const email = document.getElementById('email').value;
  
  // Basic validation
  if (!email) {
    alert('Please enter your email address');
    return false;
  }
  
  if (!email.includes('@') || !email.includes('.')) {
    alert('Please enter a valid email address');
    return false;
  }
  
  // Show confirmation popup
  if (confirm('Password reset link will be sent to: ' + email + '\n\nClick OK to continue')) {
    // Show green success alert
    document.getElementById('success-message').innerHTML = 
      '<div class="alert alert-success mt-3">Password reset link has been sent to ' + email + '</div>';
    
    // Redirect after 2 seconds
    setTimeout(function() {
      window.location.href = "login.php";
    }, 2000);
    
    return false; // Stop form submission
  } else {
    return false; // Cancel form submission
  }
}
  </script>
</body>
</html>