<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Modifier un paiement</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <link rel="stylesheet" href="/css/payment-edit.css">
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
                    <i class="fa-solid fa-pen-to-square"></i>
                    Paiement
                </span>

                <h1>Modifier le paiement</h1>

                <p>
                    Modifiez les informations de cette transaction.
                </p>
            </div>

            <a href="/payments" class="back-button">
                <i class="fa-solid fa-arrow-left"></i>
                Retour aux paiements
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

        <form class="form-card" method="POST" action="/payments/edit?id=<?= (int) $payment['id'] ?>">

            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fa-solid fa-receipt"></i>
                </div>

                <div>
                    <h2>Informations du paiement</h2>
                    <p>Les champs marqués d'un astérisque sont obligatoires.</p>
                </div>
            </div>

            <div class="form-grid">

                <div class="form-group">
                    <label for="reference">
                        Référence <span>*</span>
                    </label>

                    <div class="input-wrapper">
                        <i class="fa-solid fa-hashtag"></i>

                        <input type="text" id="reference" name="reference"
                            value="<?= htmlspecialchars($payment['reference']) ?>" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="student_id">
                        Étudiant <span>*</span>
                    </label>

                    <div class="input-wrapper">
                        <i class="fa-solid fa-user-graduate"></i>

                        <select id="student_id" name="student_id" required>

                            <?php foreach ($students as $student): ?>

                            <option value="<?= (int) $student['id'] ?>"
                                <?= (int) $payment['student_id'] === (int) $student['id'] ? 'selected' : '' ?>>
                                <?= htmlspecialchars(
                                    $student['first_name'] . ' ' . $student['last_name']
                                ) ?>
                            </option>

                            <?php endforeach; ?>

                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="amount">
                        Montant <span>*</span>
                    </label>

                    <div class="input-wrapper amount-wrapper">
                        <i class="fa-solid fa-money-bill"></i>

                        <input type="number" id="amount" name="amount" min="0" step="0.01"
                            value="<?= htmlspecialchars($payment['amount']) ?>" required>

                        <span class="amount-unit">XAF</span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="payment_date">
                        Date du paiement <span>*</span>
                    </label>

                    <div class="input-wrapper">
                        <i class="fa-solid fa-calendar"></i>

                        <input type="date" id="payment_date" name="payment_date"
                            value="<?= htmlspecialchars($payment['payment_date']) ?>" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="payment_method">
                        Mode de paiement <span>*</span>
                    </label>

                    <div class="input-wrapper">
                        <i class="fa-solid fa-wallet"></i>

                        <select id="payment_method" name="payment_method" required>

                            <option value="orange_money"
                                <?= $payment['payment_method'] === 'orange_money' ? 'selected' : '' ?>>
                                Orange Money
                            </option>

                            <option value="mtn_mobile_money"
                                <?= $payment['payment_method'] === 'mtn_mobile_money' ? 'selected' : '' ?>>
                                MTN Mobile Money
                            </option>

                            <option value="moov_money"
                                <?= $payment['payment_method'] === 'moov_money' ? 'selected' : '' ?>>
                                Moov Money
                            </option>

                            <option value="cash" <?= $payment['payment_method'] === 'cash' ? 'selected' : '' ?>>
                                Espèces
                            </option>

                            <option value="bank_transfer"
                                <?= $payment['payment_method'] === 'bank_transfer' ? 'selected' : '' ?>>
                                Virement bancaire
                            </option>

                            <option value="other" <?= $payment['payment_method'] === 'other' ? 'selected' : '' ?>>
                                Autre
                            </option>

                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="status">
                        Statut <span>*</span>
                    </label>

                    <div class="input-wrapper">
                        <i class="fa-solid fa-circle-check"></i>

                        <select id="status" name="status" required>

                            <option value="pending" <?= $payment['status'] === 'pending' ? 'selected' : '' ?>>
                                En attente
                            </option>

                            <option value="paid" <?= $payment['status'] === 'paid' ? 'selected' : '' ?>>
                                Payé
                            </option>

                            <option value="cancelled" <?= $payment['status'] === 'cancelled' ? 'selected' : '' ?>>
                                Annulé
                            </option>

                        </select>
                    </div>
                </div>

                <div class="form-group full-width">
                    <label for="comment">
                        Commentaire
                    </label>

                    <div class="input-wrapper textarea-wrapper">
                        <i class="fa-solid fa-comment"></i>

                        <textarea id="comment" name="comment"
                            rows="5"><?= htmlspecialchars($payment['comment'] ?? '') ?></textarea>
                    </div>
                </div>

            </div>

            <div class="form-footer">

                <a href="/payments" class="cancel-button">
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