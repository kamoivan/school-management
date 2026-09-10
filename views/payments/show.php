<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Détails du paiement</title>
</head>

<body>

    <header>

        <h1>Détails du paiement</h1>

        <nav>
            <a href="/dashboard">Dashboard</a>
            <a href="/payments">Liste des paiements</a>
        </nav>

    </header>

    <main>

        <h2>
            <?= htmlspecialchars($payment['reference']) ?>
        </h2>

        <dl>

            <dt>ID</dt>
            <dd><?= (int) $payment['id'] ?></dd>

            <dt>Référence</dt>
            <dd><?= htmlspecialchars($payment['reference']) ?></dd>

            <dt>Étudiant</dt>
            <dd>
                <?= htmlspecialchars(
                $payment['first_name']
                . ' '
                . $payment['last_name']
            ) ?>
            </dd>

            <dt>Montant</dt>
            <dd><?= htmlspecialchars($payment['amount']) ?></dd>

            <dt>Date</dt>
            <dd><?= htmlspecialchars($payment['payment_date']) ?></dd>

            <dt>Mode de paiement</dt>
            <dd><?= htmlspecialchars($payment['payment_method']) ?></dd>

            <dt>Statut</dt>
            <dd><?= htmlspecialchars($payment['status']) ?></dd>

            <dt>Commentaire</dt>
            <dd><?= htmlspecialchars($payment['comment'] ?? '') ?></dd>

        </dl>

        <a href="/payments/edit?id=<?= (int) $payment['id'] ?>">
            Modifier
        </a>

    </main>

</body>

</html>