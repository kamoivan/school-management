<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Connexion - Gestion scolaire</title>

    <link rel="stylesheet" href="/css/login.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>

<body>

    <main class="login-page">

        <section class="login-card">

            <div class="login-icon">
                <i class="fa-solid fa-school"></i>
            </div>

            <h1>Connexion</h1>

            <p class="login-description">
                Connectez-vous à votre espace d'administration.
            </p>

            <?php if (isset($error)): ?>

            <div class="login-error">
                <i class="fa-solid fa-circle-exclamation"></i>

                <span>
                    <?= htmlspecialchars($error) ?>
                </span>
            </div>

            <?php endif; ?>

            <form method="POST" action="/login" class="login-form">

                <div class="form-group">

                    <label for="email">
                        Email
                    </label>

                    <div class="input-wrapper">

                        <i class="fa-solid fa-envelope"></i>

                        <input type="email" id="email" name="email" required autocomplete="off">

                    </div>

                </div>

                <div class="form-group">

                    <div class="password-label">

                        <label for="password">
                            Mot de passe
                        </label>

                        <a href="#" class="forgot-password">
                            Mot de passe oublié ?
                        </a>

                    </div>

                    <div class="input-wrapper">

                        <i class="fa-solid fa-lock"></i>

                        <input type="password" id="password" name="password" required autocomplete="off">

                        <button type="button" class="password-toggle" id="passwordToggle"
                            aria-label="Afficher le mot de passe">
                            <i class="fa-solid fa-eye"></i>
                        </button>

                    </div>

                </div>

                <div class="login-options">

                    <label class="remember-me">

                        <input type="checkbox" name="remember">

                        <span>Souvenir de moi</span>

                    </label>

                </div>

                <button type="submit" class="login-button">

                    <i class="fa-solid fa-right-to-bracket"></i>

                    <span>Se connecter</span>

                </button>

            </form>

            <a href="/" class="back-link">
                <i class="fa-solid fa-arrow-left"></i>
                Retour à l'accueil
            </a>

        </section>

    </main>

    <script>
    const passwordInput = document.getElementById('password');
    const passwordToggle = document.getElementById('passwordToggle');

    passwordToggle.addEventListener('click', function() {
        const isPassword = passwordInput.type === 'password';

        passwordInput.type = isPassword ? 'text' : 'password';

        this.innerHTML = isPassword ?
            '<i class="fa-solid fa-eye-slash"></i>' :
            '<i class="fa-solid fa-eye"></i>';

        this.setAttribute(
            'aria-label',
            isPassword ?
            'Masquer le mot de passe' :
            'Afficher le mot de passe'
        );
    });
    </script>

</body>

</html>