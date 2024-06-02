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

    $sql = "SELECT * FROM prestataire WHERE id = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if ($row) {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>gestion des compte</title>
            <!-- Bootstrap CSS -->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
            <!-- Font Awesome -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
            <!-- Datatables CSS -->
            <link href="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.css" rel="stylesheet" />
            <!-- CSS -->
            <link rel="stylesheet" href="../css/styleges.css">
        </head>
        <body>
            <div class="container">
                <h2>Modifier les données utilisateur</h2>
                <form action="update.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <div class="row mb-3">
                        <div class="col">
                            <label class="form-label">Prénom</label>
                            <input type="text" class="form-control" name="prenom" value="<?php echo $row['prenom']; ?>">
                        </div>
                        <div class="col">
                            <label class="form-label">Nom</label>
                            <input type="text" class="form-control" name="nom" value="<?php echo $row['nom']; ?>">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" value="<?php echo $row['email']; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Mot de passe</label>
                        <input type="password" class="form-control" name="mot_passe" value="<?php echo $row['mot_passe']; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Spécialité</label>
                        <input type="text" class="form-control" name="specialite" value="<?php echo $row['specialite']; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Établissement</label>
                        <input type="text" class="form-control" name="etablissement" value="<?php echo $row['etablissement']; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Consultation</label>
                        <input type="text" class="form-control" name="consultation" value="<?php echo $row['consultation']; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Genre</label>
                        <input type="text" class="form-control" name="genre" value="<?php echo $row['genre']; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Ville</label>
                        <select name="ville" class="form-control">
                            <option value="<?php echo $row['ville']; ?>"><?php echo $row['ville']; ?></option>
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
                    <div class="mb-3">
                        <label class="form-label">Téléphone</label>
                        <input type="text" class="form-control" name="telephone" value="<?php echo $row['telephone']; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Prix Consultation</label>
                        <input type="text" class="form-control" name="prix_consultation" value="<?php echo $row['prix_consultation']; ?>">
                    </div>
                    <div>
                        <center style="padding-top: 20px;">
                            <button type="submit" class="btn btn-primary me-1">Mise à jour</button>
                            <a href="../gestion_des_compte.php" class="btn btn-secondary">Annuler</a>
                        </center>
                    </div>
                </form>
            </div>
            <br><br><br>
        </body>
        </html>
        <?php
    } else {
        echo "Enregistrement non trouvé.";
    }

    $stmt->close();
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $mot_passe = $_POST['mot_passe'];
    $specialite = $_POST['specialite'];
    $etablissement = $_POST['etablissement'];
    $consultation = $_POST['consultation'];
    $genre = $_POST['genre'];
    $ville = $_POST['ville'];
    $telephone = $_POST['telephone'];
    $prix_consultation = $_POST['prix_consultation'];

    $sql = "UPDATE prestataire SET prenom = ?, nom = ?, email = ?, mot_passe = ?, specialite = ?, etablissement = ?, consultation = ?, genre = ?, ville = ?, telephone = ?, prix_consultation = ? WHERE id = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("sssssssssssi", $prenom, $nom, $email, $mot_passe, $specialite, $etablissement, $consultation, $genre, $ville, $telephone, $prix_consultation, $id);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        header("Location: ../gestion_des_compte.php");
        exit();
    } else {
        echo "Error updating record: " . $connection->error;
    }

    $stmt->close();
}

$connection->close();
?>
