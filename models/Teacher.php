<?php

class Teacher
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAll(string $search = ''): array
    {
        if ($search !== '') {
            $sql = "
                SELECT *
                FROM teachers
                WHERE first_name LIKE :search
                   OR last_name LIKE :search
                   OR speciality LIKE :search
                ORDER BY id DESC
            ";

            $stmt = $this->pdo->prepare($sql);

            $stmt->execute([
                'search' => '%' . $search . '%'
            ]);
        } else {
            $stmt = $this->pdo->query("
                SELECT *
                FROM teachers
                ORDER BY id DESC
            ");
        }

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findById(int $id): ?array
    {
        $stmt = $this->pdo->prepare("
            SELECT *
            FROM teachers
            WHERE id = :id
        ");

        $stmt->execute([
            'id' => $id
        ]);

        $teacher = $stmt->fetch(PDO::FETCH_ASSOC);

        return $teacher ?: null;
    }

    public function create(array $data): bool
    {
        $stmt = $this->pdo->prepare("
            INSERT INTO teachers (
                first_name,
                last_name,
                email,
                phone,
                speciality,
                hire_date,
                status
            )
            VALUES (
                :first_name,
                :last_name,
                :email,
                :phone,
                :speciality,
                :hire_date,
                :status
            )
        ");

        return $stmt->execute([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'speciality' => $data['speciality'],
            'hire_date' => $data['hire_date'],
            'status' => $data['status']
        ]);
    }

    public function update(int $id, array $data): bool
    {
        $stmt = $this->pdo->prepare("
            UPDATE teachers
            SET
                first_name = :first_name,
                last_name = :last_name,
                email = :email,
                phone = :phone,
                speciality = :speciality,
                hire_date = :hire_date,
                status = :status
            WHERE id = :id
        ");

        return $stmt->execute([
            'id' => $id,
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'speciality' => $data['speciality'],
            'hire_date' => $data['hire_date'],
            'status' => $data['status']
        ]);
    }

    public function delete(int $id): bool
    {
        $stmt = $this->pdo->prepare("
            DELETE FROM teachers
            WHERE id = :id
        ");

        return $stmt->execute([
            'id' => $id
        ]);
    }
}