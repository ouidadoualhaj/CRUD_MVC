<?php
require_once 'Model/Etudiant.php'; //L'expression require_once est identique à require mis à part que PHP vérifie si le fichier a déjà été inclus, et si c'est le cas, ne l'inclut pas une deuxième fois.
require_once 'Model/EtudiantTransaction.php';
require_once 'view/view.php'; 

class ControllerEtudiant{
    private $etudiant;
    private $etudiantTransaction;

public function __construct(){
$this->etudiant = new Etudiant();
$this->etudiantTransaction= new EtudiantTransaction();
}


//si $_GET['ACTION'] = add , cette methode est appellee
public function addE() {
    $view = new view("addE");        
    $view->generer(array());
} 

//si $_GET['ACTION'] = save , cette methode est appellee
public function saveE() {    
    $etudiant=$this->etudiant =new Etudiant($_POST['nom'],$_POST['prenom'],$_POST['age'],$_POST['cne']) ;
    $this->etudiantTransaction->save($this->etudiant);
    getEtus();
}

//si $_GET['ACTION'] = etudiant , cette methode est appellee
public function getEtus() {
    $etudiants = $this->etudiantTransaction->getAll(); 
    $view = new view("etudiant"); 
    $view->generer(array('etudiants' => $etudiants));
}

//si $_GET['ACTION'] = delete , cette methode est appellee
public function deleteE(){
    $this->etudiantTransaction->delete($_POST['cne_delete']);
}

//si $_GET['ACTION'] = update , cette methode est appellee
public function updateE($cne){
    $this->etudiantTransaction->update($cne);
}

//si $_GET['ACTION'] = getrow , cette methode est appellee
public function getOne($cne) {
   $row = $this->etudiantTransaction->getrow($cne); 
   $view = new view("update"); 
   $view->generer(array('row' => $row));
} 
}
?>