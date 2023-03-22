<?php

class Post {
    
    // Attributes
    
    private ?int $id;
    private string $title;
    private string $content;

    
    // Constructor
    
    public function __construct(?int $id, string $title, string $content)
    {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;

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
    
    public function getContent() : string
    {
        return $this->content;
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

    public function setContent(string $content) : void
    {
        $this->content = $content;
    }


}

?>