<?php
session_start();
if(!isset($_SESSION['logged_in_user_name'])){
  header('location: login.php');
}
 require_once 'includes/header.php';
 ?>

<div class="container">
  <div class="row">
    <div class="col-md-6 offset-3 mt-5">
      <div class="card text-white mb-3">
        <div class="card-header bg-success">Your Dashboard</div>
          <div class="card-body text-dark">
            <h3>Hellow <?php echo $_SESSION['logged_in_user_name']; ?></h3>
            <h3>Your email is <?php echo $_SESSION['logged_in_user_email']; ?></h3>
          </div>
      </div>
    </div>
  </div>
</div>



<?php
  require_once 'includes/footer.php';

 ?>
