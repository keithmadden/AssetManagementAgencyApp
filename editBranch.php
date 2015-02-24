<?php
require_once 'Branch.php';
require_once 'Connection.php';
require_once 'BranchTableGateway.php';

$id = session_id();
if ($id == "") {
    session_start();
}

require 'ensureUserLoggedIn.php';

$connection = Connection::getInstance();
$gatewayBranch = new BranchTableGateway($connection);

$id = $_POST['branch_id'];

$address = $_POST['address'];

$phone = $_POST['phone'];

$manager = $_POST['manager'];

$hours = $_POST['hours'];

$gatewayBranch->updateBranch($id, $address, $phone, $manager, $hours);

header('Location: home.php');