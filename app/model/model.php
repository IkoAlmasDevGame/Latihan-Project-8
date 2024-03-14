<?php 
namespace model;

class View {
    protected $db;
    public function __construct($db)
    {
        $this->db = $db;
    }
}
?>