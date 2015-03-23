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
            <div class="navbar-header page-scroll navSmall">
                <!--<img src="../images/logo.png" class="logo">-->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-mainText mainTextFirst hidden-sm navText" style="margin-left:5px;" href="#page-top">Aperture<br></a>
                <a class="navbar-mainText hidden-sm navText" style="margin-left:5px;" href="#page-top">Asset Management</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navSmall" id="navbar-collapse-1">>
                <ul class="nav navbar-nav navbar-left">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="viewCustomers.php">Customers</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="viewBranches.php">Branches</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="viewProperties.php">Properties</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <i class="fa fa-search fa-2x" href="#"></i>
                    </li>
                    <li>
                    </li>
                     <li>
                            <button type="button" class="signButton" onclick="document.location.href = 'index.php'">Sign Out</button>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- Header -->
        <header class="homeHeader">
            <div class="container">
                <div class="intro-text">
                    <div class="intro-lead-in">Welcome to</div>
                    <div class="intro-heading">Your very own profile</div>
                    
                </div>
            </div>
        </header>

    <!-- Why Join Section -->
    <section id="tables">
        <div class="container background">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Tables</h2>
                    <h3 class="section-subheading text-muted">Here is the list of tables you can view at this time.</h3>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-md-3 col-md-offset-1">
                        <a href="viewCustomers.php">
                            <table class="table">
                                <tr class="tableRow">
                                    <th class="tableHeader">
                                        <img class="tableImages" src="img/table/menu.svg" /> Customers
                                    </th>
                                </tr>
                                <tr class="tableRow">
                                    <td>
                                        <img class="tableImages" src="img/table/user.svg" /> Name
                                    </td>
                                </tr>
                                <tr class="tableRow">
                                    <td>
                                        <img class="tableImages" src="img/table/home.svg" /> Address
                                    </td>
                                </tr>
                                <tr class="tableRow">
                                    <td>
                                        <img class="tableImages" src="img/table/phone.svg" />Mobile
                                    </td>
                                </tr>
                                <tr class="tableRow">
                                    <td>
                                        <img class="tableImages" src="img/table/email.svg" /> Email
                                    </td>
                                </tr>
                            </table>
                        </a>
                </div>
                <div class="col-md-3 col-md-offset-1">
                    <a href="viewBranches.php">
                        <table class="table">
                            <tr class="tableRow">
                                <th class="tableHeader">
                                    <img class="tableImages" src="img/table/menu.svg" /> Branches
                                </th>
                            </tr>
                            <tr class="tableRow">
                                <td>
                                    <img class="tableImages" src="img/table/home.svg" /> Address
                                </td>
                            </tr>
                            <tr class="tableRow">
                                <td>
                                    <img class="tableImages" src="img/table/phone.svg" /> Phone
                                </td>
                            </tr>
                            <tr class="tableRow">
                                <td>
                                    <img class="tableImages" src="img/table/user.svg" /> Manager
                                </td>
                            </tr>
                            <tr class="tableRow">
                                <td>
                                    <img class="tableImages" src="img/table/clock.svg" /> Hours
                                </td>
                            </tr>
                        </table>
                    </a>
                </div>
                <div class="col-md-3 col-md-offset-1">
                    <a href="viewProperties.php">
                        <table class="table">
                            <tr class="tableRow">
                                <th class="tableHeader">
                                    <img class="tableImages" src="img/table/menu.svg" /> Properties
                                </th>
                            </tr>
                            <tr class="tableRow">
                                <td>
                                    <img class="tableImages" src="img/table/home.svg" /> Address
                                </td>
                            </tr>
                            <tr class="tableRow">
                                <td>
                                    <img class="tableImages" src="img/table/shop.svg" /> Price
                                </td>
                            </tr>
                            <tr class="tableRow">
                                <td>
                                    <img class="tableImages" src="img/table/month.svg" /> Date
                                </td>
                            </tr>
                            <tr class="tableRow">
                                <td>
                                    <img class="tableImages" src="img/table/user.svg" /> Customer
                                </td>
                            </tr>
                        </table>
                    </a>
                </div>
            </div>  
        </div>
    </section>

    <!-- Footer Section -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <span class="copyright text-muted hidden-xs">Copyright</span>
                </div>
                <div class="col-md-4">
                    <ul class="list-group browse">
                        <a class="footerLinks" href="#page-top"><li class="list-group-item">Browse:</li>
                        <li class="list-group-item">Search</li>
                        <li class="list-group-item">Play</li>
                        <li class="list-group-item">Explore</li>
                        <li class="list-group-item">Question</li>
                        </a>
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
