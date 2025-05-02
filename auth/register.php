<?php
require_once '../includes/db.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Collect form data
    $full_name = $_POST['full_name'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $role = $_POST['role'] ?? '';

    // Validate form data
    if ($full_name && $email && $password && ($role == 'doctor' || $role == 'patient')) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Prepare and execute the SQL statement
        $stmt = $pdo->prepare("INSERT INTO users (full_name, email, password, role) VALUES (?, ?, ?, ?)");
        try {
            $stmt->execute([$full_name, $email, $hashedPassword, $role]);
            $message = "Registration successful!";
        } catch (PDOException $e) {
            // Handle error
            $message = "Error: " . $e->getMessage();
        }
    } else {
        $message = "Please fill out all fields correctly.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Register - Doctor Appointment</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
  <div class="card mx-auto" style="max-width: 500px;">
    <div class="card-header bg-primary text-white">
      <h4 class="mb-0">Register</h4>
    </div>
    <div class="card-body">
      <?php if ($message): ?>
        <div class="alert alert-info"><?= $message ?></div>
      <?php endif; ?>
      <form method="POST">
        <div class="mb-3">
          <label for="full_name" class="form-label">Full Name</label>
          <input type="text" name="full_name" id="full_name" class="form-control" required>
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email address</label>
          <input type="email" name="email" id="email" class="form-control" required>
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" name="password" id="password" class="form-control" required>
        </div>
        <div class="mb-3">
          <label for="role" class="form-label">Register As</label>
          <select name="role" id="role" class="form-select" required>
            <option value="">Select Role</option>
            <option value="doctor">Doctor</option>
            <option value="patient">Patient</option>
          </select>
        </div>
        <button type="submit" class="btn btn-primary w-100">Register</button>
      </form>
    </div>
    <div class="card-footer text-center">
      <a href="login.php">Already have an account? Login</a>
    </div>
  </div>
</div>

</body>
</html>
