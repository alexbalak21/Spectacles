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
        <aside>
        
        </aside>
        <section id="main">
            <h1>Spectacles</h1>
<?php
require_once("model.php");
if(isset($_GET['update']))
require_once("views/update.php");
else if(isset($_GET['page'])){
$page = $_GET['page'];
if($page  == 'create')
require_once('views/create.php');
if($page == 'home')
require_once('views/read.php');
}
else
require_once('views/read.php');

?>
</section>
<aside></aside>
  </main>
  <footer>
  <?php
    echo "POST:<br>";  
         var_dump($_POST);
         echo "GET:<br>";  
         var_dump($_GET);
?>
      </footer>
      <script src="assets/js/script.js"></script>
    </body>
  </body>
</html>
