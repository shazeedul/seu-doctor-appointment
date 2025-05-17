<?php
session_start();
require_once __DIR__ . '/../../includes/db.php';
$pageTitle = "Login - Doctor Appointment System";
ob_start(); // Start output buffering

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
        header("Location: ../doctor/dashboard");
      } else {
        header("Location: ../patient/dashboard");
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
<section class="py-50 bg-light">
  <div class="card mx-auto" style="max-width: 500px;">
    <div class="card-header bg-primary text-white">
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
        <button type="submit" class="btn btn-primary w-100">Login</button>
      </form>
    </div>
    <div class="card-footer text-center">
      <a href="register">Don't have an account? Register</a><br>
      <a href="reset-password">Forgot your password?</a>
    </div>
  </div>
</section>

<?php
$content = ob_get_clean(); // Get the buffered content
include __DIR__ . '/../../layout.php'; // Render with layout
?>