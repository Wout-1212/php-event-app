<?php Core\Core::header(); ?>

<?php if (!empty(Core\Session::get('msg'))): ?>
    <div class="message message--success">
        <?= Core\Session::getAndForget('msg'); ?>
    </div>
<?php endif; ?>

<body class="layout">
    <?php if (!empty($events)): ?>
        <div class="layout__content">
            <header class="layout__header">
                <h1 class="layout__header-title">All Events</h1>
                <a href="/add" class="form__button">Add New</a>
            </header>
            <div class="table__wrapper">
                <table class="table">
                    <thead class="table__header">
                        <tr>
                            <th class="table__header-cell">Id</th>
                            <th class="table__header-cell">Title</th>
                            <th class="table__header-cell">Description</th>
                            <th class="table__header-cell">Location</th>
                            <th class="table__header-cell">Date</th>
                            <th class="table__header-cell">Time</th>
                            <th class="table__header-cell"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($events as $key => $event) : ?>
                            <tr class="table__row">
                                <td class="table__cell"><?= $key + 1 ?></td>
                                <td class="table__cell"><?= $event->title ?></td>
                                <td class="table__cell"><?= $event->description ?></td>
                                <td class="table__cell"><?= $event->location ?></td>
                                <td class="table__cell"><?= $event->date ?></td>
                                <td class="table__cell"><?= $event->time ?></td>
                                <td>
                                    <a href="/update/<?= $event->id ?>" class="button button--update">Edit</a>
                                    <a href="/delete/<?= $event->id ?>" class="button button--delete">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php else: ?>
        <div class="message message--error">
            No Events found.
        </div>
    <?php endif; ?>
</body>

</html>

<?php Core\Core::footer(); ?>