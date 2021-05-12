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
  $stmt = $conn->prepare("SELECT * FROM spectacle");
  $stmt->execute();
  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
  $data = $stmt->fetchAll();
  return $data;
}

//GET BY ID
function getByID($table, $col, $id){
  db_connect();
  global $conn;
  $stmt = $conn->prepare("SELECT $col FROM $table WHERE idLieu='$id'");
  $stmt->execute();
  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
  $data = $stmt->fetchAll();
  $unit = $data[0]["$col"];
  return $unit;
}

//GET COLUM DATA FROM TABLE
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
  $sql ="INSERT INTO `spectacle` (`idSpectacle`, `dateSpectacle`, `heure`, `idLieu`, `idArtistePrincipal`) VALUES ('$id', '$date', '$heure', '$IDlieu', '$IDartiste')";
  $stmt = $conn->prepare($sql);
  $done = $stmt->execute();
  if($done)
  echo "ADDED";
}




function createMock(){
  db_connect();
  global $conn;
  $id = (INT)getMax('spectacle', 'idSpectacle');
  // $id++;
  // $heure = $heure . ':00';

  // $stmt = $conn->prepare("INSERT INTO spectacle (idSpectacle, dateSpectacle, heure, idLieu, idArtistePrincipal) VALUES ('$id', '$date', '$heure', '$IDlieu', '$IDartiste')");
  $stmt = $conn->prepare($sql);
  $done = $stmt->execute();
  if($done)
  echo "ADDED";
}




//UPATE
function updateUsers($id, $username, $password, $email, $age, $img){
  db_connect();
  global $conn;
  $stmt = $conn->prepare("UPDATE users SET username=:username, pass=:pass, email=:email, age=:age, img=:img WHERE id=:id");
  $stmt->bindValue (':username', $username);
  $stmt->bindValue (':pass', $password);
  $stmt->bindValue (':email', $email);
  $stmt->bindValue (':age', $age, PDO::PARAM_INT);
  $stmt->bindValue (':img', $img);
  $stmt->bindValue (':id', $id, PDO::PARAM_INT);
  $done = $stmt->execute();
  if($done)
  echo "UPDATED";
}


//DELETE
function deleteUser($id){
db_connect();
global $conn;
  $stmt = $conn->prepare("DELETE FROM users WHERE id=:id");
  $stmt->bindValue (':id', $id, PDO::PARAM_INT);
  $done = $stmt->execute();
  if($done)
  echo "DELETED";
}






function create_table(){
  db_connect();
  global $conn;
  $sql = "CREATE TABLE users (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) NOT NULL,
  pass VARCHAR(255) NOT NULL,
  email VARCHAR(50) NOT NULL,
  age INT(3) UNSIGNED NOT NULL,
  img VARCHAR(50) DEFAULT 'profile.png',
  reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)";

  // use exec() because no results are returned
  $conn ->exec("DROP TABLE users");
  $conn->exec($sql);
  echo "Table users created successfully";
  $conn = null;
}






?>