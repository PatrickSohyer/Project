<?php

// Je créer ma classe Users qui est une enfant de ma class Database

class Users extends Database
{

    // Je déclare mes attributs

    public $id;
    public $sp_users_login;
    public $sp_users_email;
    public $sp_users_password;
    public $sp_users_country;
    public $sp_users_avatar;
    public $sp_users_role;
    public $nbUsersPerPages = 20;
    public $firstPageUsers;

    // Methode qui permet de compter le nombre d'utilisateur

    public function countUsersPaginationAdmin()
    {
        $reqCountUsersPaginationAdmin = $this->db->query('SELECT COUNT(*) AS total FROM sp_users');
        $fetchCountUsersPaginationAdmin = $reqCountUsersPaginationAdmin->fetchAll();
        return $fetchCountUsersPaginationAdmin;
    }

    // Methode qui permet de selectionner les utilisateurs en fonction de leurs id

    public function selectAllUsers()
    {
        $selectAllUsers = $this->db->query('SELECT * FROM sp_users');
        $selectAllUsers->execute();
        $selectAllUsersFetch = $selectAllUsers->fetchAll();
        return $selectAllUsersFetch;
    }

    // Methode qui permet de selectionner les utilisateurs en fonction de leurs id

    public function selectUsers()
    {
        $selectUsers = $this->db->prepare('SELECT * FROM sp_users WHERE id = :id');
        $selectUsers->bindValue(':id', $_SESSION['id']);
        if ($selectUsers->execute()) {
            $selectUsersFetch = $selectUsers->fetch();
            return $selectUsersFetch;
        }
    }

    // Fonction qui permet d'ajouter un utilisateur

    public function addUsers()
    {
        $reqUsers = $this->db->prepare('INSERT INTO sp_users(sp_users_login, sp_users_email, sp_users_password, sp_users_country) VALUES(:sp_users_login, :sp_users_email, :sp_users_password, :sp_users_country)');
        $reqUsers->bindValue(':sp_users_login', $this->sp_users_login);
        $reqUsers->bindValue(':sp_users_email', $this->sp_users_email);
        $reqUsers->bindValue(':sp_users_password', $this->sp_users_password);
        $reqUsers->bindValue(':sp_users_country', $this->sp_users_country);
        if ($reqUsers->execute()) {
            return true;
        }
    }

    // Methode qui permet de vérifier si il existe 2 fois le même email

    public function filterMail()
    {
        $searchMailUsers = $this->db->prepare('SELECT sp_users_email, id FROM sp_users WHERE sp_users_email = :sp_users_email');
        $searchMailUsers->bindValue(':sp_users_email', $this->sp_users_email);
        if ($searchMailUsers->execute()) {
            $resultSearchMailUsers = $searchMailUsers->fetchAll();
            return $resultSearchMailUsers;
        }
    }

    // Methode qui permet de vérifier si il existe 2 fois le même login

    public function filterLogin()
    {
        $searchLoginUsers = $this->db->prepare('SELECT sp_users_login, sp_users_password, id, sp_users_role FROM sp_users WHERE sp_users_login = :sp_users_login');
        $searchLoginUsers->bindValue(':sp_users_login', $this->sp_users_login);
        if ($searchLoginUsers->execute()) {
            $resultSearchLoginUsers = $searchLoginUsers->fetchAll();
            return $resultSearchLoginUsers;
        }
    }

    // Methode qui permet de mettre à jour le login 

    public function updateLoginUsers()
    {
        $updateLoginUsers = $this->db->prepare('UPDATE sp_users SET sp_users_login = :new_sp_users_login WHERE id = :id');
        $updateLoginUsers->bindValue(':new_sp_users_login', $this->sp_users_login);
        $updateLoginUsers->bindValue(':id', $this->id);
        if ($updateLoginUsers->execute()) {
            return TRUE;
        }
    }

    // Methode qui permet de mettre à jour l'email

    public function updateEmailUsers()
    {
        $updateEmailUsers = $this->db->prepare('UPDATE sp_users SET sp_users_email = :new_sp_users_email WHERE id = :id');
        $updateEmailUsers->bindValue(':new_sp_users_email', $this->sp_users_email);
        $updateEmailUsers->bindValue(':id', $this->id);
        if ($updateEmailUsers->execute()) {
            return TRUE;
        }
    }

    // Methode qui permet de mettre à jour le pays

    public function updateCountryUsers()
    {
        $updateCountryUsers = $this->db->prepare('UPDATE sp_users SET sp_users_country = :new_sp_users_country WHERE id = :id');
        $updateCountryUsers->bindValue(':new_sp_users_country', $this->sp_users_country);
        $updateCountryUsers->bindValue(':id', $this->id);
        if ($updateCountryUsers->execute()) {
            return TRUE;
        }
    }

    // Methode qui permet de mettre à jour le mot de passe

    public function updatePasswordUsers()
    {
        $updatePasswordUsers = $this->db->prepare('UPDATE sp_users SET sp_users_password = :new_sp_users_password WHERE id = :id');
        $updatePasswordUsers->bindValue(':new_sp_users_password', $this->sp_users_password);
        $updatePasswordUsers->bindValue(':id', $this->id);
        if ($updatePasswordUsers->execute()) {
            return TRUE;
        }
    }

        // Methode qui permet de mettre à jour le role

        public function updateRoleUsers()
        {
            $updateRoleUsers = $this->db->prepare('UPDATE sp_users SET sp_users_role = :new_sp_users_role WHERE id = :id');
            $updateRoleUsers->bindValue(':new_sp_users_role', $this->sp_users_role);
            $updateRoleUsers->bindValue(':id', $this->id);
            if ($updateRoleUsers->execute()) {
                return TRUE;
            }
        }

    // Methode qui permet de supprimer un utilisateur

    public function deleteUsers()
    {
        $deleteUsers = $this->db->prepare('DELETE FROM sp_users WHERE id = :id');
        $deleteUsers->bindValue(':id', $this->id);
        if ($deleteUsers->execute()) {
            return TRUE;
        }
    }
}
