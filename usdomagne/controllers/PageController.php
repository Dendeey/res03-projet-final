<?php


class PageController extends AbstractController
{
    
    public function __construct()
    {
        
    }
    
    public function accueil()
    {
        
        $this->renderClient("accueil/accueil", []);
        
    }
    
    
    public function arbitres() // À peut-être supprimer de la db car page peut-être finalement non dynamisée
    {
        
        $this->renderClient("arbitres/arbitres", []);
        
    }
    
    public function equipes()
    {
        
        $this->renderClient("equipes/equipes", []);
        
    }
    
    public function boutique()
    {
        
        $this->renderClient("boutique/boutique", []);
        
    }
    
    public function club()
    {
        
        $this->renderClient("club/club", []);
        
    }
    
    public function histoire()
    {
        
        $this->renderClient("histoire/histoire", []);
        
    }
    
    public function infrastructures()
    {
        
        $this->renderClient("infrastructures/infrastructures", []);
        
    }
    
    public function partenaires()
    {
        
        $this->renderClient("partenaires/partenaires", []);
        
    }
    
    public function contact()
    {
        
        $this->renderClient("contact/contact", []);
        
    }
    
    
}

?>