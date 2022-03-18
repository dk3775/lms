<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';

function domail( $to,$toname, $subject, $body, $attachment = '', $cc = '', $bcc = '' ) {
    $mail = new PHPMailer(true);
    //Server settings
    try {
        $mail->SMTPDebug = 0;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.hostinger.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'no-reply@lms.titanslab.in';                     //SMTP username
        $mail->Password   = '#TitansDKALAJdedenge79';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;
        $mail->addCustomHeader('MIME-Version', '1.0');
        $mail->addCustomHeader('DATE', date('r'));

        //Recipients
        $mail->setFrom('no-reply@lms.titanslab.in', 'Learning Management System');
        $mail->addAddress( $to, $toname );     // Add a recipient
        if ( $cc != '' ) {
            $mail->addCC( $cc );
        }
        if ( $bcc != '' ) {
            $mail->addBCC( $bcc );
        }

        // Attachments
        if ( $attachment != '' ) {
            $mail->addAttachment( $attachment,"QueryDocument" );         // Add attachments
        }

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = $body."<br><br>Thanks & Regards,<br><a href='lms.titanslab.in'>Learning Management System<br></a><h5>This was automatically generated email, Please do not reply.</h5>";
        $mail->AltBody = strip_tags($body);

        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
//        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}