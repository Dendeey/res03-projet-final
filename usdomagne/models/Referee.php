<?php

class Referee {
    
    // Attributes
    
    private ?int $id;
    private string $firstName;
    private string $lastName;
    private Media $image;

    
    // Constructor
    
    public function __construct(string $firstName, string $lastName, media $image)
    {
        $this->id = NULL;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->image = $image;

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

    public function getImage() : Media
    {
        return $this->image;
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
    
    public function setImage(Media $image) : void
    {
        $this->image = $image;
    }

    
    // Functions

}

?>