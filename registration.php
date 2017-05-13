<?php
require_once 'email.php';
require_once 'connect.php';

$select_db = mysqli_select_db($conn, 'batch') or die($dberror2);

$batchyear = $_POST['year'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$password = $_POST['pass1'];
$address = $_POST['address'];
$cellular = $_POST['cellphone'];
$telephone = $_POST['telephone'];
$birthday = $_POST['birthday'];
$email = $_POST['emailreg'];
$confirm = "P" . mt_rand(1,9) . "C" . mt_rand(1,9) . "A" . mt_rand(1,9);


$equery = "SELECT * FROM `$batchyear` WHERE `email`='$email'";
$qrow = mysqli_query($conn, $equery);
$numrows = mysqli_num_rows($qrow);
if ($numrows!==0) {
    echo '<script>';
    echo 'alert("Email Address has already been used! \n Please use a new one or click forgot your password.");';
    echo 'location.href = "index.php";';
    echo '</script>';
} else {

    //$chk = "SELECT * FROM $batchyear WHERE lastname='$lastname' AND firstname='$firstname'";
    $chk = "SELECT * FROM  `$batchyear` WHERE  `lastname` =  '$lastname' AND `firstname` =  '$firstname'";

    if (!mysqli_query($conn, $chk)) {
        echo '<script>';
        echo 'alert("There is no student on that Batch Year! \n Please check your Batch Year.");';
        echo 'location.href = "index.php";';
        echo '</script>';
    } else {
        $upup = "UPDATE `$batchyear` SET `password`='$password',`email`='$email', `birthday`='$birthday', `address`='$address',`cellular`='$cellular',`telephone`='$telephone',`confirm`='$confirm' WHERE  `lastname` =  '$lastname' AND `firstname` =  '$firstname'";
        if (!mysqli_query($conn, $upup)) {
            echo '<script>';
            echo 'alert("Update Problem!");';
            //echo 'location.href = "index.php";';
            echo '</script>';
        } else {
            $mail->addAddress($email, '');
            $mail->msgHTML("Please confirm your account using this code: " . $confirm . "\n");

            if (!$mail->send()) {
                echo '<script language="javascript">';
                echo 'alert("Activation Code could not be sent."' . $mail->ErrorInfo . ');';
                echo '</script>';
                exit;
            } else {
                echo '<script language="javascript">';
                echo 'alert("Activation Code has been sent to: "' . $email . ');';
                echo 'location.href = "activation.php";';
                echo '</script>';
                header("Location:activation.php");
                exit;
            }
        }
    }
}

