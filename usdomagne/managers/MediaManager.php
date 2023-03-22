<?php

class MediaManager extends AbstractManager
{
    
    //Créer un fonction qui permet de récupérer dans un tableau tous les medias
    public function getAllMedia() : array
    {
        // get all the media from the database
        $query = $this->db->prepare('SELECT * FROM media');
        $query->execute();
        $items = $query->fetchAll(PDO::FETCH_ASSOC);
        
        $medias = [];
        
        foreach($items as $item)
        {
            $media = new Media($item["id"], $item["url"], $item["caption"], $item["staff_id"], $item["office_id"], $item["referees_id"], $item["albums_id"], $item["posts_id"]);
            $media->setId($item["id"]);
            $medias[] = $media;
            
        }
        var_dump($medias);
        return $medias;
    }
    
    //Fonction qui récupère l'image de l'arbitre par l'id
    public function getRefereeMediaById(int $referee) : Media
    {
        $query = $this->db->prepare("SELECT * FROM media WHERE referees_id = :referees_id");
        $parameter = [
            'referees_id' => $referee
            ];
        $query->execute($parameter);
        $item = $query->fetch(PDO::FETCH_ASSOC);
        
        $refereeImage = new Media($item["url"], $item["caption"], $item["referees_id"]);
        $refereeImage->setId($item["id"]);
        
        return $refereeImage;
    
    }
    
    
    
    //Créer une fonction qui ajoute une image dans la db
    public function insertMedia(Media $image)
    {
        $query = $this->db->prepare('INSERT INTO media VALUES (null, :url, :caption,  :staff_id, :office_id, :referees_id, album_id, post_id )');
        $parameters = [
            'url' => $image->getUrl(),
            'caption' => $image->getCaption(),
            'staff_id' => $image->getStaffId(),
            'office_id' => $image->getOfficeId(),
            'referees_id' => $image->getRefereeId(),
            'album_id' => $image->getAlbumId(),
            'post_id' => $image->getPostId()
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