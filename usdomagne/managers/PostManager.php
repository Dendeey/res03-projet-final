<?php

class PostManager extends AbstractManager
{
    
    public function getAllPosts() : array
    {
        
        // get all the posts from the database
        $query = $this->db->prepare('SELECT * FROM posts');
        $query->execute();
        $items = $query->fetchAll(PDO::FETCH_ASSOC);
        
        $posts = [];
        
        foreach($items as $item)
        {
            $post = new Post($item["title"], $item["date"], $item["content"]);
            $post->setId($item["id"]);
            $posts[] = $post;
            
        }
        /*var_dump($posts);*/
        return $posts;
        
        
    }

    public function getPostById(int $id) : Post
    {
        $query = $this->db->prepare('SELECT * FROM posts WHERE id = :id');
        $parameters = [
        'id' => $id
        ];
        $query->execute($parameters);
        $post = $query->fetch(PDO::FETCH_ASSOC);

        $postToLoad = new Post($post["title"], $post["date"], $post["content"]);
        $postToLoad->setId($post["id"]);
        
        return $postToLoad;

    }

    public function insertPost(Post $post) : Post
    {
        
        $query = $this->db->prepare('INSERT INTO posts (`id`, `title`, `date`, `content`) VALUES(NULL, :title, :date, :content)');

        $parameters = [
        'title' => $post->getTitle(),
        'date' => $post->getDate(),
        'content' => $post->getContent()
        
        ];
        
        $query->execute($parameters);

        $id = $this->db->lastInsertId();
        $post->setId($id);
        echo "Un article vient d'être ajouté !";
        return $post;

    }

    public function editPost(Post $post) : void
    {
        $query = $this->db->prepare('UPDATE posts SET title = :title, date = :date, content = :content WHERE id = :id ');
        $parameters = [
            'id' => $post->getId(),
            'title' => $post->getTitle(),
            'date' => $post->getDate(),
            'content' => $post->getContent()
            
            ];

        $query->execute($parameters);
    }
    
    public function deletePost(Post $post) : void
    {
        // delete the post from the database
        $query = $this->db->prepare('DELETE FROM posts WHERE id = :id');
        $parameters = [
            'id' => $post->getId()
        ];
        $query->execute($parameters);
        
    }
    
    
    
    public function addPostMedia(int $postId, int $mediaId) : void
    {
        $query = $this->db->prepare('INSERT INTO posts_media VALUES(:posts_id, :media_id)');

        $parameters = [
            'posts_id' => $postId,
            'media_id' => $mediaId
        ];

        $query->execute($parameters);
    }
    
    public function deletePostMedia(Post $post) : void
    {
        $query = $this->db->prepare('DELETE FROM posts_media WHERE posts_id = :posts_id');

        $parameters = [

            'posts_id' => $post->getId()
        ];

        $query->execute($parameters);
    }
    
    //Fonction pour récupérer les 3 derniers articles du côté client qui ont été créés côté admin
    public function getThreeLastPosts() : array
    {
        $query = $this->db->prepare("SELECT * FROM posts ORDER BY ID DESC LIMIT 3");
        $query->execute();
        $posts = $query->fetchAll(PDO::FETCH_ASSOC);
        
        $lastPosts = [];
        foreach($posts as $post){
            $newPost = new Post($post["title"], $post["date"], $post["content"]);
            array_push($lastPosts, $newPost);
            $newPost->setId($post["id"]);
        }
        
        return $lastPosts;
    }

    public function getPostImg() : array
    {
        $query = $this->db->prepare("SELECT media.* FROM media");
        $query->execute();
        $medias = $query->fetchAll(PDO::FETCH_ASSOC);

        $tabMedias = [];
        foreach($medias as $media)
        {
            $newMedia = new Media($media['name'], $media['url']);
            $newMedia->setId($media['id']);
            $tabMedias[] = $newMedia;
        }

        return $tabMedias;
    }

}

?>