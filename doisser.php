<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>doisser medicale</title>   
</head>

<body>
    <div class="container my-4">
        <header class="d-flex justify-content-between my-4">
            <h1>Liste des doissers medicales</h1>
            <div>
                <a href="php/cree_doisser.php" class="btn btn-primary">creé un nouveau doisser</a>
            </div>
        </header>

        
        
        
        <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>num_doisser</th>
                <th>prenom_patient</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        
        <?php
             $host = "localhost";
             $user = "root";
             $password = "";
             $dbname = "dawini";
        
        
             $connection = mysqli_connect($host,$user,$password,$dbname);
        
          
             if ($connection->connect_error)
             {
                  die("Connection failed : " . $connection->connect_error);
             }
        
             $sql = "SELECT * FROM doisser_medical";
             $result = $connection->query($sql);
     
     
        
             if (!$result) {
                 die ("invalid query: " .$connection->error);
             } 



        while($data = mysqli_fetch_array($result)){
            ?>
            <tr>
                <td><?php echo $data['id']; ?></td>
                <td><?php echo $data['num_doisser']; ?></td>
                <td><?php echo $data['prenom_patient']; ?></td>
                <td>
                    <a href="php/view_doisser.php?id<?php echo $data['id']; ?>" class="btn btn-info">En savoir plus</a>
                    <a href="php/modifier_doisser.php?id<?php echo $data['id']; ?>" class="btn btn-warning">Modifier</a>
                    
                </td>
            </tr>
            <?php
        }
        ?>
        </tbody>
        </table>
    </div>
</body>
</html>