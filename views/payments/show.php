<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Détails du paiement</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <link rel="stylesheet" href="/css/payment-show.css">
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

            <a href="/teachers">
                <i class="fa-solid fa-chalkboard-user"></i>
                Enseignants
            </a>

            <a href="/payments" class="active">
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
                    <i class="fa-solid fa-file-invoice-dollar"></i>
                    Paiement
                </span>

                <h1>Détails du paiement</h1>

                <p>
                    Consultez les informations détaillées de cette transaction.
                </p>
            </div>

            <a href="/payments" class="back-button">
                <i class="fa-solid fa-arrow-left"></i>
                Retour aux paiements
            </a>

        </div>

        <section class="payment-card">

            <div class="payment-header">

                <div class="payment-icon">
                    <i class="fa-solid fa-receipt"></i>
                </div>

                <div>
                    <span class="reference-label">Référence</span>
                    <h2><?= htmlspecialchars($payment['reference']) ?></h2>
                </div>

                <span class="status-badge status-<?= htmlspecialchars($payment['status']) ?>">
                    <?= htmlspecialchars($payment['status']) ?>
                </span>

            </div>

            <div class="payment-details">

                <div class="detail-item">
                    <span class="detail-label">
                        <i class="fa-solid fa-hashtag"></i>
                        ID
                    </span>
                    <strong><?= (int) $payment['id'] ?></strong>
                </div>

                <div class="detail-item">
                    <span class="detail-label">
                        <i class="fa-solid fa-user-graduate"></i>
                        Étudiant
                    </span>
                    <strong>
                        <?= htmlspecialchars(
                            $payment['first_name'] . ' ' . $payment['last_name']
                        ) ?>
                    </strong>
                </div>

                <div class="detail-item amount-item">
                    <span class="detail-label">
                        <i class="fa-solid fa-money-bill"></i>
                        Montant
                    </span>
                    <strong>
                        <?= number_format((float) $payment['amount'], 0, ',', ' ') ?>
                        XAF
                    </strong>
                </div>

                <div class="detail-item">
                    <span class="detail-label">
                        <i class="fa-solid fa-calendar"></i>
                        Date
                    </span>
                    <strong><?= htmlspecialchars($payment['payment_date']) ?></strong>
                </div>

                <div class="detail-item">
                    <span class="detail-label">
                        <i class="fa-solid fa-wallet"></i>
                        Mode de paiement
                    </span>
                    <strong><?= htmlspecialchars($payment['payment_method']) ?></strong>
                </div>

                <div class="detail-item detail-comment">

                    <span class="detail-label">
                        <i class="fa-solid fa-comment"></i>
                        Commentaire
                    </span>

                    <p>
                        <?= htmlspecialchars($payment['comment'] ?? '') ?: 'Aucun commentaire.' ?>
                    </p>

                </div>

            </div>

            <div class="card-actions">

                <a href="/payments/edit?id=<?= (int) $payment['id'] ?>" class="edit-button">
                    <i class="fa-solid fa-pen"></i>
                    Modifier
                </a>

                <a href="/payments" class="secondary-button">
                    <i class="fa-solid fa-arrow-left"></i>
                    Retour
                </a>

            </div>

        </section>

    </main>

</body>

</html>