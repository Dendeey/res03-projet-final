<?php

class Staff {
    
    // Attributes
    
    private ?int $id;
    private string $firstName;
    private string $lastName;
    private string $phoneNumber;
    private string $role;
    private array $medias;
    
    // Constructor
    
    public function __construct(string $firstName, string $lastName, string $phoneNumber, string $role)
    {
        $this->id = NULL;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->phoneNumber = $phoneNumber;
        $this->role = $role;
        $this->medias = [];
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
    
    public function getPhoneNumber() : string
    {
        return $this->phoneNumber;
    }
    
    
    public function getRole() : string
    {
        return $this->role;
    }
    
    public function getMedias() : array
    {
        return $this->medias;
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
    
    public function setPhoneNumber(string $phoneNumber) : void
    {
        $this->phoneNumber = $phoneNumber;
    }
    
    public function setRole(string $role) : void
    {
        $this->role = $role;
    }
    
    //Functions
    
    public function addMedias(Media $media) : void
    {
        $this->medias[] = $media;
    }


}

?>