<?php 

class RefereeController extends AbstractController
{
    
    // Attributs

    private RefereeManager $manager;
    private MediaManager $mediaManager;
    private Uploader $uploader;

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
	    $this->mediaManager = new MediaManager();
	    $this->uploader = new Uploader();
    }
    

    // METHODES
    
    public function arbitres()
    {
        $this->renderClient("arbitres/arbitres", ["referees"=>$this->manager->getAllReferees()]);
    }
    
    
    public function displayReferees()
    {
        $this->renderAdmin("admin-referees/admin-referees", ["referees"=>$this->manager->getAllReferees()]);
    }
    
    public function showReferee(int $id)
    {
        $referee = $this->manager->getRefereeById($id);
        $medias = $this->mediaManager->findMediaByRefereeId($id);
        foreach($medias as $media){

            $referee->addMedias($media);
            
        }
        $this->renderAdmin("admin-referees/show-referee", ["referees" => $referee]);
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
    
    public function displayFormAddReferee($post)
    {
        
        var_dump($post);
        
        if (!empty($post['add-firstname']) && !empty($post['add-lastname']))
        {
            /*$refereeToAdd = new Referee($post["add-firstname"], $post["add-lastname"]);
            $this->manager->insertReferee($refereeToAdd);
            header('Location: /res03-projet-final/usdomagne/admin/arbitres');*/
            
            $media = $this->mediaManager->insertMedia($this->uploader->upload($_FILES, 'add-image'));
            $referee = new Referee($post["add-firstname"], $post["add-lastname"]);
            $this->manager->insertReferee($referee);
            $newRefereeMedia = $this->manager->addRefereeMedia($referee->getId(), $media->getId());

            header('Location: /res03-projet-final/usdomagne/admin/arbitres');
            
        }

        else 
        {
            $this->renderAdmin('admin-referees/add-referee', ['error' => 'Merci de remplir tous les champs']);
            
        }
        
    }
    
    public function displayDeleteReferee(int $id)
    {
        // delete the referee in the manager
        $this->manager->deleteReferee($id);

        // render the list of all referees
        header("Location: /res03-projet-final/usdomagne/admin/arbitres");
    }
    
    
    public function addMediaInRefereesMedias(array $post, int $id)
    {
        var_dump($_FILES);

        if(isset($_FILES) && !empty($_FILES)){
            $referee = $this->manager->getRefereeById($id);
            
            $media = $this->mediaManager->insertMedia($this->uploader->upload($_FILES, 'add-image'));
            $newRefereeMedia = $this->manager->addRefereeMedia($referee->getId(), $media->getId());

            header('Location: /res03-projet-final/usdomagne/admin/arbitres/voir/'.$id.'');
        }
    }
    
    
}

?>