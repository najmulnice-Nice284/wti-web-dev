<?php
session_start();
require_once 'db.php';
$id = $_POST['id'];
$changename = $_POST['changename'];
$changeemail = $_POST['changeemail'];

  $update_profile_query = "UPDATE users SET name='$changename', email='$changeemail' WHERE id=$id";
  mysqli_query($database_connection,$update_profile_query);
  $_SESSION['logged_in_user_name'] =$changename;
  $_SESSION['logged_in_user_email'] =$changeemail;
  $_SESSION['update_profile_sccss_msg'] = 'Your profile change successfully!';

  header('location: editprofile.php');
?>
