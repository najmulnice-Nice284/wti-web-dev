<?php
  session_start();
  require_once 'db.php';

  $id = $_POST['id'];
  $oldpass = md5($_POST['oldpass']);
  $newpass = md5($_POST['newpass']);
  $confirmpass = md5($_POST['confirmpass']);

  if($newpass == $confirmpass){
    $get_db_pass = "SELECT password FROM users WHERE id='$id'";
    $get_db_pass_result = mysqli_query($database_connection,$get_db_pass);
    $after_assoc_result = mysqli_fetch_assoc($get_db_pass_result);

    if($oldpass == $after_assoc_result['password']){
      $update_pass_query = "UPDATE users SET password='$newpass' WHERE id='$id'";
      mysqli_query($database_connection,$update_pass_query);
      $_SESSION['pass_succss_msg'] = 'Your password changed successfully!';
      header('location: changepass.php');
    }else{
      $_SESSION['old_pass_match_msg'] = 'Your password is invalid!';
      header('location: changepass.php');
    }
  }else{
    $_SESSION['new_confirm_not_match_msg'] = 'Your new password does not match with confirm password';
    header('location: changepass.php');
  }
  ?>
