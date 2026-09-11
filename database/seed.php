<?php

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/User.php';

$userModel = new User($pdo);

$existingUser = $userModel->findByEmail('admin@school.test');

if (!$existingUser) {
    $userModel->create(
        'Administrateur',
        'admin@school.test',
        'admin123',
        'admin'
    );

    echo "Administrateur créé avec succès.";
    exit;
}

echo "L'administrateur existe déjà.";