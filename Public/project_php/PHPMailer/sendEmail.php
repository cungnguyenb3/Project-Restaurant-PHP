<?php
function sendMail($mailTo, $bodyContent, $mailSubject) {
    require '../PHPMailer/PHPMailerAutoload.php';

    $mail = new PHPMailer;

    $mail->isSMTP();                                   // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                            // Enable SMTP authentication
    $mail->Username = 'phuchung996@gmail.com';          // SMTP username
    $mail->Password = 'abcd@1234'; // SMTP password
    $mail->SMTPSecure = 'tls';                         // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                 // TCP port to connect to

    $mail->setFrom('phuchung996@gmail.com', 'DCT SPORTS');
    $mail->addReplyTo('phuchung996@gmail.com', 'DCT SPORTS');
    $mail->addAddress($mailTo);   // Add a recipient
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    $mail->isHTML(true);  // Set email format to HTML
    $mail->Subject = $mailSubject;
    $mail->Body = $bodyContent;

    if (!$mail->send()) {
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        
    }
}
?>

