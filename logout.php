<?php
session_start(); // Start the session
session_unset(); // Remove all session variables
session_destroy(); // Destroy the session
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Logout - Foodogram</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
      body {
        background-image: linear-gradient(to top, #30cfd0 0%, #330867 100%);
        font-family: "Segoe UI", sans-serif;
      }
      .card {
        border-radius: 12px;
        background-color: #fff;
      }
      h2 {
        font-weight: bold;
        color: #304458;
      }
    </style>
  </head>
  <body>
    <div
      class="container d-flex justify-content-center align-items-center min-vh-100"
    >
      <div
        class="card text-center p-4 shadow"
        style="max-width: 500px; width: 100%"
      >
        <h2 class="text-success mb-4">You've been logged out!</h2>
        <p class="mb-4">
          Thank you for using <strong>Foodogram</strong>. We hope your food
          journey was delicious.
        </p>
        <div class="d-flex flex-column gap-2">
          <a href="login.php" class="btn btn-primary">Login Again</a>
          <a href="index.php" class="btn btn-outline-danger">Return to Home</a>
        </div>
      </div>
    </div>
  </body>
</html>