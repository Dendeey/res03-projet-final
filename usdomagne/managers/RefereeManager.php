<?php

class PlayerManager extends AbstractManager
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


    public function insertPlayer(Player $player) : Player
    {
        
        $query = $this->db->prepare('INSERT INTO players (`id`, `first_name`, `last_name`) VALUES(NULL, :firstName, :lastName)');

        $parameters = [
        'firstName' => $player->getFirstName(),
        'lastName' => $player->getLastName()
        
        ];
        
        $query->execute($parameters);

        $id = $this->db->lastInsertId();
        $player->setId($id);
        echo "Un joueur vient d'être ajouté !";
        return $player;

    }

    public function editPlayer(Player $player) : void
    {
        $query = $this->db->prepare('UPDATE players SET first_name = :firstName, last_name = :lastName WHERE id = :id ');
        $parameters = [
            'id' => $player->getId(),
            'firstName' => $player->getFirstName(),
            'lastName' => $player->getLastName()
            
            ];

        $query->execute($parameters);
    }
    
    public function deletePlayer(int $id) : void
    {
        // delete the player from the database
        $query = $this->db->prepare('DELETE FROM players WHERE id = :id');
        $parameters = [
            'id' => $id
        ];
        $query->execute($parameters);
        
    }
}

?>