<?php
require_once 'email24.php';
require_once 'connect.php';

$select_db = mysqli_select_db($conn, 'batch') or die($dberror2);

$batchyear = $_POST['year'];
$email = $_POST['email'];
$confirm = "P" . mt_rand(1,9) . "C" . mt_rand(1,9) . "A" . mt_rand(1,9);

$upup = "UPDATE `$batchyear` SET `confirm`='$confirm' WHERE `email`='$email'";

    if (!mysqli_query($conn, $upup)) {
        echo '<script>';
        echo 'alert("There is no account on that Batch Year! \n Please check your Batch Year.");';
        echo 'location.href = "index.php";';
        echo '</script>';
    } else {
        $mail->addAddress($email, '');
        $mail->msgHTML("To reset your password use this code: " . $confirm . "\n");

        if (!$mail->send()) {
            echo '<script language="javascript">';
            echo 'alert("Reset Code could not be sent."' . $mail->ErrorInfo . ');';
            echo '</script>';
            exit;
        } else {
            echo '<script language="javascript">';
            echo 'alert("Activation Code has been sent to: "' . $email . ');';
            echo 'location.href = "activation.php";';
            echo '</script>';
            header("Location:forgot.php");
            exit;
        }
    }


