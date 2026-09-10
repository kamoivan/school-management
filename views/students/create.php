<!DOCTYPE html>

<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Ajouter un étudiant</title>


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

        <h2>Ajouter un étudiant</h2>

        <?php if (!empty($errors)): ?>

        <div>

            <?php foreach ($errors as $error): ?>

            <p><?= htmlspecialchars($error) ?></p>

            <?php endforeach; ?>

        </div>

        <?php endif; ?>

        <form method="POST" action="/students/create">

            <div>
                <label>Prénom</label>

                <input type="text" name="first_name" value="<?= htmlspecialchars($_POST['first_name'] ?? '') ?>"
                    required>
            </div>

            <div>
                <label>Nom</label>

                <input type="text" name="last_name" value="<?= htmlspecialchars($_POST['last_name'] ?? '') ?>" required>
            </div>

            <div>
                <label>Email</label>

                <input type="email" name="email" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
            </div>

            <div>
                <label>Téléphone</label>

                <input type="text" name="phone" value="<?= htmlspecialchars($_POST['phone'] ?? '') ?>">
            </div>

            <div>
                <label>Date de naissance</label>

                <input type="date" name="birth_date" value="<?= htmlspecialchars($_POST['birth_date'] ?? '') ?>">
            </div>

            <div>
                <label>Adresse</label>

                <input type="text" name="address" value="<?= htmlspecialchars($_POST['address'] ?? '') ?>">
            </div>

            <div>
                <label>Formation / Classe</label>

                <input type="text" name="formation" value="<?= htmlspecialchars($_POST['formation'] ?? '') ?>">
            </div>

            <div>
                <label>Date d'inscription</label>

                <input type="date" name="registration_date"
                    value="<?= htmlspecialchars($_POST['registration_date'] ?? date('Y-m-d')) ?>" required>
            </div>

            <div>
                <label>Statut</label>

                <select name="status">

                    <option value="active" <?= ($_POST['status'] ?? 'active') === 'active' ? 'selected' : '' ?>>
                        Actif
                    </option>

                    <option value="inactive" <?= ($_POST['status'] ?? '') === 'inactive' ? 'selected' : '' ?>>
                        Inactif
                    </option>

                </select>
            </div>

            <button type="submit">
                Enregistrer
            </button>

            <a href="/students">
                Annuler
            </a>

        </form>

    </main>

</body>

</html>