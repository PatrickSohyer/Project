<?php

// Je créer ma classe SuggestSeries qui est une enfant de ma class Database

class SuggestSeries extends Database
{

    // Je déclare mes attributs

    public $id; // attribut ID
    public $sp_suggest_series_title_N1; // attribut titre numéro 1
    public $sp_suggest_series_title_N2; // attribut titre numéro 2
    public $sp_suggest_series_title_N3; // attribut titre numéro 3
    public $sp_id_users; // attribut de l'id de l'utilisateur

    // Methode qui permet d'ajouter les suggestions de séries à la base de données

    public function addAllSuggestSeries() // Methode qui permet d'ajouter les suggestions de séries à la base de données
    {
        $reqAddAllSuggestSeries = $this->db->prepare('INSERT INTO sp_suggest_series(sp_suggest_series_title_N1, sp_suggest_series_title_N2, sp_suggest_series_title_N3, sp_id_users) VALUES (:sp_suggest_series_title_N1, :sp_suggest_series_title_N2, :sp_suggest_series_title_N3, :sp_id_users)'); // requete SQL pour insérer les titres de séries dans la base de données
        $reqAddAllSuggestSeries->bindValue(':sp_suggest_series_title_N1', $this->sp_suggest_series_title_N1, PDO::PARAM_STR); // je donne une valeur à mon marqueur nominatif :sp_suggest_series_title_N1
        $reqAddAllSuggestSeries->bindValue(':sp_suggest_series_title_N2', $this->sp_suggest_series_title_N2, PDO::PARAM_STR); // je donne une valeur à mon marqueur nominatif :sp_suggest_series_title_N2
        $reqAddAllSuggestSeries->bindValue(':sp_suggest_series_title_N3', $this->sp_suggest_series_title_N3, PDO::PARAM_STR); // je donne une valeur à mon marqueur nominatif :sp_suggest_series_title_N3
        $reqAddAllSuggestSeries->bindValue(':sp_id_users', $this->sp_id_users, PDO::PARAM_INT);  // je donne une valeur à mon marqueur nominatif :id
        if ($reqAddAllSuggestSeries->execute()) { // si la requete s'execute
            return TRUE; // je retourne un booléen (TRUE)
        }
    }

    // Methode qui permet de sélectionner les suggestions et de l'utilisateur qui les a envoyées

    public function selectAllSuggestSeries() // Methode qui permet de sélectionner les suggestions et de l'utilisateur qui les a envoyées
    {
        $reqSelectAllSuggestSeries = $this->db->prepare('SELECT sp_suggest_series.id AS suggestID,  sp_suggest_series.sp_suggest_series_title_N1, sp_suggest_series.sp_suggest_series_title_N2, sp_suggest_series.sp_suggest_series_title_N3, sp_suggest_series.sp_id_users, sp_users.id, sp_users.sp_users_login FROM sp_suggest_series INNER JOIN sp_users ON sp_suggest_series.sp_id_users = sp_users.id'); // requete SQL qui sélectionne la table sp_suggest_series et fait une jointure avec la table sp_users pour récupérer le nom et l'id des utilisateurs
        if ($reqSelectAllSuggestSeries->execute()) { // si la requete s'execute
            $fetchSelectAllSuggestSeries = $reqSelectAllSuggestSeries->fetchAll(PDO::FETCH_ASSOC); // alors je fetchAll (je récupère toutes les données du tableau)
            return $fetchSelectAllSuggestSeries; // je retourne le résultat
        }
    }

    // Methode qui permet de supprimer une suggestions en fonction de son id

    public function deleteSuggestSeries()  // Methode qui permet de supprimer une suggestions en fonction de son id
    {
        $reqDeleteSuggestSeries = $this->db->prepare('DELETE FROM sp_suggest_series WHERE id = :id'); // requete SQL pour supprimer une suggestion en fonction de son id
        $reqDeleteSuggestSeries->bindValue(':id', $this->id, PDO::PARAM_INT); // je donne une valeur à mon marqueur nominatif :id
        if ($reqDeleteSuggestSeries->execute()) { // si la requete s'execute 
            return TRUE; // je retourne un booléen (TRUE)
        }
    }

    // Methode qui supprime une suggestion si l'utilisateur supprime son compte

    public function deleteSuggestUsers() // Methode qui supprime une suggestion si l'utilisateur supprime son compte
    {
        $reqDeleteSuggestUsers = $this->db->prepare('DELETE FROM sp_suggest_series WHERE sp_id_users = :id'); // requete SQL pour supprimer une suggestion en fonction de l'id de l'utilisateur
        $reqDeleteSuggestUsers->bindValue(':id', $this->sp_id_users, PDO::PARAM_INT); // je donne une valeur à mon marqueur nominatif :id
        if ($reqDeleteSuggestUsers->execute()) { // si la requete s'execute 
            return TRUE; // je retourne un booléen (TRUE)
        }
    }

    // Methode qui permet de compter le nombre de suggestions pas vérifier 

    public function countSuggestAdmin() // Methode qui permet de compter le nombre de suggestions pas vérifier 
    {
        $reqCountSuggestAdmin = $this->db->query('SELECT COUNT(*) AS total FROM sp_suggest_series'); // requête SQL qui compte le nombre d'entré dans la base de données
        $fetchCountSuggestAdmin = $reqCountSuggestAdmin->fetch(PDO::FETCH_ASSOC); // alors je fetch (je récupère la première donnée du tableau)
        return $fetchCountSuggestAdmin; // je retourne le résultat
    }
}
