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
//GENERATE TICKET CODE

$chars = array(0,1,2,3,4,5,6,7,8,9);
$serial = '';
$max = count($chars)-1;
for($i=0;$i<15;$i++){
    $serial .= (!($i % 5) && $i ? '' : '').$chars[rand(0, $max)];
}
/**
 * Created by PhpStorm.
 * User: king
 * Date: 17/10/2017
 * Time: 13:03
 */


if(count($_POST)>0) {

    $Ticket_Id_=$serial;
    $Ticket_Count_=$_POST['Ticket_Count'];
    $Ticket_Charge_=$_POST['Ticket_Charge'];
    $Ticket_Type_=$_POST['Ticket_Type'];
    $Ticket_Code_=$id;
    $Ticket_Description_=$_POST['Ticket_Description'];
    $Ticket_Date_=$_POST['Ticket_Date'];
    $Ticket_Game_Id_=$_POST['Ticket_Game_Id'];
    $Ticket_Seat_=$_POST['Ticket_Seat'];


    $Payment_Id_=$_POST['Payment_Id'];
    $Payment_Amount_=$_POST['Payment_Amount'];
    $Payment_Mode_=$_POST['Payment_Mode'];

    $Ticket_Payment_Payment_Id_=$_POST['Payment_Id'];
    $Ticket_Payment_Ticket_Id_=$serial;


    $sql = "INSERT INTO Ticket(Ticket_Id,Ticket_Count ,Ticket_Code,Ticket_Charge,Ticket_Type,Ticket_Description,Ticket_Date,Ticket_Seat,Ticket_Game_Id )
VALUES ('$Ticket_Id_', '$Ticket_Count_', '$Ticket_Code_','$Ticket_Charge_', '$Ticket_Type_', '$Ticket_Description_',NOW(),'$Ticket_Seat_','$Ticket_Game_Id_');";
    $sql .= "INSERT INTO Payment(Payment_Id, Payment_Amount, Payment_Mode,Payment_Date)
VALUES ('$Payment_Id_', '$Payment_Amount_', '$Payment_Mode_',NOW());";
    $sql .= "INSERT INTO Ticket_Payment (Ticket_Payment_Payment_Id, Ticket_Payment_Ticket_Id)
VALUES ('$Payment_Id_', '$Ticket_Payment_Ticket_Id_')";

    if ($con->multi_query($sql) === TRUE) {

        $msg = "<div class='alert alert-success'>
						<span class='glyphicon glyphicon-info-sign'></span> &nbsp; successfully registered !
					</div>";
        ?>

        <p align="center">
            <meta content="2;index.php?action=home" http-equiv="refresh" />
        </p>

        <?php
    } else {
        $msg = "<div class='alert alert-danger'>
						<span class='glyphicon glyphicon-info-sign'></span> &nbsp; error while registering + $sql!
					</div>";
    }

    $con->close();

}

?>
<?php include "hd.php";?>
<!-- -->
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
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
        </div>

        <div class="form-group">
            <label for="Ticket_Type">Ticket Type:</label>
            <select name="Ticket_Type" id="Ticket_Type" class="form-control" onchange="check();">
                <option value="VIP" class="form-control">VIP</option>
                <option value="REGULAR" selected class="form-control">Regular</option>
            </select>
        </div>
        <div class="form-group" >
            <label id="Ticket_Charge" >Charges:</label>
            <input class="form-control" name="Ticket_Charge" id="Ticket_Charge" required>
        </div>
        <div class="form-group">
            <label id="" >Seat Number</label>
            <input class="form-control" name="Ticket_Seat" id=""  required>
        </div>
        <div class="form-group" hidden>
            <label id="" readonly="">Game Info!</label>
            <input class="form-control" name="Ticket_Game_Id" id="Ticket_Game_Id" value="<?php echo $_GET['complete'];?>" required="">
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
<?php include "footer.php";?>
