<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Gestion des paiements</title>
</head>

<body>

    <header>

        <h1>Gestion des paiements</h1>

        <nav>
            <a href="/dashboard">Dashboard</a>
            <a href="/students">Étudiants</a>
            <a href="/teachers">Enseignants</a>
            <a href="/payments">Paiements</a>
            <a href="/logout">Se déconnecter</a>
        </nav>

    </header>

    <main>

        <h2>Liste des paiements</h2>

        <a href="/payments/create">
            Ajouter un paiement
        </a>

        <form method="GET" action="/payments">

            <div>

                <label for="search">
                    Recherche
                </label>

                <input type="text" id="search" name="search" value="<?= htmlspecialchars($search) ?>"
                    placeholder="Référence ou étudiant">

            </div>

            <div>

                <label for="status">
                    Statut
                </label>

                <select id="status" name="status">

                    <option value="">
                        Tous
                    </option>

                    <option value="pending" <?= $status === 'pending' ? 'selected' : '' ?>>
                        En attente
                    </option>

                    <option value="paid" <?= $status === 'paid' ? 'selected' : '' ?>>
                        Payé
                    </option>

                    <option value="cancelled" <?= $status === 'cancelled' ? 'selected' : '' ?>>
                        Annulé
                    </option>

                </select>

            </div>

            <button type="submit">
                Filtrer
            </button>

            <?php if ($search !== '' || $status !== ''): ?>

            <a href="/payments">
                Réinitialiser
            </a>

            <?php endif; ?>

        </form>

        <?php if (empty($payments)): ?>

        <p>Aucun paiement trouvé.</p>

        <?php else: ?>

        <table border="1">

            <thead>

                <tr>
                    <th>ID</th>
                    <th>Référence</th>
                    <th>Étudiant</th>
                    <th>Montant</th>
                    <th>Date</th>
                    <th>Mode</th>
                    <th>Statut</th>
                    <th>Actions</th>
                </tr>

            </thead>

            <tbody>

                <?php foreach ($payments as $payment): ?>

                <tr>

                    <td>
                        <?= (int) $payment['id'] ?>
                    </td>

                    <td>
                        <?= htmlspecialchars($payment['reference']) ?>
                    </td>

                    <td>
                        <?= htmlspecialchars(
                            $payment['first_name']
                            . ' '
                            . $payment['last_name']
                        ) ?>
                    </td>

                    <td>
                        <?= htmlspecialchars($payment['amount']) ?>
                    </td>

                    <td>
                        <?= htmlspecialchars($payment['payment_date']) ?>
                    </td>

                    <td>
                        <?= htmlspecialchars($payment['payment_method']) ?>
                    </td>

                    <td>
                        <?= htmlspecialchars($payment['status']) ?>
                    </td>

                    <td>

                        <a href="/payments/show?id=<?= (int) $payment['id'] ?>">
                            Voir
                        </a>

                        <a href="/payments/edit?id=<?= (int) $payment['id'] ?>">
                            Modifier
                        </a>

                        <a href="/payments/delete?id=<?= (int) $payment['id'] ?>"
                            onclick="return confirm('Voulez-vous vraiment supprimer ce paiement ?');">
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