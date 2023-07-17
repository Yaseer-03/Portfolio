 <!-- <?php
if(!empty($_POST["send"])){
$name = $_POST["name"];
$email = $_POST["email"];
$message = $_POST["message"];
$toEmail = $_POST["yaseeralur03@gmail.com"];

$mailHeaders = "Name: " . $name .
"\r\n Email: " . $email .
"\r\n Message: " . $message . "\r\n";

if(mail($toEmail,$name,$mailHeaders)){
    $message = "Your Information is Received Successfully";
}
}
?> -->

<!-- <?php
if (!empty($_POST["send"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Validate and sanitize user inputs
    $name = filter_var($name, FILTER_SANITIZE_STRING);
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $message = filter_var($message, FILTER_SANITIZE_STRING);

    // Define the recipient's email address
    $toEmail = "yaseeralur03@gmail.com";

    // Properly format the email headers
    $subject = "Contact Form Submission from $name";
    $headers = "From: $email\r\n" .
               "Reply-To: $email\r\n" .
               "X-Mailer: PHP/" . phpversion();

    // Attempt to send the email and handle the result
    if (mail($toEmail, $subject, $message, $headers)) {
        $message = "Your information has been received successfully. We will get back to you shortly.";
    } else {
        $message = "Oops! Something went wrong. Please try again later.";
    }
}
?> -->


//Include PHPMailer library
require 'path_to_phpmailer/PHPMailerAutoload.php';


if (!empty($_POST["send"])) {
    // Retrieve and sanitize user inputs
    $name = filter_var($_POST["name"], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $message = filter_var($_POST["message"], FILTER_SANITIZE_STRING);

    // Define the recipient's email address
    $toEmail = "yaseeralur03@gmail.com";

    // Create a new PHPMailer instance
    $mail = new PHPMailer;

    // Set up the PHPMailer configurations
    $mail->isSMTP();
    $mail->Host = 'your_smtp_host';
    $mail->SMTPAuth = true;
    $mail->Username = 'your_smtp_username';
    $mail->Password = 'your_smtp_password';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    // Set the sender and recipient
    $mail->setFrom($email, $name);
    $mail->addAddress($toEmail);

    // Set email subject and body
    $mail->Subject = "Contact Form Submission from $name";
    $mail->Body = $message;

    // Attempt to send the email and handle the result
    if ($mail->send()) {
        $message = "Your information has been received successfully. We will get back to you shortly.";
    } else {
        $message = "Oops! Something went wrong. Please try again later. Error: " . $mail->ErrorInfo;
    }
}
