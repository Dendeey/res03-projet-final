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
            $media = new Media($item["name"], $item["url"]);
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

        $mediaToLoad = new Media($media['name'] ,$media['url']);
        $mediaToLoad->setId($media["id"]);
        
        return $mediaToLoad;
    }


    //Créer une fonction qui ajoute une image dans la db
    public function insertMedia(Media $image) : Media
    {
        $query = $this->db->prepare('INSERT INTO media VALUES(:id, :name, :url)');
        $parameters = [
            'id' => null,
            'name' => $image->getName(),
            'url' => $image->getUrl()
            ];
        $query->execute($parameters);
        
        $id = $this->db->lastInsertId();
        $image->setId($id);
        
        $mediaToLoad = $query->fetch(PDO::FETCH_ASSOC);
        return $this->getMediaById($id);

        
    }
    
    //Créer une fonction qui delete un media par un Media
    public function deleteMedia(Media $media) : void
    {
        
        $query = $this->db->prepare("DELETE FROM media WHERE id=:id");
        $parameters = [
            'id'=> $media->getId()
        ];
        $query->execute($parameters);
    }
    
    //Créer un fonction qui delete un media par un id
    public function deleteMediaWithId(int $id) : void
    {
        
        $query = $this->db->prepare("DELETE FROM media WHERE id=:id");
        $parameters = [
            'id'=> $id
        ];
        $query->execute($parameters);
    }

    //Fonction qui récupère l'image correspondante à son arbitre en lui rentrant en paramètre l'id de l'arbitre    
    public function findMediaByRefereeId(int $id) : array
    {
        $query = $this->db->prepare('SELECT media.* FROM media JOIN referees_media ON media.id = referees_media.media_id JOIN referees ON referees.id = referees_media.referees_id WHERE referees.id = :id');

        $parameters = [

            'id' => $id
        ];

        $query->execute($parameters);

        $medias = $query->fetchAll(PDO::FETCH_ASSOC);

        $mediasArray = [];
        foreach($medias as $media)
        {
            
            $newMedia = new Media($media['name'], $media['url']);
            $newMedia->setId($media['id']);
            $mediasArray[] = $newMedia;
            
        }
        
        return $mediasArray;

    }
    
    //Fonction qui récupère l'image correspondante à son bureau en lui rentrant en paramètre l'id du bureau  
    public function findMediaByOfficeId(int $id) : array
    {
        $query = $this->db->prepare('SELECT media.* FROM media JOIN office_media ON media.id = office_media.media_id JOIN office ON office.id = office_media.office_id WHERE office.id = :id');

        $parameters = [

            'id' => $id
        ];

        $query->execute($parameters);

        $medias = $query->fetchAll(PDO::FETCH_ASSOC);

        $mediasArray = [];
        foreach($medias as $media)
        {
            
            $newMedia = new Media($media['name'], $media['url']);
            $newMedia->setId($media['id']);
            $mediasArray[] = $newMedia;
            
        }
        
        return $mediasArray;

    }
    
    //Fonction qui récupère l'image correspondante à son staff en lui rentrant en paramètre l'id du staff  
    public function findMediaByStaffId(int $id) : array
    {
        $query = $this->db->prepare('SELECT media.* FROM media JOIN staff_media ON media.id = staff_media.media_id JOIN staff ON staff.id = staff_media.staff_id WHERE staff.id = :id');

        $parameters = [

            'id' => $id
        ];

        $query->execute($parameters);

        $medias = $query->fetchAll(PDO::FETCH_ASSOC);

        $mediasArray = [];
        foreach($medias as $media)
        {
            
            $newMedia = new Media($media['name'], $media['url']);
            $newMedia->setId($media['id']);
            $mediasArray[] = $newMedia;
            
        }
        
        return $mediasArray;

    }
    
    //Fonction qui récupère l'image correspondante à son article en lui rentrant en paramètre l'id de l'article 
    public function findMediaByPostId(int $id) : array
    {
        $query = $this->db->prepare('SELECT media.* FROM media JOIN posts_media ON media.id = posts_media.media_id JOIN posts ON posts.id = posts_media.posts_id WHERE posts.id = :id');

        $parameters = [

            'id' => $id
        ];

        $query->execute($parameters);

        $medias = $query->fetchAll(PDO::FETCH_ASSOC);

        $mediasArray = [];
        foreach($medias as $media)
        {
            
            $newMedia = new Media($media['name'], $media['url']);
            $newMedia->setId($media['id']);
            $mediasArray[] = $newMedia;
            
        }
        
        return $mediasArray;

    }

}

?>