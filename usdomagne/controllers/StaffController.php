<?php 

class StaffController extends AbstractController
{
    
    // Attributs

    private StaffManager $manager;
    private MediaManager $mediaManager;
    private Uploader $uploader;

    // Constructor

    public  function __construct()
    {
	    $this->manager = new StaffManager
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
    
    
    
    
    public function displayStaffs()
    {
        $this->renderAdmin("admin-staff/admin-staff", ["staffs"=>$this->manager->getAllStaffs()]);
    }
    
    public function showStaff(int $id)
    {
        $staff = $this->manager->getStaffById($id);
        $medias = $this->mediaManager->findMediaByStaffId($id);
        foreach($medias as $media){

            $staff->addMedias($media);
            
        }
        $this->renderAdmin("admin-staff/show-staff", ["staff" => $staff]);
    }
    
    
    public function displayFormEditStaff(array $post, int $id)
    {
        $displayStaffToUpdate = $this->manager->getStaffById($id);
        
        $tab = [];
        
        $tab["staff"] = $displayStaffToUpdate;
        
        $this->renderAdmin("admin-staff/edit-staff", $tab);
        
        if(isset($post["formEditStaff"]))
        {
            if(isset($post['edit-firstname']) && isset($post['edit-lastname']) && isset($post['edit-phonenumber']) && isset($post['edit-role']) && !empty($post['edit-firstname']) && !empty($post['edit-lastname']) && !empty($post['edit-phonenumber']) && !empty($post['edit-role']))
            {
                $staffToUpdate = $this->manager->getStaffById($id);
                $staffToUpdate->setFirstName($this->clean($post['edit-firstname']));
                $staffToUpdate->setLastName($this->clean($post['edit-lastname']));
                $staffToUpdate->setPhoneNumber($this->clean($post['edit-phonenumber']));
                $staffToUpdate->setRole($this->clean($post['edit-role']));
                $this->manager->editStaff($staffToUpdate);
                header("Location: /usdomagne/usdomagne/admin/staff");
            }
        }
    }
    
    public function displayFormAddStaff($post)
    {
        
        // var_dump($post);
        
        if (!empty($post['add-firstname']) && !empty($post['add-lastname']) && !empty($post['add-phonenumber']) && !empty($post['add-role']))
        {
            
            $media = $this->mediaManager->insertMedia($this->uploader->upload($_FILES, 'add-image'));
            $staff = new staff($this->clean($post["add-firstname"]), $this->clean($post["add-lastname"]), $this->clean($post["add-phonenumber"]), $this->clean($post["add-role"]));
            $this->manager->insertStaff($staff);
            $newstaffMedia = $this->manager->addStaffMedia($staff->getId(), $media->getId());

            header('Location: /usdomagne/usdomagne/admin/staff');
            
        }

        else 
        {
            $this->renderAdmin('admin-staff/add-staff', ['error' => 'Merci de remplir tous les champs']);
            
        }
        
    }
    
    public function displayDeleteStaff(int $id)
    {
        // delete the staff in the manager
        $this->manager->deleteStaff($id);

        // render the list of all staff
        header("Location: /usdomagne/usdomagne/admin/staff");
    }
    
    
    public function addMediaInStaffMedias(array $post, int $id)
    {
        var_dump($_FILES);

        if(isset($_FILES) && !empty($_FILES)){
            $staff = $this->manager->getStaffById($id);
            
            $media = $this->mediaManager->insertMedia($this->uploader->upload($_FILES, 'add-image'));
            $newStaffMedia = $this->manager->addStaffMedia($staff->getId(), $media->getId());

            header('Location: /usdomagne/usdomagne/admin/staff/voir/'.$id.'');
        }
    }
    
    public function displayDeleteStaffMedia($id)
    {
        $staff = $this->manager->getStaffById($id);
        $medias = $this->mediaManager->findMediaByStaffId($id);
        $this->manager->deleteStaffMedia($staff);
        $this->manager->deleteStaff($staff);
        
        foreach($medias as $media)
        {
            $this->mediaManager->deleteMedia($media);
        }
        
        header('Location: /usdomagne/usdomagne/admin/staff');
    }
    
}

?>