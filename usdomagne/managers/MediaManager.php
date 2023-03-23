<?php

class MediaManager extends AbstractManager
{
    
    //Créer un fonction qui permet de récupérer dans un tableau tous les medias
    public function getAllMedias() : array
    {
        // get all the media from the database
        $query = $this->db->prepare('SELECT * FROM media');
        $query->execute();
        $items = $query->fetchAll(PDO::FETCH_ASSOC);
        
        $medias = [];
        
        foreach($items as $item)
        {
            $media = new Media($item["url"], $item["caption"]);
            $media->setId($item["id"]);
            $medias[] = $media;
            
        }
        /*var_dump($medias);*/
        return $medias;
    }
    
    //Function qui récupère une image par l'id
    public function getMediaById(int $id) : Media
    {
        $query = $this->db->prepare('SELECT * FROM media WHERE id = :id');
        $parameters = [
        'id' => $id
        ];
        $query->execute($parameters);
        $media = $query->fetch(PDO::FETCH_ASSOC);

        $mediaToLoad = new Media($media['url'], $media['caption']);
        $mediaToLoad->setId($media["id"]);
        
        return $mediaToLoad;
    }


    //Créer une fonction qui ajoute une image dans la db
    public function insertMedia(Media $image) : Media
    {
        $query = $this->db->prepare('INSERT INTO media (`id`, `url`, `caption`) VALUES(NULL, :url, :caption)');
        $parameters = [
            'url' => $image->getUrl(),
            'caption' => $image->getCaption()
            ];
        $query->execute($parameters);
        
        $id = $this->db->lastInsertId();
        $image->setId($id);
        
        $query->fetch(PDO::FETCH_ASSOC);
        return $this->getMediaById($id);
        
        
    }
    
    //Créer une fonction qui delete un media
    public function deleteMedia(int $id) : void
    {
        
        $query = $this->db->prepare("DELETE FROM media WHERE id=:id");
        $parameters = [
            'id'=> $id
        ];
        $query->execute($parameters);
    }
}

?>