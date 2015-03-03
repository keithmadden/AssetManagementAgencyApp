<?php
require_once 'Connection.php';
require_once 'CustomerTableGateway.php';
require_once 'BranchTableGateway.php';
require_once 'PropertyTableGateway.php';
require 'ensureUserLoggedIn.php';

$connection = Connection::getInstance();

$gateway = new CustomerTableGateway($connection);
$gatewayBranch = new BranchTableGateway($connection);
$gatewayProperty = new PropertyTableGateway($connection);

$statement = $gateway->getCustomers();
$statementBranch = $gatewayBranch->getBranches();
$statementProperty = $gatewayProperty->getProperty();

?>
<!DOCTYPE html>
<html>
    <head>
        
        
        <meta charset="UTF-8">
        <link href="css/Style.css" rel="stylesheet">
        <script type="text/javascript" src="js/customer.js"></script>
        <script type="text/javascript" src="js/branch.js"></script>
        <link href='http://fonts.googleapis.com/css?family=Arvo:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Great+Vibes|Nunito:400,700|Raleway:400,700,800,600,500|Yanone+Kaffeesatz:400,700' rel='stylesheet' type='text/css'>
    </head>
    <body>
        <?php require 'toolbar.php' ?>
        <?php require 'header.php' ?>
        <?php require 'mainMenu.php' ?>
        
        <table class="property">
            <thead>
            <th class="cListHead">
                Property List
            </th>
            <tr class="subheadings">
                    <th class="testing">Address</th>
                    <th class="testing">Price</th>
                    <th class="testing">Date</th>
                    <th class="testing">Customer</th>
                </tr>
            </thead>
            <tbody class="attr">
                <?php
                $row = $statementProperty->fetch(PDO::FETCH_ASSOC);
                while ($row) {
                    echo '<td>' . $row['address'] . '</td>';
                    echo '<td>' . $row['price'] . '</td>';
                    echo '<td>' . $row['date'] . '</td>';
                    echo '<td>' . $row['customer'] . '</td>';
                    echo '<td>'
                    . '<a class="tableProps tablePropsFirst" href="viewProperty.php?id='.$row['property_id'].'">View</a> '
                    . '<a class="tableProps" href="editCustomerForm.php?id='.$row['property_id'].'">Edit</a> '
                    . '<a class="deleteCustomer tableProps" href="deleteCustomer.php?id='.$row['property_id'].'">Delete</a> '
                    . '</td>';
                    echo '</tr>';
                    $row = $statementProperty->fetch(PDO::FETCH_ASSOC);
                }
                ?>
            </tbody>
        </table>
        <p><a class="createHome" href="createPropertyForm.php">Create Property</a></p>
        <?php require 'footer.php'; ?>
    </body>
</html>
