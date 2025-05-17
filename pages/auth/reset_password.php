<?php
require_once __DIR__ . '/../../includes/db.php';
$pageTitle = "Reset Password - Doctor Appointment System";
ob_start(); // Start output buffering
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
                <a href='update-password?token=$token'>Click here</a>";
        } else {
            $message = "Email not found.";
        }
    } else {
        $message = "Please enter your email.";
    }
}
?>
<section class="py-50 bg-light">
    <div class="container mt-5">
        <div class="card mx-auto" style="max-width: 500px;">
            <div class="card-header bg-primary text-dark">
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
                    <button type="submit" class="btn btn-primary w-100">Send Reset Link</button>
                </form>
            </div>
        </div>
    </div>
</section>
<?php
$content = ob_get_clean(); // Get the buffered content
require_once __DIR__ . '/../../layout.php';
?>