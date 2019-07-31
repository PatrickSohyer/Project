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

    public function addAllSuggestSeries()
    {
        $reqAddAllSuggestSeries = $this->db->prepare('INSERT INTO sp_suggest_series(sp_suggest_series_title_N1, sp_suggest_series_title_N2, sp_suggest_series_title_N3, sp_id_users) VALUES (:sp_suggest_series_title_N1, :sp_suggest_series_title_N2, :sp_suggest_series_title_N3, :sp_id_users)');
        $reqAddAllSuggestSeries->bindValue(':sp_suggest_series_title_N1', $this->sp_suggest_series_title_N1, PDO::PARAM_STR);
        $reqAddAllSuggestSeries->bindValue(':sp_suggest_series_title_N2', $this->sp_suggest_series_title_N2, PDO::PARAM_STR);
        $reqAddAllSuggestSeries->bindValue(':sp_suggest_series_title_N3', $this->sp_suggest_series_title_N3, PDO::PARAM_STR);
        $reqAddAllSuggestSeries->bindValue(':sp_id_users', $this->sp_id_users, PDO::PARAM_INT);
        if ($reqAddAllSuggestSeries->execute()) {
            return TRUE;
        }
    }

    // Methode qui permet de sélectionner les suggestions et de l'utilisateur qui les a envoyées

    public function selectAllSuggestSeries()
    {
        $reqSelectAllSuggestSeries = $this->db->prepare('SELECT sp_suggest_series.id AS suggestID,  sp_suggest_series.sp_suggest_series_title_N1, sp_suggest_series.sp_suggest_series_title_N2, sp_suggest_series.sp_suggest_series_title_N3, sp_suggest_series.sp_id_users, sp_users.id, sp_users.sp_users_login FROM sp_suggest_series INNER JOIN sp_users ON sp_suggest_series.sp_id_users = sp_users.id');
        if ($reqSelectAllSuggestSeries->execute()) {
            $fetchSelectAllSuggestSeries = $reqSelectAllSuggestSeries->fetchAll(PDO::FETCH_ASSOC);
            return $fetchSelectAllSuggestSeries;
        }
    }

    // Methode qui permet de supprimer une suggestions en fonction de son id

    public function deleteSuggestSeries()
    {
        $reqDeleteSuggestSeries = $this->db->prepare('DELETE FROM sp_suggest_series WHERE id = :id');
        $reqDeleteSuggestSeries->bindValue(':id', $this->id, PDO::PARAM_INT);
        if ($reqDeleteSuggestSeries->execute()) { 
            return TRUE;
        }
    }

    // Methode qui supprime une suggestion si l'utilisateur supprime son compte

    public function deleteSuggestUsers()
    {
        $reqDeleteSuggestUsers = $this->db->prepare('DELETE FROM sp_suggest_series WHERE sp_id_users = :id');
        $reqDeleteSuggestUsers->bindValue(':id', $this->sp_id_users, PDO::PARAM_INT);
        if ($reqDeleteSuggestUsers->execute()) {
            return TRUE;
        }
    }

    // Methode qui permet de compter le nombre de suggestions pas vérifier 

    public function countSuggestAdmin() 
    {
        $reqCountSuggestAdmin = $this->db->query('SELECT COUNT(*) AS total FROM sp_suggest_series');
        $fetchCountSuggestAdmin = $reqCountSuggestAdmin->fetch(PDO::FETCH_ASSOC);
        return $fetchCountSuggestAdmin;
    }
}
