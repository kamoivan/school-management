<!DOCTYPE html>

<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Détail étudiant</title>

    <link rel="stylesheet" href="/css/student-show.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>

<body>

    <header class="topbar">

        <div class="container topbar-content">

            <h1>
                <i class="fa-solid fa-school"></i>
                Gestion Scolaire
            </h1>

            <nav class="main-nav">

                <a href="/dashboard">
                    <i class="fa-solid fa-chart-line"></i>
                    Dashboard
                </a>

                <a href="/students" class="active">
                    <i class="fa-solid fa-user-graduate"></i>
                    Étudiants
                </a>

                <a href="/teachers">
                    <i class="fa-solid fa-chalkboard-user"></i>
                    Enseignants
                </a>

                <a href="/payments">
                    <i class="fa-solid fa-money-bill-wave"></i>
                    Paiements
                </a>

                <a href="/logout">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    Déconnexion
                </a>

            </nav>

        </div>

    </header>

    <main class="page-content">

        <div class="container">

            <div class="page-header">

                <div>
                    <h2>Détail étudiant</h2>
                    <p>Consultez les informations de cet étudiant.</p>
                </div>

                <a href="/students" class="back-button">
                    <i class="fa-solid fa-arrow-left"></i>
                    Retour aux étudiants
                </a>

            </div>

            <div class="student-card">

                <div class="student-header">

                    <div class="student-avatar">
                        <?= strtoupper(
                            substr($student['first_name'], 0, 1)
                            . substr($student['last_name'], 0, 1)
                        ) ?>
                    </div>

                    <div class="student-title">

                        <h3>
                            <?= htmlspecialchars(
                                $student['first_name'] . ' ' . $student['last_name']
                            ) ?>
                        </h3>

                        <span class="status-badge status-<?= htmlspecialchars($student['status']) ?>">
                            <?= $student['status'] === 'active' ? 'Actif' : 'Inactif' ?>
                        </span>

                    </div>

                </div>

                <div class="student-info">

                    <div class="info-item">

                        <span class="info-label">
                            <i class="fa-solid fa-envelope"></i>
                            Email
                        </span>

                        <strong>
                            <?= htmlspecialchars($student['email'] ?? '') ?: 'Non renseigné' ?>
                        </strong>

                    </div>

                    <div class="info-item">

                        <span class="info-label">
                            <i class="fa-solid fa-phone"></i>
                            Téléphone
                        </span>

                        <strong>
                            <?= htmlspecialchars($student['phone'] ?? '') ?: 'Non renseigné' ?>
                        </strong>

                    </div>

                    <div class="info-item">

                        <span class="info-label">
                            <i class="fa-solid fa-calendar-days"></i>
                            Date de naissance
                        </span>

                        <strong>
                            <?= htmlspecialchars($student['birth_date'] ?? '') ?: 'Non renseignée' ?>
                        </strong>

                    </div>

                    <div class="info-item">

                        <span class="info-label">
                            <i class="fa-solid fa-location-dot"></i>
                            Adresse
                        </span>

                        <strong>
                            <?= htmlspecialchars($student['address'] ?? '') ?: 'Non renseignée' ?>
                        </strong>

                    </div>

                    <div class="info-item">

                        <span class="info-label">
                            <i class="fa-solid fa-graduation-cap"></i>
                            Formation / Classe
                        </span>

                        <strong>
                            <?= htmlspecialchars($student['formation'] ?? '') ?: 'Non renseignée' ?>
                        </strong>

                    </div>

                    <div class="info-item">

                        <span class="info-label">
                            <i class="fa-solid fa-calendar-check"></i>
                            Date d'inscription
                        </span>

                        <strong>
                            <?= htmlspecialchars($student['registration_date']) ?>
                        </strong>

                    </div>

                </div>

                <div class="card-footer">

                    <a href="/students/edit?id=<?= (int) $student['id'] ?>" class="edit-button">
                        <i class="fa-solid fa-pen"></i>
                        Modifier
                    </a>

                    <a href="/students" class="cancel-button">
                        Retour
                    </a>

                </div>

            </div>

        </div>

    </main>

</body>

</html>