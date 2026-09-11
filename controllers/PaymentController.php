<?php

require_once __DIR__ . '/../config/auth.php';
require_once __DIR__ . '/../models/Payment.php';
require_once __DIR__ . '/../models/Student.php';

class PaymentController
{
    private Payment $paymentModel;
    private Student $studentModel;

    public function __construct(PDO $pdo)
    {
        $this->paymentModel = new Payment($pdo);
        $this->studentModel = new Student($pdo);
    }
public function index(): void
{
    requireAuth();

    $search = trim($_GET['search'] ?? '');
    $status = $_GET['status'] ?? '';
    $dateStart = $_GET['date_start'] ?? '';
    $dateEnd = $_GET['date_end'] ?? '';

    $payments = $this->paymentModel->getAll(
        $search,
        $status,
        $dateStart,
        $dateEnd
    );

    require_once __DIR__ . '/../views/payments/index.php';
}

    public function create(): void
    {
        requireAuth();

        $errors = [];

        $students = $this->studentModel->getAll();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $data = $this->getFormData();

            $errors = $this->validate($data);

            if (empty($errors)) {

                $this->paymentModel->create($data);

                header('Location: /payments');
                exit;
            }
        }

        require_once __DIR__ . '/../views/payments/create.php';
    }

    public function show(): void
    {
        requireAuth();

        $id = (int) ($_GET['id'] ?? 0);

        $payment = $this->paymentModel->findById($id);

        if (!$payment) {
            http_response_code(404);
            echo 'Paiement introuvable';
            return;
        }

        require_once __DIR__ . '/../views/payments/show.php';
    }

    public function edit(): void
    {
        requireAuth();

        $id = (int) ($_GET['id'] ?? 0);

        $payment = $this->paymentModel->findById($id);

        if (!$payment) {
            http_response_code(404);
            echo 'Paiement introuvable';
            return;
        }

        $errors = [];

        $students = $this->studentModel->getAll();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $data = $this->getFormData();

            $errors = $this->validate($data);

            if (empty($errors)) {

                $this->paymentModel->update($id, $data);

                header('Location: /payments');
                exit;
            }

            $payment = array_merge($payment, $data);
        }

        require_once __DIR__ . '/../views/payments/edit.php';
    }

    public function delete(): void
    {
        requireAuth();

        $id = (int) ($_GET['id'] ?? 0);

        if ($id > 0) {
            $this->paymentModel->delete($id);
        }

        header('Location: /payments');
        exit;
    }

    private function getFormData(): array
    {
        return [
            'reference' => trim($_POST['reference'] ?? ''),
            'student_id' => (int) ($_POST['student_id'] ?? 0),
            'amount' => trim($_POST['amount'] ?? ''),
            'payment_date' => $_POST['payment_date'] ?? '',
            'payment_method' => $_POST['payment_method'] ?? '',
            'status' => $_POST['status'] ?? '',
            'comment' => trim($_POST['comment'] ?? '')
        ];
    }

    private function validate(array $data): array
    {
        $errors = [];

        if ($data['reference'] === '') {
            $errors[] = 'La référence est obligatoire.';
        }

        if ($data['student_id'] <= 0) {
            $errors[] = 'Veuillez sélectionner un étudiant.';
        }

        if ($data['amount'] === '' || !is_numeric($data['amount'])) {
            $errors[] = 'Le montant doit être un nombre valide.';
        } elseif ((float) $data['amount'] <= 0) {
            $errors[] = 'Le montant doit être supérieur à zéro.';
        }

        if ($data['payment_date'] === '') {
            $errors[] = 'La date du paiement est obligatoire.';
        }

        $allowedMethods = [
            'orange_money',
            'mtn_mobile_money',
            'moov_money',
            'cash',
            'bank_transfer',
            'other'
        ];

        if (!in_array($data['payment_method'], $allowedMethods, true)) {
            $errors[] = 'Le mode de paiement est invalide.';
        }

        $allowedStatuses = [
            'pending',
            'paid',
            'cancelled'
        ];

        if (!in_array($data['status'], $allowedStatuses, true)) {
            $errors[] = 'Le statut du paiement est invalide.';
        }

        return $errors;
    }
}