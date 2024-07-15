
<?php
$conn = new mysqli('localhost', 'username', 'password', 'database');

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

$sql = "SELECT * FROM Criminals";
$result = $conn->query($sql);

$criminals = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $criminals[] = $row;
    }
}

echo json_encode($criminals);

$conn->close();
?>


