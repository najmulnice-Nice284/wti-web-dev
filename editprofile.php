<?php
require_once 'session_cheack.php';
require_once 'includes/header.php';
?>

<div class="container">
  <div class="row">
    <div class="col-md-5 offset-3 mt-5">
      <?php
        if(isset($_SESSION['update_profile_sccss_msg'])){
          ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong><?php echo $_SESSION['update_profile_sccss_msg']; ?></strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <?php
          unset($_SESSION['update_profile_sccss_msg']);
        }

       ?>

      <div class="card text-white mb-3">
        <div class="card-header bg-success">Edit your profile</div>
          <div class="card-body text-dark">
            <form action="editprofile_post.php" method="post">
              <div class="form-group">
                <label for="exampleInputEmail1">Change Name</label>
                <input type="hidden" name="id" class="form-control" value="<?php echo $_SESSION['logged_in_user_id']; ?>">
                <input type="text" name="changename" class="form-control" value="<?php echo $_SESSION['logged_in_user_name']; ?>">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Change email</label>
                <input type="text" name="changeemail" class="form-control" value="<?php echo $_SESSION['logged_in_user_email'] ?>">
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
