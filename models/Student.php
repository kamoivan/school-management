<?php

class Student
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
                FROM students
                WHERE first_name LIKE :search
                   OR last_name LIKE :search
                   OR email LIKE :search
                ORDER BY id DESC
            ";

            $stmt = $this->pdo->prepare($sql);

            $stmt->execute([
                'search' => '%' . $search . '%'
            ]);
        } else {
            $sql = "
                SELECT *
                FROM students
                ORDER BY id DESC
            ";

            $stmt = $this->pdo->query($sql);
        }

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findById(int $id): ?array
    {
        $stmt = $this->pdo->prepare("
            SELECT *
            FROM students
            WHERE id = :id
        ");

        $stmt->execute([
            'id' => $id
        ]);

        $student = $stmt->fetch(PDO::FETCH_ASSOC);

        return $student ?: null;
    }

    public function create(array $data): bool
    {
        $stmt = $this->pdo->prepare("
            INSERT INTO students (
                first_name,
                last_name,
                email,
                phone,
                birth_date,
                address,
                formation,
                registration_date,
                status
            )
            VALUES (
                :first_name,
                :last_name,
                :email,
                :phone,
                :birth_date,
                :address,
                :formation,
                :registration_date,
                :status
            )
        ");

        return $stmt->execute([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'birth_date' => $data['birth_date'],
            'address' => $data['address'],
            'formation' => $data['formation'],
            'registration_date' => $data['registration_date'],
            'status' => $data['status']
        ]);
    }

    public function update(int $id, array $data): bool
    {
        $stmt = $this->pdo->prepare("
            UPDATE students
            SET
                first_name = :first_name,
                last_name = :last_name,
                email = :email,
                phone = :phone,
                birth_date = :birth_date,
                address = :address,
                formation = :formation,
                registration_date = :registration_date,
                status = :status
            WHERE id = :id
        ");

        return $stmt->execute([
            'id' => $id,
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'birth_date' => $data['birth_date'],
            'address' => $data['address'],
            'formation' => $data['formation'],
            'registration_date' => $data['registration_date'],
            'status' => $data['status']
        ]);
    }

    public function delete(int $id): bool
    {
        $stmt = $this->pdo->prepare("
            DELETE FROM students
            WHERE id = :id
        ");

        return $stmt->execute([
            'id' => $id
        ]);
    }
}