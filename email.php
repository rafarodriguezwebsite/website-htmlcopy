<?php

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                                       // Enable verbose debug output
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->SMTPSecure = 'ssl';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 465;                                    // TCP port to connect to

    //Account
    $mail->Username   = 'rafarodriguezwebsite@gmail.com';       // SMTP username
    $mail->Password   = 'fonda315';                             // SMTP password

    //Recipients
    $mail->setFrom('rafarodriguezwebsite@gmail.com', htmlspecialchars($_POST['name']));
    $mail->addAddress('ethan.sifferman@gmail.com', 'Rafa Rodriguez');     // Add a recipient
    $mail->addReplyTo(htmlspecialchars($_POST['mail']), htmlspecialchars($_POST['name']));
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('rafarodriguezwebsite@gmail.com');

    // Content
	$mail->isHTML(true);                                  // Set email format to HTML
	if (htmlspecialchars($_POST["subject"])=="Other")
		$subject = htmlspecialchars($_POST["reason"]);
	else
		$subject = htmlspecialchars($_POST["subject"]);
    $mail->Subject = $subject;
	
    $mail->Body    = htmlspecialchars($_POST['comment']);

    $mail->send();
    echo "
	<script>
		alert('Message sent. Expect a reply within 24 hours.')
	</script>
	";
	
	
} catch (Exception $e) {
    echo "
	<script>
		alert('Message not sent. Be sure to fill all areas.')
	</script>
	";
}

?>

<script>
close();
</script>