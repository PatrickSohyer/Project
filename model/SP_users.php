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

// Fonction qui permet de vérifier si il existe 2 fois le même email

    public function filterMail() {
        $searchMailUsers = $this->db->prepare('SELECT sp_users_email, id FROM sp_users WHERE sp_users_email = :sp_users_email');
        $searchMailUsers->bindValue(':sp_users_email', $this->sp_users_email);
        if ($searchMailUsers->execute()) {
            $resultSearchMailUsers = $searchMailUsers->fetchAll();
            return $resultSearchMailUsers;
        }
    }

// Fonction qui permet de vérifier si il existe 2 fois le même login

    public function filterLogin() {
        $searchLoginUsers = $this->db->prepare('SELECT sp_users_login, sp_users_password, id FROM sp_users WHERE sp_users_login = :sp_users_login');
        $searchLoginUsers->bindValue(':sp_users_login', $this->sp_users_login);
        if ($searchLoginUsers->execute()) {
            $resultSearchLoginUsers = $searchLoginUsers->fetchAll(PDO::FETCH_OBJ);
            return $resultSearchLoginUsers;
        }
    }

// Fonction qui permet de mettre à jour les informations des utilisateurs

    public function updateLoginUsers() {
        $updateLoginUsers = $this->db->prepare('UPDATE sp_users SET sp_users_login = :new_sp_users_login WHERE id = :id');
        $updateLoginUsers->bindValue(':new_sp_users_login', $this->sp_users_login);
        $updateLoginUsers->bindValue(':id', $this->id);
        if ($updateLoginUsers->execute()) {
            return TRUE;
        }
    }

    public function updateEmailUsers() {
        $updateEmailUsers = $this->db->prepare('UPDATE sp_users SET sp_users_email = :new_sp_users_email WHERE id = :id');
        $updateEmailUsers->bindValue(':new_sp_users_email', $this->sp_users_email);
        $updateEmailUsers->bindValue(':id', $this->id);
        if ($updateEmailUsers->execute()) {
            return TRUE;
        }
    }

    public function updateCountryUsers() {
        $updateCountryUsers = $this->db->prepare('UPDATE sp_users SET sp_users_country = :new_sp_users_country WHERE id = :id');
        $updateCountryUsers->bindValue(':new_sp_users_country', $this->sp_users_country);
        $updateCountryUsers->bindValue(':id', $this->id);
        if ($updateCountryUsers->execute()) {
            return TRUE;
        }
    }

    public function updatePasswordUsers() {
        $updatePasswordUsers = $this->db->prepare('UPDATE sp_users SET sp_users_password = :new_sp_users_password WHERE id = :id');
        $updatePasswordUsers->bindValue(':new_sp_users_password', $this->sp_users_password);
        $updatePasswordUsers->bindValue(':id', $this->id);
        if ($updatePasswordUsers->execute()) {
            return TRUE;
        }
    }

    // Fonction qui permet de supprimer un utilisateur

    public function deleteUsers() {
        $deleteUsers = $this->db->prepare('DELETE FROM sp_users WHERE id = :id');
        $deleteUsers->bindValue(':id', $this->id);
        if ($deleteUsers->execute()) {
            return TRUE;
        }
    }

    public function selectUsers() {
        $selectUsers = $this->db->prepare('SELECT * FROM sp_users WHERE id = :id');
        $selectUsers->bindValue(':id', $this->id);
        if ($selectUsers->execute()) {
            $selectUsersFetch = $selectUsers->fetchAll();
            return $selectUsersFetch;
        }
    }

}
