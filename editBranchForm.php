<?php
require_once 'Branch.php';
require_once 'Connection.php';
require_once 'BranchTableGateway.php';

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

$statementBranch = $gatewayBranch->getBranchById($id);
if ($statementBranch->rowCount() !== 1) {
    die("Illegal request");
}
$row = $statementBranch->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script type="text/javascript" src="js/branch.js"></script>
    </head>
    <body>
        <?php require 'toolbar.php' ?>
        <h1>Edit Branch Form</h1>
        <?php
        if (isset($errorMessage)) {
            echo '<p>Error: ' . $errorMessage . '</p>';
        }
        ?>
        <form id="editBranchForm" name="editBranchForm" action="editBranch.php" method="POST">
            <input type="hidden" name="branch_id" value="<?php echo $id; ?>" />
            <table border="0">
                <tbody>
                    <tr>
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
                    <tr>
                        <td>Phone</td>
                        <td>
                            <input type="text" name="phone" value="<?php
                                if (isset($_POST) && isset($_POST['phone'])) {
                                    echo $_POST['phone'];
                                }
                                else echo $row['phone'];
                            ?>" />
                            <span id="phoneError" class="error"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>
                            <input type="text" name="manager" value="<?php
                                if (isset($_POST) && isset($_POST['manager'])) {
                                    echo $_POST['manager'];
                                }
                                else echo $row['manager'];
                            ?>" />
                            <span id="managerError" class="error"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>Mobile</td>
                        <td>
                            <input type="text" name="hours" value="<?php
                                if (isset($_POST) && isset($_POST['hours'])) {
                                    echo $_POST['hours'];
                                }
                                else echo $row['hours'];
                            ?>" />
                            <span id="hoursError" class="error"></span>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" value="Edit Branch" name="editBranch" />
                        </td>
                    </tr>
                </tbody>
            </table>

        </form>
    </body>
</html>
