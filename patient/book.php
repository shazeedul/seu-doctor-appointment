<?php
session_start();
require_once '../includes/db.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'patient') {
    header('Location: ../auth/login.php');
    exit;
}

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $doctor_id = $_POST['doctor_id'];
    $date = $_POST['date'];
    $time = $_POST['time'];  // Added time input
    $msg = $_POST['message'];

    $appointment_datetime = $date . ' ' . $time;  // Combine date and time

    // Insert appointment details into the appointments table
    $stmt = $pdo->prepare("INSERT INTO appointments (patient_id, doctor_id, appointment_date, message) VALUES (?, ?, ?, ?)");
    $stmt->execute([$_SESSION['user_id'], $doctor_id, $appointment_datetime, $msg]);

    $message = "Appointment booked successfully!";
}

$doctors = $pdo->query("SELECT id, full_name FROM users WHERE role = 'doctor'")->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Appointment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bs5-datepicker@1.1.1/dist/bs5-datepicker.min.js"></script> <!-- Optional for DatePicker -->
</head>
<body class="bg-light">

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
            <a href="dashboard.php" class="btn btn-success btn-sm">Go to Dashboard</a>
        </div>
    </div>
</div>

<!-- Optional: JavaScript for Date Picker -->
<script>
    // Optional: You can enable a date picker if needed
    new Datepicker(document.getElementById('date'), {
        autohide: true
    });
</script>

</body>
</html>
