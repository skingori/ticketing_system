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
<?php include "header.php";?>
<!-- -->
<?php

include "../connection/db.php";
// Check connection

$result = mysqli_query($con, "SELECT * FROM Ticket");
?>

    <div class="box-header">
        <h3 class="box-title" style="font-family:Consolas; font-size: small">All my tickets</h3>
    </div>
    <div class="box-body">
        <table class="table table-striped table-hover table-condensed" id="table1" boader="1" style="font-family: consolas; font-size: small">
            <thead class="bg-primary">
            <th>Ticket Id</th>
            <th>Amount Paid</th>
            <th>Ticket Type</th>
            <th>Date Purchased</th>
            <th>Description</th>
            <th></th>
            <th></th>

            </thead>
            <tbody>

            <?php
            //while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array
            while($res = mysqli_fetch_array($result)) {
                echo "<tr class=''>";
                echo "<td class=''>" . $res['Ticket_Id'] . "</td>";
                echo "<td>" . $res['Ticket_Charge'] . "</td>";
                echo "<td>" . $res['Ticket_Type'] . "</td>";
                echo "<td>" . $res['Ticket_Date'] . "</td>";
                echo "<td>" . $res['Ticket_Description'] . "</td>";
                echo "<td><a href=\"editwith.php?wit=$res[Payment_Id]\" onClick=\"return confirm('Are you sure you want to edit?')\" class='btn btn-warning fa fa-pencil'></a></td>";
                echo "<td><a href=\"delete.php?us=$res[Payment_Id]\" onClick=\"return confirm('Are you sure you want to delete?')\" class='btn btn-danger fa fa-trash'></a></td>";
            

            }
            ?>
            </tbody>
            <tfoot class="bg-info">
            <th>Ticket Id</th>
            <th>Amount Paid</th>
            <th>Ticket Type</th>
            <th>Date Purchased</th>
            <th>Description</th>
            <th></th>
            <th></th>

            </tfoot>
        </table>
    </div>
<!-- -->
<?php include "footer.php";?>
