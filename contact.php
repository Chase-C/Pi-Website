<?php
$f_name = $_POST['name'];
$f_email = $_POST['email'];
$f_message = $_POST['message'];

$f_self = $_POST['self'];

$mailTo = 'chaseecummings@gmail.com';
$subject = 'Message from Pi-Website visitor: ' . $f_name;

//$body = 'From: ' . $f_name . "\n";
//$body .= 'Email: ' . $f_email . "\n\n";
//$body .= $f_message;
$body = "Test\r\nMessage\r\nYo";

$header = "From: $email\r\n";
$header .= "Reply-To: $email\r\n";

$mail_status = mail($mailTo, $subject, $body);
if($f_self) {
    $self_status = mail($email, $subject, $body);
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
