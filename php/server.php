<?php

include("database.php");

// insert data to database
if ($_GET["action"] === "insertData") {
    if (!empty($_POST["prenom"]) && !empty($_POST["nom"]) && !empty($_POST["email"]) && !empty($_POST["ville"]) && !empty($_POST["telephone"]) && $_FILES["image"]["size"] != 0) {
      $prenom = mysqli_real_escape_string($conn, $_POST["prenom"]);
      $nom = mysqli_real_escape_string($conn, $_POST["nom"]);
      $email = mysqli_real_escape_string($conn, $_POST["email"]);
      $ville = mysqli_real_escape_string($conn, $_POST["ville"]);
      $telephone = mysqli_real_escape_string($conn, $_POST["telephone"]);
    }
}
// rename the image before saving to database
$original_name = $_FILES["image"]["name"];
$new_name = uniqid() . time() . "." . pathinfo($original_name, PATHINFO_EXTENSION);
move_uploaded_file($_FILES["image"]["tmp_name"], "uploads/" . $new_name);

$sql = "INSERT INTO `prestataire`(`id`, `prenom`, `nom`, `email`, `image`, `ville`, `telephone`) VALUES (NULL,'$prenom','$nom','$email','$new_name','$ville','$telephone')";

if (mysqli_query($conn, $sql)) {
  echo json_encode([
    "statusCode" => 200,
    "message" => "Data inserted successfully 😀"
  ]);
} else {
  echo json_encode([
    "statusCode" => 500,
    "message" => "Failed to insert data 😓"
  ]);
}
 else {
echo json_encode([
  "statusCode" => 400,
  "message" => "Please fill all the required fields 🙏"
]);
}
// fetch data of individual user for edit form
if ($_GET["action"] === "fetchSingle") {
    $id = $_POST["id"];
    $sql = "SELECT * FROM users WHERE `id`=$id";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
      $data = mysqli_fetch_assoc($result);
      header("Content-Type: application/json");
      echo json_encode([
        "statusCode" => 200,
        "data" => $data
      ]);
    } else {
      echo json_encode([
        "statusCode" => 404,
        "message" => "No user found with this id 😓"
      ]);
    }
    mysqli_close($conn);
}
// function to update data
if ($_GET["action"] === "updateData") {
    if (!empty($_POST["prenom"]) && !empty($_POST["nom"]) && !empty($_POST["email"]) && !empty($_POST["ville"]) && !empty($_POST["telephone"])) {
      $id = mysqli_real_escape_string($conn, $_POST["id"]);
      $prenom = mysqli_real_escape_string($conn, $_POST["prenom"]);
      $nom = mysqli_real_escape_string($conn, $_POST["nom"]);
      $email = mysqli_real_escape_string($conn, $_POST["email"]);
      $ville = mysqli_real_escape_string($conn, $_POST["ville"]);
      $telephone = mysqli_real_escape_string($conn, $_POST["telephone"]);
    }
    if ($_FILES["image"]["size"] != 0) {
        // rename the image before saving to database
        $original_name = $_FILES["image"]["name"];
        $new_name = uniqid() . time() . "." . pathinfo($original_name, PATHINFO_EXTENSION);
        move_uploaded_file($_FILES["image"]["tmp_name"], "uploads/" . $new_name);
        // remove the old image from uploads directory
        unlink("uploads/" . $_POST["image_old"]);
    } 
    else 
    {
        $new_name = mysqli_real_escape_string($conn, $_POST["image_old"]);
    }
      $sql = "UPDATE `prestataire` SET `first_name`='$first_name',`last_name`='$last_name',`email`='$email',`image`='$new_name',`country`='$country',`gender`='$gender' WHERE `id`=$id";
    if (mysqli_query($conn, $sql)) {
        echo json_encode([
          "statusCode" => 200,
          "message" => "Data updated successfully 😀"
        ]);
    } 
    else {
        echo json_encode([
          "statusCode" => 500,
          "message" => "Failed to update data 😓"
        ]);
    }

    mysqli_close($conn);
 
    else {
      echo json_encode([
        "statusCode" => 400,
        "message" => "Please fill all the required fields 🙏"
      ]);
    }

} 
  
  
// function to delete data
if ($_GET["action"] === "deleteData") {
    $id = $_POST["id"];
    $delete_image = $_POST["delete_image"];
  
    $sql = "DELETE FROM users WHERE `id`=$id";
  
    if (mysqli_query($conn, $sql)) {
      // remove the image
      unlink("uploads/" . $delete_image);
      echo json_encode([
        "statusCode" => 200,
        "message" => "Data deleted successfully 😀"
      ]);
    } 
    else {
      echo json_encode([
        "statusCode" => 500,
        "message" => "Failed to delete data 😓"
      ]);
    }
}

?>