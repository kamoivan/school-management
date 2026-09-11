<!DOCTYPE html>

<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Ajouter un étudiant</title>

    <link rel="stylesheet" href="/css/student-create.css">

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
                    <h2>Ajouter un étudiant</h2>
                    <p>Enregistrez un nouvel étudiant dans l'établissement.</p>
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

                <div class="error-list">

                    <?php foreach ($errors as $error): ?>

                    <p><?= htmlspecialchars($error) ?></p>

                    <?php endforeach; ?>

                </div>

            </div>

            <?php endif; ?>

            <div class="form-card">

                <div class="form-header">

                    <div class="form-icon">
                        <i class="fa-solid fa-user-plus"></i>
                    </div>

                    <div>
                        <h3>Informations de l'étudiant</h3>
                        <p>Renseignez les informations nécessaires à son inscription.</p>
                    </div>

                </div>

                <form method="POST" action="/students/create">

                    <div class="form-grid">

                        <div class="form-group">

                            <label for="first_name">
                                Prénom
                                <span>*</span>
                            </label>

                            <input type="text" id="first_name" name="first_name"
                                value="<?= htmlspecialchars($_POST['first_name'] ?? '') ?>" placeholder="Ex : Jean"
                                required>

                        </div>

                        <div class="form-group">

                            <label for="last_name">
                                Nom
                                <span>*</span>
                            </label>

                            <input type="text" id="last_name" name="last_name"
                                value="<?= htmlspecialchars($_POST['last_name'] ?? '') ?>" placeholder="Ex : Dupont"
                                required>

                        </div>

                        <div class="form-group">

                            <label for="email">
                                Email
                            </label>

                            <input type="email" id="email" name="email"
                                value="<?= htmlspecialchars($_POST['email'] ?? '') ?>"
                                placeholder="Ex : jean@example.com">

                        </div>

                        <div class="form-group">

                            <label for="phone">
                                Téléphone
                            </label>

                            <input type="text" id="phone" name="phone"
                                value="<?= htmlspecialchars($_POST['phone'] ?? '') ?>" placeholder="Ex : 690 00 00 00">

                        </div>

                        <div class="form-group">

                            <label for="birth_date">
                                Date de naissance
                            </label>

                            <input type="date" id="birth_date" name="birth_date"
                                value="<?= htmlspecialchars($_POST['birth_date'] ?? '') ?>">

                        </div>

                        <div class="form-group">

                            <label for="registration_date">
                                Date d'inscription
                                <span>*</span>
                            </label>

                            <input type="date" id="registration_date" name="registration_date"
                                value="<?= htmlspecialchars($_POST['registration_date'] ?? date('Y-m-d')) ?>" required>

                        </div>

                        <div class="form-group full-width">

                            <label for="address">
                                Adresse
                            </label>

                            <input type="text" id="address" name="address"
                                value="<?= htmlspecialchars($_POST['address'] ?? '') ?>"
                                placeholder="Adresse de résidence">

                        </div>

                        <div class="form-group">

                            <label for="formation">
                                Formation / Classe
                            </label>

                            <input type="text" id="formation" name="formation"
                                value="<?= htmlspecialchars($_POST['formation'] ?? '') ?>"
                                placeholder="Ex : Génie logiciel">

                        </div>

                        <div class="form-group">

                            <label for="status">
                                Statut
                            </label>

                            <select name="status" id="status">

                                <option value="active"
                                    <?= ($_POST['status'] ?? 'active') === 'active' ? 'selected' : '' ?>>
                                    Actif
                                </option>

                                <option value="inactive"
                                    <?= ($_POST['status'] ?? '') === 'inactive' ? 'selected' : '' ?>>
                                    Inactif
                                </option>

                            </select>

                        </div>

                    </div>

                    <div class="form-footer">

                        <a href="/students" class="cancel-button">
                            Annuler
                        </a>

                        <button type="submit" class="submit-button">
                            <i class="fa-solid fa-floppy-disk"></i>
                            Enregistrer l'étudiant
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </main>

</body>

</html>