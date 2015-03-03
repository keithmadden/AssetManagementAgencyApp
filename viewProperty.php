<?php
require_once 'Connection.php';
require_once 'CustomerTableGateway.php';
require_once 'PropertyTableGateway.php';

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
$gatewayProperty = new PropertyTableGateway($connection);
$gateway = new CustomerTableGateway($connection);

$statementProperty = $gatewayProperty->getPropertyById($id);
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
                $row = $statementProperty->fetch(PDO::FETCH_ASSOC);
                    echo '<tr>';
                    echo '<td>Address</td>'
                    . '<td>' . $row['address'] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>Price</td>'
                    . '<td>' . $row['price'] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>Date</td>'
                    . '<td>' . $row['date'] . '</td>';
                    echo '</tr>';
                ?>
            </tbody>
        </table>
        <p>
            <a class="createHome" href="editPropertyForm.php?id=<?php echo $row['property_id']; ?>">
                Edit Property</a>
            <a class="deleteBranch deleteView createHome" href="deleteProperty.php?id=<?php echo $row['property_id']; ?>">
                Delete Property</a>
        </p>
    </body>
    <?php require 'footer.php'; ?>
</html>
