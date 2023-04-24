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
        foreach($medias as $media){

            $post->addMedias($media);
            
        }
        $this->renderAdmin("admin-posts/show-post", ["posts" => $post]);
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
                $postToUpdate->setTitle($post['edit-title']);
                $postToUpdate->setDate($post['edit-date']);
                $postToUpdate->setContent($post['edit-content']);
                $this->manager->editPost($postToUpdate);
                header("Location: /res03-projet-final/usdomagne/admin/articles");
            }
        }
    }
    
    public function displayFormAddPost($post)
    {
        
        // var_dump($post);
        
        if (!empty($post['add-title']) && !empty($post['add-date']) && !empty($post['add-content']))
        {
            
            $media = $this->mediaManager->insertMedia($this->uploader->upload($_FILES, 'add-image'));
            $Post = new Post($post["add-title"], $post["add-date"], $post["add-content"]);
            $this->manager->insertPost($Post);
            $newPostMedia = $this->manager->addPostMedia($Post->getId(), $media->getId());

            header('Location: /res03-projet-final/usdomagne/admin/articles');
            
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
        header("Location: /res03-projet-final/usdomagne/admin/articles");
    }
    
    
    public function addMediaInPostMedias(array $post, int $id)
    {
        var_dump($_FILES);

        if(isset($_FILES) && !empty($_FILES)){
            $Post = $this->manager->getPostById($id);
            
            $media = $this->mediaManager->insertMedia($this->uploader->upload($_FILES, 'add-image'));
            $newPostMedia = $this->manager->addPostMedia($Post->getId(), $media->getId());

            header('Location: /res03-projet-final/usdomagne/admin/articles/voir/'.$id.'');
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
        
        header('Location: /res03-projet-final/usdomagne/admin/articles');
    }
    
}

?>