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
<html>
    <head>
        <meta charset="UTF-8">
        <link href="css/Style.css" rel="stylesheet">
        <script type="text/javascript" src="js/branch.js"></script>
        <link href='http://fonts.googleapis.com/css?family=Arvo:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Great+Vibes|Nunito:400,700|Raleway:400,700,800,600,500|Yanone+Kaffeesatz:400,700' rel='stylesheet' type='text/css'>
        <title>Asset Management Agency</title>
    </head>
    <body>
        <?php require 'toolbar.php' ?>
        <?php require 'header.php' ?>
        <?php require 'mainMenu.php' ?>
        <?php
        if (isset($message)) {
            echo '<p>'.$message.'</p>';
        }
        ?>
        <h1 class="header">Asset Management Agency</h1>
        <table class="customer">
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
                Edit Branch</a>
            <a class="deleteBranch deleteView createHome" href="deleteBranch.php?id=<?php echo $row['branch_id']; ?>">
                Delete Branch</a>
        </p>
        
        
        <?php if(!empty($statement)) { ?>
        
        <table class="customer">
            <thead>
            <th class="cListHead">
            <h3>Customer List</h3>
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
                    . '<a class="tableProps tablePropsFirst" href="viewCustomer.php?id='.$row['Customer ID'].'">View</a> '
                    . '<a class="tableProps" href="editCustomerForm.php?id='.$row['Customer ID'].'">Edit</a> '
                    . '<a class="deleteCustomer tableProps" href="deleteCustomer.php?id='.$row['Customer ID'].'">Delete</a> '
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
    </body>
    <?php require 'footer.php'; ?>
</html>
