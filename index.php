<?php
require_once 'Customer.php';
require_once 'Branch.php';
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
<html>
    <head>
        <meta charset="UTF-8">
        <link href="css/Style.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Arvo:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Great+Vibes|Nunito:400,700|Raleway:400,700,800,600,500|Yanone+Kaffeesatz:400,700' rel='stylesheet' type='text/css'>
        <title>Asset Management Agency</title>
    </head>
    <body>
        <?php require 'toolbar.php' ?>
        <?php 
        if (isset($message)) {
            echo '<p>'.$message.'</p>';
        }
        ?>
        <h1 class="header">Asset Management Agency</h1>
        
        <table class="customer">
            <thead>
            <th class="cListHead">
                Customer List
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
                    echo '<td>' . $row['bankAddress'] . '</td>';
                    echo '<td>'
                    . '</td>';
                    echo '</tr>';
                    
                    $row = $statement->fetch(PDO::FETCH_ASSOC);
                }
                ?>
            </tbody>
        </table>
        <br />
        <br />
        <table class="branch">
            <thead>
            <th class="bListHead">
                Branch List
            </th>
            <tr class="subheadings">
                    <th class="testing">Address</th>
                    <th class="testing">Phone</th>
                    <th class="testing">Manager</th>
                    <th class="testing">Hours</th>
                </tr>
            </thead>
            <tbody class="attr">
                <?php
                $row = $statementBranch->fetch(PDO::FETCH_ASSOC);
                while ($row) {


                    echo '<td>' . $row['address'] . '</td>';
                    echo '<td>' . $row['phone'] . '</td>';
                    echo '<td>' . $row['manager'] . '</td>';
                    echo '<td>' . $row['hours'] . '</td>';
                    echo '<td>'
                    . '</td>';
                    echo '</tr>';

                    $row = $statementBranch->fetch(PDO::FETCH_ASSOC);
                }
                ?>
            </tbody>
        </table>
    </body>
</html>
