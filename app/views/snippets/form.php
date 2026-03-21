<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Event Form</title>
  </head>

  <body class="layout">
    <div class="form__wrapper">
      <form action="/save/<?=$event->id ?? null?>" method="POST" class="form">
        <div class="form__group">
          <label class="form__label" for="title">Title</label>
          <input type="text" id="title" name="title" class="form__input" value="<?= $event->title ?? null ?>" required/>
        </div>
        <div class="form__group">
          <label class="form__label" for="description">Description</label>
          <input type="text" id="description" name="description" class="form__input" value="<?= $event->description ?? null ?>" required />
        </div>
        <div class="form__group">
          <label class="form__label" for="location">Location</label>
          <input type="text" id="location" name="location" class="form__input" value="<?= $event->location ?? null ?>" required />
        </div>
        <div class="form__group">
          <label class="form__label" for="date">Date</label>
          <input type="date" id="date" name="date" class="form__input" value="<?= $event->date ?? null ?>" required />
        </div>
        <div class="form__group">
          <label class="form__label" for="time">Time</label>
          <input type="time" id="time" name="time" class="form__input" value="<?= $event->time ?? null ?>" required />
        </div>
        <div class="form__group">
          <button type="submit" class="form__button">Save Event</button>
        </div>
      </form>
    </div>
  </body>
</html>
