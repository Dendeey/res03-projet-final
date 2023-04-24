<?php

class Post {
    
    // Attributes
    
    private ?int $id;
    private string $title;
    private string $date;
    private string $content;
    private array $medias;

    
    // Constructor
    
    public function __construct(?int $id, string $title, string $date, string $content)
    {
        $this->id = $id;
        $this->title = $title;
        $this->date = $date;
        $this->content = $content;
        $this->medias = [];

    }


    // Getters

    public function getId() : ?int
    {
        return $this->id;
    }
    
    public function getTitle() : string
    {
        return $this->title;
    }
    
    public function getDate() : string
    {
        return $this->date;
    }
    
    public function getContent() : string
    {
        return $this->content;
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

    public function setTitle(string $title) : void
    {
        $this->title = $title;
    }
    
    public function setDate(string $date) : void
    {
        $this->date = $date;
    }

    public function setContent(string $content) : void
    {
        $this->content = $content;
    }

    //Functions

    public function addMedias(Media $media) : void
    {
        $this->medias[] = $media;
    }

}

?>