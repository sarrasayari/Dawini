<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>recherchez</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <!-- Font Awesome  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Datatables CSS  -->
  <link href="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.css" rel="stylesheet" />
  <!-- CSS  -->
  <link rel="stylesheet" href="css/stylesersh.css">
</head>

<body>
    

    <div class="navbar">
        <img class="logo" src="img/logo4.png">
    </div>
  <nav class="navbar justify-content-center fs-3 mb-3" style="text-align: center ;
    text-transform: uppercase;
    border-bottom: 1px solid #888;
    text-shadow: 2px 0 0 rgb(21, 0, 73);
    };"
    >recherche des prestataire </nav>

  <div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
      <div class="text-body-secondary">
        
       
       
      </div>
    </div>
    <table class="table table-bordered table-striped table-hover align-middle" id="myTable" style="width:100%;">
      <thead class="table-dark">
      <tr>
            <th>Prénom</th>
            <th>Nom </th>
            <th>email</th>
            <th>Téléphone</th>
            <th>Ville</th>
            <th>specialite</th>
            <th>etablissement</th>
            <th></th>
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
   
        $sql = "SELECT * FROM prestataire";
        $result = $connection->query($sql);
   
        if (!$result) {
            die ("invalid query: " .$connection->error);
        } 
                   
                   
        while($row = $result->fetch_assoc())  {
          echo "<tr id='" . $row["id"]  . "'>
    
            <td>" . $row["prenom"]  . "</td>
            <td>" . $row["nom"]  . "</td> 
            <td>" . $row["email"]  . "</td>
            <td>" . $row["telephone"] . "</td> 
            <td>" . $row["ville"]  . "</td>
            <td>" . $row["specialite"]  . "</td>
            <td>" . $row["etablissement"]  . "</td>
            <td> 
            <a class='btn btn-primary btn-sm' href='rendez-vous.html?id=" . $row["id"] . "'>prendre un rendez_vous</a>
             
            </td>
          </tr>";
   
        }     
                  
      ?>
      </tbody>
    </table>
    
  </div>







  <!-- Toast container  -->
  <div class="toast-container position-fixed bottom-0 end-0 p-3">
    <!-- Success toast  -->
    <div class="toast align-items-center text-bg-success" role="alert" aria-live="assertive" aria-atomic="true" id="successToast">
      <div class="d-flex">
        <div class="toast-body">
          <strong>Succès!!</strong>
          <span id="successMsg"></span>
        </div>
        <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
    </div>
    <!-- Error toast  -->
    <div class="toast align-items-center text-bg-danger" role="alert" aria-live="assertive" aria-atomic="true" id="errorToast">
      <div class="d-flex">
        <div class="toast-body">
          <strong>Error!</strong>
          <span id="errorMsg"></span>
        </div>
        <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
    </div>
  </div>


  <!-- Bootstrap  -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <!-- Jquery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <!-- Datatables  -->
  <script src="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.js"></script>
  <!-- JS  -->
  <script src="js/scripteges.js"></script>
  
</body>