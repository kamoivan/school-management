<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Modifier un enseignant</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <link rel="stylesheet" href="/css/teacher-edit.css">
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
                    Enseignant
                </span>

                <h1>Modifier l'enseignant</h1>

                <p>
                    Modifiez les informations de cet enseignant.
                </p>

            </div>

            <a href="/teachers" class="back-button">
                <i class="fa-solid fa-arrow-left"></i>
                Retour aux enseignants
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

        <form class="form-card" method="POST" action="/teachers/edit?id=<?= (int) $teacher['id'] ?>">

            <div class="form-card-header">

                <div class="form-card-icon">
                    <i class="fa-solid fa-user-pen"></i>
                </div>

                <div>
                    <h2>Informations de l'enseignant</h2>
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
                            value="<?= htmlspecialchars($teacher['first_name']) ?>" required>
                    </div>

                </div>

                <div class="form-group">

                    <label for="last_name">
                        Nom <span>*</span>
                    </label>

                    <div class="input-wrapper">
                        <i class="fa-solid fa-user"></i>

                        <input type="text" id="last_name" name="last_name"
                            value="<?= htmlspecialchars($teacher['last_name']) ?>" required>
                    </div>

                </div>

                <div class="form-group">

                    <label for="email">
                        Email
                    </label>

                    <div class="input-wrapper">
                        <i class="fa-solid fa-envelope"></i>

                        <input type="email" id="email" name="email"
                            value="<?= htmlspecialchars($teacher['email'] ?? '') ?>">
                    </div>

                </div>

                <div class="form-group">

                    <label for="phone">
                        Téléphone
                    </label>

                    <div class="input-wrapper">
                        <i class="fa-solid fa-phone"></i>

                        <input type="text" id="phone" name="phone"
                            value="<?= htmlspecialchars($teacher['phone'] ?? '') ?>">
                    </div>

                </div>

                <div class="form-group">

                    <label for="speciality">
                        Spécialité
                    </label>

                    <div class="input-wrapper">
                        <i class="fa-solid fa-book-open"></i>

                        <input type="text" id="speciality" name="speciality"
                            value="<?= htmlspecialchars($teacher['speciality'] ?? '') ?>">
                    </div>

                </div>

                <div class="form-group">

                    <label for="hire_date">
                        Date d'embauche
                    </label>

                    <div class="input-wrapper">
                        <i class="fa-solid fa-calendar"></i>

                        <input type="date" id="hire_date" name="hire_date"
                            value="<?= htmlspecialchars($teacher['hire_date'] ?? '') ?>">
                    </div>

                </div>

                <div class="form-group">

                    <label for="status">
                        Statut
                    </label>

                    <div class="input-wrapper">
                        <i class="fa-solid fa-circle-check"></i>

                        <select id="status" name="status">

                            <option value="active" <?= $teacher['status'] === 'active' ? 'selected' : '' ?>>
                                Actif
                            </option>

                            <option value="inactive" <?= $teacher['status'] === 'inactive' ? 'selected' : '' ?>>
                                Inactif
                            </option>

                        </select>

                    </div>

                </div>

            </div>

            <div class="form-footer">

                <a href="/teachers" class="cancel-button">
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