<?php


class PageController extends AbstractController
{
    
    public function __construct()
    {
        
    }
    
    public function accueil()
    {
        
        $this->renderClient("accueil", []);
        
    }
    
    
    public function arbitres() // À peut-être supprimer de la db car page peut-être finalement non dynamisée
    {
        
        $this->renderClient("arbitres", []);
        
    }
    
    public function equipes()
    {
        
        $this->renderClient("equipes", []);
        
    }
    
    public function boutique()
    {
        
        $this->renderClient("boutique", []);
        
    }
    
    public function club()
    {
        
        $this->renderClient("club", []);
        
    }
    
    public function histoire()
    {
        
        $this->renderClient("histoire", []);
        
    }
    
    public function infrastructures()
    {
        
        $this->renderClient("infrastructures", []);
        
    }
    
    public function partenaires()
    {
        
        $this->renderClient("partenaires", []);
        
    }
    
    public function contact()
    {
        
        $this->renderClient("contact", []);
        
    }
    
    
}

?>