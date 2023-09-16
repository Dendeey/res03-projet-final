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
    
    
    public function displayFormEditPlayer(array $post, int $id)
    {
        $displayPlayerToUpdate = $this->manager->getPlayerById($id);
        
        $tab = [];
        
        $tab["players"] = $displayPlayerToUpdate;
        /*var_dump($tab);*/
        
        $this->renderAdmin("admin-joueurs/edit-player", $tab);
        
        if(isset($post["formEditPlayer"]))
        {
            if(isset($post['edit-firstname']) && isset($post['edit-lastname']) && !empty($post['edit-firstname']) && !empty($post['edit-lastname']))
            {
                $playerToUpdate = $this->manager->getPlayerById($id);
                $playerToUpdate->setFirstName($this->clean($post['edit-firstname']));
                $playerToUpdate->setLastName($this->clean($post['edit-lastname']));
                $this->manager->editPlayer($playerToUpdate);
                header("Location: /usdomagne/usdomagne/admin/joueurs");
            }
        }
    }
    
    public function displayDeletePlayer(int $id)
    {
        // delete the player in the manager
        $this->manager->deletePlayer($id);

        // render the list of all users
        header("Location: /usdomagne/usdomagne/admin/joueurs");
    }
    
    public function displayFormAddPlayer(array $post) : void
    {
        
        /*var_dump($post);*/
        
        if (!empty($post['add-firstname']) && !empty($post['add-lastname']))
        {
            
            $playerToAdd = new Player($this->clean($post["add-firstname"]), $this->clean($post["add-lastname"]));
            $this->manager->insertPlayer($playerToAdd);
            header('Location: /usdomagne/usdomagne/admin/joueurs');
            
        }

        else 
        {
            $this->renderAdmin('admin-joueurs/add-player', ['error' => 'Merci de remplir tous les champs']);
            
        }
        
    }
    
}

?>