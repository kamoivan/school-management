<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Modifier un étudiant</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <link rel="stylesheet" href="/css/student-edit.css">
</head>

<body>

    <header class="topbar">

        <div class="brand">
            <i class="fa-solid fa-school"></i>
            <span>Gestion Scolaire</span>
        </div>

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

            <a href="/logout" class="logout">
                <i class="fa-solid fa-right-from-bracket"></i>
                Déconnexion
            </a>

        </nav>

    </header>

    <main class="page-content">

        <div class="page-header">

            <div>

                <span class="page-label">
                    <i class="fa-solid fa-pen-to-square"></i>
                    Étudiant
                </span>

                <h1>Modifier l'étudiant</h1>

                <p>
                    Modifiez les informations de cet étudiant.
                </p>

            </div>

            <a href="/students" class="back-button">
                <i class="fa-solid fa-arrow-left"></i>
                Retour aux étudiants
            </a>

        </div>

        <?php if (!empty($errors)): ?>

        <div class="error-box">

            <div class="error-title">
                <i class="fa-solid fa-circle-exclamation"></i>
                Vérifiez les informations saisies
            </div>

            <ul>

                <?php foreach ($errors as $error): ?>

                <li>
                    <?= htmlspecialchars($error) ?>
                </li>

                <?php endforeach; ?>

            </ul>

        </div>

        <?php endif; ?>

        <form class="form-card" method="POST" action="/students/edit?id=<?= (int) $student['id'] ?>">

            <div class="form-card-header">

                <div class="form-card-icon">
                    <i class="fa-solid fa-user-pen"></i>
                </div>

                <div>
                    <h2>Informations de l'étudiant</h2>
                    <p>Les champs marqués d'un astérisque sont obligatoires.</p>
                </div>

            </div>

            <div class="form-grid">

                <div class="form-group">

                    <label for="first_name">
                        Prénom <span>*</span>
                    </label>

                    <div class="input-wrapper">
                        <i class="fa-solid fa-user"></i>

                        <input type="text" id="first_name" name="first_name"
                            value="<?= htmlspecialchars($student['first_name']) ?>" required>
                    </div>

                </div>

                <div class="form-group">

                    <label for="last_name">
                        Nom <span>*</span>
                    </label>

                    <div class="input-wrapper">
                        <i class="fa-solid fa-user"></i>

                        <input type="text" id="last_name" name="last_name"
                            value="<?= htmlspecialchars($student['last_name']) ?>" required>
                    </div>

                </div>

                <div class="form-group">

                    <label for="email">
                        Email
                    </label>

                    <div class="input-wrapper">
                        <i class="fa-solid fa-envelope"></i>

                        <input type="email" id="email" name="email"
                            value="<?= htmlspecialchars($student['email'] ?? '') ?>">
                    </div>

                </div>

                <div class="form-group">

                    <label for="phone">
                        Téléphone
                    </label>

                    <div class="input-wrapper">
                        <i class="fa-solid fa-phone"></i>

                        <input type="text" id="phone" name="phone"
                            value="<?= htmlspecialchars($student['phone'] ?? '') ?>">
                    </div>

                </div>

                <div class="form-group">

                    <label for="birth_date">
                        Date de naissance
                    </label>

                    <div class="input-wrapper">
                        <i class="fa-solid fa-calendar"></i>

                        <input type="date" id="birth_date" name="birth_date"
                            value="<?= htmlspecialchars($student['birth_date'] ?? '') ?>">
                    </div>

                </div>

                <div class="form-group">

                    <label for="address">
                        Adresse
                    </label>

                    <div class="input-wrapper">
                        <i class="fa-solid fa-location-dot"></i>

                        <input type="text" id="address" name="address"
                            value="<?= htmlspecialchars($student['address'] ?? '') ?>">
                    </div>

                </div>

                <div class="form-group">

                    <label for="formation">
                        Formation / Classe
                    </label>

                    <div class="input-wrapper">
                        <i class="fa-solid fa-book-open"></i>

                        <input type="text" id="formation" name="formation"
                            value="<?= htmlspecialchars($student['formation'] ?? '') ?>">
                    </div>

                </div>

                <div class="form-group">

                    <label for="registration_date">
                        Date d'inscription <span>*</span>
                    </label>

                    <div class="input-wrapper">
                        <i class="fa-solid fa-calendar-check"></i>

                        <input type="date" id="registration_date" name="registration_date"
                            value="<?= htmlspecialchars($student['registration_date']) ?>" required>
                    </div>

                </div>

                <div class="form-group">

                    <label for="status">
                        Statut
                    </label>

                    <div class="input-wrapper">
                        <i class="fa-solid fa-circle-check"></i>

                        <select id="status" name="status">

                            <option value="active" <?= $student['status'] === 'active' ? 'selected' : '' ?>>
                                Actif
                            </option>

                            <option value="inactive" <?= $student['status'] === 'inactive' ? 'selected' : '' ?>>
                                Inactif
                            </option>

                        </select>

                    </div>

                </div>

            </div>

            <div class="form-footer">

                <a href="/students" class="cancel-button">
                    Annuler
                </a>

                <button type="submit" class="submit-button">
                    <i class="fa-solid fa-check"></i>
                    Enregistrer les modifications
                </button>

            </div>

        </form>

    </main>

</body>

</html>