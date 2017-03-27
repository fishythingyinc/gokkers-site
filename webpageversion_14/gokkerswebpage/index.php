<?php
session_start();
if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
    echo "<script>function myFunction() {alert(\"$message\");} myFunction();</script>";
    $_SESSION['message'] = null;
}

?>
<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>FishyThingy</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->

        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- Add your site or application content here -->
        
        
        <header>
            <div class="container space-between">
                <div class="logo">
                    <h1>FISHY <span>thingy</span></h1>
                </div>
                <nav>
                    <ul class="space-between">
                        <li><a href="">HOME</a></li>
                        <li><a href="">ABOUT</a></li>
                        <li><a href="download.php">DOWNLOAD</a></li>
                        <li><a href="">CONTACT</a></li>

                        <?php
                        if (isset($_SESSION['username']))
                        {
                            $session = $_SESSION['username'];
                            echo "<li>" . "<a>" . strtoupper($session) . "</a>" . "</li>";
                            echo '<li>' . '<a href="logout.php">LOGOUT</a>' . '</li>';
                        }
                        ?>




                    </ul>
                </nav>
            </div>
        </header>
        
        <div class="container sep-row"></div>
        
        <div class="hero">
            <div class="container text-center">
                <h2>Fishy-thingy is a fun</h2>
                <h2>and easy game! Don't get addicted</h2>
            </div>
        </div>
        
        <div class="main-content">
                <div class="container">
                    <?php

                    if (isset($_GET['message'])) {
                        $message = $_GET['message'];
                        if ($message == "Login incorrect") {
                            echo $message;
                        }
                    }
                    ?>

                    <div class="login-form">
                    <?php

                    if (!isset($_SESSION['username']))
                    {
                        echo "
<h3>Do you have an account? Login here!</h3>
<form action=\"login.php\" method=\"POST\">
    <div class=\"form-group\">
        <div class=\"form-item\">
            <label for=\"username\">Username:</label>
            <input type=\"text\" name=\"username\" id=\"username\">
        </div>
        <div class=\"form-item\">
            <label for=\"password\">Password:</label>
            <input type=\"password\" name=\"password\" id=\"password\">
        </div>
    </div>
    <div class=\"form-group\">
        <div class=\"form-item\">
            <input type=\"submit\" value=\"login\">
        </div>
    </div>
</form>";
                    }

                    ?>
                    </div>

                    <?php

                        if (isset($_SESSION['username']))
                        {

                            echo '<p class="text-center">You are logged in as ' . $_SESSION['username'] . '</p>';
                        }


                    ?>

                    <div class="register-form">
                    <?php

                        if (!isset($_SESSION['username']))
                        {
                            echo "
<h3>New here? Register for free!</h3>
<form action=\"accounts.php\" method=\"POST\" id=\"register\">
        <div class=\"form-group\">
            <div class=\"form-item\">
                <label for=\"username\">Username:</label>
                <input type=\"text\" name=\"username\" id=\"username\">
            </div>
                <div class=\"form-item\">
                    <label for=\"password\">Password:</label>
                    <input type=\"password\" name=\"password\" id=\"password\">
                </div>
                    <div class=\"form-item\">
                        <label for=\"email\">Email:</label>
                        <input type=\"email\" name=\"email\" id=\"email\">
                    </div>
                    <div class=\"form-item\">
                        <label for=\"ToS\">I agree to the terms of service.</label>
                        <input type=\"checkbox\" name=\"ToS\" value=\"ToS\" required>
                    </div>
        </div>
        <div class=\"form-group\">
            <div class=\"form-item\">
                <input type=\"submit\" value=\"submit\">
            </div>
        </div>
    </form>
                                ";
                        }
                        else
                        {
                            echo '<button class="download-button button text-center"><a href="download.php">Download</a></button>';
                        }

                    ?>
                    </div>

                </div>
        </div>
        <div class="promo">
            <div class="container text-center">
                <h3>Promo Video.</h3>
                <iframe width="560" height="315" src="https://www.youtube.com/embed/vwSC9qV6OMg" frameborder="0" allowfullscreen></iframe>
                <p>In FishyThingy 9 fishes fight for survival. The slowest fish will turn in a fish stick!</p>
                <p>Can you guess which fish is the fastest?</p>
            </div>
        </div>

       <footer>
           <div class="container text-center border">
                <span>2017&copy;  All rights reserved | Jurriaan, Mike &amp; Sjoerd</span>
           </div>
       </footer>
       
        <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.12.0.min.js"><\/script>')</script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='https://www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
        </script>
    </body>
</html>
