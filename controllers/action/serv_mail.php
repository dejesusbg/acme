<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

date_default_timezone_set('Etc/UTC');

require_once __DIR__ . '/../../libs/PHPMailer/src/Exception.php';
require_once __DIR__ . '/../../libs/PHPMailer/src/PHPMailer.php';
require_once __DIR__ . '/../../libs/PHPMailer/src/SMTP.php';

function send_mail($email, $to, $subject, $html, $alt)
{
    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;

    // host 
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPAuth = true;

    // account
    $mail->Username = 'acmeballot@gmail.com';
    $mail->Password = 'skvi okzk aljy dycg';

    // recipients
    $mail->setFrom('mailer@acme.com', 'Correos ACME');
    $mail->addReplyTo('mailer@acme.com', 'Correos ACME');
    $mail->addAddress($email, $to);

    // body
    $mail->Subject = $subject;

    $mail->msgHTML($html, __DIR__);

    $mail->AltBody = $alt;

    // send the message, check for errors
    if (!$mail->send()) {
        $res = 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        $res = 'Message sent!';
    }

    return $res;
}

