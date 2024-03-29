<?php 
class PostController extends AbstractController
{
    
    // Attributs

    private PostManager $manager;
    private MediaManager $mediaManager;
    private Uploader $uploader;

    // Constructor

    public  function __construct()
    {
	    $this->manager = new PostManager
	    (
	        "davidsim_ProjetFinal",
	        "3306",
	        "db.3wa.io",
	        "davidsim",
	        "83c8b946aee433563583381d62aa9c15"
	    );
	    $this->mediaManager = new MediaManager();
	    $this->uploader = new Uploader();
    }
    

    // METHODES
    
    public function displayPosts()
    {
        $this->renderAdmin("admin-posts/admin-posts", ["posts"=>$this->manager->getAllPosts()]);
    }
    
    public function showPost(int $id)
    {
        $post = $this->manager->getPostById($id);
        $medias = $this->mediaManager->findMediaByPostId($id);
        // var_dump($post);
        // var_dump($medias);
        // die;
        foreach($medias as $media){

            $post->addMedias($media);  
            
        }
        $this->renderAdmin("admin-posts/show-post", ["posts" => $post]);
    }

    public function showPostsHomepage()
    {
        // $post = $this->manager->getPostById();
        // $medias = $this->mediaManager->findMediaByPostId();
        $posts = $this->manager->getAllPosts();
        foreach($posts as $post){
            $medias = $this->mediaManager->findMediaByPostId($post->getId());
            $post->addMedias($medias);
        }
        var_dump($post);
    }
    
    public function displayFormEditPost(array $post, int $id)
    {
        $displayPostToUpdate = $this->manager->getPostById($id);
        
        $tab = [];
        
        $tab["posts"] = $displayPostToUpdate;
        
        $this->renderAdmin("admin-posts/edit-post", $tab);
        
        if(isset($post["formEditPost"]))
        {
            if(isset($post['edit-title']) && isset($post['edit-date']) && isset($post['edit-content']) && !empty($post['edit-title']) && !empty($post['edit-date']) && !empty($post['edit-content']))
            {
                $postToUpdate = $this->manager->getPostById($id);
                $postToUpdate->setTitle($this->clean($post['edit-title']));
                $postToUpdate->setDate($this->clean($post['edit-date']));
                $postToUpdate->setContent($this->clean($post['edit-content']));
                $this->manager->editPost($postToUpdate);
                header("Location: /usdomagne/usdomagne/admin/articles");
            }
        }
    }
    
    public function displayFormAddPost($txt)
    {
        
        // var_dump($txt);
        
        if (!empty($txt['add-title']) && !empty($txt['add-date']) && !empty($txt['add-content']))
        {
            
            $media = $this->mediaManager->insertMedia($this->uploader->upload($_FILES, 'add-image'));
            $post = new Post($this->clean($txt["add-title"]), $this->clean($txt["add-date"]), $this->clean($txt["add-content"]));
            $this->manager->insertPost($post);
            $newPostMedia = $this->manager->addPostMedia($post->getId(), $media->getId());

            header('Location: /usdomagne/usdomagne/admin/articles');
            
        }

        else 
        {
            $this->renderAdmin('admin-posts/add-post', ['error' => 'Merci de remplir tous les champs']);
            
        }
        
    }
    
    public function displayDeletePost(int $id)
    {
        // delete the post in the manager
        $this->manager->deletePost($id);

        // render the list of all post
        header("Location: /usdomagne/usdomagne/admin/articles");
    }
    
    
    public function addMediaInPostMedias(array $post, int $id)
    {
        var_dump($_FILES);

        if(isset($_FILES) && !empty($_FILES)){
            $Post = $this->manager->getPostById($id);
            
            $media = $this->mediaManager->insertMedia($this->uploader->upload($_FILES, 'add-image'));
            $newPostMedia = $this->manager->addPostMedia($Post->getId(), $media->getId());

            header('Location: /usdomagne/usdomagne/admin/articles/voir/'.$id.'');
        }
    }
    
    public function displayDeletePostMedia($id)
    {
        $post = $this->manager->getPostById($id);
        $medias = $this->mediaManager->findMediaByPostId($id);
        $this->manager->deletePostMedia($post);
        $this->manager->deletePost($post);
        
        foreach($medias as $media)
        {
            $this->mediaManager->deleteMedia($media);
        }
        
        header('Location: /usdomagne/usdomagne/admin/articles');
    }

    public function actu(int $id){
        //récupération de l'article
        $actuToShow = $this->manager->getPostById($id);
        $imgActuToShow = $this->mediaManager->findMediaByPostId($id);
        
        $actuToShow->addMedias($imgActuToShow[0]);
        // var_dump($actuToShow);
        // die;
        
        // stockage de l'article dans un tableau
        $tab = [];
        $tab[] = $actuToShow;

        // affichage de la page avec l'article
        $this->renderClient("actualites/actu", ["actus" => $tab]);
    }
}
?>