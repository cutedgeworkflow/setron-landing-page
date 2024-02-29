<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_OFF;  // Enable verbose debug output (set to DEBUG_SERVER for debugging)
        $mail->isSMTP();                      // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';  // Your SMTP server
        $mail->SMTPAuth   = true;             // Enable SMTP authentication
        $mail->Username   = 'raossachin37@gmail.com';   // SMTP username
        $mail->Password   = 'lixi cfvn figd ovml';   // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;  // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
        $mail->Port       = 587;              // TCP port to connect to

        //Recipients
        $mail->setFrom('setronhome@gmail.com', 'Setron');
        $mail->addAddress('setronhome@gmail.com');  // Recipient's email
        
        //Content
        $mail->isHTML(true);
        $mail->Subject = 'Contact Form Submission';
        $mail->Body    = "Name: $name <br> LastName: $lname <br>Email: $email <br> Contact No.: $phone<br>Message: $message";
        $mail->send();
        echo "success";
    } catch (Exception $e) {
        echo "error: {$mail->ErrorInfo}";
    }
} else {
    echo "Invalid request.";
}
?>
