<?php

class OfficeManager extends AbstractManager
{
    
    public function getAllOffices() : array
    {
        
        // get all the offices from the database
        $query = $this->db->prepare('SELECT * FROM office');
        $query->execute();
        $items = $query->fetchAll(PDO::FETCH_ASSOC);
        
        $offices = [];
        
        foreach($items as $item)
        {
            $office = new Office($item["first_name"], $item["last_name"], $item["phone_number"], $item["role"]);
            $office->setId($item["id"]);
            $offices[] = $office;
            
        }
        /*var_dump($offices);*/
        return $offices;
        
        
    }

    public function getOfficeById(int $id) : Office
    {
        $query = $this->db->prepare('SELECT * FROM office WHERE id = :id');
        $parameters = [
        'id' => $id
        ];
        $query->execute($parameters);
        $office = $query->fetch(PDO::FETCH_ASSOC);

        $officeToLoad = new Office($office["first_name"], $office["last_name"], $office["phone_number"], $office["role"]);
        $officeToLoad->setId($office["id"]);
        
        return $officeToLoad;

    }


    public function insertOffice(Office $office) : Office
    {
        
        $query = $this->db->prepare('INSERT INTO office (`id`, `first_name`, `last_name`, `phone_number`, `role`) VALUES(NULL, :firstName, :lastName, :phoneNumber, :role)');

        $parameters = [
        'firstName' => $office->getFirstName(),
        'lastName' => $office->getLastName(),
        'phoneNumber' => $office->getPhoneNumber(),
        'role' => $office->getRole()
        
        ];
        
        $query->execute($parameters);

        $id = $this->db->lastInsertId();
        $office->setId($id);
        echo "Un office vient d'être ajouté !";
        return $office;

    }

    public function editOffice(Office $office) : void
    {
        $query = $this->db->prepare('UPDATE office SET first_name = :firstName, last_name = :lastName, phone_number = :phoneNumber, role = :role WHERE id = :id ');
        $parameters = [
            'id' => $office->getId(),
            'firstName' => $office->getFirstName(),
            'lastName' => $office->getLastName(),
            'phoneNumber' => $office->getPhoneNumber(),
            'role' => $office->getRole()
            
            ];

        $query->execute($parameters);
    }
    
    public function deleteOffice(Office $office) : void
    {
        // delete the office from the database
        $query = $this->db->prepare('DELETE FROM office WHERE id = :id');
        $parameters = [
            'id' => $office->getId()
        ];
        $query->execute($parameters);
        
    }
    
    
    
    public function addOfficeMedia(int $officeId, int $mediaId) : void
    {
        $query = $this->db->prepare('INSERT INTO office_media VALUES(:office_id, :media_id)');

        $parameters = [
            'office_id' => $officeId,
            'media_id' => $mediaId
        ];

        $query->execute($parameters);
    }
    
    public function deleteOfficeMedia(Office $office) : void
    {
        $query = $this->db->prepare('DELETE FROM office_media WHERE office_id = :office_id');

        $parameters = [

            'office_id' => $office->getId()
        ];

        $query->execute($parameters);
    }
}

?>