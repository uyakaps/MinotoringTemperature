<?php
$servername = "localhost"; 
$username = "id21557985_root"; 
$password = "Root.123"; 
$dbname = "id21557985_dht"; 

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the required parameters are received
if (isset($_GET['humidity']) && isset($_GET['temperature'])) {
    $humidity = $_GET['humidity'];
    $temperature = $_GET['temperature'];

    // Insert data into the database
    $sql = "INSERT INTO sensor_data (temperature, humidity, time) VALUES ('$temperature', '$humidity', NOW())";

    if ($conn->query($sql) === TRUE) {
        echo "Data inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Missing parameters";
}

// Close connection
$conn->close();
?>
