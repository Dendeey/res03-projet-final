<?php


class Router
{

    // Attributs //

    private PageController $pageController;
    private UserController $userController;
    
    

    // Constructor //

    public function __construct()
    {
        
        $this->pageController = new PageController();
        $this->userController = new UserController();
        
             
    }


    // METHODES //

    public function checkRoute($request) : void
    {
    
        $route = explode("/", $request);

    // Afficher les pages de PageController
        
        if($route[1] === "" || $route[1] === "accueil")
        {
            $this->pageController->accueil();
        }
        
        else if($route[1] === "arbitres")
        {
            $this->pageController->arbitres();
        }
        
        else if($route[1] === "equipes")
        {
            $this->pageController->equipes();
        }
        
        else if($route[1] === "boutique")
        {
            $this->pageController->boutique();
        }
        
        else if($route[1] === "club")
        {
            if(!isset($route[2]))
            {
                $this->pageController->club();
            }
            else if($route[2] === "histoire")
            {
                
                $this->pageController->histoire();
                
            }
            else if($route[2] === "infrastructures")
            {
                
                $this->pageController->infrastructures();
                
            }
            else if($route[2] === "partenaires")
            {
                
                $this->pageController->partenaires();
                
            }
        }
        
        else if($route[1] === "contact")
        {
            $this->pageController->contact();
        }
        
        
    // Afficher page authentification pour admin
    
        if($route[1] === "authentification")
        {
            $this->userController->authentification();
        }

        else
        {
            
            $this->pageController->erreur();
            
        }
            
    }

}

?>    