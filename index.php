<?php
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

        <p>An asset management agency manages a portfolio of stocks and properties for its customers. 
            For each customer, the agency needs to store the following details: name, address, 
            mobile phone number, and email address.Each customer is assigned to a branch, 
            usually the branch where the customer opened his or her account. Each branch can have 
            several customers. For each branch, the following details need to be stored: the 
            address of the branch, the phone number for the branch, the name of the branch 
            manager, and the branch opening hours.</p>

        <p>Each customer has a portfolio of stock shares. One or more customers can own shares 
            in each stock. For each stock, the agency needs to record the name of the stock, 
            the 2-5 character stock symbol, the current price of the stock, and the total number 
            of shares in that stock. For each collection of stock shares owned by a customer, 
            the agency needs to record the date the customer bought the shares, the quantity 
            of stock shares owned by the customer, and the price at which the customer bought 
            the shares.</p>

        <p>In addition, each customer can have a portfolio of properties that they own. 
            For each property, the agency needs to record the address of the property, 
            the price paid for the property, the date the property was bought. 
            Each property owned by only one customer.</p>

        <?php require 'footer.php'; ?>
    </body>
</html>
