<?php
$conn = new mysqli('localhost', 'username', 'password', 'database');

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

$sql = "SELECT * FROM CaseFiles";
$result = $conn->query($sql);

$cases = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $cases[] = $row;
    }
}

echo json_encode($cases);

$conn->close();
?>
