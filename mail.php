<?php
declare(strict_types=1);
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once('vendor/autoload.php');
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

function domail( $to,$toname, $subject, $body, $attachment = '', $cc = '', $bcc = '' ) {
    $mail = new PHPMailer(true);
    //Server settings
    try {
        $mail->SMTPDebug = 0;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = $_ENV['SMTP_HOST'];                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = $_ENV['SMTP_USER'];                     //SMTP username
        $mail->Password   = $_ENV['SMTP_PASS'];                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = $_ENV['SMTP_PORT'];                     //Set the SMTP port
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
        $mail->Body    = $body."<br><br>Thanks & Regards,<br><a href='https://lms.titanslab.in'>Learning Management System<br></a><h5>This was automatically generated email, Please do not reply.</h5>";
        $mail->AltBody = strip_tags($body);

        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
//        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}