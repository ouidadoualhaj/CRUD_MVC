

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <title>liste des etudiants</title>
</head>
<body>
<div class="container">
<a href="http://localhost:8080/Atelier1/Atelier1/index.php?action=add" class="btn btn-success my-3">Ajouter un Etudiant</a>

<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">Nom</th>
      <th scope="col">Prenom</th>
      <th scope="col">Age</th>
      <th scope="col">CNE</th>
      <th scope="col">Operations</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($etudiants as $etudiant): ?>

    <tr>


      <td><?php echo $etudiant->getNom();?></td>
      <td><?php echo $etudiant->getPrenom();?></td>
      <td><?php echo $etudiant->getAge();?></td>
      <td><?php echo $etudiant->getCne();?></td>

      <td>
         
      <?php $tab=array("nom"=>$etudiant->getNom(),"prenom"=>$etudiant->getPrenom(),"age"=>$etudiant->getAge(),"cne"=>$etudiant->getCne()) ?>


      <form action="http://localhost:8080/Atelier1/Atelier1/index.php?action=getrow" method="POST" >
            <button class="btn btn-primary mb-1" value="<?php echo $etudiant->getCne();?>" name="cne_update">
                    Modifier
            </button>
      </form>
      <form action="http://localhost:8080/Atelier1/Atelier1/index.php?action=delete" method="POST" >
            <button class="btn btn-danger px-2" value="<?php echo $etudiant->getCne();?>" name="cne_delete">
                    supprimer
            </button>
      </form>
      </td>


    </tr>
    <?php endforeach; ?>

  </tbody>
</table>
</div>
    
</body>
</html>


