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
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <script type="text/javascript" src="js/branch.js"></script>
        <title></title>
    </head>
    <body>
        <?php require 'toolbar.php' ?>
        <?php
        if (isset($message)) {
            echo '<p>'.$message.'</p>';
        }
        ?>
        <table>
            <tbody>
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
            <a href="editBranchForm.php?id=<?php echo $row['branch_id']; ?>">
                Edit Branch</a>
            <a class="deleteBranch" href="deleteBranch.php?id=<?php echo $row['branch_id']; ?>">
                Delete Branch</a>
        </p>
    </body>
</html>
