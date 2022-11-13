<?php
class view {

    private $fichier;
    private $titre;
    public function __construct($action) {
         $this->fichier = "view/view" . $action . ".php"; 
    }

    public function generer($donnees) {
        $contenu = $this->genererFichier($this->fichier, $donnees);
        $view = $this->genererFichier('view/gabarit.php',array('titre' => $this->titre, 'contenu' => $contenu));
        echo $view;
    }

    private function genererFichier($fichier, $donnees) { 
        if (file_exists($fichier)) {
            extract($donnees);
            ob_start();
            require $fichier;
            return ob_get_clean();
        } 
        else {
            throw new Exception("Fichier '$fichier' introuvable");
        }
    }
}
?>