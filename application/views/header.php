<!DOCTYPE html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <title>Mangala Studio</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
        <meta name="author" content="templatemo">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,800,700,600,300' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/font-awesome.css">
        <link rel="stylesheet" href="css/animate.css">
        <link rel="stylesheet" href="css/templatemo_misc.css">
        <link rel="stylesheet" href="css/templatemo_style.css">
        <link rel="stylesheet" type="text/css" href="css/style_m.css">
        
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/vendor/modernizr-2.6.1-respond-1.1.0.min.js"></script>
        </head> 

        <div class="site-header">
            <div class="container">
                <div class="main-header">
                    <div class="row">
                        <div class="col-md-1 col-sm-6 col-xs-10">
                            <div class="logo">
                               <!--  <a href="#">
                                    <img src="images/logo.png" alt="Mangala Studio" title="Mangala Studio">
                                </a> -->
                            </div> <!-- /.logo -->
                        </div> <!-- /.col-md-4 -->
                        <div class="col-md-11 col-sm-6 col-xs-2">
                            <div class="main-menu">
                                <ul class="visible-lg visible-md">
                                    <li class="active"><a href="?action=index">Home</a></li>
                                    <li><a href="?action=about">About</a></li>
                                    <li><a href="?action=events">Events</a></li>
                                    <li><a href="?action=contact">Contact</a></li>
                                    <li><a href="?action=packages">packages</a></li>
                                    <?php
                                    if($this->session->userdata('is_login') == true){
                                      ?>
                                      <li> <a href="?action=reservations">Reservation</a> </li>
                                      <li style="float: right;"> <a id="btn_logout" href="index.php/main/logout">Logout</a> </li>
                                      <?php
                                    }
                                    else{
                                      ?>
                                      <li> <a href="?action=signup">Sign Up</a> </li>
                                      <li style="float: right;"> <a href="?action=login">login</a> </li>
                                      <?php
                                    }
                                    ?>
                                     
                                     
                                </ul>
                                <a href="#" class="toggle-menu visible-sm visible-xs">
                                    <i class="fa fa-bars"></i>
                                </a>
                            </div> <!-- /.main-menu -->
                        </div> <!-- /.col-md-8 -->
                    </div> <!-- /.row -->
                </div> <!-- /.main-header -->
                <div class="row">
                    <div class="col-md-12 visible-sm visible-xs">
                        <div class="menu-responsive">
                            <ul>
                                <li class="active"><a href="index.html">Home</a></li>
                                <li><a href="services.html">Services</a></li>
                                <li><a href="events">Events</a></li>
                                <li><a href="about.html">About Us</a></li>
                                <li><a href="contact.html">Contact</a></li>
                            </ul>
                        </div> <!-- /.menu-responsive -->
                    </div> <!-- /.col-md-12 -->
                </div> <!-- /.row -->
            </div> <!-- /.container -->
        </div> <!-- /.site-header -->