<?php
if(isset($_POST['register'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $password = $_POST['password']; 

    $conn = new mysqli("localhost", "root", " ", "jobport");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("INSERT INTO register (fname, lname, email, dob, password) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $fname, $lname, $email, $dob, $password); // Bind hashed password

    if ($stmt->execute()) {
        echo "Registered successfully!";
        header("Location: login.html");
        exit(); 
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Error: Form not submitted.";
}
?>

