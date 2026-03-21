<?php Core\Core::header(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Items</title>
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
                            <th class="table__header-cell">Today</th>
                            <th class="table__header-cell">Tomorrow</th>
                            <th class="table__header-cell">Day after Tomorrow</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($events as $key => $event) : ?>
                            <tr class="table__row" data-location="<?= $event->location ?>">
                                <td class="table__cell"><?= $event->title ?></td>
                                <td class="table__cell"><?= $event->description ?></td>
                                <td class="table__cell"><?= $event->location ?></td>
                                <td class="table__cell"><?= $event->date ?></td>
                                <td class="table__cell"><?= $event->time ?></td>
                                <td class="table__cell day1"></td>
                                <td class="table__cell day2"></td>
                                <td class="table__cell day3"></td>

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