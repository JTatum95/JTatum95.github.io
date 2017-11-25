<?php
header("content-type: text/xml");
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";


require_once('../includes/Coach.php');
require_once('../includes/DBhandler.php');
require_once('../includes/OisFormatter.php');

$validated_coaches = Coach::ValidatedList();
// print_r($validated_coaches);

?>
<Response>
    <Say>Welcome to the Kingdom Hotline. Thank you for your patience while we connect you with one of our <?=sizeof($validated_coaches);?> coaches.</Say>
    <Dial record="true">
        <?php

        foreach($validated_coaches as $coach) {
            echo sprintf("<Number callerId=\"7739853318\">%s</Number>\r\n", OisFormatter::PhoneNumber($coach['phone']));
        }

        ?>
    </Dial>
    <Say>Thank you for your patience while we connect you with one of our <?=sizeof($validated_coaches);?> coaches.</Say>
</Response>
