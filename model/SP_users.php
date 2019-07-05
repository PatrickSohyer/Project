<?php

class Users extends Database {

    public $id;
    public $sp_users_login;
    public $sp_users_email;
    public $sp_users_password;
    public $sp_users_country;
    public $sp_users_avatar;
    public $sp_users_role;

    public function __construct() {
        parent::__construct();
    }

    public function addUsers() {
        $reqUsers = $this->db->prepare('INSERT INTO sp_users(sp_users_login, sp_users_email, sp_users_password, sp_users_country) VALUES(:sp_users_login, :sp_users_email, :sp_users_password, :sp_users_country)');
        $reqUsers->bindValue(':sp_users_login', $this->sp_users_login);
        $reqUsers->bindValue(':sp_users_email', $this->sp_users_email);
        $reqUsers->bindValue(':sp_users_password', $this->sp_users_password);
        $reqUsers->bindValue(':sp_users_country', $this->sp_users_country);
        if($reqUsers->execute()) {
            return true; 
        }
    }

}

