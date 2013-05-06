<?php
$f_name = $_POST['name'];
$f_email = $_POST['email'];
$f_message = $_POST['message'];

$f_self = $_POST['self'];
print_r($f_self);

$mail_to = 'chaseecummings@gmail.com';
$subject = 'Message from website visitor: ' . $f_name;

$body = 'From: ' . $f_name . "\n";
$body .= 'Email: ' . $f_email . "\n\n";
$body .= $f_message;
$body = wordwrap($body, 70, "\r\n");

$header = "From: $f_email\r\n";
$header .= "Reply-To: $f_email\r\n";

?><script language="javascript" type="text/javascript">
    window.location = '/';
</script><?php

if(!mail($mail_to, $subject, $body, $header)) { ?>
    <script language="javascript" type="text/javascript">
        alert('Message failed to send');
    </script>
<?php
}

if($f_self == 'send') {
    if(!mail($f_email, $subject, $body, $header)) { ?>
        <script language="javascript" type="text/javascript">
            alert('Message failed to send');
        </script>
    <?php
    }
}
?>
