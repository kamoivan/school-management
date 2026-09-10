<?php

require_once __DIR__ . '/../config/auth.php';
require_once __DIR__ . '/../models/Teacher.php';

class TeacherController
{
    private Teacher $teacherModel;

    public function __construct(PDO $pdo)
    {
        $this->teacherModel = new Teacher($pdo);
    }

    public function index(): void
    {
        requireAuth();

        $search = trim($_GET['search'] ?? '');

        $teachers = $this->teacherModel->getAll($search);

        require_once __DIR__ . '/../views/teachers/index.php';
    }

    public function create(): void
    {
        requireAuth();

        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = $this->getFormData();

            $errors = $this->validate($data);

            if (empty($errors)) {
                $this->teacherModel->create($data);

                header('Location: /teachers');
                exit;
            }
        }

        require_once __DIR__ . '/../views/teachers/create.php';
    }

    public function show(): void
    {
        requireAuth();

        $id = (int) ($_GET['id'] ?? 0);

        $teacher = $this->teacherModel->findById($id);

        if (!$teacher) {
            http_response_code(404);
            echo 'Enseignant introuvable';
            return;
        }

        require_once __DIR__ . '/../views/teachers/show.php';
    }

    public function edit(): void
    {
        requireAuth();

        $id = (int) ($_GET['id'] ?? 0);

        $teacher = $this->teacherModel->findById($id);

        if (!$teacher) {
            http_response_code(404);
            echo 'Enseignant introuvable';
            return;
        }

        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = $this->getFormData();

            $errors = $this->validate($data);

            if (empty($errors)) {
                $this->teacherModel->update($id, $data);

                header('Location: /teachers');
                exit;
            }

            $teacher = array_merge($teacher, $data);
        }

        require_once __DIR__ . '/../views/teachers/edit.php';
    }

    public function delete(): void
    {
        requireAuth();

        $id = (int) ($_GET['id'] ?? 0);

        if ($id > 0) {
            $this->teacherModel->delete($id);
        }

        header('Location: /teachers');
        exit;
    }

    private function getFormData(): array
    {
        return [
            'first_name' => trim($_POST['first_name'] ?? ''),
            'last_name' => trim($_POST['last_name'] ?? ''),
            'email' => trim($_POST['email'] ?? ''),
            'phone' => trim($_POST['phone'] ?? ''),
            'speciality' => trim($_POST['speciality'] ?? ''),
            'hire_date' => $_POST['hire_date'] ?? '',
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

        if (
            $data['email'] !== '' &&
            !filter_var($data['email'], FILTER_VALIDATE_EMAIL)
        ) {
            $errors[] = 'L’adresse email est invalide.';
        }

        $allowedStatuses = ['active', 'inactive'];

        if (!in_array($data['status'], $allowedStatuses, true)) {
            $errors[] = 'Le statut sélectionné est invalide.';
        }

        return $errors;
    }
}