<?php

require_once __DIR__ . '/../models/User.php';

class AuthController
{
    private User $userModel;

    public function __construct(PDO $pdo)
    {
        $this->userModel = new User($pdo);
    }

    public function login(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            require_once __DIR__ . '/../views/auth/login.php';
            return;
        }

        $email = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';

        if ($email === '' || $password === '') {
            $error = 'Veuillez remplir tous les champs.';
            require_once __DIR__ . '/../views/auth/login.php';
            return;
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error = 'Veuillez saisir une adresse email valide.';
            require_once __DIR__ . '/../views/auth/login.php';
            return;
        }

        $user = $this->userModel->findByEmail($email);

        if (!$user || !password_verify($password, $user['password'])) {
            $error = 'Email ou mot de passe incorrect.';
            require_once __DIR__ . '/../views/auth/login.php';
            return;
        }

        session_regenerate_id(true);

        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['name'];
        $_SESSION['user_role'] = $user['role'];

        header('Location: /dashboard');
        exit;
    }

    public function logout(): void
    {
        $_SESSION = [];

        session_destroy();

        header('Location: /login');
        exit;
    }
}