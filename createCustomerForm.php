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
        <h1>Create Customer Form</h1>
        <?php
        if (isset($errorMessage)) {
            echo '<p>Error: ' . $errorMessage . '</p>';
        }
        ?>
        <form id="createCustomerForm" name="createCustomerForm" action="createCustomer.php" method="POST">
            <table border="0">
                <tbody>
                    <tr>
                        <td>Name</td>
                        <td>
                            <input type="text" name="name" value="" />
                            <span id="nameError" class="error"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td>
                            <input type="text" name="address" value="" />
                            <span id="addressError" class="error"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>
                            <input type="text" name="email" value="" />
                            <span id="emailError" class="error"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>Mobile</td>
                        <td>
                            <input type="text" name="mobile" value="" />
                            <span id="mobileError" class="error"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>Branch</td>
                        <td>
                            <select name="branch_id">
                                <option value="-1">No branch</option>
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
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" value="Create Customer" name="createCustomer" />
                        </td>
                    </tr>
                </tbody>
            </table>

        </form>
        <?php require 'footer.php'; ?>
    </body>
</html>
