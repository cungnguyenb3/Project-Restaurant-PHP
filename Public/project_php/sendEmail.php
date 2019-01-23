<?php
// function sendMail($mailTo, $bodyContent, $mailSubject) {
//     require '../PHPMailer/PHPMailerAutoload.php';

//     $mail = new PHPMailer;

//     $mail->isSMTP();                                   // Set mailer to use SMTP
//     $mail->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers
//     $mail->SMTPAuth = true;                            // Enable SMTP authentication
//     $mail->Username = 'phuchung996@gmail.com';          // SMTP username
//     $mail->Password = 'abcd@1234'; // SMTP password
//     $mail->SMTPSecure = 'tls';                         // Enable TLS encryption, `ssl` also accepted
//     $mail->Port = 587;                                 // TCP port to connect to

//     $mail->setFrom('phuchung996@gmail.com', 'DCT SPORTS');
//     $mail->addReplyTo('phuchung996@gmail.com', 'DCT SPORTS');
//     $mail->addAddress($mailTo);   // Add a recipient
//     //$mail->addCC('cc@example.com');
//     //$mail->addBCC('bcc@example.com');

//     $mail->isHTML(true);  // Set email format to HTML
//     $mail->Subject = $mailSubject;
//     $mail->Body = $bodyContent;

//     if (!$mail->send()) {
//         echo 'Mailer Error: ' . $mail->ErrorInfo;
//     } else {
        
//     }
// }
include "./PHPMailer-master/src/PHPMailer.php";
include "./PHPMailer-master/src/Exception.php";
include "./PHPMailer-master/src/OAuth.php";
include "./PHPMailer-master/src/POP3.php";
include "./PHPMailer-master/src/SMTP.php";
 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'tranngochung1302@gmail.com';                 // SMTP username
    $mail->Password = '0965243205';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to
 
    //Recipients
    $mail->setFrom($_POST['email'], 'Cozastore');
    $mail->addAddress('hung.tran.ngoc@student.passerellesnumeriques.org');     // Add a recipient
    // $mail->addAddress('ellen@example.com');               // Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    $mail->addCC('cung.nguyen@student.passerellesnumeriques.org');
    // $mail->addBCC('bcc@example.com');
 
    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
 
    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Feedback From Customer';
    $mail->Body    = "Email: ".$_POST['email']." has sent you a Message: <br>".$_POST['msg'];
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
 
    $mail->send();
    echo 'Message has been sent';
    header('Location: contact.php?sent=pass');
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    header('Location: contact.php?sent=fail');
}
?>

