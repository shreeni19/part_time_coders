<?php
$name = $_POST['name'];
$email = $_POST['email'];
$pass = $_POST['password'];
$repeatPass = $_POST['rpassword'];

$conn = new mysqli('localhost', 'root', '', 'test');

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
} else {
    $stmt = $conn->prepare("INSERT INTO registration (name, email, password, resetpassword) VALUES (?, ?, ?, ?)");

    if (!$stmt) {
        die('Error in SQL query: ' . $conn->error);
    }

    $stmt->bind_param("ssss", $name, $email, $pass, $repeatPass);

    if ($stmt->execute()) {
        echo "Successfully registered";
    } else {
        echo "Error: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>
