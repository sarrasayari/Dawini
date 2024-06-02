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
    $doctorId = $_POST['doctorId'];
    $email = $_POST['email'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $amount = $_POST['amount'];


        $sql = "SELECT id FROM patient WHERE email = ?";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $patient = $result->fetch_assoc();

        if ($patient) {
            $patientId = $patient['id'];

            $sql = "INSERT INTO rendez_vous (date, time, methode, id_patient, id_prestataire) VALUES (?, ?, ?, ?, ?)";
            $stmt = $connection->prepare($sql);
            $stmt->bind_param("sssii", $date, $time, $amount, $patientId, $doctorId);

            if ($stmt->execute()) {
                echo "success";
            } else {
                echo "Failed to book the appointment: " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo "Patient not found. Please register first.";
        }
}

$connection->close();
?>
