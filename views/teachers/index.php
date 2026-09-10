<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Gestion des enseignants</title>
</head>

<body>

    <header>
        <h1>Gestion des enseignants</h1>

        <nav>
            <a href="/dashboard">Dashboard</a>
            <a href="/students">Étudiants</a>
            <a href="/teachers">Enseignants</a>
            <a href="/payments">Paiements</a>
            <a href="/logout">Se déconnecter</a>
        </nav>
    </header>

    <main>

        <div>
            <h2>Liste des enseignants</h2>

            <a href="/teachers/create">
                Ajouter un enseignant
            </a>
        </div>

        <form method="GET" action="/teachers">

            <label for="search">
                Rechercher
            </label>

            <input type="text" id="search" name="search" value="<?= htmlspecialchars($search) ?>"
                placeholder="Nom, prénom ou spécialité">

            <button type="submit">
                Rechercher
            </button>

            <?php if ($search !== ''): ?>
            <a href="/teachers">Réinitialiser</a>
            <?php endif; ?>

        </form>

        <?php if (empty($teachers)): ?>

        <p>Aucun enseignant trouvé.</p>

        <?php else: ?>

        <table border="1">

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
                        <?= htmlspecialchars(
                            $teacher['first_name'] . ' ' . $teacher['last_name']
                        ) ?>
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
                        <?= htmlspecialchars($teacher['status']) ?>
                    </td>

                    <td>
                        <a href="/teachers/show?id=<?= (int) $teacher['id'] ?>">
                            Voir
                        </a>

                        <a href="/teachers/edit?id=<?= (int) $teacher['id'] ?>">
                            Modifier
                        </a>

                        <a href="/teachers/delete?id=<?= (int) $teacher['id'] ?>"
                            onclick="return confirm('Voulez-vous vraiment supprimer cet enseignant ?');">
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