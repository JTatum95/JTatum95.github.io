<?php
    header("content-type: text/xml");
    echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";


    require_once('../includes/Coach.php');
    require_once('../includes/DBhandler.php');
    require_once('../includes/OisFormatter.php');

    $validated_coaches = Coach::ValidatedList();

?>
<Response>
    <Pause length="2" />
    <Gather input="speech dtmf" timeout="5" numDigits="1" action="/tree" method="GET">
      <Say>Welcome to the Kingdom Hotline. For serious issues such as questions related to mental health, domestic issues, or safety, press one. For issues related to faith, substance abuse, family, or relationship issues, stay on the line.</Say>
   </Gather>
   <!-- connect to an advanced expert, else connect to any expert -->
   <Dial>
        <?php
            foreach($validated_coaches as $coach) {
                 sprintf("<Number>%s</Number>", OisFormatter::PhoneNumber($coach['phone']));
            }
        ?>
    </Dial>
    <Say>Thank you for your patience while we connect you with one of our <?=sizeof($validated_coaches);?> coaches.</Say>
</Response>
