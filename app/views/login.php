<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Event Website</title>
    <?php vite(['theme/main.scss']); ?>
</head>

<body class="login">

    <div class="login__wrapper">
        <h2 class="login__title">Login</h2>

        <?php if (!empty(Core\Session::get('error'))): ?>
            <p class="login__error"><?= Core\Session::getAndForget('error'); ?></p>
        <?php endif; ?>

        <form action="/authenticate" method="POST">
            <div class="login__form-group">
                <label for="email" class="login__label">Email</label>
                <input type="text" id="email" name="email"
                    class="login__input">
            </div>

            <div class="login__form-group">
                <label for="password" class="login__label">Password</label>
                <input type="text" id="password" name="password"
                    class="login__input">
            </div>

            <button type="submit"
                class="login__button">Login</button>
        </form>
    </div>
    <?php vite(['theme/main.js']); ?>
</body>

</html>