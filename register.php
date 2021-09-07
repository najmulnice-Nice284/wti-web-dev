<?php require_once 'includes/header.php' ?>
    <div class="container">
      <div class="row">
        <div class="col-md-6 offset-3 mt-5">
          <div class="card text-white mb-3">
            <div class="card-header bg-success">Registration from</div>
            <div class="card-body text-dark">
              <?php
                $errname = $erremail = $errpass = $erremailtaken = "";
                      if($_SERVER['REQUEST_METHOD'] == 'POST'){
                        if(empty($_POST['user_name'])){
                          $errname = 'your name field is required';
                        }elseif(empty($_POST['email_address'])){
                          $erremail = 'your email field is required';
                        }elseif(!filter_var($_POST['email_address'], FILTER_VALIDATE_EMAIL)){
                          $erremail = 'Please enter your validate email address!';
                        }elseif(empty($_POST['password'])){
                          $errpass = 'your password field is required';
                        }else{
                          $username = $_POST['user_name'];
                          $email = $_POST['email_address'];
                          $password = md5($_POST['password']);


                          $checking_same_email_query = "SELECT COUNT(*) AS email_adrs_amount FROM users WHERE email='$email'";
                          $result = mysqli_query($database_connection,$checking_same_email_query);
                          $after_assoc_result = mysqli_fetch_assoc($result);
                          if( $after_assoc_result['email_adrs_amount'] == 1){
                            $erremailtaken = 'Email address has been already taken!';
                          }else{
                            $insert_query = "INSERT INTO users(name, email, password) VALUES ('$username','$email','$password')";

                            if(mysqli_query($database_connection,$insert_query)){
                              echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Congratulations!</strong> Your registration is successfully done.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>';
                          }
                          }
                      }
                    }
              ?>

            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                      <div class="form-group">
                        <label for="exampleInputEmail1">User name</label>
                        <input type="text" name="user_name" class="form-control" placeholder="Enter your name">
                        <span style="color: red"><?php echo $errname ?></span>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="text" name="email_address" class="form-control" placeholder="Enter email">
                        <span style="color: red"><?php echo $erremail ?></span>
                        <span style="color: red"><?php echo $erremailtaken ?></span>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        <span style="color: red"><?php echo $errpass ?></span>
                      </div>
                      <button type="submit" class="btn btn-primary">Submit</button>
                      <a href="login.php" class="btn btn-success">login here</a>
                    </form>
            </div>
          </div>
        </div>
      </div>
    </div>



  <?php require_once 'includes/footer.php' ?>
