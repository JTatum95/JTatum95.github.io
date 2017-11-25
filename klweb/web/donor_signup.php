<?php

    require_once('../includes/DBhandler.php');
    require_once('../includes/Donor.php');
    /*if (isset($_POST['first_name'])
        && isset($_POST['last_name'])
        && isset($_POST['email'])
        && isset($_POST['phone'])
        && isset($_POST['password'])) {
        $d = new Donor();
        $d->Create($_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['phone'], $_POST['password'], $_POST['credit_card_number'], $_POST['exp_month'], $_POST['exp_year'], $_POST['security_code'], $_POST['billing_address'], $_POST['billing_address_2'], $_POST['billing_city'], $_POST['billing_state'], $_POST['billing_zipcode'], $_POST['monthly_budget']);
        if (is_int($c->id)) {
            $display_message = '<font color="green">Application Received!</font>';
        }

    }*/
?>

<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Kingdomline: Donor Sign-Up</title>
        <link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="stylesheets/main.css" />
        <link rel="stylesheet" type="text/css" href="stylesheets/form.css" />
    </head>

    <nav class="navbar navbar-inverse bg-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="index.php">
          KingdomLine
          </a>

        <div class="collapse navbar-collapse navbar-header" id="navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="dropdown navbar-left">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">About Us<span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="#">Mission Statement</a></li>
                    <li><a href="#">Meet the Staff</a></li>
                    <li><a href="#">Our Services</a></li>
                </ul>
                  </li>
            </ul>
        </div>
        </div>
          <div class="pull-right">
              <p style="color:black" class="navbar-brand">Our Number: (773) 985-3318</p>
          </div>
        </div>
    </nav>

    <body></br></br></br></br></br>
        <div class="form">
        <h1><?=$display_message;?></h1>
        <h2>Donor Application</h2></br>
        <form method="post" action="<?=$_SERVER['PHP_SELF'];?>">
<!--            <span class="input-group-addon"></span>-->
            <input type="text" class="form-control" name="first_name" placeholder="First Name" size="30" required/><br/>
            <br />
<!--            <span class="input-group-addon"></span>-->
            <input type="text" class="form-control" name="last_name" placeholder="Last Name" size="30" required/><br/>
            <br />
<!--            <span class="input-group-addon"></span>-->
            <input type="text" class="form-control" name="email" placeholder="Email" size="30" required/><br/>
            <br />
<!--            <span class="input-group-addon"></span>-->
            <input type="text" class="form-control" name="phone" placeholder="Phone" size="30" required/><br/>
            <br />
<!--            <span class="input-group-addon"></span>-->
            <input type="password" class="form-control" name="password" placeholder="Password" size="30" required/><br/>
            <br />
<!--            <span class="input-group-addon"></span>-->
            <input type="text" class="form-control credit" name="credit_card_number" placeholder="Credit Card Number" size="30" required/> <input type="text" class="form-control cvv" name="security_code" placeholder="CVV" size="4" required/><br/>
            <br /></br>
            <div class="expiration">
                Expires:
            <select name="exp_month" class ="exp">
                <option value="1">Jan</option>
                <option value="2">Feb</option>
                <option value="3">Mar</option>
                <option value="4">Apr</option>
                <option value="5">May</option>
                <option value="6">Jun</option>
                <option value="7">Jul</option>
                <option value="8">Aug</option>
                <option value="9">Sep</option>
                <option value="10">Oct</option>
                <option value="11">Nov</option>
                <option value="12">Dec</option>
            </select>
            <select name="exp_year" class="exp">
                <option value="2017">2017</option>
                <option value="2018">2018</option>
                <option value="2019">2019</option>
                <option value="2020">2020</option>
                <option value="2021">2021</option>
                <option value="2022">2022</option>
                <option value="2023">2023</option>
            </select>
            </div>
            <br />
            <br />
<!--            <span class="input-group-addon"></span>-->
            <input type="text" class="form-control" name="billing_address" placeholder="Billing Address" size="30" required/><br/>
            <br />
<!--            <span class="input-group-addon"></span>-->
            <input type="text" class="form-control" name="billing_address_2" placeholder="Suite # (optional)" size="30"/><br/>
            <br />
<!--            <span class="input-group-addon"></span>-->
            <input type="text" class="form-control" name="billing_city" placeholder="Billing City" size="30" required/><br/>
            <br />
<!--            <span class="input-group-addon"></span>-->
            <input type="text" class="form-control" name="billing_state" placeholder="Billing State" size="30" required/><br/>
            <br />
<!--            <span class="input-group-addon"></span>-->
            <input type="text" class="form-control" name="billing_zipcode" placeholder="Billing Zipcode" size="30" required/><br/>
            <br />
<!--            <span class="input-group-addon"></span>-->
            <input type="text" class="form-control" name="monthly_budget" placeholder="Monthly Budget ($ USD)" size="30" required/><br />
            <br />
            <input type="submit" id="button" name="action" value="Submit Application" />
        </form>
        </div>
    </body>
</html>
