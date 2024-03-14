<?php 
namespace controller;
use model\View;

class Controller {
    protected $sdb;
    public function __construct($db)
    {
        $this->sdb = new view($db);
    }
}

?>