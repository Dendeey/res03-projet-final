<?php


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

    public function checkRoute($request) : void
    {
    
        $route = explode("/", $request);

    // Afficher les pages de PageController
        
        if($route[1] === "" || $route[1] === "accueil")
        {
            $this->pageController->accueil();
        }
        
        if($route[1] === "arbitres")
        {
            $this->pageController->arbitres();
        }
        
        if($route[1] === "equipes")
        {
            $this->pageController->equipes();
        }
        
        if($route[1] === "boutique")
        {
            $this->pageController->boutique();
        }
        
        if($route[1] === "club")
        {
            $this->pageController->club();
        }
        
        if($route[1] === "histoire")
        {
            $this->pageController->histoire();
        }
        
        if($route[1] === "infrastructures")
        {
            $this->pageController->infrastructures();
        }
        
        if($route[1] === "partenaires")
        {
            $this->pageController->partenaires();
        }
        
        if($route[1] === "contact")
        {
            $this->pageController->contact();
        }
            
    }

}

?>    