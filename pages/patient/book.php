<?php
session_start();
require_once __DIR__ . '/../../includes/db.php';
$pageTitle = "Book Appointment - Doctor Appointment System";
ob_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'patient') {
    header('Location: /login');
    exit;
}

$message = '';
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $doctor_id = trim($_POST['doctor_id'] ?? '');
    $date = trim($_POST['date'] ?? '');
    $time = trim($_POST['time'] ?? '');
    $msg = trim($_POST['message'] ?? '');

    // Basic validations
    if (empty($doctor_id) || empty($date) || empty($time)) {
        $errors[] = 'Doctor, date, and time are required.';
    }

    // Validate date and time format and future datetime
    $appointmentDateTime = strtotime("$date $time");
    if (!$appointmentDateTime || $appointmentDateTime < time()) {
        $errors[] = 'Appointment must be set to a future date and time.';
    }

    // Check if doctor exists and has role 'doctor'
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM users WHERE id = ? AND role = 'doctor'");
    $stmt->execute([$doctor_id]);
    if ($stmt->fetchColumn() == 0) {
        $errors[] = 'Selected doctor is invalid.';
    }

    // Check for duplicate appointment (same doctor, date & time)
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM appointments WHERE doctor_id = ? AND appointment_date = ? AND appointment_time = ?");
    $stmt->execute([$doctor_id, $date, $time]);
    if ($stmt->fetchColumn() > 0) {
        $errors[] = 'This time slot is already booked with the selected doctor.';
    }

    // Insert if no errors
    if (empty($errors)) {
        $stmt = $pdo->prepare("INSERT INTO appointments (patient_id, doctor_id, appointment_date, appointment_time, message) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$_SESSION['user_id'], $doctor_id, $date, $time, $msg]);
        $message = "Appointment booked successfully!";
    }
}

// Load doctors
$doctors = $pdo->query("SELECT id, full_name FROM users WHERE role = 'doctor'")->fetchAll();
?>
<section class="py-50 bg-light">
    <div class="container mt-5">
        <div class="card shadow-lg">
            <div class="card-header bg-primary text-white">
                <h4>Book Appointment</h4>
            </div>
            <div class="card-body">
                <?php if (!empty($errors)): ?>
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            <?php foreach ($errors as $err): ?>
                                <li><?= htmlspecialchars($err) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php elseif ($message): ?>
                    <div class="alert alert-success"><?= htmlspecialchars($message) ?></div>
                <?php endif; ?>

                <form method="POST">
                    <div class="mb-3">
                        <label for="doctor_id" class="form-label">Select Doctor</label>
                        <select name="doctor_id" id="doctor_id" class="form-select" required>
                            <option value="">-- Select --</option>
                            <?php foreach ($doctors as $doc): ?>
                                <option value="<?= $doc['id'] ?>" <?= (isset($_POST['doctor_id']) && $_POST['doctor_id'] == $doc['id']) ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($doc['full_name']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="date" class="form-label">Appointment Date</label>
                        <input type="date" name="date" id="date" class="form-control" value="<?= htmlspecialchars($_POST['date'] ?? '') ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="time" class="form-label">Appointment Time</label>
                        <input type="time" name="time" id="time" class="form-control" value="<?= htmlspecialchars($_POST['time'] ?? '') ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Message (optional)</label>
                        <textarea name="message" id="message" class="form-control" rows="3"><?= htmlspecialchars($_POST['message'] ?? '') ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Book Appointment</button>
                </form>
            </div>
            <div class="card-footer text-center">
                <a href="javascript:history.back()" class="btn btn-secondary btn-sm">Back</a>
                <a href="/patient/dashboard" class="btn btn-success btn-sm">Go to Dashboard</a>
            </div>
        </div>
    </div>
</section>
<?php
$content = ob_get_clean();
include __DIR__ . '/../../layout.php';
?>