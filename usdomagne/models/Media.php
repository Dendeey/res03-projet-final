<?php

class Media {
    
    // Attributes
    
    private ?int $id;
    private string $url;
    private string $caption;
    private ?int $postId;
    private ?int $officeId;
    private ?int $refereeId;
    private ?int $staffId;
    private ?int $albumId;
    
    
    // Constructor
    
    public function __construct(?int $id=null, string $url, string $caption, ?int $staffId, ?int $officeId, ?int $refereeId, ?int $albumId, ?int $postId)
    {
        $this->id = $id;
        $this->url = $url;
        $this->caption = $caption;
        $this->staffId = $staffId;
        $this->officeId = $officeId;
        $this->refereeId = $refereeId;
        $this->albumId = $albumId;
        $this->postId = $postId;
        
        

    }


    // Getters
    public function getId() : ?int
    {
        return $this->id;
    }
    
    public function getUrl() : string
    {
        return $this->url;
    }
    
    public function getCaption() : string
    {
        return $this->caption;
    }
    
    public function getStaffId() : ?int
    {
        return $this->staffId;
    }
    
    public function getOfficeId() : ?int
    {
        return $this->officeId;
    }
    
    public function getRefereeId() : ?int
    {
        return $this->refereeId;
    }
    
    public function getPostId() : ?int
    {
        return $this->postId;
    }
    
    public function getAlbumId() : ?int
    {
        return $this->albumId;
    }
    
    
    // Setters
    public function setId(?int $id) : void
    {
        $this->id = $id; 
    }

    public function setUrl(string $url) : void
    {
        $this->url = $url;
    }
    
    public function setCaption(string $caption) : void
    {
        $this->caption = $caption;
    }

}

?>