<?php
require_once('../includes/Coach.php');
require_once('../includes/DBhandler.php');
require_once('../includes/OisFormatter.php');
?>
<html>
<title>KingdomLine</title>
<link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="stylesheets/main.css" />
<link rel="stylesheet" type="text/css" href="stylesheets/homepage.css" />

<nav class="navbar navbar-inverse bg-inverse navbar-fixed-top">
      <div class="container-fluid">
              <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">KingdomLine</a>

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
                     <div class="navbar navbar-right navbar-header navbar-inverse">
                            <a href="coach_signup.php">Coach Sign-up!</a>
                        </div>
                     <div class="navbar navbar-right navbar-header navbar-inverse">
                           <a href="donor_signup.php">Donor Sign-up!</a>
                     </div>
              </div>
      </div>
</nav>

<body>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">

 <div class="jumbotron text-center">
         <div class="container"></br>
             <h1 style="font-family: 'Roboto', serif; font-size: 3em;">A hotline for anything</h1></br>
                <p style="font-family: 'Roboto', serif;">Kingdomline is a Christian organization designed to bring a human touch to times where you need help.</p>
                  <h2 style="font-family: 'Roboto', serif; font-size: 2.25em;">(773) 985-3318</h2></br>
         </div>
 </div>

  <div class="container">
        <div class="row">
              <div class="col-sm-4">
                    <h3> Get Answers for Life's Dilemmas.</h3>
                        <p>Get help with questions on faith, family, troubles, or drama</p>
                  </div>
              <div class="col-sm-4">
                  <h3>Help Others.</h3>
                     <p>Sign up to help those in your community via a phone hotline. Or assist through donation.</p>
                  </div>
              <div class="col-sm-4">
                  <h3>Communicate Simply.</h3>
                     <p>No need for an app or modern browser. Get on the phone and call a good old phone number now, free of charge.</p>
                  </div>
           </div>
      </div>
</html>