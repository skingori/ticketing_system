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
              <a href="index.php" class="site_title"><i class="fa fa-ticket"></i> <span>Online Ticketing</span></a>
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
                  <li><a><i class="fa fa-home active"></i> Home</a>
                  </li>
                  <li><a><i class="fa fa-edit"></i>Get Tickets <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="index.php">Create new</a></li>
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
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">

                      <!--ADD CONTENT HERE to the page ...-->
                      <?php
                      if (isset($msg)) {
                          echo $msg;
                      }
                      ?>
                      <ul id="registration-step">
                          <li id="account" class="highlight">Ticketing</li>
                          <li id="password">Payments</li>
                          <li id="general">Final</li>
                      </ul>
                      <form name="frmRegistration" id="registration-form" method="post">
                          <div id="account-field">
                              <div class="form-group">
                                  <label for="Ticket_Count">Ticket Count:</label>
                                  <select type="" name="Ticket_Count" class="form-control">
                                      <option value="1">1</option>
                                  </select>
                              </div>

                              <div class="form-group">
                                  <label for="Ticket_Type">Ticket Type:</label>
                                  <select name="Ticket_Type" id="Ticket_Type" class="form-control">
                                      <option value="VIP" class="form-control">VIP</option>
                                      <option value="REGULAR" selected class="form-control">Regular</option>
                                  </select>
                              </div>
                              <div class="form-group">
                                  <label id="Ticket_Charge">Charges:</label>
                                  <input class="form-control" readonly name="Ticket_Charge" id="Ticket_Charge" value="<?php echo '500';?>">
                              </div>
                              <div class="form-group">
                                  <label id="Ticket_Description">Description:</label>
                                  <textarea cols="5" rows="3" class="form-control" name="Ticket_Description"></textarea>
                              </div>
                          </div>

                          <div id="password-field" style="display:none;">

                              <div>
                                  <label>Reference Number:</label>
                                  <input type="text" name="Payment_Id" id="Payment_Id" class="form-control" placeholder="eg..X33UY3667532">
                              </div>
                              <div class="form-group">
                                  <label>Paid Amount (KSHS):</label>
                                  <input type="text" class="form-control" name="Payment_Amount">
                              </div>
                              <div class="form-group">
                                  <label>Payment Mode:</label>
                                  <select class="form-control" name="Payment_Mode">
                                      <option value="Bank">Bank</option>
                                      <option value="M-pesa">M-PESA</option>
                                      <option value="Airtel Money">Airtel Money</option>
                                      <option value="Other">Other</option>
                                  </select>
                              </div>
                          </div>

                          <div>
                              <p id="terms" style="display:none;">By assenting electronically, accepting the Solution or using the Solution, you accept all the terms and conditions of this Agreement on behalf of yourself and any entity or individual you represent
                                  or for whose Device you acquire Solutions from Vendor (collectively “you”). If you do not agree with the terms and conditions of this Agreement,
                                  do not continue the accepting process and delete or destroy all copies of the Solution in your possession.
                              </p>
                              <button class="btn btn-primary" type="button" name="back" id="back" value="Back" style="display:none;">Back</button>
                              <button class="btn btn-primary" type="button" name="next" id="next" value="Next" >Next</button>
                              <button class="btn btn-success" type="submit" name="finish" id="finish" value="Finish" style="display:none;">Finish</button>
                          </div>
                      </form>
                      <style>
                          #registration-step{margin:0;padding:0;}
                          #registration-step li{list-style:none; float:left;padding:5px 10px;border-top:#EEE 1px solid;border-left:#EEE 1px solid;border-right:#EEE 1px solid;}
                          #registration-step li.highlight{background-color:#EEE;}
                          #registration-form{clear:both;border:1px #EEE solid;padding:20px;}
                          .demoInputBox{padding: 10px;border: #F0F0F0 1px solid;border-radius: 4px;background-color: #FFF;width: 50%;}
                          .registration-error{color:#FF0000; padding-left:15px;}
                          .message {color: #00FF00;font-weight: bold;width: 100%;padding: 10px;}
                          .btnAction{padding: 5px 10px;background-color: #09F;border: 0;color: #FFF;cursor: pointer; margin-top:15px;}
                      </style>

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
