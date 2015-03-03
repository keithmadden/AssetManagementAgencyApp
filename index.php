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
        <?php require 'header.php' ?>
        <?php require 'mainMenu.php' ?>
        <h2>Welcome</h2>

        <p>A software company employs many programmers. For each programmer, the
            company needs to record the following details: name, email address,
            mobile phone number, staff number, a description of their skill set,
            and salary. Each programmer is assigned a manager. Each manager may
            be assigned a number of programmers. For each manager, the company
            needs to record the manager’s name, their office number, and their
            extension number.</p>

        <p>Each programmer will be given one or more computers to use. Each computer
            will be assigned at most one programmer. For each computer, the company
            needs to record the make and model of the computer, the operating system
            it uses, and date the computer was bought, and the purchase price of the
            computer.</p>

        <p>Each programmer can be assigned to work on a number of projects. Each
            project can have a number of programmers assigned to it. For each project,
            the company needs to record the name of the client the project is for, a
            description of the project requirements, and the start date and proposed
            end date for the project. For each assignment of a programmer to a project,
            the date of the assignment needs to be recorded, along with the number of
            hours per week the programmer should spend on that project.</p>

        <?php require 'footer.php'; ?>
    </body>
</html>