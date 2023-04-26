<?php


class PageController extends AbstractController
{
    private PostManager $postManager;
    
    public function __construct()
    {
        $this->postManager = new PostManager();
    }
    
    public function accueil()
    {
        $this->renderClient("accueil/accueil", ["homepagePosts"=>$this->postManager->getThreeLastPosts(), "homepageImg"=>$this->postManager->getPostImg()]);
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
