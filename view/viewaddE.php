<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <title>Ajouter un etudiant </title>
</head>
<body>
    
<div class="container mt-5">
    <form method="POST" action="http://localhost:8080/Atelier1/Atelier1/index.php?action=save">
    <div class="form-group">
        <label for="nom">Nom:</label>
        <input type="text" class="form-control" id="nom"  name="nom">
    </div>
    <div class="form-group">
        <label for="prenom">Prenom:</label>
        <input type="text" class="form-control" id="prenom" name="prenom">
    </div>
    <div class="form-group">
        <label for="age">Age:</label>
        <input type="number" class="form-control" id="age" name="age">
    </div>
    <div class="form-group">
        <label for="cne">CNE:</label>
        <input type="text" class="form-control" id="cne" name="cne">
    </div>
    <button type="submit" class="btn btn-primary">
      Ajouter
    </button>
    </form>
</div>

    
</body>
</html>