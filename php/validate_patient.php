<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "dawini";

$connection = mysqli_connect($host, $user, $password, $dbname);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST['email'];

    $sql = "SELECT * FROM patient WHERE email = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "exists";
    } else {
        echo "not_exists";
    }

    $stmt->close();
}

$connection->close();
?>
