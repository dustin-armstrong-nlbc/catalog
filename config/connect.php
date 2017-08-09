<?php
require ('config.php');
// connect to Catalog database
$db = new Database(array(
    'type' => 'mysql',
    'host' => $hostname,
    'database' => $database,
    'user' => $username,
    'password' => $password
));
//select tables
$catalog_db = $db->table('books', 'authors', 'genres');
?>