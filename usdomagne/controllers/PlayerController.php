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
    
    public function displayConvocations()
    {
        $this->renderAdmin("admin-convocations/admin-convocations", []);
    }
    
    public function displayPlayers()
    {
        $this->renderAdmin("admin-joueurs/admin-joueurs", ["players"=>$this->manager->getAllPlayers()]);
    }
    
    public function showPlayer()
    {
        $this->renderAdmin("admin-joueurs/show-player", []);
    }
    
    public function displayEditPlayer()
    {
        $this->renderAdmin("admin-joueurs/edit-player", []);
    }
    
    public function displayDeletePlayer(int $id)
    {
        // delete the player in the manager
        $players = $this->manager->deletePlayer($id);

        $list = [];
        
        foreach($players as $player)
        {
            $list[] = $player->toArray();
        }

        // render the list of all users
        $this->renderAdmin("admin-joueurs/admin-joueurs", ["players"=>$this->manager->getAllPlayers()]);
    }
    
    public function addPlayer(array $post) : void
    {
        
        /*var_dump($post);*/
        
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