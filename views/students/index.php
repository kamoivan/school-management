<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Étudiants - Gestion Scolaire</title>
</head>

<body>

    <header>

        <h1>Gestion Scolaire</h1>

        <nav>
            <a href="/dashboard">Dashboard</a>
            <a href="/students">Étudiants</a>
            <a href="/logout">Déconnexion</a>
        </nav>

    </header>

    <main>

        <h2>Gestion des étudiants</h2>

        <a href="/students/create">
            Ajouter un étudiant
        </a>

        <form method="GET" action="/students">

            <input type="text" name="search" placeholder="Nom, prénom ou email"
                value="<?= htmlspecialchars($_GET['search'] ?? '') ?>">

            <button type="submit">
                Rechercher
            </button>
            <?php if ($search !== ''): ?>
            <a href="/students">Réinitialiser</a>
            <?php endif; ?>

        </form>

        <?php if (empty($students)): ?>

        <p>Aucun étudiant trouvé.</p>

        <?php else: ?>

        <table border="1">

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
                        <?= htmlspecialchars(
                                $student['first_name'] . ' ' . $student['last_name']
                            ) ?>
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
                        <?= htmlspecialchars($student['status']) ?>
                    </td>

                    <td>

                        <a href="/students/show?id=<?= (int) $student['id'] ?>">
                            Voir
                        </a>

                        <a href="/students/edit?id=<?= (int) $student['id'] ?>">
                            Modifier
                        </a>

                        <a href="/students/delete?id=<?= (int) $student['id'] ?>"
                            onclick="return confirm('Voulez-vous vraiment supprimer cet étudiant ?');">
                            Supprimer
                        </a>

                    </td>

                </tr>

                <?php endforeach; ?>

            </tbody>

        </table>

        <?php endif; ?>

    </main>

</body>

</html>