<?php
$id = session_id();
if ($id == "") {
    session_start();
}

require 'ensureUserLoggedIn.php';
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
        <h1>Create Branch Form</h1>
        <?php
        if (isset($errorMessage)) {
            echo '<p>Error: ' . $errorMessage . '</p>';
        }
        ?>
        <form id="createBranchForm" name="createBranchForm" action="createBranch.php" method="POST">
            <table border="0">
                <tbody>
                    <tr>
                        <td>Address</td>
                        <td>
                            <input type="text" name="address" value="" />
                            <span id="addressError" class="error"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>Phone</td>
                        <td>
                            <input type="text" name="phone" value="" />
                            <span id="phoneError" class="error"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>Manager</td>
                        <td>
                            <input type="text" name="manager" value="" />
                            <span id="managerError" class="error"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>Hours</td>
                        <td>
                            <input type="text" name="hours" value="" />
                            <span id="hoursError" class="error"></span>
                        </td>
                    </tr>
                        <td></td>
                        <td>
                            <input type="submit" value="Create Branch" name="createBranch" />
                        </td>
                    </tr>
                </tbody>
            </table>

        </form>
        <?php require 'footer.php'; ?>
    </body>
</html>
