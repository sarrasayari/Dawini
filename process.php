
<?php
 $user = "root";
 $host = "localhost";
 $user = "root";
 $password = "";
 $dbname = "dawini";
 
 $connection = new mysqli($host, $user, $password, $dbname);
 
 
if (isset($_POST["create"])) {
    $numero = mysqli_real_escape_string($connection, $_POST["numero"]);
    $prenom= mysqli_real_escape_string($connection, $_POST["prenom"]);
    $nom = mysqli_real_escape_string($connection, $_POST["nom"]);
    $Age = mysqli_real_escape_string($connection, $_POST["Age"]);
    $date = mysqli_real_escape_string($connection, $_POST["date"]);
    $image = mysqli_real_escape_string($connection, $_POST["image"]);
    $description = mysqli_real_escape_string($connection, $_POST["description"]);
    $sqlInsert = "INSERT INTO doisser_medical (numero, prenom , nom , Age, date , description , image) VALUES ('$numero','$prenom','$nom', '$Age', '$date', '$description', '$image)";
    if(mysqli_query($connection,$sqlInsert)){
        session_start();
        $_SESSION["create"] = "doisser ajouté avec succès!";
        header("<Location:../doisser.php");
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
