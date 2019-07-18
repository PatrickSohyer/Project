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

    public function selectAllSuggestSeries()
    {
        $reqSelectAllSuggestSeries = $this->db->prepare('SELECT sp_suggest_series.id AS suggestID,  sp_suggest_series.sp_suggest_series_title_N1, sp_suggest_series.sp_suggest_series_title_N2, sp_suggest_series.sp_suggest_series_title_N3, sp_suggest_series.sp_id_users, sp_users.id, sp_users.sp_users_login FROM sp_suggest_series INNER JOIN sp_users ON sp_suggest_series.sp_id_users = sp_users.id');
        if ($reqSelectAllSuggestSeries->execute()) {
            $fetchSelectAllSuggestSeries = $reqSelectAllSuggestSeries->fetchAll();
            return $fetchSelectAllSuggestSeries;
        }
    }

    public function deleteSuggestSeries()
    {
        $reqDeleteSuggestSeries = $this->db->prepare('DELETE FROM sp_suggest_series WHERE id = :id');
        $reqDeleteSuggestSeries->bindValue(':id', $this->id);
        if ($reqDeleteSuggestSeries->execute()) {
            return TRUE;
        }
    }
}
