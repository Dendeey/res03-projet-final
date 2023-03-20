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
    
    
    
}

?>