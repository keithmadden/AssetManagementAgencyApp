<?php
require_once 'connection.php';
require_once 'BranchTableGateway.php';


$id = session_id();
if ($id == "") {
    session_start();
}

require 'ensureUserLoggedIn.php';

$conn = Connection::getInstance();
$gatewayBranch = new BranchTableGateway($conn);

$branches = $gatewayBranch->getBranches();
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
                <a class="navbar-mainText mainTextFirst hidden-sm navText" style="margin-left:5px;" href="home.php">Aperture<br></a>
                <a class="navbar-mainText hidden-sm navText" style="margin-left:5px;" href="home.php">Asset Management</a>
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
        
    <!-- /Customers sections -->
    <section id="createCustomer">
        <div class="container">
            <div class="row">
                <form class="form-horizontal col-lg-9 col-lg-offset-3" id="createCustomerForm" name="createCustomerForm" action="createCustomer.php" method="POST">
                    <table class="table-striped col-lg-6" border="0">
                        <tbody>
                            <tr class="subheadings">
                                <td><img class="tableImageSmall img-responsive" src="img/table/view.svg" /></td>
                                <td class="">
                                    <input class="form-control inputBox" type="text" name="name" value="name"/>
                                    <span id="nameError" class="error"></span>
                                </td>
                            </tr>
                            <tr class="subheadings">
                                <td><img class="tableImageSmall img-responsive" src="img/table/home.svg" /></td>
                                <td>
                                    <input class="form-control" type="text" name="address" value="address" />
                                    <span id="addressError" class="error"></span>
                                </td>
                            </tr>
                            <tr class="subheadings">
                                <td><img class="tableImageSmall img-responsive" src="img/table/email.svg" /></td>
                                <td>
                                    <input class="form-control" type="text" name="email" value="email" />
                                    <span id="emailError" class="error"></span>
                                </td>
                            </tr>
                            <tr class="subheadings">
                                <td><img class="tableImageSmall img-responsive" src="img/table/phone.svg" /></td>
                                <td>
                                    <input class="form-control" type="text" name="mobile" value="mobile" />
                                    <span id="mobileError" class="error"></span>
                                </td>
                            </tr>
                            <tr class="subheadings">
                                <td>Branch</td>
                                <td>
                                    <select name="branch_id">
                                        <option class="form-control" value="-1">No branch</option>
                                        <?php
                                        $b = $branches->fetch(PDO::FETCH_ASSOC);
                                        while ($b) {
                                            echo '<option value="' . $b['branch_id'] . '">' . $b['address'] . '</option>';
                                            $b = $branches->fetch(PDO::FETCH_ASSOC);
                                        }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr class="subheadings">
                                <td></td>
                                <td>
                                    <input class="btn btn-default" type="submit" value="Create Customer" name="createCustomer" />
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
