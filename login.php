<?php
  ob_start();
  session_start();




  require_once 'actions/db_connect.php';
  // it will never let you open index(login) page if session is set
  if ( isset($_SESSION['user'])!="" ) {
    header("Location: index.php");
    exit;
  }
  $error = false;

    $user_email= "";

    $user_pass= "";

    $emailError="";

    $passError="";

  if( isset($_POST['btn-login']) ) {
    // prevent sql injections/ clear user invalid inputs
    $user_email = trim($_POST['email']);
    $user_email = strip_tags($user_email);
    $user_email = htmlspecialchars($user_email);

    $user_pass = trim($_POST['pass']);
    $user_pass = strip_tags($user_pass);
    $user_pass = htmlspecialchars($user_pass);
  
    // prevent sql injections / clear user invalid inputs
    if(empty($user_email)){
      $error = true;
      $emailError = "Please enter your email address.";
    } else if ( !filter_var($user_email,FILTER_VALIDATE_EMAIL) ) {
      $error = true;
      $emailError = "Please enter valid email address.";
    }
    if(empty($user_pass)){
      $error = true;
      $passError = "Please enter your password.";
    }
    // if there's no error, continue to login
    if (!$error) {

      $query = "SELECT * FROM admin WHERE email='$user_email'";
      $res = mysqli_query($conn, $query);
      $row = mysqli_fetch_assoc($res);
      $count = mysqli_num_rows($res); // if uname/pass correct it returns must be 1 row
      
      // print_r($row); Use it for a fast check to see what is included in $row assoc array!
      
      if( $count != 1 ) {
        $errMSG = "This email is not registered";
      } else if ($row['user_pass']==$password) {
        $_SESSION['user'] = $row['id'];
        header("Location: index.php");
      } else {
        $errMSG = "Incorrect Password, Try again...";
      }
    }
  }


?>

<!-- HTML================================= -->

<!-- html/head/<body> -->
<?php include('navbar.php'); ?>

  <div class="container-fluid row mx-auto">
  
  <!-- FORM LOG IN ============================ -->

      <div class="container col-lg-4 col-md-10 col-sm-10 m-auto my-auto">

    <?php 
      if( isset($_GET['success'])) { ?>
        <div class="alert alert-success">
          <strong>Successfully registered</strong>
        </div>
      <?php 
        }
      ?>

      <form class="form-control" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
        <h2>Log In.</h2>
        <hr />
        <?php
          if ( isset($errMSG) ) {
        ?>

          <div class="alert text-danger">
            <?php echo $errMSG; ?>
          </div>

        <?php
        }
        ?>
        
        <div class="form-group">
          <input type="email" name="email" class="form-control" placeholder="Your Email" value="<?php echo $user_email; ?>" maxlength="40" />
          <span class="text-danger"><?php echo $emailError; ?></span>
        </div>
        <div class="form-group">
          <input type="password" name="pass" class="form-control" placeholder="Your Password" maxlength="15" />
          <span class="text-danger"><?php echo $passError; ?></span>
        </div>
        
        <hr />
        <button class="btn btn-block btn-primary col-8 m-auto" type="submit" name="btn-login">Log In</button>
        <br>
        
        <hr />
        
      </form>
    </div>

<br>
<!-- footer + </body-html> -->
<?php include('footer.php'); ?>

<?php ob_end_flush(); ?>