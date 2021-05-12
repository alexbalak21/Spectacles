<?php
if(isset($_GET['page'])){
$page = $_GET['page'];
if($page  == 'create')
require_once('views/create.php');
if($page == 'update')
require_once("views/update.php");
if($page == 'home')
require_once('views/home.php');
}
else
require_once('views/home.php');
?>