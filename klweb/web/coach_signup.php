<?php

    require_once('../includes/DBhandler.php');
    require_once('../includes/Coach.php');
    /*if (isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['password'])) {
        $c = new Coach();
        $c->Create($_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['phone'], $_POST['password']);
        if (is_int($c->id)) {
            $display_message = '<font color="green">Application Received!</font>';
        }

    }*/
?>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Kingdomline: Coach Sign-Up</title>
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
            <p style="color:black" class="navbar-brand number">Our Number: (773) 985-3318</p>
        </div>
      </div>
    </nav>


    <body></br></br></br></br></br>
        <div class="form">
        <h1><?=$display_message;?></h1>
        <h2>Coach Application</h2></br>
        <form method="post" action="<?=$_SERVER['PHP_SELF'];?>">
            <!--<span class="input-group-addon"></span>-->
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
            <input id="button" id="button" type="submit" name="action"  value="Submit Application"/>
            </form>
        </div>
    </body>
</html>
