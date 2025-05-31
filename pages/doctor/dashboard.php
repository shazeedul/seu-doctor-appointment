<?php
session_start();
require_once __DIR__ . '/../../includes/db.php';
$pageTitle = "Dashboard - Doctor Appointment System";

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'doctor') {
    header('Location: /login');
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
<section class="py-50 bg-light">
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h4>Welcome, Dr. <?= htmlspecialchars($_SESSION['name']) ?> (Doctor)</h4>
            </div>
            <div class="card-body">
                <a href="/logout" class="btn btn-danger mb-3 float-end">Logout</a>

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
                                        <?php if ($a['status'] === 'pending'): ?>
                                            <form action="/doctor/approve-appointment" method="POST" style="display:inline;">
                                                <input type="hidden" name="appointment_id" value="<?= $a['id'] ?>">
                                                <button type="submit" class="btn btn-sm btn-success">Approve</button>
                                            </form>
                                            <form action="/doctor/cancel-appointment" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure?');">
                                                <input type="hidden" name="appointment_id" value="<?= $a['id'] ?>">
                                                <button type="submit" class="btn btn-sm btn-danger">Cancel</button>
                                            </form>
                                        <?php elseif ($a['status'] === 'approved'): ?>
                                            <span class="badge bg-success">Approved</span>
                                        <?php elseif ($a['status'] === 'cancelled'): ?>
                                            <span class="badge bg-danger">Cancelled</span>
                                        <?php endif; ?>
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
</section>
<?php
$content = ob_get_clean(); // Get buffered content
include __DIR__ . '/../../layout.php';
?>