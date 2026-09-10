<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Modifier un enseignant</title>
</head>

<body>

    <header>
        <h1>Modifier un enseignant</h1>

        <nav>
            <a href="/dashboard">Dashboard</a>
            <a href="/teachers">Retour aux enseignants</a>
        </nav>
    </header>

    <main>

        <?php if (!empty($errors)): ?>

        <div>
            <ul>
                <?php foreach ($errors as $error): ?>
                <li><?= htmlspecialchars($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>

        <?php endif; ?>

        <form method="POST" action="/teachers/edit?id=<?= (int) $teacher['id'] ?>">

            <div>
                <label for="first_name">Prénom</label>

                <input type="text" id="first_name" name="first_name"
                    value="<?= htmlspecialchars($teacher['first_name']) ?>" required>
            </div>

            <div>
                <label for="last_name">Nom</label>

                <input type="text" id="last_name" name="last_name"
                    value="<?= htmlspecialchars($teacher['last_name']) ?>" required>
            </div>

            <div>
                <label for="email">Email</label>

                <input type="email" id="email" name="email" value="<?= htmlspecialchars($teacher['email'] ?? '') ?>">
            </div>

            <div>
                <label for="phone">Téléphone</label>

                <input type="text" id="phone" name="phone" value="<?= htmlspecialchars($teacher['phone'] ?? '') ?>">
            </div>

            <div>
                <label for="speciality">Spécialité</label>

                <input type="text" id="speciality" name="speciality"
                    value="<?= htmlspecialchars($teacher['speciality'] ?? '') ?>">
            </div>

            <div>
                <label for="hire_date">Date d'embauche</label>

                <input type="date" id="hire_date" name="hire_date"
                    value="<?= htmlspecialchars($teacher['hire_date'] ?? '') ?>">
            </div>

            <div>
                <label for="status">Statut</label>

                <select id="status" name="status">

                    <option value="active" <?= $teacher['status'] === 'active' ? 'selected' : '' ?>>
                        Actif
                    </option>

                    <option value="inactive" <?= $teacher['status'] === 'inactive' ? 'selected' : '' ?>>
                        Inactif
                    </option>

                </select>
            </div>

            <button type="submit">
                Enregistrer les modifications
            </button>

        </form>

    </main>

</body>

</html>