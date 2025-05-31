<?php
session_start();
require_once __DIR__ . '/../../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['appointment_id']) && $_SESSION['role'] === 'doctor') {
    $appointmentId = $_POST['appointment_id'];
    $doctorId = $_SESSION['user_id'];

    // Ensure the appointment belongs to the logged-in doctor
    $stmt = $pdo->prepare("UPDATE appointments SET status = 'approved' WHERE id = ? AND doctor_id = ?");
    $stmt->execute([$appointmentId, $doctorId]);
}

header('Location: /doctor/dashboard');
exit;
