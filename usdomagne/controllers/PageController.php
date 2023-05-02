<?php


class PageController extends AbstractController
{
    private PostManager $postManager;
    private MediaManager $mediaManager;

    public function __construct()
    {
        $this->postManager = new PostManager();
        $this->mediaManager = new MediaManager();
    }

    public function accueil()
    {
        $posts = $this->postManager->getThreeLastPosts();
        foreach($posts as $post){
            $medias = $this->mediaManager->findMediaByPostId($post->getId());
            $post->addMedias($medias[0]);
        }
        $this->renderClient("accueil/accueil", ["homepagePosts" => $posts]);
    }

    public function actualites()
    {

        $this->renderClient("actualites/actualites", ["pageActualites" => $this->postManager->getAllPosts()]);
    }

    public function ecoleDeFoot()
    {

        $this->renderClient("equipes/ecole-de-foot", []);
    }

    public function groupementJeunes()
    {

        $this->renderClient("equipes/groupement-jeunes", []);
    }

    public function veterans()
    {

        $this->renderClient("equipes/veterans", []);
    }

    public function seniors()
    {

        $this->renderClient("equipes/seniors", []);
    }

    public function seniorA()
    {

        $this->renderClient("seniors/seniorA", []);
    }
    
    public function seniorB()
    {

        $this->renderClient("seniors/seniorB", []);
    }
    
    public function seniorC()
    {

        $this->renderClient("seniors/seniorC", []);
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

    public function erreur()
    {
        $this->renderClient("erreur/erreur", []);
    }
}
