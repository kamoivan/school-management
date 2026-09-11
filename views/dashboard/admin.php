<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard Admin - Gestion Scolaire</title>

    <link rel="stylesheet" href="/css/style.css">
</head>

<body>

    <header class="topbar">

        <div class="container topbar-content">

            <h1>Gestion Scolaire</h1>

            <div class="admin-info">

                <span>
                    Administrateur :
                    <?= htmlspecialchars($_SESSION['user_name']) ?>
                </span>

                <a href="/logout" class="btn btn-danger">
                    Se déconnecter
                </a>

            </div>

        </div>

    </header>

    <main class="container dashboard">

        <div class="page-header">

            <div>
                <h2>Tableau de bord</h2>

                <p>
                    Bienvenue dans votre espace d'administration.
                </p>
            </div>

        </div>


        <section class="dashboard-section">

            <div class="section-header">
                <h2>Gestion</h2>
            </div>

            <nav class="management-links">

                <a href="/students" class="management-card">
                    <strong>Étudiants</strong>
                    <span>Gérer les étudiants</span>
                </a>

                <a href="/teachers" class="management-card">
                    <strong>Enseignants</strong>
                    <span>Gérer les enseignants</span>
                </a>

                <a href="/payments" class="management-card">
                    <strong>Paiements</strong>
                    <span>Gérer les paiements</span>
                </a>

            </nav>

        </section>



        <section class="dashboard-section">

            <div class="section-header">
                <h2>Statistiques</h2>
            </div>

            <div class="stats-grid">

                <div class="stat-card">

                    <span class="stat-label">
                        Étudiants
                    </span>

                    <strong class="stat-value">
                        <?= $studentsCount ?>
                    </strong>

                </div>

                <div class="stat-card">

                    <span class="stat-label">
                        Enseignants
                    </span>

                    <strong class="stat-value">
                        <?= $teachersCount ?>
                    </strong>

                </div>

                <div class="stat-card">

                    <span class="stat-label">
                        Paiements
                    </span>

                    <strong class="stat-value">
                        <?= $paymentsCount ?>
                    </strong>

                </div>

            </div>

        </section>


        <div class="recent-grid">


            <section class="dashboard-section">

                <div class="section-header">

                    <h2>Derniers étudiants</h2>

                    <a href="/students" class="section-link">
                        Voir tout
                    </a>

                </div>

                <?php if (empty($recentStudents)): ?>

                <p class="empty-message">
                    Aucun étudiant enregistré.
                </p>

                <?php else: ?>

                <ul class="recent-list">

                    <?php foreach ($recentStudents as $student): ?>

                    <li>

                        <div>
                            <strong>
                                <?= htmlspecialchars(
                                            $student['first_name'] . ' ' . $student['last_name']
                                        ) ?>
                            </strong>

                            <span>
                                <?= htmlspecialchars(
                                            $student['formation'] ?? ''
                                        ) ?>
                            </span>
                        </div>

                    </li>

                    <?php endforeach; ?>

                </ul>

                <?php endif; ?>

            </section>



            <section class="dashboard-section">

                <div class="section-header">

                    <h2>Derniers enseignants</h2>

                    <a href="/teachers" class="section-link">
                        Voir tout
                    </a>

                </div>

                <?php if (empty($recentTeachers)): ?>

                <p class="empty-message">
                    Aucun enseignant enregistré.
                </p>

                <?php else: ?>

                <ul class="recent-list">

                    <?php foreach ($recentTeachers as $teacher): ?>

                    <li>

                        <div>
                            <strong>
                                <?= htmlspecialchars(
                                            $teacher['first_name'] . ' ' . $teacher['last_name']
                                        ) ?>
                            </strong>

                            <span>
                                <?= htmlspecialchars(
                                            $teacher['speciality'] ?? ''
                                        ) ?>
                            </span>
                        </div>

                    </li>

                    <?php endforeach; ?>

                </ul>

                <?php endif; ?>

            </section>

        </div>


        <section class="dashboard-section">

            <div class="section-header">

                <h2>Derniers paiements</h2>

                <a href="/payments" class="section-link">
                    Voir tout
                </a>

            </div>

            <?php if (empty($recentPayments)): ?>

            <p class="empty-message">
                Aucun paiement enregistré.
            </p>

            <?php else: ?>

            <ul class="recent-list payments-list">

                <?php foreach ($recentPayments as $payment): ?>

                <li>

                    <div>

                        <strong>
                            <?= htmlspecialchars($payment['reference']) ?>
                        </strong>

                        <span>
                            <?= htmlspecialchars(
                                        $payment['first_name'] . ' ' . $payment['last_name']
                                    ) ?>
                        </span>

                    </div>

                    <strong>
                        <?= htmlspecialchars($payment['amount'] . ' XAF') ?>
                    </strong>

                </li>

                <?php endforeach; ?>

            </ul>

            <?php endif; ?>

        </section>

    </main>

</body>

</html>