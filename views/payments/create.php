<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Ajouter un paiement</title>

    <link rel="stylesheet" href="/css/payment-create.css">

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
                    <h2>Ajouter un paiement</h2>
                    <p>Enregistrez un nouveau paiement effectué par un étudiant.</p>
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
                        <i class="fa-solid fa-money-bill-transfer"></i>
                    </div>

                    <div>
                        <h3>Informations du paiement</h3>
                        <p>Renseignez les informations relatives à la transaction.</p>
                    </div>

                </div>

                <form method="POST" action="/payments/create">

                    <div class="form-grid">

                        <div class="form-group">

                            <label for="reference">
                                Référence
                                <span>*</span>
                            </label>

                            <input type="text" id="reference" name="reference"
                                value="<?= htmlspecialchars($_POST['reference'] ?? '') ?>"
                                placeholder="Ex : PAY-2026-001" required>

                        </div>

                        <div class="form-group">

                            <label for="student_id">
                                Étudiant
                                <span>*</span>
                            </label>

                            <select id="student_id" name="student_id" required>

                                <option value="">
                                    Sélectionner un étudiant
                                </option>

                                <?php foreach ($students as $student): ?>

                                <option value="<?= (int) $student['id'] ?>"
                                    <?= (int) ($_POST['student_id'] ?? 0) === (int) $student['id'] ? 'selected' : '' ?>>
                                    <?= htmlspecialchars(
                                            $student['first_name']
                                            . ' '
                                            . $student['last_name']
                                        ) ?>
                                </option>

                                <?php endforeach; ?>

                            </select>

                        </div>

                        <div class="form-group">

                            <label for="amount">
                                Montant
                                <span>*</span>
                            </label>

                            <div class="input-with-unit">

                                <input type="number" id="amount" name="amount" min="0" step="0.01"
                                    value="<?= htmlspecialchars($_POST['amount'] ?? '') ?>" placeholder="Ex : 50000"
                                    required>

                                <span>XAF</span>

                            </div>

                        </div>

                        <div class="form-group">

                            <label for="payment_date">
                                Date du paiement
                                <span>*</span>
                            </label>

                            <input type="date" id="payment_date" name="payment_date"
                                value="<?= htmlspecialchars($_POST['payment_date'] ?? date('Y-m-d')) ?>" required>

                        </div>

                        <div class="form-group">

                            <label for="payment_method">
                                Mode de paiement
                                <span>*</span>
                            </label>

                            <select id="payment_method" name="payment_method" required>

                                <option value="">
                                    Sélectionner
                                </option>

                                <option value="orange_money"
                                    <?= ($_POST['payment_method'] ?? '') === 'orange_money' ? 'selected' : '' ?>>
                                    Orange Money
                                </option>

                                <option value="mtn_mobile_money"
                                    <?= ($_POST['payment_method'] ?? '') === 'mtn_mobile_money' ? 'selected' : '' ?>>
                                    MTN Mobile Money
                                </option>

                                <option value="moov_money"
                                    <?= ($_POST['payment_method'] ?? '') === 'moov_money' ? 'selected' : '' ?>>
                                    Moov Money
                                </option>

                                <option value="cash"
                                    <?= ($_POST['payment_method'] ?? '') === 'cash' ? 'selected' : '' ?>>
                                    Espèces
                                </option>

                                <option value="bank_transfer"
                                    <?= ($_POST['payment_method'] ?? '') === 'bank_transfer' ? 'selected' : '' ?>>
                                    Virement bancaire
                                </option>

                                <option value="other"
                                    <?= ($_POST['payment_method'] ?? '') === 'other' ? 'selected' : '' ?>>
                                    Autre
                                </option>

                            </select>

                        </div>

                        <div class="form-group">

                            <label for="status">
                                Statut
                                <span>*</span>
                            </label>

                            <select id="status" name="status" required>

                                <option value="pending"
                                    <?= ($_POST['status'] ?? 'pending') === 'pending' ? 'selected' : '' ?>>
                                    En attente
                                </option>

                                <option value="paid" <?= ($_POST['status'] ?? '') === 'paid' ? 'selected' : '' ?>>
                                    Payé
                                </option>

                                <option value="cancelled"
                                    <?= ($_POST['status'] ?? '') === 'cancelled' ? 'selected' : '' ?>>
                                    Annulé
                                </option>

                            </select>

                        </div>

                        <div class="form-group full-width">

                            <label for="comment">
                                Commentaire
                            </label>

                            <textarea id="comment" name="comment" rows="5"
                                placeholder="Informations complémentaires concernant le paiement"><?= htmlspecialchars($_POST['comment'] ?? '') ?></textarea>

                        </div>

                    </div>

                    <div class="form-footer">

                        <a href="/payments" class="cancel-button">
                            Annuler
                        </a>

                        <button type="submit" class="submit-button">
                            <i class="fa-solid fa-floppy-disk"></i>
                            Enregistrer le paiement
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </main>

</body>

</html>