<?php
require_once 'includes/header.php';
require_once 'session_cheack.php';
?>

<div class="container">
  <div class="row">
    <div class="col-md-5 offset-3 mt-5">
      <?php
        if(isset($_SESSION['new_confirm_not_match_msg'])){
          ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong><?php echo $_SESSION['new_confirm_not_match_msg']; ?></strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <?php
          unset($_SESSION['new_confirm_not_match_msg']);
        }
       ?>

      <?php
        if(isset($_SESSION['old_pass_match_msg'])){
          ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong><?php echo $_SESSION['old_pass_match_msg']; ?></strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <?php
          unset($_SESSION['old_pass_match_msg']);
        }
       ?>

      <?php
        if(isset($_SESSION['pass_succss_msg'])){
          ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong><?php echo $_SESSION['pass_succss_msg']; ?></strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <?php
          unset($_SESSION['pass_succss_msg']);
        }
       ?>

      <div class="card text-white mb-3">
        <div class="card-header bg-success">Change Password</div>
          <div class="card-body text-dark">
            <form action="changepass_post.php" method="post">
              <div class="form-group">
                <label for="exampleInputEmail1">Old password</label>
                <input type="hidden" name="id" class="form-control" value="<?php echo $_SESSION['logged_in_user_id']; ?>">
                <input type="text" name="oldpass" class="form-control" placeholder="Enter your oldpass">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">New password</label>
                <input type="text" name="newpass" class="form-control" placeholder="Enter your new pass">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Confirm password</label>
                <input type="text" name="confirmpass" class="form-control" placeholder="enter your confirm pass">
              </div>
              <button type="submit" class="btn btn-primary">Change</button>
            </form>
          </div>
      </div>
    </div>
  </div>
</div>

<?php
require_once 'includes/footer.php';
?>
