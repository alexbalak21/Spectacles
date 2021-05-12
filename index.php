<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="assets/css/style.css" />

    <title>Spectacles</title>
  </head>
  <body>
    <body>
      <ul class="nav">
        <li><a href="?page=home">HOME</a></li>
        <li><a href="?page=create">CREER SPECTACLE</a></li>
        <li id="nav-right"><a href="#">LINK</a></li>
        <li id="nav-right"><a href="#">LINK</a></li>
      </ul>
      <main>
        <aside></aside>
        <section id="main">
          <h1>Spectacles</h1>
          <?php
        require_once("message.php");
        require_once("model.php");
        require_once("router.php");
        ?>
        </section>
        <aside></aside>
      </main>
      <footer>

      </footer>
      <script src="assets/js/script.js"></script>
    </body>
  </body>
</html>
