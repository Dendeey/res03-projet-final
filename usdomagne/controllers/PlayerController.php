<?php 

class PlayerController extends AbstractController
{
    
    // Attributs

    private UserManager $manager;

    // Constructor

    public  function __construct()
    {
	    $this->manager = new UserManager
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
        $this->renderAdmin("admin-convocations", []);
    }
    
}

?>