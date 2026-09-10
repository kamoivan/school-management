<?php

require_once __DIR__ . '/../config/auth.php';

class AdminDashboardController
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function index(): void
    {
        requireAuth();

        $studentsCount = $this->count('students');
        $teachersCount = $this->count('teachers');
        $paymentsCount = $this->count('payments');

        $stmt = $this->pdo->query("
            SELECT *
            FROM students
            ORDER BY id DESC
            LIMIT 5
        ");

        $recentStudents = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $stmt = $this->pdo->query("
            SELECT
                payments.*,
                students.first_name,
                students.last_name
            FROM payments
            INNER JOIN students
                ON payments.student_id = students.id
            ORDER BY payments.id DESC
            LIMIT 5
        ");

        $recentsTeachers = $this->pdo->query("
            SELECT *
            FROM teachers
            ORDER BY id DESC
            LIMIT 5
        ");

        $recentPayments = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $recentTeachers = $recentsTeachers->fetchAll(PDO::FETCH_ASSOC);

        require_once __DIR__ . '/../views/dashboard/admin.php';
    }

    private function count(string $table): int
    {
        $stmt = $this->pdo->query(
            "SELECT COUNT(*) FROM {$table}"
        );

        return (int) $stmt->fetchColumn();
    }
}