<?php


class PageController extends AbstractController
{
    private PostManager $postManager;
    private PostController $postController;
    
    public function __construct()
    {
        $this->postManager = new PostManager();
        $this->postController = new PostController();
    }
    
    public function accueil()
    {
        $this->renderClient("accueil/accueil", ["homepagePosts"=>$this->postManager->getThreeLastPosts()]);
    }
    
    public function actualites()
    {
        
        $this->renderClient("actualites/actualites", ["pageActualites"=>$this->postManager->getAllPosts()]);
        
    }
    
    public function ecoleDeFoot()
    {
        
        $this->renderClient("ecole-de-foot/ecole-de-foot", []);
        
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
