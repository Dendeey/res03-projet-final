<?php


class Router
{

    // Attributs //

    private PageController $pageController;
    private UserController $userController;
    private PlayerController $playerController;
    private RefereeController $refereeController;
    private MediaController $mediaController;
    private OfficeController $officeController;
    private StaffController $staffController;
    private PostController $postController;
    
    

    // Constructor //

    public function __construct()
    {
        
        $this->pageController = new PageController();
        $this->userController = new UserController();
        $this->playerController = new PlayerController();
        $this->refereeController = new RefereeController();
        $this->mediaController = new MediaController();
        $this->officeController = new OfficeController();
        $this->staffController = new StaffController();
        $this->postController = new PostController();
             
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
            // Afficher les pages visibles de l'utilisateur
            
            if($route[0] === "arbitres")
            {
                $this->refereeController->arbitres();
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
                    
                    else if($route[1] === "joueurs")
                    {
                        if(!isset($route[2]))
                        {
                            $this->playerController->displayPlayers();
                        }
                        
                        else if($route[2] === "modifier")
                        {
                            
                            if(isset($route[3]))
                            {
                                $this->playerController->displayFormEditPlayer($post, $route[3]);
                            }
                            
                        }
                        
                        else if($route[2] === "supprimer")
                        {
                            if(isset($route[3]))
                            {
                                $this->playerController->displayDeletePlayer($route[3]);
                            }
                            
                        }
                        
                        else if($route[2] === "creer-un-joueur")
                        {
                            $this->playerController->displayFormAddPlayer($post);
                        }
                    }
                    
                    
                    /*else if($route[1] === "convocations")
                    {
                        $this->playerController->displayConvocations();
                    }*/
                    
                    else if($route[1] === "arbitres")
                    {
                        if(!isset($route[2]))
                        {
                            $this->refereeController->displayReferees();
                        }
                        
                        else if($route[2] === "voir")
                        {
                            if(isset($route[3]))
                            {
                                $this->refereeController->showReferee($route[3]);
                            }
                        }
                        
                        else if($route[2] === "modifier")
                        {
                            
                            if(isset($route[3]))
                            {
                                $this->refereeController->displayFormEditReferee($post, $route[3]);
                    
                                
                            }
                            
                        }
                        
                        else if($route[2] === "supprimer")
                        {
                            if(isset($route[3]))
                            {
                                $this->refereeController->displayDeleteRefereeMedia($route[3]);
                            }
                            
                        }
                        
                        else if($route[2] === "creer-un-arbitre")
                        {
                            $this->refereeController->displayFormAddReferee($post);
                        }
                    }
                    
                    else if($route[1] === "bureau")
                    {
                        if(!isset($route[2]))
                        {
                            $this->officeController->displayOffices();
                        }
                        
                        else if($route[2] === "voir")
                        {
                            if(isset($route[3]))
                            {
                                $this->officeController->showOffice($route[3]);
                            }
                        }
                        
                        else if($route[2] === "modifier")
                        {
                            
                            if(isset($route[3]))
                            {
                                $this->officeController->displayFormEditOffice($post, $route[3]);
                    
                                
                            }
                            
                        }
                        
                        else if($route[2] === "supprimer")
                        {
                            if(isset($route[3]))
                            {
                                $this->officeController->displayDeleteOfficeMedia($route[3]);
                            }
                            
                        }
                        
                        else if($route[2] === "creer-un-bureau")
                        {
                            $this->officeController->displayFormAddOffice($post);
                        }
                    }
                    
                    else if($route[1] === "staff")
                    {
                        if(!isset($route[2]))
                        {
                            $this->staffController->displayStaffs();
                        }
                        
                        else if($route[2] === "voir")
                        {
                            if(isset($route[3]))
                            {
                                $this->staffController->showStaff($route[3]);
                            }
                        }
                        
                        else if($route[2] === "modifier")
                        {
                            
                            if(isset($route[3]))
                            {
                                $this->staffController->displayFormEditStaff($post, $route[3]);
                    
                                
                            }
                            
                        }
                        
                        else if($route[2] === "supprimer")
                        {
                            if(isset($route[3]))
                            {
                                $this->staffController->displayDeleteStaffMedia($route[3]);
                            }
                            
                        }
                        
                        else if($route[2] === "creer-un-staff")
                        {
                            $this->staffController->displayFormAddStaff($post);
                        }
                    }
                    
                    else if($route[1] === "articles")
                    {
                        if(!isset($route[2]))
                        {
                            $this->postController->displayPosts();
                        }
                        
                        else if($route[2] === "voir")
                        {
                            if(isset($route[3]))
                            {
                                $this->postController->showPost($route[3]);
                            }
                        }
                        
                        else if($route[2] === "modifier")
                        {
                            
                            if(isset($route[3]))
                            {
                                $this->postController->displayFormEditPost($post, $route[3]);
                    
                                
                            }
                            
                        }
                        
                        else if($route[2] === "supprimer")
                        {
                            if(isset($route[3]))
                            {
                                $this->postController->displayDeletePostMedia($route[3]);
                            }
                            
                        }
                        
                        else if($route[2] === "creer-un-article")
                        {
                            $this->postController->displayFormAddPost($post);
                        }
                    }
                    
                    else if($route[1] === "media")
                    {
                        if(!isset($route[2]))
                        {
                            $this->mediaController->displayMedia();
                        }
                        else if($route[2 === "supprimer"])
                        {
                            if(isset($route[3]))
                            {
                                $this->mediaController->displayDeleteMedia($route[3]);
                            }
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