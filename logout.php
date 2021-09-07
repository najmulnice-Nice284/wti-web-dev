<?php
session_start();
session_destroy();
if(!isset($_SERVER['logged_in_user_name'])){
  header('location: login.php');
}
 ?>
