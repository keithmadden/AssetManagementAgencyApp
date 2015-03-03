<?php
$session_id = session_id();
if ($session_id == "") {
    session_start();
}
if (isset($_SESSION['username'])) {
    echo '<nav class="homeLog">';
    echo '<a class="home" href="viewCustomers.php">Home</a>';
    echo '<a class="log" href="logout.php">Logout</a>';
    echo '</nav>';
}
else {
    echo '<nav class="homeLog">';
    echo '<a class="home" href="viewCustomers.php">Home</a>';
    echo '<a class="log" href="logout.php">Logout</a>';
    echo '</nav>';
}