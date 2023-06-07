<?php


class PageController extends AbstractController
{
    private PostManager $postManager;
    private MediaManager $mediaManager;
    private OfficeManager $officeManager;
    private StaffManager $staffManager;
    private RefereeManager $refereeManager;

    public function __construct()
    {
        $this->postManager = new PostManager();
        $this->mediaManager = new MediaManager();
        $this->officeManager = new OfficeManager();
        $this->staffManager = new StaffManager();
        $this->refereeManager = new RefereeManager();
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
        $posts = $this->postManager->getAllPosts();
        foreach($posts as $post){
            $medias = $this->mediaManager->findMediaByPostId($post->getId());
            $post->addMedias($medias[0]);
        }

        $this->renderClient("actualites/actualites", ["pageActualites" => $posts]);
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
    
    //*** TEST PAGE SENIORS ***//
    
    public function testSeniors()
    {

        $this->renderClient("seniors/test_seniors", []);
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

    // public function club()
    // {

    //     $this->renderClient("club/club", []);
    // }

    public function histoire()
    {

        $this->renderClient("club/histoire", []);
    }

    public function bureau()
    {
        $posts = $this->officeManager->getAllOffices();
        
        foreach($posts as $post){
            $medias = $this->mediaManager->findMediaByOfficeId($post->getId());
            $post->addMedias($medias[0]);
        }
        // var_dump($posts);
        // die;
        $this->renderClient("club/bureau", ["pageBureau" => $posts]);
    }

    public function staff()
    {
        $posts = $this->staffManager->getAllStaffs();
        
        foreach($posts as $post){
            $medias = $this->mediaManager->findMediaByStaffId($post->getId());
            $post->addMedias($medias[0]);
        }
        // var_dump($posts);
        // die;
        $this->renderClient("club/staff", ["pageStaff" => $posts]);
    }

    public function infrastructures()
    {

        $this->renderClient("club/infrastructures", []);
    }

    public function arbitres()
    {
        $posts = $this->refereeManager->getAllReferees();
        
        foreach($posts as $post){
            $medias = $this->mediaManager->findMediaByRefereeId($post->getId());
            $post->addMedias($medias[0]);
        }
        // var_dump($posts);
        // die;
        
        $this->renderClient("arbitres/arbitres", ["pageArbitrage" => $posts]);
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
