<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard Admin - Gestion Scolaire</title>
</head>

<body>

    <header>

        <h1>Gestion Scolaire</h1>

        <div>
            <span>
                Administrateur :
                <?= htmlspecialchars($_SESSION['user_name']) ?>
            </span>

            <a href="/logout">Se déconnecter</a>
        </div>

    </header>

    <main>

        <h2>Tableau de bord</h2>

        <p>
            Bienvenue dans votre espace d'administration.
        </p>

        <!-- Navigation principale -->

        <section>

            <h2>Gestion</h2>

            <nav>

                <a href="/students">
                    Gestion des étudiants
                </a>

                <a href="/teachers">
                    Gestion des enseignants
                </a>

                <a href="/payments">
                    Gestion des paiements
                </a>

            </nav>

        </section>

        <!-- Statistiques -->

        <section>

            <h2>Statistiques</h2>

            <div>

                <div>
                    <h3>Étudiants</h3>
                    <strong><?= $studentsCount ?></strong>
                </div>

                <div>
                    <h3>Enseignants</h3>
                    <strong><?= $teachersCount ?></strong>
                </div>

                <div>
                    <h3>Paiements</h3>
                    <strong><?= $paymentsCount ?></strong>
                </div>

            </div>

        </section>

        <!-- Étudiants récents -->

        <section>

            <h2>Derniers étudiants</h2>

            <?php if (empty($recentStudents)): ?>

            <p>Aucun étudiant enregistré.</p>

            <?php else: ?>

            <ul>

                <?php foreach ($recentStudents as $student): ?>

                <li>

                    <?= htmlspecialchars(
                            $student['first_name'] . ' ' . $student['last_name']
                        ) ?>

                    -

                    <?= htmlspecialchars($student['formation'] ?? '') ?>

                </li>

                <?php endforeach; ?>

            </ul>

            <a href="/students">
                Voir tous les étudiants
            </a>

            <?php endif; ?>

            <h2>Enseignants récents</h2>

            <?php if (empty($recentTeachers)): ?>

            <p>Aucun enseignant enregistré.</p>

            <?php else: ?>

            <ul>

                <?php foreach ($recentTeachers as $teacher): ?>

                <li>

                    <?= htmlspecialchars(
                            $teacher['first_name'] . ' ' . $teacher['last_name']
                        ) ?>

                    -

                    <?= htmlspecialchars($teacher['speciality'] ?? '') ?>

                </li>

                <?php endforeach; ?>

            </ul>

            <a href="/teachers">
                Voir tous les enseignants
            </a>

            <?php endif; ?>

        </section>

        <!-- Paiements récents -->

        <section>

            <h2>Derniers paiements</h2>

            <?php if (empty($recentPayments)): ?>

            <p>Aucun paiement enregistré.</p>

            <?php else: ?>

            <ul>

                <?php foreach ($recentPayments as $payment): ?>

                <li>

                    <?= htmlspecialchars($payment['reference']) ?>

                    -

                    <?= htmlspecialchars(
                            $payment['first_name'] . ' ' . $payment['last_name']
                        ) ?>

                    -

                    <?= htmlspecialchars($payment['amount'] . ' XAF') ?>

                </li>

                <?php endforeach; ?>

            </ul>

            <a href="/payments">
                Voir tous les paiements
            </a>

            <?php endif; ?>

        </section>

    </main>

</body>

</html>