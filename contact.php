<?php

if(!mail("chaseecummings@gmail.com", "Test Subject", "Test Message")) {
?>
    <script language="javascript" type="text/javascript">
        alert('Message failed to send');
        window.location = '/';
    </script>
<?php
}
?>
