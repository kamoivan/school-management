<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Gestion des enseignants</title>

    <link rel="stylesheet" href="/css/teachers.css">

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
                    <i class="fa-solid fa-gauge"></i>
                    Dashboard
                </a>

                <a href="/students">
                    <i class="fa-solid fa-users"></i>
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

                <a href="/logout">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    Déconnexion
                </a>

            </nav>

        </div>

    </header>

    <main class="container page-content">

        <div class="page-header">

            <div>
                <h2>Gestion des enseignants</h2>

                <p>
                    Consultez et gérez les enseignants enregistrés.
                </p>
            </div>

            <a href="/teachers/create" class="btn btn-primary">
                <i class="fa-solid fa-plus"></i>
                Ajouter un enseignant
            </a>

        </div>

        <section class="content-card">

            <form method="GET" action="/teachers" class="search-form">

                <div class="search-input">

                    <i class="fa-solid fa-magnifying-glass"></i>

                    <input type="text" id="search" name="search" value="<?= htmlspecialchars($search) ?>"
                        placeholder="Nom, prénom ou spécialité">

                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    Rechercher
                </button>

                <?php if ($search !== ''): ?>

                <a href="/teachers" class="btn btn-secondary">
                    <i class="fa-solid fa-xmark"></i>
                    Réinitialiser
                </a>

                <?php endif; ?>

            </form>

        </section>

        <section class="content-card">

            <div class="section-header">

                <h3>
                    Liste des enseignants
                </h3>

                <span class="result-count">
                    <?= count($teachers) ?> enseignant(s)
                </span>

            </div>

            <?php if (empty($teachers)): ?>

            <div class="empty-state">

                <i class="fa-solid fa-user-slash"></i>

                <p>
                    Aucun enseignant trouvé.
                </p>

                <?php if ($search !== ''): ?>

                <a href="/teachers">
                    Afficher tous les enseignants
                </a>

                <?php endif; ?>

            </div>

            <?php else: ?>

            <div class="table-wrapper">

                <table>

                    <thead>

                        <tr>
                            <th>ID</th>
                            <th>Nom</th>
                            <th>Email</th>
                            <th>Téléphone</th>
                            <th>Spécialité</th>
                            <th>Date d'embauche</th>
                            <th>Statut</th>
                            <th>Actions</th>
                        </tr>

                    </thead>

                    <tbody>

                        <?php foreach ($teachers as $teacher): ?>

                        <tr>

                            <td>
                                <?= (int) $teacher['id'] ?>
                            </td>

                            <td>

                                <div class="teacher-name">

                                    <span class="teacher-avatar">
                                        <?= strtoupper(
                                                    substr($teacher['first_name'], 0, 1)
                                                ) ?>
                                    </span>

                                    <strong>
                                        <?= htmlspecialchars(
                                                    $teacher['first_name'] . ' ' . $teacher['last_name']
                                                ) ?>
                                    </strong>

                                </div>

                            </td>

                            <td>
                                <?= htmlspecialchars($teacher['email'] ?? '') ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($teacher['phone'] ?? '') ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($teacher['speciality'] ?? '') ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($teacher['hire_date'] ?? '') ?>
                            </td>

                            <td>

                                <span
                                    class="status-badge <?= $teacher['status'] === 'active' ? 'status-active' : 'status-inactive' ?>">

                                    <i class="fa-solid fa-circle"></i>

                                    <?= htmlspecialchars($teacher['status']) ?>

                                </span>

                            </td>

                            <td>

                                <div class="actions">

                                    <a href="/teachers/show?id=<?= (int) $teacher['id'] ?>"
                                        class="action-btn action-view" title="Voir">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>

                                    <a href="/teachers/edit?id=<?= (int) $teacher['id'] ?>"
                                        class="action-btn action-edit" title="Modifier">
                                        <i class="fa-solid fa-pen"></i>
                                    </a>

                                    <a href="/teachers/delete?id=<?= (int) $teacher['id'] ?>"
                                        class="action-btn action-delete" title="Supprimer"
                                        onclick="return confirm('Voulez-vous vraiment supprimer cet enseignant ?');">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>

                                </div>

                            </td>

                        </tr>

                        <?php endforeach; ?>

                    </tbody>

                </table>

            </div>

            <?php endif; ?>

        </section>

    </main>

</body>

</html>