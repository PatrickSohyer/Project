<?php

// Je créer ma classe Series qui est une enfant de ma class Database

class SuggestSeries extends Database
{

    // Je déclare mes attributs

    public $id;
    public $sp_suggest_series_title_N1;
    public $sp_suggest_series_title_N2;
    public $sp_suggest_series_title_N3;
    public $sp_id_users;

    public function addAllSuggestSeries()
    {
        $reqAddAllSuggestSeries = $this->db->prepare('INSERT INTO sp_suggest_series(sp_suggest_series_title_N1, sp_suggest_series_title_N2, sp_suggest_series_title_N3, sp_id_users) VALUES (:sp_suggest_series_title_N1, :sp_suggest_series_title_N2, :sp_suggest_series_title_N3, :sp_id_users)');
        $reqAddAllSuggestSeries->bindValue(':sp_suggest_series_title_N1', $this->sp_suggest_series_title_N1);
        $reqAddAllSuggestSeries->bindValue(':sp_suggest_series_title_N2', $this->sp_suggest_series_title_N2);
        $reqAddAllSuggestSeries->bindValue(':sp_suggest_series_title_N3', $this->sp_suggest_series_title_N3);
        $reqAddAllSuggestSeries->bindValue(':sp_id_users', $this->sp_id_users);
        if ($reqAddAllSuggestSeries->execute()) {
            return TRUE;
        }
    }
}