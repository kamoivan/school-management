<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Enseignant</title>
</head>

<body>

    <header>
        <h1>Détails de l'enseignant</h1>

        <nav>
            <a href="/dashboard">Dashboard</a>
            <a href="/teachers">Liste des enseignants</a>
        </nav>
    </header>

    <main>

        <h2>
            <?= htmlspecialchars(
            $teacher['first_name'] . ' ' . $teacher['last_name']
        ) ?>
        </h2>

        <dl>

            <dt>ID</dt>
            <dd><?= (int) $teacher['id'] ?></dd>

            <dt>Prénom</dt>
            <dd><?= htmlspecialchars($teacher['first_name']) ?></dd>

            <dt>Nom</dt>
            <dd><?= htmlspecialchars($teacher['last_name']) ?></dd>

            <dt>Email</dt>
            <dd><?= htmlspecialchars($teacher['email'] ?? '') ?></dd>

            <dt>Téléphone</dt>
            <dd><?= htmlspecialchars($teacher['phone'] ?? '') ?></dd>

            <dt>Spécialité</dt>
            <dd><?= htmlspecialchars($teacher['speciality'] ?? '') ?></dd>

            <dt>Date d'embauche</dt>
            <dd><?= htmlspecialchars($teacher['hire_date'] ?? '') ?></dd>

            <dt>Statut</dt>
            <dd><?= htmlspecialchars($teacher['status']) ?></dd>

        </dl>

        <a href="/teachers/edit?id=<?= (int) $teacher['id'] ?>">
            Modifier
        </a>

    </main>

</body>

</html>