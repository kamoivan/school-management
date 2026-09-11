<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Étudiants - Gestion Scolaire</title>

    <link rel="stylesheet" href="/css/students.css">

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

                <a href="/students" class="active">
                    <i class="fa-solid fa-users"></i>
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

    <main class="container page-content">

        <div class="page-header">

            <div>
                <h2>Gestion des étudiants</h2>

                <p>
                    Consultez et gérez les étudiants enregistrés.
                </p>
            </div>

            <a href="/students/create" class="btn btn-primary">
                <i class="fa-solid fa-plus"></i>
                Ajouter un étudiant
            </a>

        </div>

        <section class="content-card">

            <form method="GET" action="/students" class="search-form">

                <div class="search-input">

                    <i class="fa-solid fa-magnifying-glass"></i>

                    <input type="text" name="search" placeholder="Nom, prénom ou email"
                        value="<?= htmlspecialchars($_GET['search'] ?? '') ?>">

                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    Rechercher
                </button>

                <?php if ($search !== ''): ?>

                <a href="/students" class="btn btn-secondary">
                    <i class="fa-solid fa-xmark"></i>
                    Réinitialiser
                </a>

                <?php endif; ?>

            </form>

        </section>

        <section class="content-card">

            <div class="section-header">

                <h3>
                    Liste des étudiants
                </h3>

                <span class="result-count">
                    <?= count($students) ?> étudiant(s)
                </span>

            </div>

            <?php if (empty($students)): ?>

            <div class="empty-state">

                <i class="fa-solid fa-user-slash"></i>

                <p>
                    Aucun étudiant trouvé.
                </p>

                <?php if ($search !== ''): ?>

                <a href="/students">
                    Afficher tous les étudiants
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
                            <th>Formation</th>
                            <th>Statut</th>
                            <th>Actions</th>
                        </tr>

                    </thead>

                    <tbody>

                        <?php foreach ($students as $student): ?>

                        <tr>

                            <td>
                                <?= (int) $student['id'] ?>
                            </td>

                            <td>

                                <div class="student-name">

                                    <span class="student-avatar">
                                        <?= strtoupper(
                                                    substr($student['first_name'], 0, 1)
                                                ) ?>
                                    </span>

                                    <strong>
                                        <?= htmlspecialchars(
                                                    $student['first_name'] . ' ' . $student['last_name']
                                                ) ?>
                                    </strong>

                                </div>

                            </td>

                            <td>
                                <?= htmlspecialchars($student['email'] ?? '') ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($student['phone'] ?? '') ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($student['formation'] ?? '') ?>
                            </td>

                            <td>

                                <span
                                    class="status-badge <?= $student['status'] === 'active' ? 'status-active' : 'status-inactive' ?>">

                                    <i class="fa-solid fa-circle"></i>

                                    <?= htmlspecialchars($student['status']) ?>

                                </span>

                            </td>

                            <td>

                                <div class="actions">

                                    <a href="/students/show?id=<?= (int) $student['id'] ?>"
                                        class="action-btn action-view" title="Voir">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>

                                    <a href="/students/edit?id=<?= (int) $student['id'] ?>"
                                        class="action-btn action-edit" title="Modifier">
                                        <i class="fa-solid fa-pen"></i>
                                    </a>

                                    <a href="/students/delete?id=<?= (int) $student['id'] ?>"
                                        class="action-btn action-delete" title="Supprimer"
                                        onclick="return confirm('Voulez-vous vraiment supprimer cet étudiant ?');">
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