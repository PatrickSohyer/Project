<?php

// Je créer ma classe Users qui est une enfant de ma class Database

class Users extends Database
{

    // Je déclare mes attributs

    public $id; // attribut ID
    public $sp_users_login; // attribut login
    public $sp_users_email; // attribut email
    public $sp_users_password; // attribut mot de passe
    public $sp_users_country; // attribut pays
    public $sp_users_avatar; // attribut avatar
    public $sp_users_role; // attribut role
    public $nbUsersPerPages = 20; // attribut utilistateur par page
    public $firstPageUsers; // attribut page

    // Methode qui permet de compter le nombre d'utilisateur pour ma console administrateur

    public function countUsersPaginationAdmin()
    {
        $reqCountUsersPaginationAdmin = $this->db->query('SELECT COUNT(*) AS total FROM sp_users');
        $fetchCountUsersPaginationAdmin = $reqCountUsersPaginationAdmin->fetchAll(PDO::FETCH_ASSOC);
        return $fetchCountUsersPaginationAdmin;
    }

    // Methode qui permet de selectionner les utilisateurs

    public function selectAllUsers()
    {
        $selectAllUsers = $this->db->query('SELECT * FROM sp_users');
        $selectAllUsersFetch = $selectAllUsers->fetchAll(PDO::FETCH_ASSOC);
        return $selectAllUsersFetch;
    }

    // Methode qui permet de selectionner les utilisateurs en fonction de leurs id

    public function selectUsers()
    {
        $selectUsers = $this->db->prepare('SELECT * FROM sp_users WHERE id = :id');
        $selectUsers->bindValue(':id', $_SESSION['id']);
        if ($selectUsers->execute()) {
            $selectUsersFetch = $selectUsers->fetch(PDO::FETCH_ASSOC);
            return $selectUsersFetch;
        }
    }

    // Methode qui permet d'ajouter un utilisateur

    public function addUsers()
    {
        $reqUsers = $this->db->prepare('INSERT INTO sp_users(sp_users_login, sp_users_email, sp_users_password, sp_users_country) VALUES(:sp_users_login, :sp_users_email, :sp_users_password, :sp_users_country)');
        $reqUsers->bindValue(':sp_users_login', $this->sp_users_login, PDO::PARAM_STR);
        $reqUsers->bindValue(':sp_users_email', $this->sp_users_email, PDO::PARAM_STR);
        $reqUsers->bindValue(':sp_users_password', $this->sp_users_password, PDO::PARAM_STR);
        $reqUsers->bindValue(':sp_users_country', $this->sp_users_country, PDO::PARAM_STR);
        if ($reqUsers->execute()) {
            return true;
        }
    }

    // Methode qui permet de vérifier si il existe 2 fois le même email dans la base de données

    public function filterMail()
    {
        $searchMailUsers = $this->db->prepare('SELECT sp_users_email, id FROM sp_users WHERE sp_users_email = :sp_users_email');
        $searchMailUsers->bindValue(':sp_users_email', $this->sp_users_email, PDO::PARAM_STR);
        if ($searchMailUsers->execute()) {
            $resultSearchMailUsers = $searchMailUsers->fetchAll(PDO::FETCH_ASSOC);
            return $resultSearchMailUsers;
        }
    }

    // Methode qui permet de vérifier si il existe 2 fois le même login dans la base de données

    public function filterLogin()
    {
        $searchLoginUsers = $this->db->prepare('SELECT sp_users_login, sp_users_password, id, sp_users_role FROM sp_users WHERE sp_users_login = :sp_users_login');
        $searchLoginUsers->bindValue(':sp_users_login', $this->sp_users_login, PDO::PARAM_STR);
        if ($searchLoginUsers->execute()) {
            $resultSearchLoginUsers = $searchLoginUsers->fetchAll(PDO::FETCH_ASSOC);
            return $resultSearchLoginUsers;
        }
    }

    // Methode qui permet de mettre à jour le login en fonction de l'id de l'utilisateur

    public function updateLoginUsers()
    {
        $updateLoginUsers = $this->db->prepare('UPDATE sp_users SET sp_users_login = :new_sp_users_login WHERE id = :id');
        $updateLoginUsers->bindValue(':new_sp_users_login', $this->sp_users_login, PDO::PARAM_STR);
        $updateLoginUsers->bindValue(':id', $this->id, PDO::PARAM_INT);
        if ($updateLoginUsers->execute()) {
            return TRUE;
        }
    }

    // Methode qui permet de mettre à jour l'email en fonction de l'id de l'utilisateur

    public function updateEmailUsers()
    {
        $updateEmailUsers = $this->db->prepare('UPDATE sp_users SET sp_users_email = :new_sp_users_email WHERE id = :id');
        $updateEmailUsers->bindValue(':new_sp_users_email', $this->sp_users_email, PDO::PARAM_STR);
        $updateEmailUsers->bindValue(':id', $this->id, PDO::PARAM_INT);
        if ($updateEmailUsers->execute()) {
            return TRUE;
        }
    }

    // Methode qui permet de mettre à jour le pays en fonction de l'id de l'utilisateur

    public function updateCountryUsers()
    {
        $updateCountryUsers = $this->db->prepare('UPDATE sp_users SET sp_users_country = :new_sp_users_country WHERE id = :id');
        $updateCountryUsers->bindValue(':new_sp_users_country', $this->sp_users_country, PDO::PARAM_STR);
        $updateCountryUsers->bindValue(':id', $this->id, PDO::PARAM_INT);
        if ($updateCountryUsers->execute()) {
            return TRUE;
        }
    }

    // Methode qui permet de mettre à jour le mot de passe en fonction de l'id de l'utilisateur

    public function updatePasswordUsers()
    {
        $updatePasswordUsers = $this->db->prepare('UPDATE sp_users SET sp_users_password = :new_sp_users_password WHERE id = :id');
        $updatePasswordUsers->bindValue(':new_sp_users_password', $this->sp_users_password, PDO::PARAM_STR);
        $updatePasswordUsers->bindValue(':id', $this->id, PDO::PARAM_INT);
        if ($updatePasswordUsers->execute()) {
            return TRUE;
        }
    }

    // Methode qui permet de mettre à jour le role en fonction de l'id de l'utilisateur

    public function updateRoleUsers()
    {
        $updateRoleUsers = $this->db->prepare('UPDATE sp_users SET sp_users_role = :new_sp_users_role WHERE id = :id');
        $updateRoleUsers->bindValue(':new_sp_users_role', $this->sp_users_role, PDO::PARAM_STR);
        $updateRoleUsers->bindValue(':id', $this->id, PDO::PARAM_INT);
        if ($updateRoleUsers->execute()) {
            return TRUE;
        }
    }

    // Methode qui permet de supprimer un utilisateur en fonction de son id

    public function deleteUsers()
    {
        $deleteUsers = $this->db->prepare('DELETE FROM sp_users WHERE id = :id');
        $deleteUsers->bindValue(':id', $this->id, PDO::PARAM_INT);
        if ($deleteUsers->execute()) {
            return TRUE;
        }
    }
}
