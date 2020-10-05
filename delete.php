<?php
require_once('database.php');

if(empty($_GET['id'])){
  header('Location: home.php');
}
$id = $_GET['id'];

if($id){
  delete($id);
  header('Location: home.php');
} else {
  header('Location: home.php');
}

 ?>
