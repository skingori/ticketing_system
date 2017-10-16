<?php
/**
 * Created by PhpStorm.
 * User: king
 * Date: 16/10/2017
 * Time: 14:07
 */
$con = mysqli_connect("localhost","root","root","ticketing");
// Check connection
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
