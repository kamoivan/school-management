<?php

class Payment
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAll(
        string $search = '',
        string $status = '',
        string $dateStart = '',
        string $dateEnd = ''
    ): array {

        $sql = "
            SELECT
                payments.*,
                students.first_name,
                students.last_name
            FROM payments
            INNER JOIN students
                ON payments.student_id = students.id
        ";

        $conditions = [];
        $params = [];


        if ($search !== '') {
            $conditions[] = "
                (
                    payments.reference LIKE :search
                    OR students.first_name LIKE :search
                    OR students.last_name LIKE :search
                )
            ";

            $params['search'] = '%' . $search . '%';
        }


        if ($status !== '') {
            $conditions[] = "payments.status = :status";

            $params['status'] = $status;
        }


        if ($dateStart !== '') {
            $conditions[] = "payments.payment_date >= :date_start";

            $params['date_start'] = $dateStart;
        }


        if ($dateEnd !== '') {
            $conditions[] = "payments.payment_date <= :date_end";

            $params['date_end'] = $dateEnd;
        }


        if (!empty($conditions)) {
            $sql .= " WHERE " . implode(" AND ", $conditions);
        }

        $sql .= " ORDER BY payments.id DESC";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute($params);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findById(int $id): ?array
    {
        $stmt = $this->pdo->prepare("
            SELECT
                payments.*,
                students.first_name,
                students.last_name
            FROM payments
            INNER JOIN students
                ON payments.student_id = students.id
            WHERE payments.id = :id
        ");

        $stmt->execute([
            'id' => $id
        ]);

        $payment = $stmt->fetch(PDO::FETCH_ASSOC);

        return $payment ?: null;
    }

    public function create(array $data): bool
    {
        $stmt = $this->pdo->prepare("
            INSERT INTO payments (
                reference,
                student_id,
                amount,
                payment_date,
                payment_method,
                status,
                comment
            )
            VALUES (
                :reference,
                :student_id,
                :amount,
                :payment_date,
                :payment_method,
                :status,
                :comment
            )
        ");

        return $stmt->execute([
            'reference' => $data['reference'],
            'student_id' => $data['student_id'],
            'amount' => $data['amount'],
            'payment_date' => $data['payment_date'],
            'payment_method' => $data['payment_method'],
            'status' => $data['status'],
            'comment' => $data['comment']
        ]);
    }

    public function update(int $id, array $data): bool
    {
        $stmt = $this->pdo->prepare("
            UPDATE payments
            SET
                reference = :reference,
                student_id = :student_id,
                amount = :amount,
                payment_date = :payment_date,
                payment_method = :payment_method,
                status = :status,
                comment = :comment
            WHERE id = :id
        ");

        return $stmt->execute([
            'id' => $id,
            'reference' => $data['reference'],
            'student_id' => $data['student_id'],
            'amount' => $data['amount'],
            'payment_date' => $data['payment_date'],
            'payment_method' => $data['payment_method'],
            'status' => $data['status'],
            'comment' => $data['comment']
        ]);
    }

    public function delete(int $id): bool
    {
        $stmt = $this->pdo->prepare("
            DELETE FROM payments
            WHERE id = :id
        ");

        return $stmt->execute([
            'id' => $id
        ]);
    }
}