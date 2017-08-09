<?php
$mysqli = new mysqli($hostname, $username, $password, $database);

if ($mysqli->connect_errno) {
    echo "<p>MySQL error no {$mysqli->connect_errno} : {$mysqli->connect_error}</p>";
    exit();
}

$timestamp = time();
$sql = "UPDATE users SET status = '{$timestamp}' WHERE id ={$_SESSION['user_id']}";
$result = $mysqli->query($sql);
?>