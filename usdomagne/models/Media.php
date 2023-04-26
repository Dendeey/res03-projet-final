<?php

class Media {
    
    private ?int $id;
    private string $name;
    private string $url;

    public function __construct(string $name, string $url)
    {
        $this->id = null;
        $this->name = $name;
        $this->url = $url;
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
}