<?php

class User
{
    // Attributs //

    private ?int $id;
    private string $firstName;
    private string $lastName;
    private string $email;
    private string $password;

    // Constructor //

    public function __construct(string $firstName, string $lastName, string $email, string $password)
    {
        $this->id = NULL;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->password = $password;
    }

    // Getters //

    public function getId() : int
    {
        return $this->id;
    }

    
    public function getFirstName() : string
    {
        return $this->firstName;
    }
    
    public function getLastName() : string
    {
        return $this->lastName;
    }
    
    public function getEmail() : string
    {
        return $this->email;
    }


    public function getPassword() : string
    {
        return $this->password;
    }

    // Setters //

    public function setId($id) : void
    {
        $this->id = $id;
    }

    
    public function setFirstName($firstName) : void
    {
        $this->firstName = $firstName;
    }
    
    public function setLastName($lastName) : void
    {
        $this->lastName = $lastName;
    }
    
    public function setEmail($email) : void
    {
        $this->email = $email;
    }


    public function setPassword($password) : void
    {
        $this->password = $password;
    }


}


?>