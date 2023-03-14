<?php 

class PlayerController extends AbstractController
{
    
    // Attributs

    private PlayerManager $manager;

    // Constructor

    public  function __construct()
    {
	    $this->manager = new PlayerManager
	    (
	        "davidsim_ProjetFinal",
	        "3306",
	        "db.3wa.io",
	        "davidsim",
	        "83c8b946aee433563583381d62aa9c15"
	    );
    }
    

    // METHODES
    
    public function convocations()
    {
        $this->renderAdmin("admin-convocations/admin-convocations", []);
    }
    
    public function players()
    {
        $this->renderAdmin("admin-joueurs/admin-joueurs", []);
    }
    
    public function showPlayer()
    {
        $this->renderAdmin("admin-joueurs/show-player", []);
    }
    
    public function editPlayer()
    {
        $this->renderAdmin("admin-joueurs/edit-player", []);
    }
    
    public function addPlayer(array $post) : void
    {
        
        if (!empty($post['add-firstname']) && !empty($post['add-lastname']))
        {
            
            $playerToAdd = new Player($post["add-firstname"], $post["add-lastname"]);
            $this->manager->insertPlayer($playerToAdd);
            $this->renderAdmin("admin-joueurs/add-player", []);
            
        }

        else 
        {
            $this->renderAdmin('admin-joueurs/add-player', ['error' => 'Merci de remplir tous les champs']);
            
        }
        
    }
    
}

?>