<?php

use PHPMailer\PHPMailer\PHPMailer;
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/Exception.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $email2 = "anazonwuifeatu@gmail.com";
    $subject = "$fname";
    $mail = new \PHPMailer\PHPMailer\PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.elasticemail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'anazonwuifeatu@gmail.com';
        $mail->Password = 'A194CBFD5DA8B41F72A622E42842CEB718D9';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 2525;

        $mail->AddReplyTo($email);
        $mail->From = $email2;
        $mail->FromName = $fname;
        $mail->addAddress('anazonwuifeatu@gmail.com', 'Admin');

        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $message;

        $mail->send();
        echo "Message sent successfully!";
    } catch (\PHPMailer\PHPMailer\Exception $e) {
        echo "Email failed: {$mail->ErrorInfo}";
    }
}
