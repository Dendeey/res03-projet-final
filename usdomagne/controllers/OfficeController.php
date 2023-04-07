<?php 

class OfficeController extends AbstractController
{
    
    // Attributs

    private OfficeManager $manager;
    private MediaManager $mediaManager;
    private Uploader $uploader;

    // Constructor

    public  function __construct()
    {
	    $this->manager = new OfficeManager
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
    
    
    
    
    public function displayOffices()
    {
        $this->renderAdmin("admin-office/admin-office", ["offices"=>$this->manager->getAllOffices()]);
    }
    
    public function showOffice(int $id)
    {
        $office = $this->manager->getOfficeById($id);
        $medias = $this->mediaManager->findMediaByOfficeId($id);
        foreach($medias as $media){

            $office->addMedias($media);
            
        }
        $this->renderAdmin("admin-office/show-office", ["office" => $office]);
    }
    
    
    public function displayFormEditOffice(array $post, int $id)
    {
        $displayOfficeToUpdate = $this->manager->getOfficeById($id);
        
        $tab = [];
        
        $tab["office"] = $displayOfficeToUpdate;
        
        $this->renderAdmin("admin-office/edit-office", $tab);
        
        if(isset($post["formEditOffice"]))
        {
            if(isset($post['edit-firstname']) && isset($post['edit-lastname']) && isset($post['edit-phonenumber']) && isset($post['edit-role']) && !empty($post['edit-firstname']) && !empty($post['edit-lastname']) && !empty($post['edit-phonenumber']) && !empty($post['edit-role']))
            {
                $officeToUpdate = $this->manager->getOfficeById($id);
                $officeToUpdate->setFirstName($post['edit-firstname']);
                $officeToUpdate->setLastName($post['edit-lastname']);
                $officeToUpdate->setPhoneNumber($post['edit-phonenumber']);
                $officeToUpdate->setRole($post['edit-role']);
                $this->manager->editOffice($officeToUpdate);
                header("Location: /res03-projet-final/usdomagne/admin/bureau");
            }
        }
    }
    
    public function displayFormAddOffice($post)
    {
        
        // var_dump($post);
        
        if (!empty($post['add-firstname']) && !empty($post['add-lastname']) && !empty($post['add-phonenumber']) && !empty($post['add-role']))
        {
            
            $media = $this->mediaManager->insertMedia($this->uploader->upload($_FILES, 'add-image'));
            $office = new Office($post["add-firstname"], $post["add-lastname"], $post["add-phonenumber"], $post["add-role"]);
            $this->manager->insertOffice($office);
            $newOfficeMedia = $this->manager->addOfficeMedia($office->getId(), $media->getId());

            header('Location: /res03-projet-final/usdomagne/admin/bureau');
            
        }

        else 
        {
            $this->renderAdmin('admin-office/add-office', ['error' => 'Merci de remplir tous les champs']);
            
        }
        
    }
    
    public function displayDeleteOffice(int $id)
    {
        // delete the office in the manager
        $this->manager->deleteOffice($id);

        // render the list of all office
        header("Location: /res03-projet-final/usdomagne/admin/bureau");
    }
    
    
    public function addMediaInOfficeMedias(array $post, int $id)
    {
        var_dump($_FILES);

        if(isset($_FILES) && !empty($_FILES)){
            $office = $this->manager->getOfficeById($id);
            
            $media = $this->mediaManager->insertMedia($this->uploader->upload($_FILES, 'add-image'));
            $newofficeMedia = $this->manager->addOfficeMedia($office->getId(), $media->getId());

            header('Location: /res03-projet-final/usdomagne/admin/bureau/voir/'.$id.'');
        }
    }
    
    public function displayDeleteOfficeMedia($id)
    {
        $office = $this->manager->getOfficeById($id);
        $medias = $this->mediaManager->findMediaByOfficeId($id);
        $this->manager->deleteOfficeMedia($office);
        $this->manager->deleteOffice($office);
        
        foreach($medias as $media)
        {
            $this->mediaManager->deleteMedia($media);
        }
        
        header('Location: /res03-projet-final/usdomagne/admin/bureau');
    }
    
}

?>