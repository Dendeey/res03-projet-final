<?php


class Router
{

    // Attributs //

    private PageController $pageController;
    private UserController $userController;
    private PlayerController $playerController;
    
    

    // Constructor //

    public function __construct()
    {
        
        $this->pageController = new PageController();
        $this->userController = new UserController();
        $this->playerController = new PlayerController();
        
             
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
                $this->userController->register($post);
            }
        
            else if($route[0] === "admin") 
            {

                if(isset($_SESSION['isConnected']) && $_SESSION['isConnected'] === true) 
                {
                    // Admin connecté

                    if (!isset($route[1])) 
                    {
                       
                        $this->userController->adminAccueil();
                    }
                    
                    else if($route[1] === "convocations")
                    {
                        $this->playerController->displayConvocations();
                    }
                    
                    else if($route[1] === "joueurs")
                    {
                        if(!isset($route[2]))
                        {
                            $this->playerController->displayPlayers();
                        }
                        
                        else if($route[2] === "voir")
                        {
                            $this->playerController->showPlayer();
                        }
                        
                        else if($route[2] === "modifier")
                        {
                            $this->playerController->displayEditPlayer();
                        }
                        
                        else if($route[2] === "supprimer")
                        {
                            
                            $this->playerController->displayDeletePlayer();
                        }
                        
                        else if($route[2] === "creer-un-joueur")
                        {
                            $this->playerController->addPlayer($post);
                        }
                    }
                    

                }

                else 
                {
                    // Admin non connecté
                    
                    $this->userController->login($post);

                }
            }
            
            else if($route[0] === "logout")
            {
                $this->userController->logout();
            }
            
        }
        
    }

}

?>    