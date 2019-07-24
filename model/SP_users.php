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

    public function countUsersPaginationAdmin() // method pour compter le nombre d'utilisateur sur le site
    {
        $reqCountUsersPaginationAdmin = $this->db->query('SELECT COUNT(*) AS total FROM sp_users');  // requete SQL pour compter le nombre d'utilisateur
        $fetchCountUsersPaginationAdmin = $reqCountUsersPaginationAdmin->fetchAll(PDO::FETCH_ASSOC); // alors je fetchAll (Je récupère toutes le données du tableau)
        return $fetchCountUsersPaginationAdmin; // je retourne mon résultat
    }

    // Methode qui permet de selectionner les utilisateurs

    public function selectAllUsers() // method pour selectionner les utilisateurs dans la console administrateur
    {
        $selectAllUsers = $this->db->query('SELECT * FROM sp_users'); // requete SQL pour sélectionner les utilisateurs 
        $selectAllUsersFetch = $selectAllUsers->fetchAll(PDO::FETCH_ASSOC); // je fetchAll (Je récupère toutes le données du tableau)
        return $selectAllUsersFetch; // je retourne mon résultat
    }

    // Methode qui permet de selectionner les utilisateurs en fonction de leurs id

    public function selectUsers() // method pour selectionner les utilisateurs en fonction de leurs id
    {
        $selectUsers = $this->db->prepare('SELECT * FROM sp_users WHERE id = :id'); // requete SQL pour sélectionner les utilisateurs en fonction de l'id
        $selectUsers->bindValue(':id', $_SESSION['id']); // je donne une valeur à mon marqueur nominatif :id
        if ($selectUsers->execute()) { // si la requete s'execute 
            $selectUsersFetch = $selectUsers->fetch(PDO::FETCH_ASSOC); // alors je fectch (Je récupère seulement la ligne du tableau qui m'intéresse)
            return $selectUsersFetch; // je retourn mon résultat
        }
    }

    // Methode qui permet d'ajouter un utilisateur

    public function addUsers() // Method qui permet à l'utilisateur de s'inscrire sur le site
    {
        $reqUsers = $this->db->prepare('INSERT INTO sp_users(sp_users_login, sp_users_email, sp_users_password, sp_users_country) VALUES(:sp_users_login, :sp_users_email, :sp_users_password, :sp_users_country)'); // requete SQL pour ajouter insérer un utilisateur dans la base de données
        $reqUsers->bindValue(':sp_users_login', $this->sp_users_login, PDO::PARAM_STR); // je donne une valeur à mon marqueur nominatif :sp_users_login
        $reqUsers->bindValue(':sp_users_email', $this->sp_users_email, PDO::PARAM_STR); // je donne une valeur à mon marqueur nominatif :sp_users_email 
        $reqUsers->bindValue(':sp_users_password', $this->sp_users_password, PDO::PARAM_STR); // je donne une valeur à mon marqueur nominatif :sp_users_password
        $reqUsers->bindValue(':sp_users_country', $this->sp_users_country, PDO::PARAM_STR); // je donne une valeur à mon marqueur nominatif :sp_users_country
        if ($reqUsers->execute()) { // Si la requete s'execute 
            return true; // je retourne un booléen ( TRUE )
        }
    }

    // Methode qui permet de vérifier si il existe 2 fois le même email dans la base de données

    public function filterMail() // Method qui permet de vérifier à l'inscription ou au changement de mail qu'il n'existe pas déjà dans la base de données
    {
        $searchMailUsers = $this->db->prepare('SELECT sp_users_email, id FROM sp_users WHERE sp_users_email = :sp_users_email'); // requete SQL pour sélectionner le mail
        $searchMailUsers->bindValue(':sp_users_email', $this->sp_users_email, PDO::PARAM_STR); // je donne une valeur à mon marqueur nominatif :sp_users_email
        if ($searchMailUsers->execute()) { // si la requete s'execute 
            $resultSearchMailUsers = $searchMailUsers->fetchAll(PDO::FETCH_ASSOC); // alors je fetchAll (je récupère toutes les données du tableau)
            return $resultSearchMailUsers; // je retourne le résultat
        }
    }

    // Methode qui permet de vérifier si il existe 2 fois le même login dans la base de données

    public function filterLogin() // Method qui permet de vérifier à l'inscription ou au changement de login qu'il n'existe pas déjà dans la base de données
    {
        $searchLoginUsers = $this->db->prepare('SELECT sp_users_login, sp_users_password, id, sp_users_role FROM sp_users WHERE sp_users_login = :sp_users_login'); // requete SQL pour sélectionner le login
        $searchLoginUsers->bindValue(':sp_users_login', $this->sp_users_login, PDO::PARAM_STR); // je donne une valeur à mon marqueur nominatif :sp_users_login
        if ($searchLoginUsers->execute()) { // si la requete s'execute bien
            $resultSearchLoginUsers = $searchLoginUsers->fetchAll(PDO::FETCH_ASSOC); // alors je fetchAll (je récupère toutes les données du tableau)
            return $resultSearchLoginUsers; // je retourne le résultat
        }
    }

    // Methode qui permet de mettre à jour le login en fonction de l'id de l'utilisateur

    public function updateLoginUsers() // Method qui permet de mettre à jour le login en fonction de l'id de l'utilisateur
    {
        $updateLoginUsers = $this->db->prepare('UPDATE sp_users SET sp_users_login = :new_sp_users_login WHERE id = :id'); // requete SQL pour mettre à jour le login en fonction de l'id
        $updateLoginUsers->bindValue(':new_sp_users_login', $this->sp_users_login, PDO::PARAM_STR); // je donne une valeur à mon marqueur nominatif :new_sp_users_login
        $updateLoginUsers->bindValue(':id', $this->id, PDO::PARAM_INT); // je donne une valeur à mon marqeur nominatif :id
        if ($updateLoginUsers->execute()) { // si la requete s'execute
            return TRUE; // alors je retourne un booléen (TRUE)
        }
    }

    // Methode qui permet de mettre à jour l'email en fonction de l'id de l'utilisateur

    public function updateEmailUsers() // Method qui permet de mettre à jour l'email en fonction de l'id de l'utilisateur
    {
        $updateEmailUsers = $this->db->prepare('UPDATE sp_users SET sp_users_email = :new_sp_users_email WHERE id = :id'); // requete SQL pour mettre à jour le mail en fonction de l'id
        $updateEmailUsers->bindValue(':new_sp_users_email', $this->sp_users_email, PDO::PARAM_STR); // je donne une valeur à mon marqueur nominatif :new_sp_users_email
        $updateEmailUsers->bindValue(':id', $this->id, PDO::PARAM_INT); // je donne une valeur à mon marqeur nominatif :id
        if ($updateEmailUsers->execute()) { // si la requete s'execute
            return TRUE; // alors je retourne un booléen (TRUE)
        }
    }

    // Methode qui permet de mettre à jour le pays en fonction de l'id de l'utilisateur

    public function updateCountryUsers() // Method qui permet de mettre à jour le pays en fonction de l'id de l'utilisateur
    {
        $updateCountryUsers = $this->db->prepare('UPDATE sp_users SET sp_users_country = :new_sp_users_country WHERE id = :id'); // requete SQL pour mettre à jour le pays en fonction de l'id
        $updateCountryUsers->bindValue(':new_sp_users_country', $this->sp_users_country, PDO::PARAM_STR); // je donne une valeur à mon marqueur nominatif :new_sp_users_country
        $updateCountryUsers->bindValue(':id', $this->id, PDO::PARAM_INT); // je donne une valeur à mon marqeur nominatif :id
        if ($updateCountryUsers->execute()) { // si la requete s'execute
            return TRUE; // alors je retourne un booléen (TRUE)
        }
    }

    // Methode qui permet de mettre à jour le mot de passe en fonction de l'id de l'utilisateur

    public function updatePasswordUsers() // Method qui permet de mettre à jour le mot de passe en fonction de l'id de l'utilisateur
    {
        $updatePasswordUsers = $this->db->prepare('UPDATE sp_users SET sp_users_password = :new_sp_users_password WHERE id = :id'); // requete SQL pour mettre à jour le mot de passe en fonction de l'id
        $updatePasswordUsers->bindValue(':new_sp_users_password', $this->sp_users_password, PDO::PARAM_STR); // je donne une valeur à mon marqueur nominatif :new_sp_users_password
        $updatePasswordUsers->bindValue(':id', $this->id, PDO::PARAM_INT); // je donne une valeur à mon marqeur nominatif :id
        if ($updatePasswordUsers->execute()) { // si la requete s'execute
            return TRUE; // alors je retourne un booléen (TRUE)
        }
    }

    // Methode qui permet de mettre à jour le role en fonction de l'id de l'utilisateur

    public function updateRoleUsers() // Method qui permet de mettre à jour le role en fonction de l'id de l'utilisateur
    {
        $updateRoleUsers = $this->db->prepare('UPDATE sp_users SET sp_users_role = :new_sp_users_role WHERE id = :id'); // requete SQL pour mettre à jour le role en fonction de l'id
        $updateRoleUsers->bindValue(':new_sp_users_role', $this->sp_users_role, PDO::PARAM_STR); // je donne une valeur à mon marqueur nominatif :new_sp_users_role
        $updateRoleUsers->bindValue(':id', $this->id, PDO::PARAM_INT); // je donne une valeur à mon marqeur nominatif :id
        if ($updateRoleUsers->execute()) { // si la requete s'execute
            return TRUE; // alors je retourne un booléen (TRUE)
        }
    }

    // Methode qui permet de supprimer un utilisateur en fonction de son id

    public function deleteUsers() // Methode qui permet de supprimer un utilisateur en fonction de son id
    {
        $deleteUsers = $this->db->prepare('DELETE FROM sp_users WHERE id = :id'); // requete SQL pour supprimer un utilisateur en fonction de l'id
        $deleteUsers->bindValue(':id', $this->id, PDO::PARAM_INT); // je donne une valeur à mon marqeur nominatif :id
        if ($deleteUsers->execute()) { // si la requete s'execute
            return TRUE; // alors je retourne un booléen (TRUE)
        }
    }
}
