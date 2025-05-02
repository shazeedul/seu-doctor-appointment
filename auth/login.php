<?php
session_start();
require_once '../includes/db.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($email && $password) {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['role'] = $user['role'];
            $_SESSION['name'] = $user['full_name'];

            if ($user['role'] === 'doctor') {
                header("Location: ../doctor/dashboard.php");
            } else {
                header("Location: ../patient/dashboard.php");
            }
            exit;
        } else {
            $message = "Invalid email or password.";
        }
    } else {
        $message = "Please enter both email and password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login - Doctor Appointment</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    .bg-success {
    --bs-bg-opacity: 1;
    background-color: rgb(56 127 203) !important;
    
}
.w-100 {
    width: 100%!important;
    background: #387fcb;
}
  </style>
</head>
<body class="bg-light">

<div class="container mt-5">
  <div class="card mx-auto" style="max-width: 500px;">
    <div class="card-header bg-success text-white">
      <h4 class="mb-0">Login</h4>
    </div>
    <div class="card-body">
      <?php if ($message): ?>
        <div class="alert alert-danger"><?= $message ?></div>
      <?php endif; ?>
      <form method="POST">
        <div class="mb-3">
          <label for="email" class="form-label">Email address</label>
          <input type="email" name="email" id="email" class="form-control" required>
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" name="password" id="password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success w-100">Login</button>
      </form>
    </div>
    <div class="card-footer text-center">
      <a href="register.php">Don't have an account? Register</a><br>
      <a href="reset_password.php">Forgot your password?</a>
    </div>
  </div>
</div>

</body>
</html>
