<?php

// Requires //
require './controllers/PageController.php';


class Router
{

    // Attributs //

    private PageController $pageController;
    
    

    // Constructor //

    public function __construct()
    {
        
        $this->pageController = new PageController();
        
             
    }


    // METHODES //

    public function checkRoute() : void
    {
        // Route vers la page d'accueil
        if(isset($_GET["path"]))
        {
            
            $route = explode("/", $_GET["path"]);
            
            // Afficher les pages de PageController
            
            if($route[0] === "accueil")
            {
                $this->pageController->accueil();
            }
            
            
        }
        
    }

}

?>    