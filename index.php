<?php
require_once 'Connection.php';
require_once 'CustomerTableGateway.php';
require_once 'BranchTableGateway.php';
require_once 'toolbar.php';

require 'ensureUserLoggedIn.php';

$connection = Connection::getInstance();
$gateway = new CustomerTableGateway($connection);
$gatewayBranch = new BranchTableGateway($connection);

$statement = $gateway->getCustomers();
$statementBranch = $gatewayBranch->getBranches();
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Asset Management Agency</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,200,100,300,500,600,700,900,800' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Goudy+Bookletter+1911' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="css/component.css" />
    <link rel="stylesheet" type="text/css" href="css/content.css" />
    <script src="js/modernizr.custom.js"></script>
</head>

<body id="page-top" class="index">
    
    <?php
        if (!isset($username)) {
            $username = '';
        }
    ?>

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top navbar-shrink">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <!--<img src="../images/logo.png" class="logo">-->
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-mainText hidden-sm" style="margin-left:5px;" href="#page-top">Aperture</a>
                <a class="navbar-subheading page-scroll hidden-sm" href="#page-top">Asset Management</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-left">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#services">Why Join</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#team">Who Are We</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#subscribe">Subscribe</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <i class="fa fa-search fa-2x" href="#"></i>
                    </li>
                    <li>
                        <div class="morph-button morph-button-modal morph-button-modal-2 morph-button-fixed hidden-sm">
                        <button type="button">Login</button>
                        <div class="morph-content">
                            <div>
                                <div class="content-style-form content-style-form-1">
                                    <span class="icon icon-close">Close the dialog</span>
                                    <img src="img/logo.png" class="subLogo loginLogo" alt="Aperture" style="width:80px;height:80px">
                                    <h2>Login</h2>
                                    <form action="checkLogin.php" method="POST">
                                        <p>
                                            <label>Username</label>
                                            <input type="text"
                                            name="username"
                                            value="<?php echo $username; ?>" />
                                            <span id="usernameError" class="error">
                                            <?php
                                            if (isset($errorMessage) && isset($errorMessage['username'])) {
                                                echo $errorMessage['username'];
                                            }
                                            ?>
                                            </span>
                                        </p>
                                        <p>
                                            <label>Password</label>
                                            <input type="password" name="password" value="" />
                                            <span id="passwordError" class="error">
                                                <?php
                                                if (isset($errorMessage) && isset($errorMessage['password'])) {
                                                    echo $errorMessage['password'];
                                                }
                                                ?>
                                            </span>
                                        </p>
                                        <p><input class="signButton signButtonMorph" type="submit" value="Login" name="login" onclick="document.location.href = 'home.php'"></p>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div><!-- morph-button -->
                    </li>
                     <li>
                        <div class="morph-button morph-button-modal morph-button-modal-3 morph-button-fixed hidden-sm">
                            <button type="button">Signup</button>
                            <div class="morph-content">
                                <div>
                                    <div class="content-style-form content-style-form-2">
                                        <span class="icon icon-close">Close the dialog</span>
                                        <h2>Sign Up</h2>
                                        <form>
                                            <p><label>Email</label><input type="text" /></p>
                                            <p><label>Password</label><input type="password" /></p>
                                            <p><label>Repeat Password</label><input type="password" /></p>
                                            <p><button>Sign Up</button></p>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div><!-- morph-button -->
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- Header -->
        <header>
            <div class="container">
                <div class="intro-text">
                    <div class="intro-lead-in">Aperture Management</div>
                    <div class="intro-heading">We will hold all your financial issues in one place</div>
                    
                </div>
            </div>
        </header>

    <!-- Why Join Section -->
    <section id="services">
        <div class="container background">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Why Join Aperture</h2>
                    <h3 class="section-subheading text-muted">One of the top leading Asset Management Companies 
                        gaining customers and keeping them happy.</h3>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-md-4">
                    <li class="branding">
                        <img class="brandImage img-responsive" src="img/branding.png">
                        <h4 class="service-heading">BRANDING</h4>
                        <p class="text-muted textJoin">In todays world you need leading and professional 
                                            teaching to become the best at what you do. To 
                                            strive in todays world you need the right teachings.</p>
                   </li>
                </div>
                <div class="col-md-4">
                    <li class="interactive">
                        <img class="brandImage img-responsive" src="img/interactive.png">
                        <h4 class="service-heading">INTERACTIVE</h4>
                        <p class="text-muted textJoin">We have enough resources to get anybody started. 
                                            These are designed and made by the top 
                                            professionals in the game.</p>
                    </li>
                </div>
                <div class="col-md-4">
                    <li class="production">
                        <img class="brandImage img-responsive" src="img/production.png">
                        <h4 class="service-heading">RESOURCES</h4>
                        <p class="text-muted textJoin">We have collected many resources throughout the
                                            years we have been a business. That is why many customers
                                            voted us number one Asset Management company of the year.</p>
                    </li>
                </div>
            </div>  
        </div>
    </section>

    <!-- Team Section -->
    <section id="team" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">WHO WE ARE</h2>
                    <h3 class="section-subheading text-muted">Our team of experts will guide you in the management  you need to control not only your properties but your stock</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="team-member">
                        <h4 class="whoweHeader">Lorem ipsum</h4>
                        <p class="text-muted">Lead Manager</p>
                        <img src="img/team/1.jpg" class="img-responsive img-circle" alt="">
                        <p class="text-muted hoverText">She throws one hell of a party.</p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="team-member">
                        <h4 class="whoweHeader">Lorem ipsum</h4>
                        <p class="text-muted">Lead Marketer</p>
                        <img src="img/team/2.jpg" class="img-responsive img-circle" alt="">
                        <p class="text-muted hoverText">This man is the key to the project.</p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="team-member">
                        <h4 class="whoweHeader">Lorem ipsum</h4>
                        <p class="text-muted">Lead Developer</p>
                        <img src="img/team/3.jpg" class="img-responsive img-circle" alt="">
                        <p class="text-muted hoverText">We pay him to sit down and eat the office food.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Subscribe Section -->
    <section id="subscribe" class="bg-darkest-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <img src="img/logo.png" class="subLogo" alt="Aperture" style="width:300px;height:300px">
                    <h3 class="section-subheading text-muted">Subscribe to our Newsletter for latest news.</h3>
                    <form method="post" name="subscribe" id="newsletter" class="form-inline">
                        <input name="email_newsletter" class="email_newsletter" type="email" value="" placeholder="Your Email" class="form-control">
                        <button id="submit-newsletter" class="button_outline"> Subscribe</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer Section -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <span class="copyright">Copyright</span>
                </div>
                <div class="col-md-4">
                    <ul class="browse">Browse:
                        <li>Search</li>
                        <li>Play</li>
                        <li>Explore</li>
                        <li>Question</li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline quicklinks">
                        <li><a href="#">Privacy Policy</a>
                        </li>
                        <li><a href="#">Terms of Use</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <script src="js/classie.js"></script>
        <script src="js/uiMorphingButton_fixed.js"></script>
        <script>
            (function() {
                var docElem = window.document.documentElement, didScroll, scrollPosition;

                // trick to prevent scrolling when opening/closing button
                function noScrollFn() {
                    window.scrollTo( scrollPosition ? scrollPosition.x : 0, scrollPosition ? scrollPosition.y : 0 );
                }

                function noScroll() {
                    window.removeEventListener( 'scroll', scrollHandler );
                    window.addEventListener( 'scroll', noScrollFn );
                }

                function scrollFn() {
                    window.addEventListener( 'scroll', scrollHandler );
                }

                function canScroll() {
                    window.removeEventListener( 'scroll', noScrollFn );
                    scrollFn();
                }

                function scrollHandler() {
                    if( !didScroll ) {
                        didScroll = true;
                        setTimeout( function() { scrollPage(); }, 60 );
                    }
                };

                function scrollPage() {
                    scrollPosition = { x : window.pageXOffset || docElem.scrollLeft, y : window.pageYOffset || docElem.scrollTop };
                    didScroll = false;
                };

                scrollFn();

                [].slice.call( document.querySelectorAll( '.morph-button' ) ).forEach( function( bttn ) {
                    new UIMorphingButton( bttn, {
                        closeEl : '.icon-close',
                        onBeforeOpen : function() {
                            // don't allow to scroll
                            noScroll();
                        },
                        onAfterOpen : function() {
                            // can scroll again
                            canScroll();
                        },
                        onBeforeClose : function() {
                            // don't allow to scroll
                            noScroll();
                        },
                        onAfterClose : function() {
                            // can scroll again
                            canScroll();
                        }
                    } );
                } );

                // for demo purposes only
                [].slice.call( document.querySelectorAll( 'form button' ) ).forEach( function( bttn ) { 
                    bttn.addEventListener( 'click', function( ev ) { ev.preventDefault(); } );
                } );
            })();
        </script>


    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="js/classie.js"></script>
    <script src="js/cbpAnimatedHeader.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/style.js"></script>

</body>

</html>

</html>
