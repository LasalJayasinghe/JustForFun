<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require 'includes/PHPMailer.php';
require 'includes/SMTP.php';

class sendpassword extends Controller{

    public function index(){
        // generated password
        if($_SESSION['type'] == 'admin'){
            $username = $_SESSION['newadmin']['username'];
            $email = $_SESSION['newadmin']['email'];
            $password = $_SESSION['newadmin']['password'];
            $subject = 'New Admin password generator';
            $type = 'admininstrator';
        }elseif($_SESSION['type'] == 'station'){
            $name = $_SESSION['newoperator']['name'];
            $username = $_SESSION['newoperator']['code'];
            $email = $_SESSION['newoperator']['email'];
            $password = $_SESSION['newoperator']['password'];
            $subject = 'New Operator password generator';
            $type = 'operator';
        }
        //Import PHPMailer classes into the global namespace
        
        //Create a new PHPMailer instance
        $mail = new PHPMailer();
        
        //Tell PHPMailer to use SMTP
        $mail->isSMTP();
        
        //Enable SMTP debugging
        //SMTP::DEBUG_OFF = off (for production use)
        //SMTP::DEBUG_CLIENT = client messages
        //SMTP::DEBUG_SERVER = client and server messages
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;
        
        //Set the hostname of the mail server
        $mail->Host = 'smtp.gmail.com';
        
        $mail->SMTPAuth = "true";
        $mail->SMTPSecure = "tls";
        
        //Use `$mail->Host = gethostbyname('smtp.gmail.com');`
        //if your network does not support SMTP over IPv6,
        //though this may cause issues with TLS
        
        //Set the SMTP port number:
        // - 465 for SMTP with implicit TLS, a.k.a. RFC8314 SMTPS or
        // - 587 for SMTP+STARTTLS
        //$mail->Port = 465;
        $mail->Port = "587";
        //Set the encryption mechanism to use:
        // - SMTPS (implicit TLS on port 465) or
        // - STARTTLS (explicit TLS on port 587)
        //$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        
        //Whether to use SMTP authentication
        $mail->SMTPAuth = true;
        
        //Username to use for SMTP authentication - use full email address for gmail
        $mail->Username = 'fuel.up.pr@gmail.com';
        
        //Password to use for SMTP authentication
        $mail->Password = 'exumgxhgethpjnxf';
        //Set who the message is to be sent from
        //Note that with gmail you can only use your account address (same as `Username`)
        //or predefined aliases that you have configured within your account.
        //Do not use user-submitted addresses in here
        $mail->setFrom('fuel.up.pr@gmail.com', 'FuelUp Password Service');
        
        //Set an alternative reply-to address
        //This is a good place to put user-submitted addresses
        $mail->addReplyTo('fuel.up.pr@gmail.com', 'FuelUp Password Service');
        
        //Set who the message is to be sent to
        $mail->addAddress($email, $email);
        
        //Set the subject line
        $mail->Subject = $subject;
        
        //Read an HTML message body from an external file, convert referenced images to embedded,
        //convert HTML into a basic plain-text alternative body
        //$mail->msgHTML(file_get_contents('contents.html'), __DIR__);
        
        //Replace the plain text body with one created manually
        $mail->Body = 'Hello '.$name.',Your '.$type.' account username/code is '.$username.' and password is '.$password;
        
        //Attach an image file
        //$mail->addAttachment('images/phpmailer_mini.png');
        
        //send the message, check for errors
        if (!$mail->send()) {
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo 'Message sent!';
            if($type=='admininstrator'){
                unset($_SESSION['newadmin']);
                redirect('admin_dashboard');
            }elseif($type=='operator'){
                unset($_SESSION['newoperator']);
                unset($_POST);
                redirect('operators');
            }
        }
    }

}


