<?php
require_once '../includes/db.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';

    if ($email) {
        $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->execute([$email]);
        if ($stmt->rowCount() > 0) {
            $token = bin2hex(random_bytes(16));
            $expires = time() + 3600; // valid for 1 hour

            $stmt = $pdo->prepare("INSERT INTO password_resets (email, token, expires) VALUES (?, ?, ?)");
            $stmt->execute([$email, $token, $expires]);

            // Simulate sending email by showing the link
            $message = "Password reset link: 
                <a href='update_password.php?token=$token'>Click here</a>";
        } else {
            $message = "Email not found.";
        }
    } else {
        $message = "Please enter your email.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="card mx-auto" style="max-width: 500px;">
        <div class="card-header bg-warning text-dark">
            <h4>Reset Password</h4>
        </div>
        <div class="card-body">
            <?php if ($message): ?>
                <div class="alert alert-info"><?= $message ?></div>
            <?php endif; ?>
            <form method="POST">
                <div class="mb-3">
                    <label>Email Address</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-warning w-100">Send Reset Link</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
