<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jammit</title>
    <?php /* NEW */ ?>
    <?php echo $css;?>
  </head>
  <body>
  <header class="header">
  <h1><a class="h1-like" href="index.php">Jamm It</a></h1>
    <nav class="nav">
      <ul class="nav__list">
        <li class="nav__list-item"><a class="nav-item-link nav-item-link-events" href="index.php">Events</a></li>
        <li class="nav__list-item"><a class="nav-item-link nav-item-link-create create__button nav-item-link--desktop" href="index.php?page=create">Create</a></li>
        <li class="nav__list-item"><a class="nav-item-link nav-item-link-create create__button nav-item-link--mobile" href="index.php?page=create""><img src="/assets/illustrations/create.png" alt="create button" width="40" height="40"></a></li>
      </ul>
    </nav>
  </header>
    <main class="container">
      <?php echo $content;?>
    </main>
    <?php echo $js; ?>
  </body>
</html>
