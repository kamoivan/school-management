<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Gestion des paiements</title>

    <link rel="stylesheet" href="/css/payments.css">

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

                <a href="/teachers">
                    <i class="fa-solid fa-chalkboard-user"></i>
                    Enseignants
                </a>

                <a href="/payments" class="active">
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

                <h2>Gestion des paiements</h2>

                <p>
                    Consultez et gérez les paiements des étudiants.
                </p>

            </div>

            <a href="/payments/create" class="btn btn-primary">
                <i class="fa-solid fa-plus"></i>
                Ajouter un paiement
            </a>

        </div>

        <section class="content-card">

            <form method="GET" action="/payments" class="filter-form">

                <div class="search-input">

                    <i class="fa-solid fa-magnifying-glass"></i>

                    <input type="text" name="search" placeholder="Référence ou étudiant"
                        value="<?= htmlspecialchars($search) ?>">

                </div>

                <select name="status">

                    <option value="">Tous les statuts</option>

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

                <input type="date" name="date_start" value="<?= htmlspecialchars($dateStart) ?>">

                <input type="date" name="date_end" value="<?= htmlspecialchars($dateEnd) ?>">

                <button type="submit" class="btn btn-primary">
                    <i class="fa-solid fa-filter"></i>
                    Filtrer
                </button>

            </form>

        </section>

        <section class="content-card">

            <div class="section-header">

                <h3>
                    Liste des paiements
                </h3>

                <span class="result-count">
                    <?= count($payments) ?> paiement(s)
                </span>

            </div>

            <?php if (empty($payments)): ?>

            <div class="empty-state">

                <i class="fa-solid fa-money-bill"></i>

                <p>
                    Aucun paiement trouvé.
                </p>

            </div>

            <?php else: ?>

            <div class="table-wrapper">

                <table>

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

                                <div class="student-name">

                                    <span class="student-avatar">
                                        <?= strtoupper(substr($payment['first_name'], 0, 1)) ?>
                                    </span>

                                    <strong>
                                        <?= htmlspecialchars(
                                                    $payment['first_name']
                                                    . ' '
                                                    . $payment['last_name']
                                                ) ?>
                                    </strong>

                                </div>

                            </td>

                            <td>
                                <?= number_format($payment['amount'], 0, ',', ' ') ?> XAF
                            </td>

                            <td>
                                <?= htmlspecialchars($payment['payment_date']) ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($payment['payment_method']) ?>
                            </td>

                            <td>

                                <span class="status-badge status-<?= htmlspecialchars($payment['status']) ?>">

                                    <?= htmlspecialchars($payment['status']) ?>

                                </span>

                            </td>

                            <td>

                                <div class="actions">

                                    <a href="/payments/show?id=<?= (int) $payment['id'] ?>"
                                        class="action-btn action-view">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>

                                    <a href="/payments/edit?id=<?= (int) $payment['id'] ?>"
                                        class="action-btn action-edit">
                                        <i class="fa-solid fa-pen"></i>
                                    </a>

                                    <a href="/payments/delete?id=<?= (int) $payment['id'] ?>"
                                        class="action-btn action-delete"
                                        onclick="return confirm('Voulez-vous vraiment supprimer ce paiement ?');">
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