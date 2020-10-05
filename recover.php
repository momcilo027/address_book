<?php
require_once('database.php');

if(empty($_GET['id'])){
  header('Location: home.php');
}else{
  $id = $_GET['id'];

  if($id){
    recover($id);
    header('Location: home.php');
  } else {
    header('Location: home.php');
  }
}

 ?>
