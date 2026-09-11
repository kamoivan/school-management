<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Détail enseignant</title>

    <link rel="stylesheet" href="/css/teacher-show.css">

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

                <a href="/students">
                    <i class="fa-solid fa-user-graduate"></i>
                    Étudiants
                </a>

                <a href="/teachers" class="active">
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
                    <h2>Détail enseignant</h2>
                    <p>Consultez les informations de cet enseignant.</p>
                </div>

                <a href="/teachers" class="back-button">
                    <i class="fa-solid fa-arrow-left"></i>
                    Retour aux enseignants
                </a>

            </div>

            <div class="teacher-card">

                <div class="teacher-header">

                    <div class="teacher-avatar">
                        <?= strtoupper(
                            substr($teacher['first_name'], 0, 1)
                            . substr($teacher['last_name'], 0, 1)
                        ) ?>
                    </div>

                    <div class="teacher-title">

                        <h3>
                            <?= htmlspecialchars(
                                $teacher['first_name'] . ' ' . $teacher['last_name']
                            ) ?>
                        </h3>

                        <span class="status-badge status-<?= htmlspecialchars($teacher['status']) ?>">
                            <?= $teacher['status'] === 'active' ? 'Actif' : 'Inactif' ?>
                        </span>

                    </div>

                </div>

                <div class="teacher-info">

                    <div class="info-item">

                        <span class="info-label">
                            <i class="fa-solid fa-hashtag"></i>
                            ID
                        </span>

                        <strong>
                            <?= (int) $teacher['id'] ?>
                        </strong>

                    </div>

                    <div class="info-item">

                        <span class="info-label">
                            <i class="fa-solid fa-envelope"></i>
                            Email
                        </span>

                        <strong>
                            <?= htmlspecialchars($teacher['email'] ?? '') ?: 'Non renseigné' ?>
                        </strong>

                    </div>

                    <div class="info-item">

                        <span class="info-label">
                            <i class="fa-solid fa-phone"></i>
                            Téléphone
                        </span>

                        <strong>
                            <?= htmlspecialchars($teacher['phone'] ?? '') ?: 'Non renseigné' ?>
                        </strong>

                    </div>

                    <div class="info-item">

                        <span class="info-label">
                            <i class="fa-solid fa-book-open"></i>
                            Spécialité
                        </span>

                        <strong>
                            <?= htmlspecialchars($teacher['speciality'] ?? '') ?: 'Non renseignée' ?>
                        </strong>

                    </div>

                    <div class="info-item">

                        <span class="info-label">
                            <i class="fa-solid fa-calendar-check"></i>
                            Date d'embauche
                        </span>

                        <strong>
                            <?= htmlspecialchars($teacher['hire_date'] ?? '') ?: 'Non renseignée' ?>
                        </strong>

                    </div>

                    <div class="info-item">

                        <span class="info-label">
                            <i class="fa-solid fa-user-check"></i>
                            Statut
                        </span>

                        <strong>
                            <?= $teacher['status'] === 'active' ? 'Actif' : 'Inactif' ?>
                        </strong>

                    </div>

                </div>

                <div class="card-footer">

                    <a href="/teachers/edit?id=<?= (int) $teacher['id'] ?>" class="edit-button">
                        <i class="fa-solid fa-pen"></i>
                        Modifier
                    </a>

                    <a href="/teachers" class="cancel-button">
                        Retour
                    </a>

                </div>

            </div>

        </div>

    </main>

</body>

</html>