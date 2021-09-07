<?php
  session_start();
  if(!isset($_SESSION['logged_in_user_name'])){
    header('location: login.php');
  }
 ?>
