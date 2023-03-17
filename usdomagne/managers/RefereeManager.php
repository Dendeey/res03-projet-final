<?php

class RefereeManager extends AbstractManager
{
    
    public function getAllReferees() : array
    {
        
        // get all the referees from the database
        $query = $this->db->prepare('SELECT * FROM referees');
        $query->execute();
        $items = $query->fetchAll(PDO::FETCH_ASSOC);
        
        $referees = [];
        
        foreach($items as $item)
        {
            $referee = new Referee($item["first_name"], $item["last_name"]);
            $referee->setId($item["id"]);
            $referees[] = $referee;
            
        }
        /*var_dump($referees);*/
        return $referees;
        
        
    }

    public function getRefereeById(int $id) : Referee
    {
        $query = $this->db->prepare('SELECT * FROM referees WHERE id = :id');
        $parameters = [
        'id' => $id
        ];
        $query->execute($parameters);
        $referee = $query->fetch(PDO::FETCH_ASSOC);

        $refereeToLoad = new Referee($referee['first_name'], $referee['last_name']);
        $refereeToLoad->setId($referee["id"]);
        
        return $refereeToLoad;

    }


    public function insertReferee(Referee $referee) : Referee
    {
        
        $query = $this->db->prepare('INSERT INTO referees (`id`, `first_name`, `last_name`) VALUES(NULL, :firstName, :lastName)');

        $parameters = [
        'firstName' => $referee->getFirstName(),
        'lastName' => $referee->getLastName()
        
        ];
        
        $query->execute($parameters);

        $id = $this->db->lastInsertId();
        $referee->setId($id);
        echo "Un arbitre vient d'être ajouté !";
        return $referee;

    }

    public function editReferee(Referee $referee) : void
    {
        $query = $this->db->prepare('UPDATE referees SET first_name = :firstName, last_name = :lastName WHERE id = :id ');
        $parameters = [
            'id' => $referee->getId(),
            'firstName' => $referee->getFirstName(),
            'lastName' => $referee->getLastName()
            
            ];

        $query->execute($parameters);
    }
    
    public function deleteReferee(int $id) : void
    {
        // delete the referee from the database
        $query = $this->db->prepare('DELETE FROM referees WHERE id = :id');
        $parameters = [
            'id' => $id
        ];
        $query->execute($parameters);
        
    }
}

?>