<?php

class Database {
    protected $db;
    
    public function __construct() {
        $this->db = new PDO('mysql:dbname=series_phil;host=localhost', 'root', '', [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]);
    }
}