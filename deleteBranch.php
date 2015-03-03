<?php
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

$gatewayBranch->deleteBranch($id);

header("Location: viewBranches.php");
?>
