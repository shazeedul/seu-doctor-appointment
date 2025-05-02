<?php
session_start();
require_once '../includes/db.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'doctor') {
    header('Location: ../auth/login.php');
    exit;
}

// Fetch appointments
$stmt = $pdo->prepare("SELECT a.*, u.full_name AS patient_name 
                       FROM appointments a 
                       JOIN users u ON a.patient_id = u.id 
                       WHERE a.doctor_id = ?");
$stmt->execute([$_SESSION['user_id']]);
$appointments = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Doctor Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h4>Welcome, Dr. <?= htmlspecialchars($_SESSION['name']) ?> (Doctor)</h4>
            </div>
            <div class="card-body">
                <a href="../auth/logout.php" class="btn btn-danger mb-3 float-end">Logout</a>

                <h5>Appointments Received</h5>
                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Patient</th>
                            <th>Date</th>
                            <th>Message</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (count($appointments) > 0): ?>
                            <?php foreach ($appointments as $i => $a): ?>
                                <tr>
                                    <td><?= $i + 1 ?></td>
                                    <td><?= htmlspecialchars($a['patient_name']) ?></td>
                                    <td><?= $a['appointment_date'] ?></td>
                                    <td><?= htmlspecialchars($a['message']) ?></td>
                                    <td>
                                        <form action="../appointments/cancel_appointment.php" method="POST" onsubmit="return confirm('Are you sure?');">
                                            <input type="hidden" name="appointment_id" value="<?= $a['id'] ?>">
                                            <button type="submit" class="btn btn-sm btn-danger">Cancel</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5" class="text-center">No appointments yet.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>

</html>