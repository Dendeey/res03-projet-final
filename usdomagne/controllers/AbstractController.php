<?php

abstract class AbstractController
{

    public function renderClient(string $view, array $values) : void
    {
        
        $template = $view;
        $data = $values;
        require 'templates/layout_public.phtml';
        
    }
    
    
    public function renderAdmin(string $view, array $values) : void
    {
        
        $template = $view;
        $data = $values;
        require 'templates/layout_admin.phtml';
        
    }

}

?>