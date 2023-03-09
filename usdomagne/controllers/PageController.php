<?php


class PageController extends AbstractController
{
    
    public function __construct()
    {
        
    }
    
    public function accueil()
    {
        
        $this->renderClient("accueil", ["page-accueil"]);
        
    }
    
    
    public function arbitres() // À peut-être supprimer de la db car page peut-être finalement non dynamisée
    {
        
        $this->renderClient("arbitres", ["page-arbitres"]);
        
    }
    
    public function equipes()
    {
        
        $this->renderClient("equipes", ["page-equipes"]);
        
    }
    
    public function boutique()
    {
        
        $this->renderClient("boutique", ["page-boutique"]);
        
    }
    
    public function club()
    {
        
        $this->renderClient("club", ["page-club"]);
        
    }
    
    public function histoire()
    {
        
        $this->renderClient("histoire", ["page-histoire"]);
        
    }
    
    public function infrastructures()
    {
        
        $this->renderClient("infrastructures", ["page-infrastructures"]);
        
    }
    
    public function partenaires()
    {
        
        $this->renderClient("partenaires", ["page-partenaires"]);
        
    }
    
    public function contact()
    {
        
        $this->renderClient("contact", ["page-contact"]);
        
    }
    
    public function erreur()
    {
        
        $this->renderClient("erreur", ["page-erreur"]);
        
    }
    
}

?>