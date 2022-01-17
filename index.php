<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style type="text/css">
        input, textarea {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container" style="margin-top:100px;">
        <div class="row justify-content-center">
            <div class="col-md-6 col-md-offset-3" align="center">

                <?php
    if(isset($_POST['submit'])){ // this send the information when clicking the send button

require_once 'PHPMailer/PHPMailerAutoload.php'; // this is connecting to folder phpmailer to allow emails to be sent

$mail = new PHPMailer; // this also connects to allow email to send

$email = $_POST['email']; // this connects the form to for example name="email"
$name = $_POST['name'];  // this connects to name="name"
$text = $_POST['body']; // this to name="message"
$subject = $_POST['subject']; // this to name="subject" 
//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'elebuteimisioluwa@gmail.com';                 // SMTP username
$mail->Password = 'Wisdom123';                           // SMTP password
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to

$mail->From = $email;
$mail->FromName = $name;
$mail->addAddress('elebuteimisioluwa@gmail.com', 'Change this');     // Add a recipient
$mail->addAddress('');               // Name is optional
$mail->addReplyTo = $email;
$mail->addCC('elebuteimisioluwa@gmail.com');
$mail->addBCC('');

$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = $subject;
$mail->Body    = $text;
$mail->AltBody = $text;

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}
}?>

				<form method="post">
				<input name="name" placeholder="Name" class="form-control">
                <input name="email" placeholder="Email" class="form-control">
                <input name="subject" placeholder="Subject" class="form-control">
                <textarea class="form-control" name="body" placeholder="Email Body"></textarea>
                <input type="submit" name="submit" value="Send An Email" class="btn btn-primary">
				</form>
            </div>
        </div>
    </div>

    <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    
</body>
</html>