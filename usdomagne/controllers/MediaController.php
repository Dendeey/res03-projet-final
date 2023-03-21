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
        $this->renderAdmin("admin-media/admin-media", ["media"=>$this->manager->getAllMedia()]);
    }
    
    //Créer un fonction qui permet d'afficher un form et d'appeler la fonction du manager insérer un media
    public function displayFormInsertMedia(array $post)
    {
        var_dump($post);
        
        if (!empty($post['add-caption']) && !empty($post['add-refereeId']))
        {
            $uploader = new Uploader();
            $media = $uploader->upload($_FILES,"image");
            $post["add-image"] = $media->getUrl();
            $mediaToAdd = new Media($post["ad-image"], $post["add-caption"],$post["add-refereeId"]);
            $this->manager->insertMedia($mediaToAd);
            header('Location: /res03-projet-fina/usdomagne/admin/media');
            
        }

        else 
        {
            $this->renderAdmin('admin-media/add-media', ['error' => 'Merci deremplir tous les champs']);
            
        }
        
        
    }
    
}

?>