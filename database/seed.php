<?php

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/User.php';

$userModel = new User($pdo);

$userModel->create(
    'Administrateur',
    'admin@school.test',
    'admin123',
    'admin'
);

echo "Administrateur créé avec succès.";