<?php 


require '../phpmailer/src/PHPMailer.php';
require '../phpmailer/src/Exception.php';
require '../phpmailer/src/SMTP.php';


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;


if(isset($_POST['send'])){
    $mail= new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail-> SMTPAuth = true;
    $mail->Username ='azanguewill@gmail.com';
    $mail->Password = 'hszkplyonwzizggk';
    $mail->SMTPSecure = 'ssl';
    $mail->Port= 465;
    
    $mail->setFrom('azanguewill@gmail.com');

    $mail->addAddress($_POST['email']);
    $mail->addAddress($_POST['name']);

    $mail->isHTML(true);

    $mail->Subject = $_POST['subject'];
    $mail->Body = $_POST['message'];


    $mail->Send();
    echo(
    "<srcipt>
    alert('sent successfully');
    document.location.href = 'index.php'
    </srcipt>")
    ;


}


?>