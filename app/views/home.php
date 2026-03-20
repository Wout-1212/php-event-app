<?php Core\Core::header(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Items</title>
    <link href="./main.css" rel="stylesheet">
</head>

<body class="layout">

    <div class="layout__content">
        <header class="layout__header">
            <h1 class="layout__header-title">5 Latest Events</h1>
        </header>

        <?php if (!empty($events)): ?>
            <div class="table__wrapper">
                <table class="table">
                    <thead class="table__header">
                        <tr>
                            <th class="table__header-cell">Title</th>
                            <th class="table__header-cell">Description</th>
                            <th class="table__header-cell">Location</th>
                            <th class="table__header-cell">Date</th>
                            <th class="table__header-cell">Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($events as $key => $event) : ?>
                            <tr class="table__row">
                                <td class="table__cell"><?= $event->title ?></td>
                                <td class="table__cell"><?= $event->description ?></td>
                                <td class="table__cell"><?= $event->location ?></td>
                                <td class="table__cell"><?= $event->date ?></td>
                                <td class="table__cell"><?= $event->time ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <div class="message message--error">
                No events found.
            </div>
        <?php endif; ?>
    </div>
</body>

</html>

<?php Core\Core::footer(); ?>