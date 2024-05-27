<?php
$servername = "localhost";
$username = "root"; 
$password = " "; 
$dbname = "jobport"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$full_name = $_POST['full_name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$education = $_POST['education'];
$skills = $_POST['skills'];
$years_of_experience = $_POST['years_of_experience'];
$refer = $_POST['refer'];
$title = $_POST['title'];

$table_name = "";
switch ($title) {
    case "software engineer":
        $table_name = "software_engineer";
        break;
    case "db admin":
        $table_name = "db_admin";
        break;
    case "developer":
        $table_name = "frontend_dev";
        break;
    case "assistant":
        $table_name = "financial_assistant";
        break;
    default:
        echo "Invalid role applying for.";
        break;
}

$sql = "INSERT INTO $table_name (full_name, email, phone, education, skills, years_of_experience, refer) 
        VALUES ('$full_name', '$email', '$phone', '$education', '$skills', '$years_of_experience', '$refer')";

if ($conn->query($sql) === TRUE) {
    header("Location: success.html");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
