<?php
 require_once 'Controller/ControllerEtudiant.php'; 
 require_once 'view/view.php';

 class  Routeur{

 private $ctrlEtudiant;

 public function __construct() {
    $this->ctrlEtudiant = new ControllerEtudiant(); 
}

// Traite une requête entrante
public function routerRequete() { 
     
try {
        if (isset($_GET['action'])) 
        {

                if ($_GET['action'] == 'etudiant') {
                            $this->ctrlEtudiant->getEtus(); 
                }

                else if($_GET['action'] == 'add'){
                $this->ctrlEtudiant->addE(); 
                } 

                else if($_GET['action'] == 'save'){
                $this->ctrlEtudiant->saveE(); 
                }

                else if($_GET['action'] == 'delete'){
                $this->ctrlEtudiant->deleteE();
                }

                else if($_GET['action'] == 'update'){
                $this->ctrlEtudiant->updateE($_POST['old_cne']);
                }

                else if($_GET['action'] == 'getrow'){
                $this->ctrlEtudiant->getOne($_POST['cne_update']);
                }
                else{
                    throw new Exception("Action non valide");
                } 
    }
}
catch (Exception $e) {

        $this->erreur($e->getMessage()); 
}
 }
  
//  private function erreur($msgErreur) {

//  $view = new view("Error"); 
//  $view->generer(array('msgErreur' => $msgErreur));

 //} 

}
  