<?php

class UserManager extends AbstractManager
{

    public function getUserById(int $id) : User
    {
        $query = $this->db->prepare('SELECT * FROM users WHERE id = :id');
        $parameters = [
        'id' => $id
        ];
        $query->execute($parameters);
        $user = $query->fetch(PDO::FETCH_ASSOC);

        $userToLoad = new User($user['firstName'], $user['lastName'], $user['email'], $user['password']);
        $userToLoad->setId($user['id']);

    }

    public function getUserByEmail(string $email) : ?User
    {
        $query = $this->db->prepare('SELECT * FROM users WHERE email = :email');
        $parameters = [
        'email' => $email
        ];
        $query->execute($parameters);
        $user = $query->fetch(PDO::FETCH_ASSOC);
        if ($user === false) {
            return null;
        }

        else {
           $userToLoad = new User($user['first_name'], $user['last_name'], $user['email'], $user['password']);
           $userToLoad->setId($user['id']);

            return $userToLoad;
        }


        $userToLoad = new User($user['first_name'], $user['last_name'], $user['email'], $user['password']);
        $userToLoad->setId($user['id']);

    }

    public function insertUser(User $user) : User
    {
        $query = $this->db->prepare('INSERT INTO users (`id`, `first_name`, `last_name`, `email`, `password`) VALUES(NULL, :firstName, :lastName, :email, :password)');

        $parameters = [
        'firstName' => $user->getFirstName(),
        'lastName' => $user->getLastName(),
        'email' => $user->getEmail(),
        'password'=>$user->getPassword()
        ];
        $query->execute($parameters);

        $id = $this->db->lastInsertId();
        $user->setId($id);
        echo "Veuillez à présent vous connecter";
        return $user;

    }

    public function editUser(User $user) : void
    {
        $query = $this->db->prepare('UPDATE users SET firstName = :firstName, lastName = :lastName, email = :email, password = :password WHERE id = :id ');
        $parameters = [
            'id' => $user->getId(),
            'email' => $user->getEmail(),
            'username' => $user->getUsername(),
            'password' => $user->getPassword()
            ];

        $query->execute($parameters);
    }
}

?>