<?php
require_once __DIR__ . '/../../includes/db.php';
$pageTitle = "Set New Password - Doctor Appointment System";
ob_start(); // Start output buffering

$message = '';
$token = $_GET['token'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $token = $_POST['token'] ?? '';
    $newPassword = $_POST['new_password'] ?? '';

    if ($token && $newPassword) {
        $stmt = $pdo->prepare("SELECT * FROM password_resets WHERE token = ?");
        $stmt->execute([$token]);
        $reset = $stmt->fetch();

        if ($reset && $reset['expires'] >= time()) {
            $hashed = password_hash($newPassword, PASSWORD_DEFAULT);
            $stmt = $pdo->prepare("UPDATE users SET password = ? WHERE email = ?");
            $stmt->execute([$hashed, $reset['email']]);

            $pdo->prepare("DELETE FROM password_resets WHERE email = ?")->execute([$reset['email']]);
            $message = "Password updated successfully. <a href='login'>Login</a>";
        } else {
            $message = "Invalid or expired token.";
        }
    } else {
        $message = "All fields required.";
    }
}
?>
<section class="py-50 bg-light">
    <div class="container mt-5">
        <div class="card mx-auto" style="max-width: 500px;">
            <div class="card-header bg-primary text-white">
                <h4>Set New Password</h4>
            </div>
            <div class="card-body">
                <?php if ($message): ?>
                    <div class="alert alert-primary"><?= $message ?></div>
                <?php endif; ?>
                <form method="POST">
                    <input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>">
                    <div class="mb-3">
                        <label>New Password</label>
                        <input type="password" name="new_password" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Update Password</button>
                </form>
            </div>
        </div>
    </div>
</section>
<?php
$content = ob_get_clean(); // Get the buffered content
require_once __DIR__ . '/../../layout.php';
?>