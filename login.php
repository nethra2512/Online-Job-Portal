<?php
session_start();

if(isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $conn = new mysqli("localhost", "root", " ", "jobport");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("SELECT email, password FROM register WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if ($password === $row['password']) {
            $_SESSION['user_email'] = $row['email'];
            header("Location: joblist.php");
            exit();
        } else {
            echo "Incorrect password . Go back and try again";
            
        }
    } else {
        header("Refresh:0,url=register.html");
        echo "<script>alert('User not found. Please egister')</script>";
    }

    $stmt->close();
    $conn->close();
}
?>



