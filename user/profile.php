<?php
include_once ("../connection/db.php");

session_start();
// Check, if user is already login, then jump to secured page
if (isset($_SESSION['logname']) && ($_SESSION['rank'])) {
    switch($_SESSION['rank']) {

        case 1:
            header('location:../admin/index.php');//redirect to  page
            break;
        case 3:
            header('location:../officer/index.php');//redirect to  page
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


if (isset($_POST['add'])) {

    $Fan_Name_=$_POST['Fan_Name'];
    $Fan_Gender_=$_POST['Fan_Gender'];
    $Fan_Age_=$_POST['Fan_Age'];

    mysqli_query($con,"INSERT INTO Fan(Fan_Id,Fan_Name,Fan_Gender,Fan_Age)
      values ('$id','$Fan_Name_','$Fan_Gender_','$Fan_Age_')
      ") or die(mysqli_error($con));

    $msg = "<div class='alert alert-success'>
						<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Success!
					</div>";
    echo '<meta content="4;index.php" http-equiv="refresh" >';

}

include'header.php';?>
<!-- Add content -->

<div class="">
    <div class="nav-tabs-custom">
        <?php
        if (isset($msg)) {
            echo $msg;
        }
        ?>
        <ul class="nav nav-tabs">
            <li class="active"><a href="#settings" data-toggle="tab">Settings</a></li>
            <!--<li><a href="#about" data-toggle="tab">About me</a></li>
            <li><a href="#profile" data-toggle="tab">Profile</a></li>-->

        </ul>
        <div class="tab-content">
            <div class="tab-pane" id="profile">
                <!-- Post -->

                <!-- /.post -->
            </div>
            <!-- /.tab-pane -->
            <div class="tab-pane" id="about">

            </div>
            <!-- /.tab-pane -->

            <div class="active tab-pane" id="settings">
                <form class="form-horizontal" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for=Fan_Name"" class="col-sm-2 control-label">Full Name:</label>

                        <div class="col-sm-10">
                            <input type="text" class="form-control" required id="Fan_Name" name="Fan_Name" pattern="[a-zA-Z0-9\s]+{4,}" title="Use letters ONLY" placeholder="John Doe">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Gender:</label>

                        <div class="col-sm-10">
                            <select name="Fan_Gender" class="form-control">
                                <option value="Male"> Male </option>
                                <option value="female"> Female </option>
                                
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">User Age:</label>
                        <div class="col-sm-10">
                            <input type="text" name="Fan_Age" class="form-control" id="" placeholder="Age" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" required=""> I agree to the <a href="#">terms and conditions</a>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-danger" name="add" id="add">Submit</button>
                        </div>
                    </div>

                </form>
            </div>
            <!-- /.tab-pane -->
        </div>
        <!-- /.tab-content -->
    </div>
    <!-- /.nav-tabs-custom -->
</div>

<?php
include 'footer.php';

?>
<script type="text/javascript">
    function checkAge(bday)
    {
        if(bday<18)
        {
            alert('You must be 18 or older to continue');
            document.getElementById('add').disabled=true;
        }
        else
        {
            document.getElementById('add').disabled=false;
        }
    }
</script>

