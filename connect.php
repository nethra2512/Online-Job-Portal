<?php
$conn = new mysqli("localhost", "root", " ", "jobport");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    else
    {
        echo "connected successfully";
    }
?>