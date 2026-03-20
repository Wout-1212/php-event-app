<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Website</title>
    <?php vite(['theme/main.scss']); ?>
</head>

<body>
    <div class="layout__sidebar layout__sidebar--visible">
        <h2 class="layout__sidebar-title">Events</h2>
        <nav class="layout__nav">
            <?php if (Core\Session::get('user')): ?>
                <a href="/" class="layout__nav-link">Home</a>
                <a href="/admin" class="layout__nav-link">Admin</a>
                <a href="/logout" class="layout__nav-link">Logout</a>
            <?php else: ?>
                <a href="/login" class="layout__nav-link">Login</a>
            <?php endif; ?>
        </nav>
    </div>

    <div class="layout__content">
        <?= $content; ?>
    </div>

    <?php vite(['theme/main.js']); ?>
</body>

</html>