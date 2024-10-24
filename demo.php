<?php 
require 'vendor/autoload.php';

$client = new MongoDB\Client;
$companydb = $client->newdb;

// List databases and display their names
foreach ($client->listDatabases() as $db) {
    echo $db['name'], "\n"; // Display the name of each database
}
?>
