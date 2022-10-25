<?php 

namespace milwaukee\api\controller;

class APIController {
    protected $url = "";

    function __construct($url) {
        $this->url = $url;
        
    }

    protected function get_url() {
        return $this->url;
    }

    protected function set_url($url) { 
        $this->url = $url;
    }
}

