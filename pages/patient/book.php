<?php
session_start();
require_once __DIR__ . '/../../includes/db.php';
$pageTitle = "Book Appointment - Doctor Appointment System";
ob_start(); // Start output buffering

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'patient') {
    header('Location: /login');
    exit;
}
$extraScript = `
    <script>
        // Optional: You can enable a date picker if needed
        new Datepicker(document.getElementById('date'), {
            autohide: true
        });
    </script>
`;
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $doctor_id = $_POST['doctor_id'];
    $date = $_POST['date'];
    $time = $_POST['time'];  // Added time input
    $msg = $_POST['message'];

    // Insert appointment details into the appointments table
    $stmt = $pdo->prepare("INSERT INTO appointments (patient_id, doctor_id, appointment_date, appointment_time, message) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$_SESSION['user_id'], $doctor_id, $date, $time, $msg]);

    $message = "Appointment booked successfully!";
}

$doctors = $pdo->query("SELECT id, full_name FROM users WHERE role = 'doctor'")->fetchAll();
?>
<section class="py-50 bg-light">
    <div class="container mt-5">
        <div class="card shadow-lg">
            <div class="card-header bg-primary text-white">
                <h4>Book Appointment</h4>
            </div>
            <div class="card-body">
                <?php if ($message): ?>
                    <div class="alert alert-success"><?= $message ?></div>
                <?php endif; ?>
                <form method="POST">
                    <div class="mb-3">
                        <label for="doctor_id" class="form-label">Select Doctor</label>
                        <select name="doctor_id" id="doctor_id" class="form-select" required>
                            <option value="">-- Select --</option>
                            <?php foreach ($doctors as $doc): ?>
                                <option value="<?= $doc['id'] ?>"><?= htmlspecialchars($doc['full_name']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="date" class="form-label">Appointment Date</label>
                        <input type="date" name="date" id="date" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="time" class="form-label">Appointment Time</label>
                        <input type="time" name="time" id="time" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Message (optional)</label>
                        <textarea name="message" id="message" class="form-control" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Book Appointment</button>
                </form>
            </div>
            <div class="card-footer text-center">
                <!-- Back Button -->
                <a href="javascript:history.back()" class="btn btn-secondary btn-sm">Back</a>
                <!-- Dashboard Link -->
                <a href="/patient/dashboard" class="btn btn-success btn-sm">Go to Dashboard</a>
            </div>
        </div>
    </div>
</section>
<?php
$content = ob_get_clean(); // Get the buffered content
include __DIR__ . '/../../layout.php'; // Render with layout
?>