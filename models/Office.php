<?php

class Office {
    
    // Attributes
    
    private ?int $id;
    private string $firstName;
    private string $lastName;
    private string $role;
    
    // Constructor
    
    public function __construct(?int $id, string $firstName, string $lastName, string $role)
    {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->role = $role;
    }


    // Getters

    public function getId() : ?int
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
    
    public function getRole() : string
    {
        return $this->role;
    }
    
    
    // Setters

    public function setId(?int $id) : void
    {
        $this->id = $id;
    }

    public function setFirstName(string $firstName) : void
    {
        $this->firstName = $firstName;
    }

    public function setLastName(string $lastName) : void
    {
        $this->lastName = $lastName;
    }
    
    public function gsetRole() : void
    {
        $this->role = $role;
    }
    
    // Functions

}

?>