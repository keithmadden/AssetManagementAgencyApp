<?php
require_once 'Customer.php';
require_once 'Connection.php';
require_once 'CustomerTableGateway.php';

$id = session_id();
if ($id == "") {
    session_start();
}

require 'ensureUserLoggedIn.php';

$connection = Connection::getInstance();
$gateway = new CustomerTableGateway($connection);

$id = $_POST['CustomerID'];

$name = $_POST['name'];

$address = $_POST['address'];

$mobile = $_POST['mobile'];

$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$emailValid = filter_var($email, FILTER_VALIDATE_EMAIL);

$gateway->updateCustomer($id, $name, $address, $mobile, $email);

header('Location: home.php');






