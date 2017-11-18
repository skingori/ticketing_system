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

<?php

if(isset($_GET['complete'])) {


    $compid=$_GET['complete'];

    $result = mysqli_query($con, "UPDATE Game SET Game_Status='complete' WHERE Game_Id=$compid");

    $msg = "<div class='alert alert-success'>
    <span class='glyphicon glyphicon-info-sign'></span> &nbsp; successfully Updated!
        </div>";

    header('refresh:2; url=game.php');

}elseif (isset($_GET['complete'])){

    $sql = "DELETE * FROM Ticket";
}

//include header
include "header.php";
// Check connection

$result = mysqli_query($con, "SELECT * FROM Game WHERE Game_Status='oncoming'");
?>


<div class="box-header">
    <h3 class="box-title" style="font-family:Consolas; font-size: small">All Incomplete Games</h3>
</div>
<div class="box-body">
    <table class="table table-striped table-hover table-condensed" id="table1" boader="1" style="font-family: consolas; font-size: small">
        <thead class="bg-primary">
        <th>Game ID</th>
        <th>Game Info</th>
        <th>Date</th>
        <th>Description</th>
        <th></th>
        </thead>
        <tbody>

        <?php
        //while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array
        while($res = mysqli_fetch_array($result)) {
            echo "<tr class=''>";
            echo "<td class=''>" . $res['Game_Id'] . "</td>";
            echo "<td>" . $res['Game_Type'] . "</td>";
            echo "<td>" . $res['Game_DateTime'] . "</td>";
            //echo "<td>" . $res['Game_Status'] . "</td>";
            echo "<td>" . $res['Game_Description'] . "</td>";
            echo "<td><a href=\"game.php?complete=$res[Game_Id]\" onClick=\"return confirm('Are you sure you want to mark game complete?')\" class='btn btn-danger fa fa-check lg-2'></a></td>";


        }
        ?>
        </tbody>
        <tfoot class="bg-info">
        <th>Game ID</th>
        <th>Game Info</th>
        <th>Date</th>
        <th>Description</th>
        <th></th>

        </tfoot>
    </table>
</div>
<!-- -->
<?php include "footer.php";?>
