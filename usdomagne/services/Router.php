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

    public function checkRoute() : void
    {
        
        if(!isset($_GET["path"]))
        {
            $this->pageController->accueil();
        }
        
        else
        {
            $route = explode("/", $_GET["path"]);
            
        // Côté client
            // Afficher les pages de PageController
            
            if($route[0] === "arbitres")
            {
                $this->pageController->arbitres();
            }
            
            else if($route[0] === "equipes")
            {
                $this->pageController->equipes();
            }
            
            else if($route[0] === "boutique")
            {
                $this->pageController->boutique();
            }
            
            else if($route[0] === "club")
            {
                if(!isset($route[1]))
                {
                    $this->pageController->club();
                }
                else if($route[1] === "histoire")
                {
                    
                    $this->pageController->histoire();
                    
                }
                else if($route[1] === "infrastructures")
                {
                    
                    $this->pageController->infrastructures();
                    
                }
                else if($route[1] === "partenaires")
                {
                    
                    $this->pageController->partenaires();
                    
                }
            }
            
            else if($route[0] === "contact")
            {
                $this->pageController->contact();
            }
            
            
            
        // Côté admin
            // Afficher le form d'enregistrement pour un admin
        
            else if($route[0] === "admin")
            {
                if(!isset($route[1]))
                {
                    $this->userController->adminAccueil();
                }
                
            }
        
            else if($route[0] === "register")
            {
                $post = $_POST;
                
                $this->userController->register($post);
            }
            
            else if($route[0] === "login")
            {
                $post = $_POST;
                
                var_dump($post);
                
                $this->userController->login($post);
            }
            
        }
        

    
        
    }

}

?>    