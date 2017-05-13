<?php
require 'PHPMailer-master/PHPMailerAutoload.php';


    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $mail = new PHPMailer;
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';                             // Specify main and backup server
    $mail->SMTPAuth = true;                                     // Enable SMTP authentication
    $mail->Username = 'pcacademy1952@gmail.com';                   // SMTP username
    $mail->Password = 'academy1952';                             // SMTP password
    $mail->SMTPSecure = 'tls';                                  // Enable encryption, 'ssl' also accepted
    $mail->Port = 587;                                          //Set the SMTP port number - 587 for authenticated TLS
    $mail->addReplyTo($email, '');                                  //Set an alternative reply-to address
    $mail->addAddress('');                                      // Name is optional
    $mail->addCC('');
    $mail->addBCC('pcacademy1952@gmail.com');
    $mail->WordWrap = 100;                                        // Set word wrap to 50 characters
    $mail->addAttachment('');                                    // Add attachments
    $mail->addAttachment('', '');                               // Optional name
    $mail->isHTML(true);                                        // Set email format to HTML
    $mail->Body    = 'This is the Test Email message <b>in bold!</b>';
    $mail->AltBody = 'This is the Test Email message in bold!';
    $mail->setFrom($email);                 //Set who the message is to be sent from
    $mail->Subject = $subject;
    $mail->addAddress('aapcahome1952@gmail.com', '');
    $mail->msgHTML($message);

    if (!$mail->send()) {
        echo '<script language="javascript">';
        echo 'alert("Message Problem!");';
        echo 'location.href = "contact.php";';
        echo '</script>';
        exit;
    } else {
        echo '<script language="javascript">';
        echo 'alert("Your message has been received!");';
        echo 'location.href = "contact.php";';
        echo '</script>';
        //header("Location:contact.php");
        //exit;
    }
