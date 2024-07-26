<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $days = $_POST['Day'];
    $accommodation = $_POST['Accommodation'];
    $kids = $_POST['Kids'];
    $adults = $_POST['Adults'];
    $message = $_POST['message'];

    $mail = new PHPMailer(true);
    
    try {
        //Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com'; // Set the SMTP server to send through
        $mail->SMTPAuth   = true;
        $mail->Username   = 'tourssunshine5@gmail.com'; // SMTP username
        $mail->Password   = 'losi xcoi qpty hoeo'; // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        //Recipients
        $mail->setFrom('tourssunshine5@gmail.com', 'Sun Shine Travels and Tours');
        $mail->addAddress('sunshinetourshr@gmail.com'); // Add a recipient

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'New Inquiry from ' . $name;
        $mail->Body    = "<p>You have received a new inquiry from:</p>
                          <p>Name: $name</p>
                          <p>Email: $email</p>
                          <p>Days: $days</p>
                          <p>Accommodation: $accommodation</p>
                          <p>Kids: $kids</p>
                          <p>Adults: $adults</p>
                          <p>Message: $message</p>";

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
} else {
    echo "Invalid request method.";
}
?>
