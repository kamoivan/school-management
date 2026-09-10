<?php

session_start();

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../controllers/AuthController.php';
require_once __DIR__ . '/../controllers/AdminDashboardController.php';
require_once __DIR__ . '/../controllers/StudentController.php';
require_once __DIR__ . '/../controllers/TeacherController.php';
require_once __DIR__ . '/../controllers/PaymentController.php';

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$authController = new AuthController($pdo);
$dashboardController = new AdminDashboardController($pdo);
$studentController = new StudentController($pdo);
$teacherController = new TeacherController($pdo);
$paymentController = new PaymentController($pdo);

switch ($path) {

    case '/': 
        require_once __DIR__ . '/../views/welcome.php';
        break;
    case '/login':
        $authController->login();
        break;

    case '/dashboard':
        $dashboardController->index();
        break;

    case '/logout':
        $authController->logout();
        break;

    case '/students':
        $studentController->index();
        break;
    case '/students/create':
        $studentController->create();
        break;
    case '/students/show':
        $studentController->show();
        break;
    case '/students/edit':
        $studentController->edit();
        break;
    case '/students/delete':
        $studentController->delete();
        break;
    case '/teachers':
        $teacherController->index();
        break;
    case '/teachers/create':
        $teacherController->create();
        break;
    case '/teachers/show':
        $teacherController->show();
        break;
    case '/teachers/edit':
        $teacherController->edit();
        break;
    case '/teachers/delete':
        $teacherController->delete();
        break;
    case '/payments':
        $paymentController->index();
        break;
    case '/payments/create':
        $paymentController->create();
        break;
    case '/payments/show':
        $paymentController->show();
        break;
    case '/payments/edit':
        $paymentController->edit();
        break;
    case '/payments/delete':
        $paymentController->delete();
        break;
    default:
        http_response_code(404);
        echo 'Page introuvable';
        break;
}