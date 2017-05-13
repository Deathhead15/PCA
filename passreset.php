<?php
require_once 'connect.php';

$select_db = mysqli_select_db($conn, 'batch') or die($dberror2);

$username = $_POST['email'];
$password = $_POST['password'];
$confirmcode = $_POST['actcode'];
$batchyear = $_POST['year'];

$q = "SELECT * FROM  `$batchyear` WHERE  `email` = '$username'";
$query = mysqli_query($conn, $q);
$numrows = mysqli_num_rows($query);
if($numrows!==0)
{
    while($row = mysqli_fetch_assoc($query))
    {
        $dbusername = $row['email'];
        $dbconfirm = $row['confirm'];
    }
    if($username==$dbusername&&$confirmcode==$dbconfirm)
    {
        $actquery = mysqli_query($conn, "UPDATE `$batchyear` SET password='$password' WHERE email='$dbusername'");
        if(!$actquery){
            echo '<script>';
            echo 'alert("Record is not updated!");';
            echo '</script>';
        } else {
            @$_SESSION ['username'] = $username;
            echo '<script>';
            echo 'alert("Password Reset Successful!");';
            echo 'window.location.href = "index.php";';
            echo '</script>';
        }
    }
    else{
        echo '<script>';
        echo 'alert("You have inputted an invalid email, password or confirm code!");';
        echo 'location.href = "forgot.php";';
        echo '</script>';
    }
} else {
    echo '<script language="javascript">';
    echo 'alert("User does not exists!");';
    echo 'location.href = "forgot.php"';
    echo '</script>';
}


