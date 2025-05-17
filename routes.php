<?php

$request = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$viewDir = '/pages/';

// Custom route for update-password with token
if (($request === '/update-password' || $request === '/auth/update-password') && isset($_GET['token'])) {
    require __DIR__ . $viewDir . 'auth/update_password.php';
    exit;
}

switch ($request) {
    case '':
    case '/index.php':
    case '/':
        require __DIR__ . $viewDir . 'home.php';
        break;

    case '/about-us':
        require __DIR__ . $viewDir . 'about-us.php';
        break;

    case '/services':
        require __DIR__ . $viewDir . 'services.php';
        break;

    case '/team':
        require __DIR__ . $viewDir . 'team.php';
        break;

    case '/login':
    case '/auth/login':
        require __DIR__ . $viewDir . 'auth/login.php';
        break;

    case '/register':
    case '/auth/register':
        require __DIR__ . $viewDir . 'auth/register.php';
        break;

    case '/reset-password':
    case '/auth/reset-password':
        require __DIR__ . $viewDir . 'auth/reset_password.php';
        break;

    case '/logout':
    case '/auth/logout':
        session_start();
        session_unset();
        session_destroy();
        header("Location: login");
        break;

    case '/patient/book':
        require __DIR__ . $viewDir . 'patient/book.php';
        break;

    case '/patient/dashboard':
        require __DIR__ . $viewDir . 'patient/dashboard.php';
        break;

    case '/patient/cancel-appointment':
        require __DIR__ . $viewDir . 'appointment/cancel_appointment.php';
        break;

    case '/doctor/dashboard':
        require __DIR__ . $viewDir . 'doctor/dashboard.php';
        break;

    case '/doctor/cancel-appointment':
        require __DIR__ . $viewDir . 'appointment/cancel_appointment.php';
        break;

    default:
        http_response_code(404);
        require __DIR__ . $viewDir . '404.php';
}
