<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Ajouter un nouveau doisser</title>
</head>
<body>
    <div class="container my-5">
    <header class="d-flex justify-content-between my-4">
            <h1>Ajouter un nouveau doisser</h1>
            <div>
            <a href="../doisser.php" class="btn btn-primary">retour</a>
            </div>
        </header>
        
        <form action="../process.php" method="post">
            <div class="form-elemnt my-4">
                <h3>numero doisser:</h3>
                <input type="text" class="form-control" name="numero" placeholder="numero doisser:">
            </div>
            <div class="form-elemnt my-4">
            <h3>prenom du patient:</h3>
                <input type="text" class="form-control" name="prenom" placeholder="prenom du patient:">
            </div>
            <div class="form-elemnt my-4">
            <h3>nom du patient:</h3>
                <input type="text" class="form-control" name="nom" placeholder="nom du patient:">
            </div>
            <div class="form-elemnt my-4">
            <h3>Age:</h3>
                <input type="numbre" class="form-control" name="Age" placeholder="Age">
            </div>
            <div class="form-elemnt my-4">
            <h3>date de naissance:</h3>
                <input type="date" class="form-control" name="date" placeholder="date de naissance">
        
            </div>
            <div class="form-elemnt my-4">
            <h3>des document(des analyse , des radios .....):</h3>
                <input type="file" class="form-control" name="image" placeholder=" des document(des analyse , des radios .....)">
        
            </div>
          
            <div class="form-element my-4">
            <h3>observation:</h3>
                <textarea name="description" id="" class="form-control" placeholder="observation"></textarea>
            </div>

            <div class="form-element my-4">
                <input type="submit" name="create" value="Ajouter un doisser" class="btn btn-primary">
            </div>
        </form>
        
        
    </div>
</body>
</html>
