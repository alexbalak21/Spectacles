<?php
require_once("model.php");
if(isset($_POST['submit'])){
    if($_POST['submit'] == 'Creer'){
    echo "CREATE";
    $date = $_POST['date'];
    $heure = $_POST['heure'];
    $idLieu = $_POST['lieu'];
    $idArtiste = $_POST['artiste'];
    $create = create($date, $heure, $idLieu, $idArtiste);
    if($create)
    header("Location: index.php");
    }
    else if ($_POST['submit'] == 'Mettre a Jour'){
    $id = $_POST['id'];
    $date = $_POST['date'];
    $heure = $_POST['heure'];
    $idLieu = $_POST['lieu'];
    $idArtiste = $_POST['artiste'];
    $update = update($id, $date, $heure, $idLieu, $idArtiste);
    header("Location: index.php");
    }
    }

    if(isset($_GET['delete'])){
    $id = $_GET['id'];
    $del = delete($id);
    if($del)
    header("Location: index.php");
    }

?>  