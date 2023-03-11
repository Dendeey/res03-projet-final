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
        
        $post = $_POST;
        
        // Si la route n'existe pas, je veux afficher la page d'accueil
        
        if(!isset($_GET["path"]))
        {
            $this->pageController->accueil(); 
        }
        
        // Sinon afficher les routes demandées
        
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
            
            else if($route[0] === "register")
            {

                var_dump($post);
                
                $this->userController->register($post);
            }
        
            else if($route[0] === "admin") 
            {

                if(isset($_SESSION['admin']) && $_SESSION['admin'] === "ok") 
                {
                    // Admin connecté

                    if (!isset($route[1])) 
                    {
                       
                        $this->renderAdmin->adminAccueil();
                    }

                    else 
                    {

               
                    }
                }

                else 
                {
                    // Admin non connecté
                    
                    var_dump($post);
                    
                    $this->userController->login($post);

                }
            }
            
        }
        
    }

}

?>    