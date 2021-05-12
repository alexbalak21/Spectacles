<?php
//DATABASE CONNECTION 
function db_connect(){
$servername = "localhost"; 
$username = "admin";      
$password = "root";
$dbname = "spectacles";
global $conn;
try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
}

//READ
function getAll(){
  db_connect();
  global $conn;
  $stmt = $conn->prepare("SELECT * FROM `spectacle` ORDER BY `spectacle`.`idSpectacle` DESC");
  $stmt->execute();
  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
  $data = $stmt->fetchAll();
  return $data;
}

//GET BY ID
function searchBy($table, $col, $search){
  db_connect();
  global $conn;
  $stmt = $conn->prepare("SELECT * FROM $table WHERE $col='$search'");
  $stmt->execute();
  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
  $data = $stmt->fetch();
  return $data;
}

//GET COLUM DATA IN ARRAY
function getCol($table, $col){
  db_connect();
  global $conn;
  $stmt = $conn->prepare("SELECT $col FROM $table");
  $stmt->execute();
  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
  $data = $stmt->fetchAll();
  $array = [];
  array_push($array, NULL);
  foreach($data as $key => $value){
    array_push($array, $value["$col"]);
  } 
  return $array;
}

//GET MAX ID (USED WHEN CRETE SPECTACLE)
function getMax($table, $col){
  db_connect();
  global $conn;
  $stmt = $conn->prepare("SELECT $col FROM $table ORDER BY $col DESC LIMIT 0, 1;");
  $stmt->execute();
  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
  $data = $stmt->fetch();
  $result = $data["$col"];
  return $result; 
}

//CREATE
function create($date, $heure, $IDlieu, $IDartiste){
  db_connect();
  global $conn;
  $id = (INT)getMax('spectacle', 'idSpectacle');
  $id++;
  $heure = $heure . ':00';
  $stmt = $conn->prepare("INSERT INTO `spectacle` (`idSpectacle`, `dateSpectacle`, `heure`, `idLieu`, `idArtistePrincipal`) VALUES ('$id', '$date', '$heure', '$IDlieu', '$IDartiste')");
  $done = $stmt->execute();
  return $done;
}

//UPDATE
function update($id, $date, $heure, $IDlieu, $IDartiste){
  db_connect();
  global $conn;
  $sql = '';
  $sql = "UPDATE spectacle SET `dateSpectacle` = '$date', `heure` = '$heure', `idLieu` = '$IDlieu', `idArtistePrincipal` = '$IDartiste' WHERE `idSpectacle` = $id";
  $stmt = $conn->prepare($sql);
  $done = $stmt->execute();
  $done;
}

//DELETE
function delete($id){
  db_connect();
  global $conn;
    $stmt = $conn->prepare("DELETE FROM `spectacle` WHERE `idSpectacle`=$id");
    $done = $stmt->execute();
    return $done;
}

?>