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
            $media = new Media($item["id"], $item["url"], $item["caption"]);
            $media->setId($item["id"]);
            $medias[] = $media;
            
        }
        var_dump($medias);
        return $medias;
    }


    //Créer une fonction qui ajoute une image dans la db
    public function insertMedia(Media $image)
    {
        $query = $this->db->prepare('INSERT INTO media VALUES (null, :url, :caption)');
        $parameters = [
            'url' => $image->getUrl(),
            'caption' => $image->getCaption()
            ];
        $query->execute($parameters);
        
        
    }
    
    //Créer une fonction qui delete un media
    public function deleteMedia(Media $image)
    {
        
        $query = $this->db->prepare("DELETE FROM media WHERE id=:id");
        $parameters = [
            'id'=>$image->getId()
        ];
        $query->execute($parameters);
    }
}

?>