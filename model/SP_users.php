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

    // Fonction qui permet d'ajouter un utilisateur
    public function addUsers() {
        $reqUsers = $this->db->prepare('INSERT INTO sp_users(sp_users_login, sp_users_email, sp_users_password, sp_users_country) VALUES(:sp_users_login, :sp_users_email, :sp_users_password, :sp_users_country)');
        $reqUsers->bindValue(':sp_users_login', $this->sp_users_login);
        $reqUsers->bindValue(':sp_users_email', $this->sp_users_email);
        $reqUsers->bindValue(':sp_users_password', $this->sp_users_password);
        $reqUsers->bindValue(':sp_users_country', $this->sp_users_country);
        if ($reqUsers->execute()) {
            return true;
        }
    }

    public function filterMail() {
        $searchMailUsers = $this->db->prepare('SELECT sp_users_email FROM sp_users WHERE sp_users_email = :sp_users_email');
        $searchMailUsers->bindValue(':sp_users_email', $this->sp_users_email);
        if ($searchMailUsers->execute()) {
            $resultSearchMailUsers = $searchMailUsers->fetchAll();
            return $resultSearchMailUsers;
        }
    }

    public function filterLogin() {
        $searchLoginUsers = $this->db->prepare('SELECT sp_users_login FROM sp_users WHERE sp_users_login = :sp_users_login');
        $searchLoginUsers->bindValue(':sp_users_login', $this->sp_users_login);
        if ($searchLoginUsers->execute()) {
            $resultSearchLoginUsers = $searchLoginUsers->fetchAll();
            return $resultSearchLoginUsers;
        }
    }

    public function updateUsers() {
        $updateUsers = $this->db->prepare('UPDATE sp_users SET sp_users_login = :new_sp_users_login, sp_users_email = :new_sp_users_email, sp_users_password = :new_sp_users_password, sp_users_country = :new_sp_users_country');
        $updateUsers->bindValue(':new_sp_users_login', $this->sp_users_login);
        $updateUsers->bindValue(':new_sp_users_email', $this->sp_users_email);
        $updateUsers->bindValue(':new_sp_users_password', $this->sp_users_password);
        $updateUsers->bindValue(':new_sp_users_country', $this->sp_users_country);
        if ($updateUsers->execute()) {
            return true;
        }
    }

}
