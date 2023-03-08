<?php

// Requires //
require '../controllers/PageController.php';
require '../controllers/PlayerController.php';


class Router
{

    // Attributs //

    private PageController $pageController;
    private PlayerController $playerController;
    

    // Constructor //

    public function __construct()
    {
        
        $this->pageController = new PageController();
        $this->playerController = new PlayerController();
             
    }


    // METHODES //

    public function checkRoute(string $route) : void
    {
        
        if()
        
    }

}

?>    