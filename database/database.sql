CREATE DATABASE IF NOT EXISTS school_management
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

USE school_management;

CREATE TABLE users (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role VARCHAR(50) NOT NULL DEFAULT 'admin',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE students (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    phone VARCHAR(30),
    birth_date DATE,
    address VARCHAR(255),
    formation VARCHAR(150) NOT NULL,
    registration_date DATE NOT NULL,
    status VARCHAR(50) NOT NULL DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE teachers (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    phone VARCHAR(30),
    speciality VARCHAR(150) NOT NULL,
    hire_date DATE NOT NULL,
    status VARCHAR(50) NOT NULL DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE payments (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    reference VARCHAR(100) NOT NULL UNIQUE,
    student_id INT UNSIGNED NOT NULL,
    amount DECIMAL(10, 2) NOT NULL,
    payment_date DATE NOT NULL,
    payment_method VARCHAR(100) NOT NULL,
    status VARCHAR(50) NOT NULL DEFAULT 'pending',
    comment TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_payments_student
        FOREIGN KEY (student_id)
        REFERENCES students(id)
        ON DELETE CASCADE
        ON UPDATE CASCADE
);

INSERT INTO users (name, email, password, role)
VALUES (
    'Administrateur',
    'admin@school.test',
    '$2y$12$IofAxC7fufCdM/8OMM.aFu/tv7/U9VjqoKQu3U8xr5a2Arj7t8UDG',
    'admin'
);

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
VALUES
(
    'Ivan',
    'Kamo',
    'ivan.kamo@example.com',
    '690000001',
    '2000-05-15',
    'Douala',
    'Génie Logiciel',
    '2026-01-10',
    'active'
),
(
    'Sarah',
    'Mballa',
    'sarah.mballa@example.com',
    '690000002',
    '2001-08-22',
    'Yaoundé',
    'Informatique',
    '2026-01-12',
    'active'
),
(
    'David',
    'Njoya',
    'david.njoya@example.com',
    '690000003',
    '1999-11-03',
    'Douala',
    'Réseaux et Télécommunications',
    '2026-01-15',
    'inactive'
);

INSERT INTO teachers (
    first_name,
    last_name,
    email,
    phone,
    speciality,
    hire_date,
    status
)
VALUES
(
    'Jean',
    'Talla',
    'jean.talla@example.com',
    '690000101',
    'Développement Web',
    '2025-09-01',
    'active'
),
(
    'Marie',
    'Ngo',
    'marie.ngo@example.com',
    '690000102',
    'Base de données',
    '2025-10-15',
    'active'
),
(
    'Paul',
    'Fouda',
    'paul.fouda@example.com',
    '690000103',
    'Réseaux',
    '2024-09-01',
    'inactive'
);

INSERT INTO payments (
    reference,
    student_id,
    amount,
    payment_date,
    payment_method,
    status,
    comment
)
VALUES
(
    'PAY-2026-001',
    1,
    150000.00,
    '2026-01-15',
    'Orange Money',
    'paid',
    'Frais de scolarité'
),
(
    'PAY-2026-002',
    1,
    50000.00,
    '2026-02-10',
    'MTN Mobile Money',
    'paid',
    'Deuxième versement'
),
(
    'PAY-2026-003',
    2,
    200000.00,
    '2026-01-20',
    'Virement bancaire',
    'paid',
    'Frais de scolarité'
),
(
    'PAY-2026-004',
    3,
    75000.00,
    '2026-02-05',
    'Espèces',
    'pending',
    'Paiement en attente'
);