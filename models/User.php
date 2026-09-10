<?php

class User
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function findByEmail(string $email): ?array
    {
        $sql = "SELECT * FROM users WHERE email = :email";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute([
            'email' => $email
        ]);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        return $user ?: null;
    }

    public function create(
    string $name,
    string $email,
    string $password,
    string $role = 'admin'
): bool {

    $password = password_hash($password, PASSWORD_DEFAULT);
    $sql = "
        INSERT INTO users (name, email, password, role)
        VALUES (:name, :email, :password, :role)
    ";

    $stmt = $this->pdo->prepare($sql);

    return $stmt->execute([
        'name' => $name,
        'email' => $email,
        'password' => $password,
        'role' => $role
    ]);
}
}