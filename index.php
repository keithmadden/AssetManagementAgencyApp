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
        <title>Asset Management Agency</title>
    </head>
    <body>
        <?php require 'toolbar.php' ?>
        <?php 
        if (isset($message)) {
            echo '<p>'.$message.'</p>';
        }
        ?>
        <table class="tableIndex">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Mobile</th>
                    <th>Email</th>
                    <th>Branch</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $row = $statement->fetch(PDO::FETCH_ASSOC);
                while ($row) {

                    
                    echo '<td>' . $row['name'] . '</td>';
                    echo '<td>' . $row['address'] . '</td>';
                    echo '<td>' . $row['mobile'] . '</td>';
                    echo '<td>' . $row['email'] . '</td>';
                    echo '<td>' . $row['bankAddress'] . '</td>';
                    echo '<td>'
                    . '<a href="viewCustomer.php?id='.$row['Customer ID'].'">View</a> '
                    . '<a href="editCustomerForm.php?id='.$row['Customer ID'].'">Edit</a> '
                    . '<a class="deleteCustomer" href="deleteCustomer.php?id='.$row['Customer ID'].'">Delete</a> '
                    . '</td>';
                    echo '</tr>';
                    
                    $row = $statement->fetch(PDO::FETCH_ASSOC);
                }
                ?>
            </tbody>
        </table>
        <br />
        <br />
        <table>
            <thead>
                <tr>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Manager</th>
                    <th>Hours</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $row = $statementBranch->fetch(PDO::FETCH_ASSOC);
                while ($row) {


                    echo '<td>' . $row['address'] . '</td>';
                    echo '<td>' . $row['phone'] . '</td>';
                    echo '<td>' . $row['manager'] . '</td>';
                    echo '<td>' . $row['hours'] . '</td>';
                    echo '<td>'
                    . '<a href="viewBranch.php?id='.$row['branch_id'].'">View</a> '
                    . '<a href="editBranchForm.php?id='.$row['branch_id'].'">Edit</a> '
                    . '<a class="deleteBranch" href="deleteCustomer.php?id='.$row['branch_id'].'">Delete</a> '
                    . '</td>';
                    echo '</tr>';

                    $row = $statementBranch->fetch(PDO::FETCH_ASSOC);
                }
                ?>
            </tbody>
        </table>
    </body>
</html>
