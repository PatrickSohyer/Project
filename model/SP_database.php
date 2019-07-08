<?php

class Database {
    protected $db;
    
    public function __construct() {
        $this->db = new PDO('mysql:dbname=series_phil;host=localhost; charset=utf8', 'root', '', [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]);
        }
}