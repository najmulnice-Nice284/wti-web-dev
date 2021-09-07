<?php
  session_start();
  require_once 'db.php';
  require_once 'includes/header.php';
 ?>

    <div class="container">
      <div class="row">
        <div class="col-md-6 offset-3 mt-5">

          <div class="card text-white mb-3">
            <div class="card-header bg-success">Login from</div>
            <div class="card-body text-dark">
              <?php
                $errmsg ="";
                if($_SERVER['REQUEST_METHOD'] ==  'POST'){
                  $email = $_POST['email_address'];
                  $password = md5($_POST['password']);

                  $checking_query = "SELECT COUNT(*) AS nice, name, email, id FROM users WHERE email='$email' AND password= '$password'";

                  $result = mysqli_query($database_connection,$checking_query);
                  $after_asc_result = mysqli_fetch_assoc($result);
                  if($after_asc_result['nice'] == 1){
                    $_SESSION['logged_in_user_name'] = $after_asc_result['name'];
                    $_SESSION['logged_in_user_email'] = $after_asc_result['email'];
                    $_SESSION['logged_in_user_id'] = $after_asc_result['id'];
                    header('location: dashboard.php');
                  }else{
                    $errmsg = 'Your email or pass is invalid!';
                  }
                }

               ?>
              <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="text" name="email_address" class="form-control" placeholder="Enter email">
                  <span style="color: red;"><?php echo $errmsg; ?></span>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" name="password" class="form-control" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-primary">login</button>
                <a href="register.php" class="btn btn-success">Registration here</a>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

  <?php
    require_once 'includes/footer.php';
  ?>
