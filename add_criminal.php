<?php
$conn = new mysqli('localhost', 'username', 'password', 'database');

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$dob = $_POST['dob'];
$gender = $_POST['gender'];
$address = $_POST['address'];
$photo = $_POST['photo'];

$sql = "INSERT INTO Criminals (FirstName, LastName, DOB, Gender, Address, Photo)
        VALUES ('$firstName', '$lastName', '$dob', '$gender', '$address', '$photo')";

if ($conn->query($sql) === TRUE) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'error' => $conn->error]);
}

$conn->close();
?>
