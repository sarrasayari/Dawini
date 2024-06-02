
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Détails du doisser</title>
    <style>
        .book-details{
            background-color:#f5f5f5;
        }
    </style>
</head>
<body>
    <div class="container my-4">
        <header class="d-flex justify-content-between my-4">
            <h1>Détail du doisser</h1>
            <div>
            <a href="../doisser.php" class="btn btn-primary">retour</a>
            </div>
        </header>
        <div class="book-details p-5 my-4">
            <?php
            include("database.php");
            
            $id = $_GET['id'];
            if ($id) {
                $sql = "SELECT * FROM doisser_medical WHERE id = $id";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($result)) {
                 ?>
                 <h3>Num_doisser:</h3>
                 <p><?php echo $row["num_doisser"]; ?></p>
                 <h3>Prenom_patient:</h3>
                 <p><?php echo $row["prenom_patient"]; ?></p>
                 <h3>Nom_patient:</h3>
                 <p><?php echo $row["nom_patient"]; ?></p>
                 <h3>Age:</h3>
                 <p><?php echo $row["age"]; ?></p>
                 <h3>date_naissance:</h3>
                 <p><?php echo $row["date"]; ?></p>
                 <h3>Observation:</h3>
                 <p><?php echo $row["observation"]; ?></p>
                 <h3>des document(des analyse , des radios .....):</h3>
                 <p><?php echo $row["image"]; ?></p>
                
                 <?php
                }
            }
            else{
                echo "<h3>Aucun doisser trouvé</h3>";
            }
            ?>
            
        </div>
    </div>
</body>
</html>
