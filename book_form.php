<?php
// Include the MongoDB PHP library
require 'vendor/autoload.php'; // Make sure you have installed MongoDB PHP driver with Composer

// Connect to MongoDB
$client = new MongoDB\Client("mongodb://localhost:27017");

// Select the database and collection
$database = $client->DemoDB; // Use your database name
$collection = $database->bookings; // Collection for booking

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $location = $_POST['location'];
    $guests = (int)$_POST['guests'];
    $arrivals = $_POST['arrivals'];
    $leaving = $_POST['leaving'];

    // Validate the input (optional but recommended)
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format";
        exit;
    }

    if (!preg_match('/^[0-9]{10}+$/', $phone)) {
        echo "Invalid phone number";
        exit;
    }

    // Insert the data into the MongoDB collection
    $document = [
        'name' => $name,
        'email' => $email,
        'phone' => $phone,
        'address' => $address,
        'location' => $location,
        'guests' => $guests,
        'arrivals' => $arrivals,
        'leaving' => $leaving,
        'created_at' => new MongoDB\BSON\UTCDateTime() // Add timestamp
    ];

    $result = $collection->insertOne($document);

    // Check if the insert was successful
    if ($result->getInsertedCount() == 1) {
        echo "Booking successful!";
    } else {
        echo "Error in booking!";
    }
}
?>
