<?php
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

$self = $_POST['self'];

$mailTo = 'chaseecummings@gmail.com';
$subject = 'Message from Pi-Website visitor: ' . $name;

$body = 'From: ' . $name . "\n";
$body .= 'Email: ' . $email . "\n\n";
$body .= $message;

$header = "From: $email\r\n";
$header .= "Reply-To: $email\r\n";

$mail_status = mail($mailTo, $subject, $body, $header);
if($self) {
    $self_status = mail($email, $subject, $body, $header);
}

if($mail_status) {
} else { ?>
    <script language="javascript" type="text/javascript">
        alert('Message failed to send');
        window.location = '/';
    </script>
<?php
}
?>
