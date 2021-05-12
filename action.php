<?php
    echo "DEBUG :<br>";
      echo "POST:<br>"; 
      var_dump($_POST);
       echo "GET:<br />"; 
       var_dump($_GET);
       echo "<br>";



//CHECKS POST REQUESTS & SEND IT TO THE MODEL
require_once("model.php");
//POST REQUEST - CREATE AND UPDATE SPECTACLES
if(isset($_POST['submit'])){
    if($_POST['submit'] == 'Creer'){
    echo "CREATE";
    $date = $_POST['date'];
    $heure = $_POST['heure'];
    $idLieu = $_POST['lieu'];
    $idArtiste = $_POST['artiste'];
    $create = create($date, $heure, $idLieu, $idArtiste);
    if($create)
    header("Location: index.php?message=ENTRY CREATED");
    }
    else if ($_POST['submit'] == 'Mettre a Jour'){
    $id = $_POST['id'];
    $date = $_POST['date'];
    $heure = $_POST['heure'];
    $idLieu = $_POST['lieu'];
    $idArtiste = $_POST['artiste'];
    $update = update($id, $date, $heure, $idLieu, $idArtiste);
    header("Location: index.php?message=ID: $id - UPDATED");
    }
    }
    //DELETE REQUEST 
    if(isset($_GET['delete'])){
    $id = $_GET['id'];
    $del = delete($id);
    if($del)
    header("Location: index.php?message=ID: $id - DELETED");
    }

    if( isset($_GET['update']) ){
    $id = $_GET['id'];
    header("Location:index.php?page=update&id=$id");
    }


?>  