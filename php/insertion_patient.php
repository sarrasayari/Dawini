<?php
if (!isset($_SERVER["HTTP_REFERER"])) {
    include("../404.html");
    exit();
}
    include("database.php");

    $datedaujourdhui = $_POST["datedaujourdhui"];
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $telephone = $_POST["telephone"];
    $age = $_POST["age"];
    $datedenaissance = $_POST["datedenaissance"];
    $lieudenaissance = $_POST["lieudenaissance"];
    $ville = $_POST["ville"];

    // Prevent SQL injection
    $datedaujourdhui = mysqli_real_escape_string($connection, $datedaujourdhui);
    $fname = mysqli_real_escape_string($connection, $fname);
    $lname = mysqli_real_escape_string($connection, $lname);
    $email = mysqli_real_escape_string($connection, $email);
    $password = mysqli_real_escape_string($connection, $password);
    $telephone = mysqli_real_escape_string($connection, $telephone);
    $age = mysqli_real_escape_string($connection, $age);
    $datedenaissance = mysqli_real_escape_string($connection, $datedenaissance);
    $lieudenaissance = mysqli_real_escape_string($connection, $lieudenaissance);
    $ville = mysqli_real_escape_string($connection, $ville);

    $query = "INSERT INTO patient (prenom, nom, email, mot_passe, telephone, age, ville, date_naissance, lieu_naissance) VALUES ('$fname', '$lname', '$email', '$password', '$telephone', '$age', '$ville', '$datedenaissance', '$lieudenaissance')";

    if (mysqli_query($connection, $query))
    {
        $response = array("success" => true);
        echo json_encode($response);
        exit;
    }
    else
    {
        /* Encode to Json Format */
        $response = array("success" => false);
        /* Return as Json Format */
        echo json_encode($response);
        exit;
    }
    mysqli_close($connection);

?>
