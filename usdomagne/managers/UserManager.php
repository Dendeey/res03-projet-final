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

        $userToLoad = new User($user['email'], $user['username'], $user['password']);
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
           $userToLoad = new User($user['email'], $user['username'], $user['password']);
           $userToLoad->setId($user['id']);

            return $userToLoad;
        }


        $userToLoad = new User($user['email'], $user['username'], $user['password']);
        $userToLoad->setId($user['id']);

    }

    public function insertUser(User $user) : User
    {
        $query = $this->db->prepare('INSERT INTO users (`id`, `email`, `username`, `password`) VALUES(NULL, :email, :username, :password)');

        $parameters = [
        'email' => $user->getEmail(),
        'username' => $user->getUsername(),
        'password'=>$user->getPassword()
        ];
        $query->execute($parameters);

        /*$query = $db->prepare('SELECT LAST_INSERT_ID() FROM users');
        $query->execute();
        $userSelected = $query->fetch(PDO::FETCH_ASSOC);

        return $this->getUserById($userSelected['id']);*/

        $id = $this->db->lastInsertId();
        $user->setId($id);
        return $user;

    }

    public function editUser(User $user) : void
    {
        $query = $this->db->prepare('UPDATE users SET email = :email, username = :username,  password = :password WHERE id = :id ');
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