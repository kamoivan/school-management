<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Modifier un paiement</title>
</head>

<body>

    <header>

        <h1>Modifier le paiement</h1>

        <nav>
            <a href="/dashboard">Dashboard</a>
            <a href="/payments">Retour aux paiements</a>
        </nav>

    </header>

    <main>

        <?php if (!empty($errors)): ?>

        <ul>

            <?php foreach ($errors as $error): ?>

            <li>
                <?= htmlspecialchars($error) ?>
            </li>

            <?php endforeach; ?>

        </ul>

        <?php endif; ?>

        <form method="POST" action="/payments/edit?id=<?= (int) $payment['id'] ?>">

            <div>

                <label for="reference">
                    Référence
                </label>

                <input type="text" id="reference" name="reference"
                    value="<?= htmlspecialchars($payment['reference']) ?>" required>

            </div>

            <div>

                <label for="student_id">
                    Étudiant
                </label>

                <select id="student_id" name="student_id" required>

                    <?php foreach ($students as $student): ?>

                    <option value="<?= (int) $student['id'] ?>" <?= (int) $payment['student_id'] === (int) $student['id']
                            ? 'selected'
                            : '' ?>>
                        <?= htmlspecialchars(
                            $student['first_name']
                            . ' '
                            . $student['last_name']
                        ) ?>
                    </option>

                    <?php endforeach; ?>

                </select>

            </div>

            <div>

                <label for="amount">
                    Montant
                </label>

                <input type="number" id="amount" name="amount" min="0" step="0.01"
                    value="<?= htmlspecialchars($payment['amount']) ?>" required>

            </div>

            <div>

                <label for="payment_date">
                    Date du paiement
                </label>

                <input type="date" id="payment_date" name="payment_date"
                    value="<?= htmlspecialchars($payment['payment_date']) ?>" required>

            </div>

            <div>

                <label for="payment_method">
                    Mode de paiement
                </label>

                <select id="payment_method" name="payment_method" required>

                    <option value="orange_money" <?= $payment['payment_method'] === 'orange_money' ? 'selected' : '' ?>>
                        Orange Money
                    </option>

                    <option value="mtn_mobile_money"
                        <?= $payment['payment_method'] === 'mtn_mobile_money' ? 'selected' : '' ?>>
                        MTN Mobile Money
                    </option>

                    <option value="moov_money" <?= $payment['payment_method'] === 'moov_money' ? 'selected' : '' ?>>
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

            <div>

                <label for="status">
                    Statut
                </label>

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

            <div>

                <label for="comment">
                    Commentaire
                </label>

                <textarea id="comment" name="comment"
                    rows="5"><?= htmlspecialchars($payment['comment'] ?? '') ?></textarea>

            </div>

            <button type="submit">
                Enregistrer les modifications
            </button>

        </form>

    </main>

</body>

</html>