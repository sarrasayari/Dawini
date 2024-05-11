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
    $price = $_POST["price"];
    $specialite = $_POST["specialite"];
    $etablissement = $_POST["etablissement"];
    $consultation = $_POST["consultation"];
    $genre = $_POST["genre"];
    $ville = $_POST["ville"];

    // Prevent SQL injection
    $datedaujourdhui = mysqli_real_escape_string($connection, $datedaujourdhui);
    $fname = mysqli_real_escape_string($connection, $fname);
    $lname = mysqli_real_escape_string($connection, $lname);
    $email = mysqli_real_escape_string($connection, $email);
    $password = mysqli_real_escape_string($connection, $password);
    $telephone = mysqli_real_escape_string($connection, $telephone);
    $age = mysqli_real_escape_string($connection, $age);
    $price = mysqli_real_escape_string($connection, $price);
    $specialite = mysqli_real_escape_string($connection, $specialite);
    $etablissement = mysqli_real_escape_string($connection, $etablissement);
    $consultation = mysqli_real_escape_string($connection, $consultation);
    $genre = mysqli_real_escape_string($connection, $genre);
    $ville = mysqli_real_escape_string($connection, $ville);

    $query = "INSERT INTO prestataire (prenom, nom, email, mot_passe, telephone, specialite, etablissement, consultation, genre, ville, prix_consultation) VALUES ('$fname', '$lname', '$email', '$password', '$telephone', '$specialite', '$etablissement', '$consultation', '$genre', '$ville', '$price')";

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
