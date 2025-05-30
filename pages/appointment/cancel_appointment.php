<?php
session_start();
require_once __DIR__ . '/../../includes/db.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: /login");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['appointment_id'])) {
    $appointmentId = $_POST['appointment_id'];
    $userId = $_SESSION['user_id'];

    // Delete only if the appointment belongs to the logged-in patient or doctor
    $stmt = $pdo->prepare("DELETE FROM appointments 
                           WHERE id = ? AND (patient_id = ? OR doctor_id = ?)");
    $stmt->execute([$appointmentId, $userId, $userId]);

    header("Location: /" . $_SESSION['role'] . "/dashboard");
    exit;
} else {
    echo "Invalid request.";
}
