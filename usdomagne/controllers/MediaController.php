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
    public function displayFormInsertMedia(array $post)
    {
        var_dump($post);
        
        
        if (!empty($post['add-caption']) && !empty($post['add-refereeId']))
        {
            var_dump($_FILES);
            
            $uploader = new Uploader();
            $media = $uploader->upload($_FILES, "add-image");
            $post["add-image"] = $media->getUrl();
            $mediaToAdd = new Media(null, $post["add-image"], $post["add-caption"], $post["add-staffId"], $post["add-officeId"], $post["add-refereeId"], $post["add-albumId"], $post["add-postId"]);
            $this->manager->insertMedia($mediaToAdd);
            header('Location: /res03-projet-final/usdomagne/admin/media');
                
        }
    
        else 
        {
            $this->renderAdmin('admin-media/add-media', ['error' => 'Merci de remplir tous les champs']);
                
        }
        
        
    }
    
}

?>