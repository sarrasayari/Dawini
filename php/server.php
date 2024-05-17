<?php

include("database.php");

// insert data to database
if ($_GET["action"] === "insertData") {
    if (!empty($_POST["prenom"]) && !empty($_POST["nom"]) && !empty($_POST["email"]) && !empty($_POST["ville"]) && !empty($_POST["telephone"]) && $_FILES["image"]["size"] != 0) {
      $prenom = mysqli_real_escape_string($conn, $_POST["prenom"]);
      $nom = mysqli_real_escape_string($conn, $_POST["nom"]);
      $email = mysqli_real_escape_string($conn, $_POST["email"]);
      $country = mysqli_real_escape_string($conn, $_POST["ville"]);
      $gender = mysqli_real_escape_string($conn, $_POST["telephone"]);
       }
}

?>