<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My website</title>
    <?php vite(['theme/main.scss']); ?>
</head>
<body>

    <?= $content; ?>

    <?php vite(['theme/main.js']); ?>
</body>
</html>
