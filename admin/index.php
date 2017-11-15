<?php

/**
 * Created by PhpStorm.
 * User: king
 * Date: 10/10/2017
 * Time: 10:44
 */

session_start();
// Check, if user is already login, then jump to secured page
if (isset($_SESSION['logname']) && ($_SESSION['rank'])) {
    switch($_SESSION['rank']) {

        case 2:
            header('location:../user/index.php');//redirect to  page
            break;

    }
}elseif(!isset($_SESSION['logname']) && !isset($_SESSION['rank'])) {
    header('Location:../sessions.php');
}
else
{

    header('Location:index.php');
}

include '../connection/db.php';
$username=$_SESSION['logname'];

$result1 = mysqli_query($con, "SELECT * FROM Login WHERE Login_Username='$username'");

while($res = mysqli_fetch_array($result1))
{
    $username= $res['Login_Username'];
    $id= $res['Login_Id'];

}


//ADDING DATA

if(isset($_POST['reg'])) {


$Game_Type_= $_POST['Game_Type'];
$Game_DateTime_= $_POST['Game_DateTime'];
//$Game_Status_= $_POST['Game_Status'];
$Game_Description_= $_POST['Game_Description'];
//$login_rank_= strip_tags($_POST['login_rank']);
//$Login_Username_= strip_tags($_POST['Login_Username']);



//$hashed_password = password_hash($upass, PASSWORD_DEFAULT); // this function works only in PHP 5.5 or latest version

$check_ = $con->query("SELECT Game_Id FROM Game WHERE Game_Id='$Game_Id_'");
$count=$check_->num_rows;

if ($count==0) {

$query = "INSERT INTO Game(Game_Type,Game_DateTime,Game_Status,Game_Description) VALUES('$Game_Type_','$Game_DateTime_','oncoming','$Game_Description_')";

//inserting in login table
//$query .= "INSERT INTO Login_table(Login_Username,login_rank,Login_Password,login_status) VALUES('$uname','$rank','$enc','Inactive')";

if ($con->query($query)) {
$msg = "<div class='alert alert-success'>
    <span class='glyphicon glyphicon-info-sign'></span> &nbsp; successfully registered !
</div>";
?>

<p align="center">
    <meta content="2;index.php" http-equiv="refresh" />
</p>

<?php

}else {
    $msg = "<div class='alert alert-danger'>
    <span class='glyphicon glyphicon-info-sign'></span> &nbsp; error while registering !
            </div>";
}

} else {


    $msg = "<div class='alert alert-danger'>
    <span class='glyphicon glyphicon-info-sign'></span> &nbsp; sorry id already taken !
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

    <title>tarclink systems | home</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.php" class="site_title"> <span>Online Ticketing</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="../images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo $username ;?></h2>
              </div>
              <div class="clearfix"></div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>FAVOURITES</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-edit"></i>Get Tickets <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="#">Create new</a></li>
                    </ul>
                  </li>

                    <li><a><i class="fa fa-edit"></i>Verify Tickets <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="verify.php">Verify now</a></li>
                        </ul>
                    </li>
                </ul>


              </div>
                <div class="menu_section">
                    <h3>REPORTS</h3>
                    <ul class="nav side-menu">
                        <li><a><i class="fa fa-file-pdf-o"></i>View Reports <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="payments.php">Payments</a></li>
                                <li><a href="tickets.php">Tickets</a></li>
                                <li><a href="users.php">Registered users</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="menu_section">
                    <h3>TAGS</h3>
                    <ul class="nav side-menu">
                        <li><a><i class="fa fa-question-circle"></i> Help</a>
                            <ul class="nav child_menu">

                            </ul>
                        <li><a href="game.php"><i class="fa fa-soccer-ball-o"></i>Next Game<span class="label label-danger pull-right">Complete</span></a></li>
                        </li>
                    </ul>
                </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="../logout.php?logout">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="../images/img.jpg" alt=""><?php echo $username ;?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;"> Profile</a></li>
                    <li>
                      <a href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a>
                    </li>
                    <li><a href="javascript:;">Help</a></li>
                    <li><a href="../logout.php?logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">0</span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">

                    <li>
                      <div class="text-center">
                        <a>
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3></h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">

                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">

                      <!--ADD CONTENT HERE to the page ...-->
                      <form method="POST">
                          <?php
                          if (isset($msg)) {
                              echo $msg;
                          }
                          ?>
                          <h4>Create next game</h4>
                          <div class="form-group">
                              <input type="text" name="Game_Type" class="form-control" placeholder="Enter the game" required="" >
                          </div>
                          <div class="form-group">
                              <input type="date" class="form-control" name="Game_DateTime" placeholder="" required="Game Time and Date" >
                          </div>
                          <div class="box-body pad form-group">
                              <label for="">Description</label>
                              <textarea style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" class="form-control" id="" name="Game_Description"></textarea>
                          </div>

                          <div class="form-group">
                              <button type="submit" class="btn btn-default" name="reg">Make Next Game</button>
                          </div>

                          <div class="clearfix"></div>

                          <div class="separator">
                             Mark game complete when game is done.
                          </div>
                      </form>
                      <!-- ADD CONTENT HERE END -->

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Online ticketing System <a href="https://github.com/skingori">tarclink</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
    <script src="../custom/ckeditor/ckeditor.js"></script>

    <script>
        $(function () {
            // Replace the <textarea id="editor1"> with a CKEditor
            // instance, using default configuration.
            CKEDITOR.replace('Game_Description')
            //bootstrap WYSIHTML5 - text editor
            $('.textarea').wysihtml5()
        })
    </script>
    <script>
        function validate() {
            var output = true;

            return output;
        }
        $(document).ready(function() {
            $("#next").click(function(){
                var output = validate();
                if(output) {
                    var current = $(".highlight");
                    var next = $(".highlight").next("li");
                    if(next.length>0) {
                        $("#"+current.attr("id")+"-field").hide();
                        $("#"+next.attr("id")+"-field").show();
                        $("#back").show();
                        $("#finish").hide();
                        $("#terms").hide();
                        $(".highlight").removeClass("highlight");
                        next.addClass("highlight");
                        if($(".highlight").attr("id") == $("li").last().attr("id")) {
                            $("#next").hide();
                            $("#finish").show();
                            $("#terms").show();
                        }
                    }
                }
            });
            $("#back").click(function(){
                var current = $(".highlight");
                var prev = $(".highlight").prev("li");
                if(prev.length>0) {
                    $("#"+current.attr("id")+"-field").hide();
                    $("#"+prev.attr("id")+"-field").show();
                    $("#next").show();
                    $("#finish").hide();
                    $("#terms").hide();
                    $(".highlight").removeClass("highlight");
                    prev.addClass("highlight");
                    if($(".highlight").attr("id") == $("li").first().attr("id")) {
                        $("#back").hide();
                    }
                }
            });
        });
    </script>
  </body>
</html>
