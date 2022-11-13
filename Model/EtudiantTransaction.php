aaù*
<?php
require_once "Etudiant.php";

class EtudiantTransaction{
    private $bdd;
  
    //constructeur: la connection à la base de donnees
    public function __construct(){
        try
        {
          $this->bdd = new PDO('mysql:host=localhost;dbname=crud;charset=utf8', 'root', '');
        }
        catch(Exception $e) {
            die('Erreur : '.$e->getMessage()); 
        }      
    }
//----------------------------------Ajouter etudiant----------------------------------//

    public function save($etudiant){

        $req = $this->bdd->prepare('INSERT INTO etudiant(nom, prenom,age,cne ) VALUES(:nom, :prenom, :age,:cne)');
      
        $req->execute(array( 
        'nom' => $etudiant->getNom(),
        'prenom' => $etudiant->getPrenom(),
        'age' => $etudiant->getAge(),
        'cne' => $etudiant->getCne(),
        ));
        
        header('Location: http://localhost:8080/Atelier1/Atelier1/index.php?action=etudiant');
    }
//----------------------------------Supprimer etudiant----------------------------------//
  public function delete($cne){
      $req=$this->bdd->prepare("DELETE FROM etudiant WHERE cne=:cne");
      $req->execute(array('cne'=>$cne));
      header('Location: http://localhost:8080/Atelier1/Atelier1/index.php?action=etudiant');
  }

//----------------------------------Modefier etudiant----------------------------------//
 public function update($cne){                                         
    $req=$this->bdd->prepare("UPDATE etudiant SET nom=:nom,prenom=:prenom,age=:age,cne=:cne WHERE cne=:old_cne");
    $req->execute(array( 'nom' =>$_POST['nom'],
    'prenom' => $_POST['prenom'],
    'age' => $_POST['age'],
    'cne'=>$_POST['cne'],
    'old_cne'=>$cne
    ));
    header('Location: http://localhost:8080/Atelier1/Atelier1/index.php?action=etudiant');
}

//--------------------------------selectionner une ligne--------------------------------//
  public function getrow($cne){
    $req=$this->bdd->prepare("SELECT * FROM etudiant WHERE cne=:cne");
    $req->execute(array('cne'=>$cne));
    $row=$req->fetch(PDO::FETCH_ASSOC);
    return $row;
}
 
  //----------------------------------Afficher les étudiants----------------------------------//
  public function getAll(){
    $reponse  = $this->bdd->query('select * from etudiant');
    $arrEtudiants =  array(); //$arrEtudiants =[];

    while ($donnees = $reponse->fetch()) {
        array_push($arrEtudiants, new Etudiant($donnees['nom'] , $donnees['prenom'] , $donnees['age']  , $donnees['cne']));
    }
    return $arrEtudiants;
  }

}

?>