<?php

class Media {
    
    // Attributes
    
    private string $url;
    private string $caption;
    private Referee $refereeId;
    /*private Post $postId;
    private Office $officeId;
    private Staff $staffId;
    private Album $albumId;*/
    
    
    // Constructor
    
    public function __construct(string $url, string $caption)
    {
        $this->url = $url;
        $this->caption = $caption;
        $this->refereeId = $refereeId;

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
    
    public function getRefereeId() : Referee
    {
        return $this->refereeId;
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

    public function setRefereeId(Referee $refereeId) : void
    {
        $this->refereeId = $refereeId;
    }

    

}

?>