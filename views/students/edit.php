<!DOCTYPE html>

<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Modifier un étudiant</title>

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
        <h2>Modifier l'étudiant</h2>

        <?php if (!empty($errors)): ?>

        <div>

            <?php foreach ($errors as $error): ?>

            <p><?= htmlspecialchars($error) ?></p>

            <?php endforeach; ?>

        </div>

        <?php endif; ?>

        <form method="POST" action="/students/edit?id=<?= (int) $student['id'] ?>">

            <div>
                <label>Prénom</label>

                <input type="text" name="first_name" value="<?= htmlspecialchars($student['first_name']) ?>" required>
            </div>

            <div>
                <label>Nom</label>

                <input type="text" name="last_name" value="<?= htmlspecialchars($student['last_name']) ?>" required>
            </div>

            <div>
                <label>Email</label>

                <input type="email" name="email" value="<?= htmlspecialchars($student['email'] ?? '') ?>">
            </div>

            <div>
                <label>Téléphone</label>

                <input type="text" name="phone" value="<?= htmlspecialchars($student['phone'] ?? '') ?>">
            </div>

            <div>
                <label>Date de naissance</label>

                <input type="date" name="birth_date" value="<?= htmlspecialchars($student['birth_date'] ?? '') ?>">
            </div>

            <div>
                <label>Adresse</label>

                <input type="text" name="address" value="<?= htmlspecialchars($student['address'] ?? '') ?>">
            </div>

            <div>
                <label>Formation / Classe</label>

                <input type="text" name="formation" value="<?= htmlspecialchars($student['formation'] ?? '') ?>">
            </div>

            <div>
                <label>Date d'inscription</label>

                <input type="date" name="registration_date"
                    value="<?= htmlspecialchars($student['registration_date']) ?>" required>
            </div>

            <div>
                <label>Statut</label>

                <select name="status">

                    <option value="active" <?= $student['status'] === 'active' ? 'selected' : '' ?>>
                        Actif
                    </option>

                    <option value="inactive" <?= $student['status'] === 'inactive' ? 'selected' : '' ?>>
                        Inactif
                    </option>

                </select>
            </div>

            <button type="submit">
                Enregistrer les modifications
            </button>

            <a href="/students">
                Annuler
            </a>

        </form>

    </main>

</body>

</html>