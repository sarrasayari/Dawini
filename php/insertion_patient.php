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
    $telephone = $_POST["telephone"];
    $age = $_POST["age"];
    $price = $_POST["price"];
    $ville = $_POST["ville"];
    $date_naissance = $_POST["date_naissance"];
    $lieu_naissance = $_POST["lieu_naissance"];
    $genre = $_POST["genre"];
    

    // Prevent SQL injection
    $datedaujourdhui = mysqli_real_escape_string($connection, $datedaujourdhui);
    $fname = mysqli_real_escape_string($connection, $fname);
    $lname = mysqli_real_escape_string($connection, $lname);
    $email = mysqli_real_escape_string($connection, $email);
    $telephone = mysqli_real_escape_string($connection, $telephone);
    $age = mysqli_real_escape_string($connection, $age);
    $price = mysqli_real_escape_string($connection, $price);
    $ville = mysqli_real_escape_string($connection, $ville);
    $date_naissance = mysqli_real_escape_string($connection, $date_naissance);
    $lieu_naissance = mysqli_real_escape_string($connection, $lieu_naissance);
    $genre = mysqli_real_escape_string($connection, $genre);
   

    $query = "INSERT INTO patient (prenom, nom, email,date_naissance,lieu_naissance,  telephone,    genre, ville, ) VALUES ('$fname', '$lname', '$email', '$telephone', '$lieu_naissance',  '$date_naissance', '$genre', '$ville', '$price')";

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