<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $host = "localhost";
    $user = "root";
    $password = "";
    $dbname = "dawini";

    $connection = new mysqli($host, $user, $password, $dbname);

    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    $sql = "DELETE FROM prestataire WHERE id = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        header("Location: ../gestion_des_compte.php");
        exit();
    } else {
        echo "Error deleting record: " . $connection->error;
    }

    $stmt->close();
    $connection->close();
} else {
    echo "Invalid request.";
}
?>
