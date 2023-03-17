<?php 

class RefereeController extends AbstractController
{
    
    // Attributs

    private RefereeManager $manager;

    // Constructor

    public  function __construct()
    {
	    $this->manager = new RefereeManager
	    (
	        "davidsim_ProjetFinal",
	        "3306",
	        "db.3wa.io",
	        "davidsim",
	        "83c8b946aee433563583381d62aa9c15"
	    );
    }
    

    // METHODES
    
    
    public function displayReferees()
    {
        $this->renderAdmin("admin-referees/admin-referees", ["referees"=>$this->manager->getAllReferees()]);
    }
    
    
    public function displayFormEditReferee(array $post, int $id)
    {
        $displayRefereeToUpdate = $this->manager->getRefereeById($id);
        
        $tab = [];
        
        $tab["referees"] = $displayRefereeToUpdate;
        
        $this->renderAdmin("admin-referees/edit-referee", $tab);
        
        if(isset($post["formEditReferee"]))
        {
            if(isset($post['edit-firstname']) && isset($post['edit-lastname']) && !empty($post['edit-firstname']) && !empty($post['edit-lastname']))
            {
                $refereeToUpdate = $this->manager->getRefereeById($id);
                $refereeToUpdate->setFirstName($post['edit-firstname']);
                $refereeToUpdate->setLastName($post['edit-lastname']);
                $this->manager->editReferee($refereeToUpdate);
                header("Location: /res03-projet-final/usdomagne/admin/arbitres");
            }
        }
    }
    
    public function displayDeleteReferee(int $id)
    {
        // delete the referee in the manager
        $this->manager->deleteReferee($id);

        // render the list of all referees
        header("Location: /res03-projet-final/usdomagne/admin/arbitres");
    }
    
    public function displayFormAddReferee(array $post) : void
    {
        
        /*var_dump($post);*/
        
        if (!empty($post['add-firstname']) && !empty($post['add-lastname']) && !empty($post['add-image']))
        {
            
            $refereeToAdd = new Referee($post["add-firstname"], $post["add-lastname"], $post["add-image"]);
            $this->manager->insertReferee($refereeToAdd);
            header('Location: /res03-projet-final/usdomagne/admin/arbitres');
            
        }

        else 
        {
            $this->renderAdmin('admin-referees/add-referee', ['error' => 'Merci de remplir tous les champs']);
            
        }
        
    }
    
}

?>