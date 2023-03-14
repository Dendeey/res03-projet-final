<?php

class PlayerManager extends AbstractManager
{

    public function getPlayerById(int $id) : Player
    {
        $query = $this->db->prepare('SELECT * FROM players WHERE id = :id');
        $parameters = [
        'id' => $id
        ];
        $query->execute($parameters);
        $player = $query->fetch(PDO::FETCH_ASSOC);

        $playerToLoad = new Player($player['first_name'], $player['last_name']);
        $playerToLoad->setId($player['id']);

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
        echo "Un joueur vient d'être ajouté";
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
}

?>