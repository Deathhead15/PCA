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
        $dbpassword = $row['password'];
        $dbconfirm = $row['confirm'];
    }
    if($username==$dbusername&&$password==$dbpassword&&$confirmcode==$dbconfirm)
    {
        $actquery = mysqli_query($conn, "UPDATE `$batchyear` SET activated=1 WHERE email='$dbusername'");
        if(!$actquery){
            echo '<script>';
            echo 'alert("Record is not updated!");';
            echo '</script>';
        } else {
            @$_SESSION ['username'] = $username;
            echo '<script>';
            echo 'alert("Your account is confirmed!");';
            echo 'window.location.href = "index.php";';
            echo '</script>';
            //header("Location:index.php");
            //die("Error 2");
        }
    }
    else{
        echo '<script>';
        echo 'alert("You have inputted an invalid username, password or code!");';
        echo 'location.href = "activation.php";';
        echo '</script>';
        //header("Location:activation.php");
        //exit;
    }
} else {
    echo '<script language="javascript">';
    echo 'alert("User does not exists!");';
    echo 'location.href = "activation.php"';
    echo '</script>';
    //header("Location:activation.php");
    //exit;
}


