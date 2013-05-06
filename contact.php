<?php
$f_name = $_POST['name'];
$f_email = $_POST['email'];
$f_message = $_POST['message'];

$f_self = $_POST['self'];
print_r($f_self);

if($f_self == 'send') {
    mail($f_email, $subject, $body, $header);
}

$mail_to = 'chaseecummings@gmail.com';
$subject = 'Message from Pi-Website visitor: ' . $f_name;

$body = 'From: ' . $f_name . "\n";
$body .= 'Email: ' . $f_email . "\n\n";
$body .= $f_message;
$body = wordwrap($body, 70, "\r\n");

$header = "From: $f_email\r\n";
$header .= "Reply-To: $f_email\r\n";

?><script language="javascript" type="text/javascript">
        //window.location = '/';
    </script><?php

//$mail_status = mail($mail_to, $subject, $body, $header);

if($mail_status) {
} else { ?>
    <script language="javascript" type="text/javascript">
        alert('Message failed to send');
        window.location = '/';
    </script>
<?php
}
?>
