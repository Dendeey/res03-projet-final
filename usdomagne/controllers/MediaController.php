<?php 

class MediaController extends AbstractController
{
    
    // Attributs

    private MediaManager $manager;

    // Constructor

    public  function __construct()
    {
	    $this->manager = new MediaManager
	    (
	        "davidsim_ProjetFinal",
	        "3306",
	        "db.3wa.io",
	        "davidsim",
	        "83c8b946aee433563583381d62aa9c15"
	    );
    }
    

    // METHODES
    
    //Créer un fonction qui permet d'afficher toutes les images
    public function displayMedia()
    {
        $this->renderAdmin("admin-media/admin-media", ["media"=>$this->manager->getAllMedias()]);
    }

    //Fonction qui permet de supprimer un media de la table medias
    public function displayDeleteMedia(int $id)
    {
        // delete the referee in the manager
        $this->manager->deleteMediaWithId($id);

        // render the list of all referees
        header("Location: /res03-projet-final/usdomagne/admin/media");
    }
}

?>