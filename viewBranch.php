<?php
require_once 'Connection.php';
require_once 'BranchTableGateway.php';
require_once 'CustomerTableGateway.php';

$id = session_id();
if ($id == "") {
    session_start();
}

require 'ensureUserLoggedIn.php';


if (!isset($_GET) || !isset($_GET['id'])) {
    die('Invalid request');
}
$id = $_GET['id'];

$connection = Connection::getInstance();
$gatewayBranch = new BranchTableGateway($connection);
$gateway = new CustomerTableGateway($connection);

$statementBranch = $gatewayBranch->getBranchById($id);
$statement = $gateway->getCustomerByBranchId($id);
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
        
    <!-- /.Tables sections -->
    <section id="branches">
        <div class="container">
            <div class="row">
                <table class="table customer col-md-6">
                    <tbody class="attr">
                        <?php
                        $row = $statementBranch->fetch(PDO::FETCH_ASSOC);
                            echo '<tr>';
                            echo '<td>Address</td>'
                            . '<td>' . $row['address'] . '</td>';
                            echo '</tr>';
                            echo '<tr>';
                            echo '<td>Phone</td>'
                            . '<td>' . $row['phone'] . '</td>';
                            echo '</tr>';
                            echo '<tr>';
                            echo '<td>Manager</td>'
                            . '<td>' . $row['manager'] . '</td>';
                            echo '</tr>';
                            echo '<tr>';
                            echo '<td>Hours</td>'
                            . '<td>' . $row['hours'] . '</td>';
                            echo '</tr>';
                        ?>
                    </tbody>
                </table>
                <p>
                    <a class="createHome" href="editBranchForm.php?id=<?php echo $row['branch_id']; ?>">
                        <img class="tableImageSmall img-responsive editIcon" src="img/table/edit.svg" /></a>
                    <a class="deleteBranch deleteView createHome" href="deleteBranch.php?id=<?php echo $row['branch_id']; ?>">
                        <img class="tableImageSmall img-responsive deleteIcon" src="img/table/delete.svg" /></a>
                </p>


                <?php if(!empty($statement)) { ?>

                <table class="table customer col-md-6">
                    <thead>
                    <th class="intro-lead-in">
                    <h2>Customer List</h2>
                    </th>
                    <tr class="subheadings">
                            <th class="testing">Name</th>
                            <th class="testing">Address</th>
                            <th class="testing">Mobile</th>
                            <th class="testingEmail">Email</th>
                            <th class="testing">Branch</th>
                        </tr>
                    </thead>
                    <tbody class="attr">
                        <?php
                        $row = $statement->fetch(PDO::FETCH_ASSOC);
                        while ($row) {
                            echo '<td>' . $row['name'] . '</td>';
                            echo '<td>' . $row['address'] . '</td>';
                            echo '<td>' . $row['mobile'] . '</td>';
                            echo '<td>' . $row['email'] . '</td>';
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
                <?php } else { ?>
                    <p>There are no customers assigned to this branch</p>
                <?php } ?>
            </div>
        </div>
    </section>
    
    <!-- Footer Section -->
    <footer class="footer">
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

