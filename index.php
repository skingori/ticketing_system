<?php
session_start();
if (isset($_SESSION['rank'])!="" && isset($_SESSION['logname'])!="") {
    header("Location: sessions.php");
    exit;
}


require('connection/db.php');
// If form submitted, insert values into the database.
if (isset($_POST['login'])){

    $username = stripslashes($_REQUEST['Login_Username']); // removes backslashes
//$rank = stripslashes($_REQUEST['rank']); // removes backslashes
    $password = stripslashes($_REQUEST['Login_Password']);

    $username_ = mysqli_real_escape_string($con,$username); //escapes special characters in a string
//$rank_ = mysqli_real_escape_string($con,$rank); //escapes special characters in a string
    $password_ = mysqli_real_escape_string($con,$password);

    $enc = md5($password_);
//Checking is user existing in the database or not
    $query = "SELECT * FROM `Login` WHERE Login_Username='$username_' AND Login_Password='$enc'";
    $result = mysqli_query($con,$query) or die(mysqli_error($con));
    $rows = mysqli_num_rows($result);

    $rowCheck = mysqli_num_rows($result);
    $row= mysqli_fetch_array($result);


    if($row['Login_Rank']==1){

        $_SESSION['logname'] = $row['Login_Username'];
        $_SESSION['rank'] = $row['Login_Rank'];

        //below will be used as a welcome message
        $username=$_SESSION['logname'];

        $msg = "<div class='alert alert-success'>
                        <span class='glyphicon glyphicon-info-sign'></span> &nbsp;Login Successful !! Welcome $username
                    </div>";


        ?>
        <p align="center">
            <meta content="2;admin/index.php?action=home" http-equiv="refresh" />
        </p>

        <?php


    } elseif ($row['Login_Rank']==2){

        $_SESSION['logname'] = $row['Login_Username'];
        $_SESSION['rank'] = $row['Login_Rank'];

        //below will be used as a welcome message
        $username=$_SESSION['logname'];

        $msg = "<div class='alert alert-success'>
                        <span class='glyphicon glyphicon-info-sign'></span> &nbsp;Login Successful !! Welcome $username
                    </div>";

        ?>

        <p align="center">
            <meta content="2;user/index.php" http-equiv="refresh" />
        </p>

        <?php

    }elseif ($row['Login_Rank']==3){

        $_SESSION['logname'] = $row['Login_Username'];
        $_SESSION['rank'] = $row['Login_Rank'];

        $msg = "<div class='alert alert-success'>
                        <span class='glyphicon glyphicon-info-sign'></span> &nbsp;Login Successful !! Welcome
                    </div>";
        ?>

        <p align="center">
            <meta content="2;officer/index.php?action=home" http-equiv="refresh" />
        </p>

        <?php

    }

    else {
        ?>
        <?php

        $msg = "<div class='alert alert-danger'>
                        <span class='glyphicon glyphicon-info-sign'></span> &nbsp; Wrong username or Password !
                    </div>";

    }
}?>

<?php

if(isset($_POST['reg'])) {


    $Login_Id_= strip_tags($_POST['Login_Id']);
    $Login_Username_= strip_tags($_POST['Login_Username']);
    $Login_Password_= strip_tags($_POST['Login_Password']);
    //$login_rank_= strip_tags($_POST['login_rank']);
//$Login_Username_= strip_tags($_POST['Login_Username']);


    $Login_Id= $con->real_escape_string($Login_Id_ );
    $Login_Username= $con->real_escape_string($Login_Username_ );
    $Login_Password= $con->real_escape_string($Login_Password_);
    //$login_rank= $con->real_escape_string($login_rank_ );
//$Login_Username= $con->real_escape_string($Login_Username_);
    $enc= md5($Login_Password);
//$hashed_password = password_hash($upass, PASSWORD_DEFAULT); // this function works only in PHP 5.5 or latest version

    $check_ = $con->query("SELECT Login_Username FROM Login WHERE Login_Username='$Login_Username'");
    $count=$check_->num_rows;

    if ($count==0) {

        $query = "INSERT INTO Login(Login_Id,Login_Username,Login_Password,Login_Rank) VALUES('$Login_Id','$Login_Username','$enc','2')";

//inserting in login table
//$query .= "INSERT INTO Login_table(Login_Username,login_rank,Login_Password,login_status) VALUES('$uname','$rank','$enc','Inactive')";

        if ($con->query($query)) {
            $msg1 = "<div class='alert alert-success'>
    <span class='glyphicon glyphicon-info-sign'></span> &nbsp; successfully registered !
</div>";
            ?>

            <p align="center">
                <meta content="2;index.php?login" http-equiv="refresh" />
            </p>

            <?php

        }else {
            $msg1 = "<div class='alert alert-danger'>
    <span class='glyphicon glyphicon-info-sign'></span> &nbsp; error while registering !
</div>";
        }

    } else {


        $msg1 = "<div class='alert alert-danger'>
    <span class='glyphicon glyphicon-info-sign'></span> &nbsp; sorry username already taken !
</div>";

    }

    $con->close();
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>tarclink :: ticketing</title>
      <!-- Background -->
      <link rel="stylesheet" href="build/css/background.css" />

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">

  </head>

  <body id="test" class="test">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper" style="color: darkslategrey">
        <div class="animate form login_form">
          <section class="login_content">
              <?php
              if (isset($msg)) {
                  echo $msg;
              }
              ?>
            <form method="POST">
              <h1>Get Started</h1>
              <div>
                <input type="text" name="Login_Username" class="form-control" placeholder="Username" required="" >
              </div>
              <div>
                <input type="password" class="form-control" name="Login_Password" placeholder="Password" required="" >
              </div>
              <div>
                <button type="submit" class="btn btn-default" name="login">Login</button>
                <a class="reset_pass" href="#">Lost your password?</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">New to site?
                  <a href="#signup" class="to_register"> Create Account </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-ticket"></i> Get your ticket</h1>
                  <p>©2016 All Rights Reserved. Online ticketing system.Powered by <a href="https://github.com/skingori">tarclink.Privacy and Terms</a></p>
                </div>
              </div>
            </form>
          </section>
        </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content">
              <?php
              if (isset($msg1)) {
                  echo $msg1;
              }
              ?>
            <form method="POST">

              <h1>Create Account</h1>
                <div class="form-group">
                    <input type="number" class="form-control" name="Login_Id" placeholder="Your ID" required="" >
                </div>
              <div>
                <input type="text" class="form-control" name="Login_Username" placeholder="Username" required="" >
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" name="Login_Password" required="" >
              </div>
              <div>
                <button class="btn btn-default" name="reg" type="submit">Register</button>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-clock-o"></i> Grab your ticket now</h1>
                  <p>©2016 All Rights Reserved. Online ticketing system!Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
