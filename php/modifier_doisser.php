z<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Modifier le doisser</title>
</head>
<body>
    <div class="container my-5">
    <header class="d-flex justify-content-between my-4">
            <h1>Modifier le doisser</h1>
            <div>
            <a href="../doisser.php" class="btn btn-primary">retour</a>
            </div>
        </header>
        <form action="../process.php" method="post">
            <?php 
            
            $host = "localhost";
            $user = "root";
            $password = "";
            $dbname = "dawini";
            
            $connection = new mysqli($host, $user, $password, $dbname);
            
            if ($connection->connect_error) {
                die("Connection failed: " . $connection->connect_error);
            }
            if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
                $id = $_GET['id'];
                $sql = "SELECT * FROM doisser_medical WHERE id = ?";
                $stmt = $connection->prepare($sql);
                $stmt->bind_param("i", $id);
                $stmt->execute();
                $result = $stmt->get_result();
                $row = $result->fetch_assoc();
            
        
            ?>
            <div class="form-elemnt my-4">
                <input type="text" class="form-control" name="num_doisser" placeholder="Book Title:" value="<?php echo $row["num_doisser"]; ?>">
            </div>
            <div class="form-elemnt my-4">
                <input type="text" class="form-control" name="observation" placeholder="votre observation:" value="<?php echo $row["observation"]; ?>">
            </div>
            <div class="form-elemnt my-4">
                <input type="file" class="form-control" name="des document(des analyse , des radios .....)" placeholder="" value="<?php echo $row["image"]; ?>">
            </div>
            
       
            <input type="hidden" value="<?php echo $id; ?>" name="id">
            <div class="form-element my-4">
                <input type="submit" name="edit" value="Modifier " class="btn btn-primary">
            </div>
                <?php
            }else{
                echo "<h3>Le doisser  n'existe pas</h3>";
            }
            ?>
           
        </form>
        
        
    </div>
</body>
</html>