<?php

class Media {
    
    private ?int $id;
    private string $name;
    private string $url;
    /*private string $caption;*/

    public function __construct(string $name, string $url/*, string $caption*/)
    {
        $this->id = null;
        $this->name = $name;
        $this->url = $url;
        /*$this->caption = null;*/
    }
    
    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getUrl(): string
    {
        return $this->url;
    }
    
    public function getCaption(): string
    {
        return $this->caption;
    }
    
    
    public function setId(int $id): void
    {
        $this->id = $id;
    }
    
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setUrl(string $url): void
    {
        $this->url = $url;
    }
    
    public function setCaption(string $caption): void
    {
        $this->caption = $caption;
    }
    
    
}