<?php
$conn = new mysqli('localhost', 'username', 'password', 'database');

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

$criminalId = $_POST['criminalId'];
$crimeId = $_POST['crimeId'];
$date = $_POST['date'];
$details = $_POST['details'];

$sql = "INSERT INTO CaseFiles (CriminalID, CrimeID, Date, Details)
        VALUES ('$criminalId', '$crimeId', '$date', '$details')";

if ($conn->query($sql) === TRUE) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'error' => $conn->error]);
}

$conn->close();
?>



