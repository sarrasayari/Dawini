
<?php
include('php/database.php');
if (isset($_POST["create"])) {
    $num_doisser = mysqli_real_escape_string($conn, $_POST["num_doisser"]);
    $prenom_patient= mysqli_real_escape_string($conn, $_POST["prenom_patient"]);
    $nom_patient = mysqli_real_escape_string($conn, $_POST["nom_patient"]);
    $age = mysqli_real_escape_string($conn, $_POST["age"]);
    $date_naissance = mysqli_real_escape_string($conn, $_POST["date"]);
    $observation = mysqli_real_escape_string($conn, $_POST["observation"]);
    $image = mysqli_real_escape_string($conn, $_POST["image"]);
    $sqlInsert = "INSERT INTO doisser.php
    (title , author , type , description) VALUES ('$title','$author','$type', '$description')";
    if(mysqli_query($conn,$sqlInsert)){
        session_start();
        $_SESSION["create"] = "doisser ajouté avec succès!";
        header("Location:doisser.php");
    }else{
        die("Quelque chose s'est mal passé");
    }
}
if (isset($_POST["edit"])) {
    $num_doisser = mysqli_real_escape_string($conn, $_POST["num_doisser"]);
    $observation = mysqli_real_escape_string($conn, $_POST["observation"]);
    $image = mysqli_real_escape_string($conn, $_POST["image"]);

    $id = mysqli_real_escape_string($conn, $_POST["id"]);
    $sqlUpdate = "UPDATE doisser SET num_doisser = '$num_doisser', observation = '$observation',  image = '$image' WHERE id='$id'";
    if(mysqli_query($conn,$sqlUpdate)){
        session_start();
        $_SESSION["update"] = "doisser mis à jour avec succès!";
        header("Location:doisser.php");
    }else{
        die("Quelque chose s'est mal passé");
    }
}
?>
