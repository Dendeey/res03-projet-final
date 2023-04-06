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
    
    //Créer un fonction qui permet d'afficher un form et d'appeler la fonction du manager insérer un media
    /*public function displayFormInsertMedia(array $post)
    {

        if (!empty($post['add-caption']))
        {

            $uploader = new Uploader();
            $media = $uploader->upload($_FILES, "add-image");
            $post["add-image"] = $media->getUrl();
            $mediaToAdd = new Media($post["add-image"], $post["add-caption"]);
            $this->manager->insertMedia($mediaToAdd);
            header('Location: /res03-projet-final/usdomagne/admin/media');
                
        }
    
        else 
        {
            $this->renderAdmin('admin-media/add-media', ['error' => 'Merci de remplir tous les champs']);
                
        }
        
        var_dump($post);
        var_dump($_FILES);
    }*/
    
    
    
    public function displayDeleteMedia(int $id)
    {
        // delete the referee in the manager
        $this->manager->deleteMediaWithId($id);

        // render the list of all referees
        header("Location: /res03-projet-final/usdomagne/admin/media");
    }
    
}

?>