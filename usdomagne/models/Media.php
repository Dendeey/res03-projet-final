<?php

class Media {
    
    // Attributes
    
    private string $url;
    private string $caption;
    

    
    // Constructor
    
    public function __construct(string $url, string $caption)
    {
        $this->url = $url;
        $this->caption = $caption;
        

    }


    // Getters

    
    
    public function getUrl() : string
    {
        return $this->url;
    }
    
    public function getCaption() : string
    {
        return $this->caption;
    }
    
    

    
    
    // Setters

    
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