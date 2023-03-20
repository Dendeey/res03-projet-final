<?php

class MediaManager extends AbstractManager
{
    
    //Créer une fonction qui ajoute une image dans la db
    
    public function insertImage(Media $image) : Media
    {
        $query = $this->db->prepare('INSERT INTO media (`id`, `url`, `caption`) VALUES(NULL, :url, :caption)');
        $parameters = [
            'url' => $image->getUrl(),
            'caption' => $image->getCaption()
            ];
        $query->execute($parameters);
        
        $id = $this->db->lastInsertId();
        $image->setId($id);
        echo "Une image vient d'être ajoutée !";
        return $image;
    }
    
    
}

?>