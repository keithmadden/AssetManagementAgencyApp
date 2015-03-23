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
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <i class="fa fa-search fa-2x searchIcon" href="#"></i>
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
    
    <section id="tables">
        <div class="container background">
            <div class="row">
                <form action="checkLogin.php" method="POST">
                    <table border="0">
                        <tbody>
                            <tr class="subheadings">
                                <td>Username</td>
                                <td>
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
                                </td>
                            </tr>
                            <tr class="subheadings">
                                <td>Password</td>
                                <td>
                                    <input type="password" name="password" value="" />
                                    <span id="passwordError" class="error">
                                        <?php
                                        if (isset($errorMessage) && isset($errorMessage['password'])) {
                                            echo $errorMessage['password'];
                                        }
                                        ?>
                                    </span>
                                </td>
                            </tr>
                            <tr class="subheadings">
                                <td></td>
                                <td>
                                    <input type="submit" value="Login" name="login" />
                                    <input type="button"
                                           value="Register"
                                           name="register"
                                           onclick="document.location.href = 'register.php'"
                                           />
                                    <input type="button" value="Forgot Passward" name="forgot" />
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </section>
    
        <!-- Footer Section -->
        <footer class="footerStick">
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
    </body>
</html>
