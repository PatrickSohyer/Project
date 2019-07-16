<?php

// Création de ma class Database

class Database
{

    // Je déclare mon attribut en protected

    protected $db;

    // Je créer mon constructeur et j'appel ma base de donnée

    public function __construct()
    {
        $this->db = new PDO('mysql:dbname=series_phil;host=localhost; charset=utf8', 'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    }
}