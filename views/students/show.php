<!DOCTYPE html>

<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Détail étudiant</title>

</head>

<body>

    <header>

        <h1>Gestion Scolaire</h1>

        <nav>
            <a href="/dashboard">Dashboard</a>
            <a href="/students">Étudiants</a>
        </nav>

    </header>

    <main>

        <h2>
            <?= htmlspecialchars(
        $student['first_name'] . ' ' . $student['last_name']
    ) ?>
        </h2>

        <p>
            <strong>Email :</strong>
            <?= htmlspecialchars($student['email'] ?? '') ?>
        </p>

        <p>
            <strong>Téléphone :</strong>
            <?= htmlspecialchars($student['phone'] ?? '') ?>
        </p>

        <p>
            <strong>Date de naissance :</strong>
            <?= htmlspecialchars($student['birth_date'] ?? '') ?>
        </p>

        <p>
            <strong>Adresse :</strong>
            <?= htmlspecialchars($student['address'] ?? '') ?>
        </p>

        <p>
            <strong>Formation :</strong>
            <?= htmlspecialchars($student['formation'] ?? '') ?>
        </p>

        <p>
            <strong>Date d'inscription :</strong>
            <?= htmlspecialchars($student['registration_date']) ?>
        </p>

        <p>
            <strong>Statut :</strong>
            <?= htmlspecialchars($student['status']) ?>
        </p>

        <a href="/students/edit?id=<?= (int) $student['id'] ?>">
            Modifier
        </a>

        <a href="/students">
            Retour
        </a>

    </main>

</body>

</html>