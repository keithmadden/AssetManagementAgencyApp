<?php
require_once 'Customer.php';
require_once 'Connection.php';
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
$gateway = new CustomerTableGateway($connection);

$statement = $gateway->getCustomerById($id);
if ($statement->rowCount() !== 1) {
    die("Illegal request");
}
$row = $statement->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="css/Style.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Arvo:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Great+Vibes|Nunito:400,700|Raleway:400,700,800,600,500|Yanone+Kaffeesatz:400,700' rel='stylesheet' type='text/css'>
        <title>Asset Management Agency</title>
        <script type="text/javascript" src="js/customer.js"></script>
    </head>
    <body>
        <?php require 'toolbar.php' ?>
        <h1 class="header">Asset Management Agency</h1>
        <h1 class="headerEdit">Edit Customer Form</h1>
        <?php
        if (isset($errorMessage)) {
            echo '<p>Error: ' . $errorMessage . '</p>';
        }
        ?>
        <form id="editCustomerForm" name="editCustomerForm" action="editCustomer.php" method="POST">
            <input type="hidden" name="CustomerID" value="<?php echo $id; ?>" />
            <table border="0">
                <tbody>
                    <tr class="subheadings">
                        <td>Name</td>
                        <td>
                            <input type="text" name="name" value="<?php
                                if (isset($_POST) && isset($_POST['name'])) {
                                    echo $_POST['name'];
                                }
                                else echo $row['name'];
                            ?>" />
                            <span id="nameError" class="error"></span>
                        </td>
                    </tr>
                    <tr class="subheadings">
                        <td>Address</td>
                        <td>
                            <input type="text" name="address" value="<?php
                                if (isset($_POST) && isset($_POST['address'])) {
                                    echo $_POST['address'];
                                }
                                else echo $row['address'];
                            ?>" />
                            <span id="addressError" class="error"></span>
                        </td>
                    </tr>
                    <tr class="subheadings">
                        <td>Email</td>
                        <td>
                            <input type="text" name="email" value="<?php
                                if (isset($_POST) && isset($_POST['email'])) {
                                    echo $_POST['email'];
                                }
                                else echo $row['email'];
                            ?>" />
                            <span id="emailError" class="error"></span>
                        </td>
                    </tr>
                    <tr class="subheadings">
                        <td>Mobile</td>
                        <td>
                            <input type="text" name="mobile" value="<?php
                                if (isset($_POST) && isset($_POST['mobile'])) {
                                    echo $_POST['mobile'];
                                }
                                else echo $row['mobile'];
                            ?>" />
                            <span id="mobileError" class="error"></span>
                        </td>
                    </tr>
                    <tr class="subheadings">
                        <td></td>
                        <td>
                            <input type="submit" value="Edit Customer" name="editCustomer" />
                        </td>
                    </tr>
                </tbody>
            </table>

        </form>
    </body>
</html>
