<?php 

$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true); // Passing `true` enables exceptions

try {
    $mail->CharSet = 'utf-8';

    $mail->isSMTP();                                      
    $mail->Host = 'smtp.gmail.com';  
    $mail->SMTPAuth = true;                               
    $mail->Username = 'caroline.sanders1990@gmail.com'; 
    $mail->Password = 'uksqzidysutzjxtl'; 
    $mail->SMTPSecure = 'tls';                            
    $mail->Port = 587;                                    

    $mail->setFrom('caroline.sanders1990@gmail.com', 'Pulse');
    $mail->addAddress('henopob583@aaorsi.com');

    $mail->isHTML(true);                                

    $mail->Subject = 'Данные';
    $mail->Body    = '
            Пользователь оставил данные <br> 
        Имя: ' . $name . ' <br>
        Номер телефона: ' . $phone . '<br>
        E-mail: ' . $email . '';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>
