<?php
session_start();
ob_start();
require_once __DIR__ . '/../../includes/db.php';
$pageTitle = "Dashboard - Doctor Appointment System";

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'patient') {
    header('Location: /login');
    exit;
}

// Fetch appointments
$stmt = $pdo->prepare("SELECT a.*, u.full_name AS doctor_name 
                       FROM appointments a 
                       JOIN users u ON a.doctor_id = u.id 
                       WHERE a.patient_id = ?
                       ORDER BY a.appointment_date DESC");
$stmt->execute([$_SESSION['user_id']]);
$appointments = $stmt->fetchAll();
?>
<section class="py-50 bg-light">
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-success text-white">
                <h4>Welcome, <?= htmlspecialchars($_SESSION['name']) ?> (Patient)</h4>
            </div>
            <div class="card-body">
                <a href="/patient/book" class="btn btn-primary mb-3">Book New Appointment</a>
                <a href="/auth/logout" class="btn btn-danger mb-3 float-end">Logout</a>

                <h5>Your Appointments</h5>
                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Doctor</th>
                            <th>Date</th>
                            <th>Message</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (count($appointments) > 0): ?>
                            <?php foreach ($appointments as $i => $a): ?>
                                <tr>
                                    <td><?= $i + 1 ?></td>
                                    <td><?= htmlspecialchars($a['doctor_name']) ?></td>
                                    <td><?= $a['appointment_date'] ?></td>
                                    <td><?= htmlspecialchars($a['message']) ?></td>
                                    <td>
                                        <?php if ($a['status'] === 'approved'): ?>
                                            <span class="badge bg-success">Approved</span>
                                        <?php elseif ($a['status'] === 'cancelled'): ?>
                                            <span class="badge bg-danger">Cancelled</span>
                                        <?php else: ?>
                                            <span class="badge bg-warning text-dark">Pending</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if ($a['status'] !== 'cancelled'): ?>
                                            <form action="/patient/cancel-appointment" method="POST" onsubmit="return confirm('Are you sure you want to cancel this appointment?');">
                                                <input type="hidden" name="appointment_id" value="<?= $a['id'] ?>">
                                                <button type="submit" class="btn btn-sm btn-danger">Cancel</button>
                                            </form>
                                        <?php else: ?>
                                            <span class="text-muted">N/A</span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" class="text-center">No appointments found.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<?php
$content = ob_get_clean();
include __DIR__ . '/../../layout.php';
?>