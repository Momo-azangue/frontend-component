<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>

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

    $mail->isHTML(true);

    $mail->Subject = $_POST['subject'];
    $mail->Body = $_POST['message'];


    $mail->Send();

if($mail){
    ?>
    <!-- // display a success message if once mail sent successfully  -->
<div class="alert alert-success text-center ">
    <?php echo "Your mail sent successfully to $recipient "?>
</div>
    <?php
}else{
    ?>
    <!-- // display an alert message if somehow mail can't be sent   -->
<div class="alert alert-danger text-center ">
    <?php echo "Failed while sending your mail!"?>
</div>
    <?php

}

}

header("Location: index.php");
exit();

?>