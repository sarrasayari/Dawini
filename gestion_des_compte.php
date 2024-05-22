
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>gestion des compte</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <!-- Font Awesome  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Datatables CSS  -->
  <link href="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.css" rel="stylesheet" />
  <!-- CSS  -->
  <link rel="stylesheet" href="css/styleges.css">
</head>

<body>
  <nav class="navbar justify-content-center fs-3 mb-3" style="background-color:bleu;">gestion des comptes</nav>

  <div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
      <div class="text-body-secondary">
        <span class="h5">Tous les utilisateurs</span>
        <br>
        Gérez tous vos utilisateurs existants ou ajoutez-en un nouveau
      </div>

      <button class="btn btn-dark" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasAddUser">
        <i class="fa-solid fa-user-plus fa-xs"></i>
        Ajouter un nouvel utilisateur
      </button>
    </div>


    <table class="table table-bordered table-striped table-hover align-middle" id="myTable" style="width:100%;">
      <thead class="table-dark">
        <tr>
          <th>Id</th>
            <th>Prénom</th>
            <th>Nom </th>
            <th>E-mail</th>
            <th>Téléphone</th>
            <th>Ville</th>
            <th>Action</th>
        </tr>
<!-- test -->
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
            <td>" . $row["id"]  . "</td>
            <td>" . $row["prenom"]  . "</td>
            <td>" . $row["nom"]  . "</td> 
            <td>" . $row["email"]  . "</td>
            <td>" . $row["telephone"] . "</td> 
            <td>" . $row["ville"]  . "</td>
            
            <td> 
            <a class='btn btn-primary btn-sm' href='php/update.php?id=" . $row["id"] . "'>Update</a>
             <a class='btn btn-danger btn-sm' href='php/delete.php?id=" . $row["id"] . "'>Delete</a>
            </td>
          </tr>";
   
        }     
                  
      ?>
      </tbody>
    </table>
  </div>



<!-- Add user offcanvas  -->
 
  <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAddUser" style="width:600px;">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title" id="offcanvasExampleLabel">Ajouter un nouvel utilisateur</h5>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
      <form method="POST" id="insertForm">
        <div class="row mb-3">
          <div class="col">
            <label class="form-label">prenom</label>
            <input type="text" class="form-control" name="prenom" placeholder="user">
          </div>
          <div class="col">
            <label class="form-label">nom</label>
            <input type="text" class="form-control" name="nom" placeholder="user">
          </div>
        </div>
        <div class="mb-3">
          <label class="form-label">Email</label>
          <input type="email" class="form-control" name="email" placeholder="user@gmail.com">
        </div>
        <div class="row mb-3">
          <label class="form-label"> Image</label>
          <div class="col-2">
          <img class="preview_img" src="img/default_profile.jpg">
          </div>
          <div class="col-10">
            <div class="file-upload text-secondary">
              <input type="file" class="image" name="image" accept="image/*">
              <span class="fs-4 fw-2">Choose file...</span>
              
            </div>
          </div>
        </div>
        <div class="mb-3">
          <label class="form-label">ville</label>
          <select name="country" class="form-control">
          <option value="Ariana"></option>
                        <option value="Ariana">Ariana</option>
                        <option value="Beja">Beja</option>
                        <option value="Ben arous">Ben arous</option>
                        <option value="Bezart">Bezart</option>
                        <option value="Tataoun">Tataoun</option>
                        <option value="Touzer">Touzer</option>
                        <option value="Tunis">Tunis</option>
                        <option value="Jandouba">Jandouba</option>
                        <option value="Zaghouan">Zaghouan</option>
                        <option value="Siliana">Siliana</option>
                        <option value="Sousse">Sousse</option>
                        <option value="Sidi Bouzid">Sidi Bouzid</option>
                        <option value="Sfax">Sfax</option>
                        <option value="Gabès">Gabès</option>
                        <option value="Kebili">Kebili</option>
                        <option value="Kasserine">Kasserine</option>
                        <option value="Gafsa">Gafsa</option>
                        <option value="Kairouan">Kairouan</option>
                        <option value="kef">kef</option>
                        <option value="Médenine">Médenine</option>
                        <option value="Monastir">Monastir</option>
                        <option value="Manouba">Manouba</option>
                        <option value="Mahdia">Mahdia</option>
                        <option value="Nabeul">Nabeul</option>

          </select>
        </div>
        <label class="form-label">telephone</label>
            <input type="text" class="form-control" name="telephone" placeholder="*******">
          </div>
          <button type="submit" class="btn btn-primary me-1" id="insertBtn">Submit</button><br>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="offcanvas">Cancel</button>
        </div>
      </form>
    </div>
  </div>

 <!-- Edit user offcanvas  -->

  <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasEditUser" style="width:600px;">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title" id="offcanvasExampleLabel">Modifier les données utilisateur</h5>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
      <form method="POST" id="editForm">
        <input type="hidden" name="id" id="id">
        <div class="row mb-3">
          <div class="col">
            <label class="form-label">prenom</label>
            <input type="text" class="form-control" name="prenom" placeholder="user">
          </div>
          <div class="col">
            <label class="form-label">nom</label>
            <input type="text" class="form-control" name="nom" placeholder="user">
          </div>
        </div>
        <div class="mb-3">
          <label class="form-label">Email</label>
          <input type="email" class="form-control" name="email" placeholder="user@gmail.com">
        </div>
        <div class="row mb-3">
          <label class="form-label">Télécharger une image</label>
          <div class="col-2">
          <img class="preview_img" src="img/default_profile.jpg">
          </div>
          <div class="col-10">
            <div class="file-upload text-secondary">
              <input type="file" class="image" name="image" accept="image/*">
              <input type="hidden" name="image_old" id="image_old">
              <span class="fs-4 fw-2">Choose file...</span>
             
            </div>
          </div>
        </div>
        <div class="mb-3">
        <option value="Ariana"></option>
                        <option value="Ariana">Ariana</option>
                        <option value="Beja">Beja</option>
                        <option value="Ben arous">Ben arous</option>
                        <option value="Bezart">Bezart</option>
                        <option value="Tataoun">Tataoun</option>
                        <option value="Touzer">Touzer</option>
                        <option value="Tunis">Tunis</option>
                        <option value="Jandouba">Jandouba</option>
                        <option value="Zaghouan">Zaghouan</option>
                        <option value="Siliana">Siliana</option>
                        <option value="Sousse">Sousse</option>
                        <option value="Sidi Bouzid">Sidi Bouzid</option>
                        <option value="Sfax">Sfax</option>
                        <option value="Gabès">Gabès</option>
                        <option value="Kebili">Kebili</option>
                        <option value="Kasserine">Kasserine</option>
                        <option value="Gafsa">Gafsa</option>
                        <option value="Kairouan">Kairouan</option>
                        <option value="kef">kef</option>
                        <option value="Médenine">Médenine</option>
                        <option value="Monastir">Monastir</option>
                        <option value="Manouba">Manouba</option>
                        <option value="Mahdia">Mahdia</option>
                        <option value="Nabeul">Nabeul</option>
        </div>
        <label class="form-label">telephone</label>
            <input type="text" class="form-control" name="telephone" placeholder="*******">
          </div>
        <div>
          <button type="submit" class="btn btn-primary me-1" id="editBtn">Mise à jour</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="offcanvas">Annuler</button>
        </div>
      </form>
    </div>
    
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

</html>
