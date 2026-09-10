<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Ajouter un paiement</title>
</head>

<body>

    <header>

        <h1>Ajouter un paiement</h1>

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

        <form method="POST" action="/payments/create">

            <div>

                <label for="reference">
                    Référence
                </label>

                <input type="text" id="reference" name="reference"
                    value="<?= htmlspecialchars($_POST['reference'] ?? '') ?>" required>

            </div>

            <div>

                <label for="student_id">
                    Étudiant
                </label>

                <select id="student_id" name="student_id" required>

                    <option value="">
                        Sélectionner un étudiant
                    </option>

                    <?php foreach ($students as $student): ?>

                    <option value="<?= (int) $student['id'] ?>" <?= (int) ($_POST['student_id'] ?? 0) === (int) $student['id']
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
                    value="<?= htmlspecialchars($_POST['amount'] ?? '') ?>" required>

            </div>

            <div>

                <label for="payment_date">
                    Date du paiement
                </label>

                <input type="date" id="payment_date" name="payment_date"
                    value="<?= htmlspecialchars($_POST['payment_date'] ?? date('Y-m-d')) ?>" required>

            </div>

            <div>

                <label for="payment_method">
                    Mode de paiement
                </label>

                <select id="payment_method" name="payment_method" required>

                    <option value="">
                        Sélectionner
                    </option>

                    <option value="orange_money">
                        Orange Money
                    </option>

                    <option value="mtn_mobile_money">
                        MTN Mobile Money
                    </option>

                    <option value="moov_money">
                        Moov Money
                    </option>

                    <option value="cash">
                        Espèces
                    </option>

                    <option value="bank_transfer">
                        Virement bancaire
                    </option>

                    <option value="other">
                        Autre
                    </option>

                </select>

            </div>

            <div>

                <label for="status">
                    Statut
                </label>

                <select id="status" name="status" required>

                    <option value="pending">
                        En attente
                    </option>

                    <option value="paid">
                        Payé
                    </option>

                    <option value="cancelled">
                        Annulé
                    </option>

                </select>

            </div>

            <div>

                <label for="comment">
                    Commentaire
                </label>

                <textarea id="comment" name="comment"
                    rows="5"><?= htmlspecialchars($_POST['comment'] ?? '') ?></textarea>

            </div>

            <button type="submit">
                Enregistrer le paiement
            </button>

        </form>

    </main>

</body>

</html>