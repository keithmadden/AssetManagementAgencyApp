<?php
require_once 'Connection.php';
require_once 'CustomerTableGateway.php';
require_once 'BranchTableGateway.php';
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
                <a class="navbar-heading navbar-brand page-scroll navbar-mainText" style="margin-left:5px;" href="index.php">Aperture</a>
                <a class="navbar-subheading page-scroll" href="#index.php">Asset Management</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-left">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#customers">Customers</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <i class="fa fa-search fa-2x" href="#"></i>
                    </li>
                    <li>
                    </li>
                     <li>
                            <button type="button" class="signButton">Sign Out</button>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
        
    <!-- /.Tables sections -->
    <section id="customers">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="cListHead">
                        <img class="tableImageHeader img-responsive" src="img/table/customer.svg" />
                    </div>
                </div>
                <div class="row">
                        <table class="table">
                            <tr class="subheadings">
                                    <th class="testing">Name</th>
                                    <th class="testing">Address</th>
                                    <th class="testing">Mobile</th>
                                    <th class="testingEmail">Email</th>
                                    <th class="testing">Branch</th>
                                </tr>
                            <tbody class="attr">
                                <?php
                                $row = $statement->fetch(PDO::FETCH_ASSOC);
                                while ($row) {
                                    echo '<td>' . $row['name'] . '</td>';
                                    echo '<td>' . $row['address'] . '</td>';
                                    echo '<td>' . $row['mobile'] . '</td>';
                                    echo '<td>' . $row['email'] . '</td>';
                                    echo '<td>' . $row['bankAddress'] . '</td>';
                                    echo '<td>'
                                    . '<a class="tableProps tablePropsFirst" href="viewCustomer.php?id='.$row['Customer ID'].'"><img class="tableImageSmall img-responsive" src="img/table/view.svg" /></a> '
                                    . '<a class="tableProps" href="editCustomerForm.php?id='.$row['Customer ID'].'"><img class="tableImageSmall img-responsive" src="img/table/edit.svg" /></a> '
                                    . '<a class="deleteCustomer tableProps" href="deleteCustomer.php?id='.$row['Customer ID'].'"><img class="tableImageSmall img-responsive" src="img/table/delete.svg" /></a> '
                                    . '</td>';
                                    echo '</tr>';
                                    $row = $statement->fetch(PDO::FETCH_ASSOC);
                                }
                                ?>
                            </tbody>
                        </table>
                    <p><a class="createHome" href="createCustomerForm.php">Create Customer</a></p>
                </div>
            </div>
            </div>
        </div>
    </section>
        
        
    <!-- Footer Section -->
    <footer class="footerHome">
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
    </body>
</html>
