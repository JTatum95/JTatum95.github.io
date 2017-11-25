<?php

session_start();

require_once('../includes/Coach.php');
require_once('../includes/DBhandler.php');
require_once('../includes/Donor.php');
require_once('../includes/OisFormatter.php');

if (isset($_GET['action']) && isset($_GET['id'])) {
    $c = new Coach($_GET['id']);
    switch ($_GET['action']) {
        case 'validate_coach':
            $c->Validate();
            break;
        case 'invalidate_coach':
            $c->Invalidate();
            break;
    }
}

?>
<html>
    <head>
        <title>KingdomLine: Admin</title>
        <link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="stylesheets/admin.css" />
    </head>
    <body>
        <nav class="navbar navbar-inverse bg-inverse navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="admin.php">
                    KingdomLine Admin Page
                    </a>
                 </div>
                <div class="navbar-right">
                    <a class="navbar-brand" href="index.php">Home Page</a>
                </div>
            </div>
        </nav></br></br></br>
        <h1><u><b>KingdomLine: Admin</b></u></h1>
        </br>
        <h2>Coach List</h2>
        <table class="table table_list">
                <thead>
                <tr>
                <th>User Number</th>
                    <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Validated</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $count = 1;
                foreach(Coach::ListAll() as $coach) {
                    echo '<tr><th scope="row">' . strval($count) . '</th>';
                    echo sprintf("<td>%s</td>\r\n", $coach['last_name'].', '.$coach['first_name']);
                    echo sprintf("<td>%s</td>\r\n", $coach['email']);
                    echo sprintf("<td>%s</td>\r\n", OisFormatter::PhoneNumber($coach['phone']));
                    $count++;

                    if ($coach['validated'] == 1) {
                        echo '<td><a href="admin.php?action=invalidate_coach&id='.$coach['id'].'"><img src="images/icon_toggle_on.jpg" /></a</td>';
                    }
                    else {
                        echo '<td><a href="admin.php?action=validate_coach&id='.$coach['id'].'"><img src="images/icon_toggle_off.jpg" /></a</td>';
                    }
                    echo '</tr>';
                }

            ?>
            </tbody>
        </table>
        <h2>Donor List</h2>
        <table class="table table_list">
            <thead>
            <tr>
                <th>User Number</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Credit Card</th>
                <th>Monthly Budget</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $count = 1;
            foreach(Donor::ListAll() as $donor) {
                echo '<tr><th scope="row">' . strval($count) . '</th>';
                echo sprintf("<td>%s</td>\r\n", $donor['last_name'].', '.$donor['first_name']);
                echo sprintf("<td>%s</td>\r\n", $donor['email']);
                echo sprintf("<td>%s</td>\r\n", OisFormatter::PhoneNumber($donor['phone']));
                echo sprintf("<td>%s</td>\r\n", 'xxxx'.$donor['last_four']);
                echo sprintf("<td>%s</td>\r\n", $donor['monthly_budget']);
                $count++;
                echo '</tr>';
            }

            ?>
            </tbody>
        </table>
    </body>
</html>