<?php

require_once __DIR__ . '/../config/auth.php';
require_once __DIR__ . '/../models/Student.php';

class StudentController
{
    private Student $studentModel;

    public function __construct(PDO $pdo)
    {
        $this->studentModel = new Student($pdo);
    }

    public function index(): void
    {
        requireAuth();

        $search = trim($_GET['search'] ?? '');

        $students = $this->studentModel->getAll($search);

        require_once __DIR__ . '/../views/students/index.php';
    }

    public function create(): void
    {
        requireAuth();

        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $data = $this->getFormData();

            $errors = $this->validate($data);

            if (empty($errors)) {
                $this->studentModel->create($data);

                header('Location: /students');
                exit;
            }
        }

        require_once __DIR__ . '/../views/students/create.php';
    }

    public function show(): void
    {
        requireAuth();

        $id = (int) ($_GET['id'] ?? 0);

        $student = $this->studentModel->findById($id);

        if (!$student) {
            http_response_code(404);
            echo 'Étudiant introuvable';
            return;
        }

        require_once __DIR__ . '/../views/students/show.php';
    }

    public function edit(): void
    {
        requireAuth();

        $id = (int) ($_GET['id'] ?? 0);

        $student = $this->studentModel->findById($id);

        if (!$student) {
            http_response_code(404);
            echo 'Étudiant introuvable';
            return;
        }

        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $data = $this->getFormData();

            $errors = $this->validate($data);

            if (empty($errors)) {
                $this->studentModel->update($id, $data);

                header('Location: /students');
                exit;
            }

            $student = array_merge($student, $data);
        }

        require_once __DIR__ . '/../views/students/edit.php';
    }

    public function delete(): void
    {
        requireAuth();

        $id = (int) ($_GET['id'] ?? 0);

        if ($id > 0) {
            $this->studentModel->delete($id);
        }

        header('Location: /students');
        exit;
    }

    private function getFormData(): array
    {
        return [
            'first_name' => trim($_POST['first_name'] ?? ''),
            'last_name' => trim($_POST['last_name'] ?? ''),
            'email' => trim($_POST['email'] ?? ''),
            'phone' => trim($_POST['phone'] ?? ''),
            'birth_date' => $_POST['birth_date'] ?? '',
            'address' => trim($_POST['address'] ?? ''),
            'formation' => trim($_POST['formation'] ?? ''),
            'registration_date' => $_POST['registration_date'] ?? '',
            'status' => $_POST['status'] ?? 'active'
        ];
    }

    private function validate(array $data): array
    {
        $errors = [];

        if ($data['first_name'] === '') {
            $errors[] = 'Le prénom est obligatoire.';
        }

        if ($data['last_name'] === '') {
            $errors[] = 'Le nom est obligatoire.';
        }

        if ($data['email'] !== '' &&
            !filter_var($data['email'], FILTER_VALIDATE_EMAIL)
        ) {
            $errors[] = 'L’adresse email est invalide.';
        }

        if ($data['registration_date'] === '') {
            $errors[] = 'La date d’inscription est obligatoire.';
        }

        $allowedStatuses = ['active', 'inactive'];

        if (!in_array($data['status'], $allowedStatuses, true)) {
            $errors[] = 'Le statut sélectionné est invalide.';
        }

        return $errors;
    }
}