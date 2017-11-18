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

        case 1:
            header('location:../admin/index.php');//redirect to  page
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

$resultC = mysqli_query($con, "SELECT * FROM Ticket WHERE Ticket_Code='$id'");
while($resultC = mysqli_fetch_array($resultC))
{
    $Ticket_Game_Id_= $resultC['Ticket_Game_Id'];

}

$resultX = mysqli_query($con, "SELECT * FROM Game WHERE Game_Id='$Ticket_Game_Id_'");
while($resultX = mysqli_fetch_array($resultX))
{
    $Game_Type_ = $resultX['Game_Type'];
    $Game_DateTime_ = $resultX['Game_DateTime'];

}
?>

    <div class="box-header">
        <h1 class="box-title" style="font-family:Consolas; font-size: small"><b>TICKET DATE:</b> <?php echo "$Game_DateTime_"; ?></h1>
        <h3 class="box-title" style="font-family:Consolas; font-size: small"><b>GAME PAID FOR: <?php echo "$Game_Type_"; ?> </b></h3>
    </div>
    <div class="box-body">
        <table class="table table-striped table-hover table-condensed" width="50%" border="1" id="table1" style="font-family: consolas; font-size: small">
            <thead class="bg-success">
            <th style="font-family: 'Britannic Bold';color: green"><b>DATE</b></th>
            <th style="color: indianred">Game Paid For</th>
            <th>Seat</th>
            <th>Ticket Id</th>
            <th>Amount Paid</th>
            <th>Ticket Type</th>
            <th>Date Purchased</th>
            <th>Description</th>
            </thead>
            <tbody>

            <?php
                $result = mysqli_query($con, "SELECT * FROM Ticket WHERE Ticket_Code='$id'");
                //while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array
                while ($res = mysqli_fetch_array($result)) {
                    echo "<tr class=''>";
                    echo "<td style='color: green' class=''>" . $Game_DateTime_ . "</td>";
                    echo "<td style='color: indianred' class=''>" . $Game_Type_ . "</td>";
                    echo "<td class=''>" . $res['Ticket_Seat'] . "</td>";
                    echo "<td class=''>" . $res['Ticket_Id'] . "</td>";
                    echo "<td>" . $res['Ticket_Charge'] . "</td>";
                    echo "<td>" . $res['Ticket_Type'] . "</td>";
                    echo "<td>" . $res['Ticket_Date'] . "</td>";
                    echo "<td>" . $res['Ticket_Description'] . "</td>";
            }
            ?>
            </tbody>
            <tfoot class="bg-info">
            <th style="font-family: 'Britannic Bold';color: green"><b>DATE</b></th>
            <th style="color: indianred">Game Paid For</th>
            <th>Seat</th>
            <th>Ticket Id</th>
            <th>Amount Paid</th>
            <th>Ticket Type</th>
            <th>Date Purchased</th>
            <th>Description</th>
            </tfoot>
        </table>
    </div>
<!-- -->
<?php include "footer.php";?>
