<?php

// Je créer ma classe Series qui est une enfant de ma class Database

class Series extends Database
{

    // Je déclare mes attributs

    public $id;
    public $sp_series_pages_title;
    public $sp_series_pages_description;
    public $sp_series_pages_number_seasons;
    public $sp_series_pages_number_episodes;
    public $sp_series_pages_duration_episodes;
    public $sp_series_pages_diffusion_channel;
    public $sp_series_pages_trailer;
    public $sp_series_pages_image;
    public $sp_series_pages_french_title;
    public $sp_series_pages_original_title;
    public $sp_series_pages_origin;
    public $sp_series_pages_verification;
    public $sp_series_pages_rate;
    public $sp_series_pages_number_vote;
    public $nbSeriesPerPages = 12;
    public $firstPageSeries;

    // Methode qui parmet d'ajouter une série

    public function addSeries()
    {
        $reqAddSeries = $this->db->prepare('INSERT INTO sp_series_pages(sp_series_pages_title, sp_series_pages_description, sp_series_pages_number_seasons, sp_series_pages_number_episodes, sp_series_pages_duration_episodes, sp_series_pages_diffusion_channel, sp_series_pages_trailer, sp_series_pages_image, sp_series_pages_french_title, sp_series_pages_original_title, sp_series_pages_origin) VALUES (:sp_series_pages_title, :sp_series_pages_description, :sp_series_pages_number_seasons, :sp_series_pages_number_episodes, :sp_series_pages_duration_episodes, :sp_series_pages_diffusion_channel, :sp_series_pages_trailer, :sp_series_pages_image, :sp_series_pages_french_title, :sp_series_pages_original_title, :sp_series_pages_origin)');
        $reqAddSeries->bindValue(':sp_series_pages_title', $this->sp_series_pages_title);
        $reqAddSeries->bindValue(':sp_series_pages_description', $this->sp_series_pages_description);
        $reqAddSeries->bindValue(':sp_series_pages_number_seasons', $this->sp_series_pages_number_seasons);
        $reqAddSeries->bindValue(':sp_series_pages_number_episodes', $this->sp_series_pages_number_episodes);
        $reqAddSeries->bindValue(':sp_series_pages_duration_episodes', $this->sp_series_pages_duration_episodes);
        $reqAddSeries->bindValue(':sp_series_pages_diffusion_channel', $this->sp_series_pages_diffusion_channel);
        $reqAddSeries->bindValue(':sp_series_pages_trailer', $this->sp_series_pages_trailer);
        $reqAddSeries->bindValue(':sp_series_pages_image', $this->sp_series_pages_image);
        $reqAddSeries->bindValue(':sp_series_pages_french_title', $this->sp_series_pages_french_title);
        $reqAddSeries->bindValue(':sp_series_pages_original_title', $this->sp_series_pages_original_title);
        $reqAddSeries->bindValue(':sp_series_pages_origin', $this->sp_series_pages_origin);
        if ($reqAddSeries->execute()) {
            return true;
        }
    }

    // Methode qui permet de selectionner les images d'une séries

    public function selectSeriesImages()
    {
        $reqSelectSeries = $this->db->prepare('SELECT sp_series_pages_image, id FROM sp_series_pages WHERE sp_series_pages_verification = 1 LIMIT :nbSeriesPerPages OFFSET :firstPageSeries');
        $reqSelectSeries->bindValue(':nbSeriesPerPages', $this->nbSeriesPerPages, PDO::PARAM_INT);
        $reqSelectSeries->bindValue(':firstPageSeries', $this->firstPageSeries, PDO::PARAM_INT);
        $reqSelectSeries->execute();
        $reqFetchSeries = $reqSelectSeries->fetchAll();
        return $reqFetchSeries;
    }

    // Methode qui permet de compter le nombre de série total pour la pagination si la série est valider

    public function countSeriesPagination()
    {
        $reqCountSeriesPagination = $this->db->query('SELECT COUNT(*) AS total FROM sp_series_pages WHERE sp_series_pages_verification = 1');
        $fetchCountSeriesPagination = $reqCountSeriesPagination->fetchAll();
        return $fetchCountSeriesPagination;
    }

    // Methode qui permet de compter le nombre de série total pour la pagination sur ma console admin

    public function countSeriesPaginationAdmin()
    {
        $reqCountSeriesPaginationAdmin = $this->db->query('SELECT COUNT(*) AS total FROM sp_series_pages');
        $fetchCountSeriesPaginationAdmin = $reqCountSeriesPaginationAdmin->fetchAll();
        return $fetchCountSeriesPaginationAdmin;
    }

    // Methode qui permet de selectionner toutes les séries à mettre à jour

    public function selectSeriesPagesUpdate()
    {
        $reqSeriesPageInfo = $this->db->prepare('SELECT * FROM sp_series_pages WHERE id = :id');
        $reqSeriesPageInfo->bindValue(':id', $this->id);
        $reqSeriesPageInfo->execute();
        $fetchSeriesPageInfo = $reqSeriesPageInfo->fetchAll();
        return $fetchSeriesPageInfo;
    }

    // Methode qui permet de selectionner toutes les informations de sp_series_pages si la séries est validée

    public function selectSeriesPagesInfo()
    {
        $reqselectSeriesPagesInfo = $this->db->prepare('SELECT * FROM sp_series_pages WHERE id = :id AND sp_series_pages_verification = 1');
        $reqselectSeriesPagesInfo->bindValue(':id', $this->id);
        $reqselectSeriesPagesInfo->execute();
        $fetchselectSeriesPagesInfo = $reqselectSeriesPagesInfo->fetch();
        return $fetchselectSeriesPagesInfo;
    }

    // Methode qui permet de Selectionner selon la limit définis pour la pagination

    public function selectSeriesPagesAllSeries()
    {
        $reqSelectSeriesPagesAllSeries = $this->db->prepare('SELECT * FROM sp_series_pages LIMIT :nbSeriesPerPages OFFSET :firstPageSeries');
        $reqSelectSeriesPagesAllSeries->bindValue(':nbSeriesPerPages', $this->nbSeriesPerPages, PDO::PARAM_INT);
        $reqSelectSeriesPagesAllSeries->bindValue(':firstPageSeries', $this->firstPageSeries, PDO::PARAM_INT);
        $reqSelectSeriesPagesAllSeries->execute();
        $fetchSelectSeriesPagesAllSeries = $reqSelectSeriesPagesAllSeries->fetchAll();
        return $fetchSelectSeriesPagesAllSeries;
    }

    // Methode qui permet de Selectionner les acteurs en fonctions de l'id de la série

    public function selectSeriesPagesActor()
    {
        $reqSelectSeriesPagesActor = $this->db->prepare('SELECT * FROM sp_series_pages INNER JOIN relation_series_pages_actor ON sp_series_pages.id = relation_series_pages_actor.id INNER JOIN sp_actor ON sp_actor.id = relation_series_pages_actor.id_sp_actor WHERE sp_series_pages.id = :id AND sp_series_pages.sp_series_pages_verification = 1');
        $reqSelectSeriesPagesActor->bindValue(':id', $this->id);
        $reqSelectSeriesPagesActor->execute();
        $fetchSelectSeriesPagesActor = $reqSelectSeriesPagesActor->fetchAll();
        return $fetchSelectSeriesPagesActor;
    }

    // Methode qui permet de Selectionner les créateurs en fonctions de l'id de la série

    public function selectSeriesPagesCreator()
    {
        $reqSelectSeriesPagesCreator = $this->db->prepare('SELECT * FROM sp_series_pages INNER JOIN relation_series_pages_creator ON sp_series_pages.id = relation_series_pages_creator.id_sp_series_pages INNER JOIN sp_creator ON sp_creator.id = relation_series_pages_creator.id WHERE sp_series_pages.id = :id AND sp_series_pages.sp_series_pages_verification = 1');
        $reqSelectSeriesPagesCreator->bindValue(':id', $this->id);
        $reqSelectSeriesPagesCreator->execute();
        $fetchSelectSeriesPagesCreator = $reqSelectSeriesPagesCreator->fetchAll();
        return $fetchSelectSeriesPagesCreator;
    }

    // Methode qui permet de Selectionner les épisodes d'une série en fonction de l'id de la série

    public function selectSeriesPagesEpisodes()
    {
        $reqSelectSeriesPagesEpisodes = $this->db->prepare('SELECT * FROM sp_series_pages INNER JOIN sp_episodes_infos ON sp_episodes_infos.id_sp_series_pages = sp_series_pages.id WHERE sp_series_pages.id = :id AND sp_series_pages.sp_series_pages_verification = 1');
        $reqSelectSeriesPagesEpisodes->bindValue(':id', $this->id);
        $reqSelectSeriesPagesEpisodes->execute();
        $fetchSelectSeriesPagesEpisodes = $reqSelectSeriesPagesEpisodes->fetchAll();
        return $fetchSelectSeriesPagesEpisodes;
    }

    // Methode qui permet de Selectionner les séries qui n'ont pas encore été valider

    public function selectSeriesPagesVerification()
    {
        $reqSelectSeriesPagesVerification = $this->db->query('SELECT * FROM sp_series_pages WHERE sp_series_pages_verification = 0');
        $fetchSelectSeriesPagesVerification = $reqSelectSeriesPagesVerification->fetchAll();
        return $fetchSelectSeriesPagesVerification;
    }

    // Methode qui permet de vérifier et valider une série

    public function updateVerifSeriesPages()
    {
        $reqUpdateVerifSeriesPages = $this->db->prepare('UPDATE sp_series_pages SET sp_series_pages_verification = :sp_series_pages_verification WHERE id = :id');
        $reqUpdateVerifSeriesPages->bindValue(':sp_series_pages_verification', $this->sp_series_pages_verification);
        $reqUpdateVerifSeriesPages->bindValue(':id', $this->id);
        if ($reqUpdateVerifSeriesPages->execute()) {
            return TRUE;
        }
    }

    // Methode qui permet de modifier les informations d'une série

    public function updateSeries()
    {
        $reqUpdateSeries = $this->db->prepare('UPDATE sp_series_pages SET sp_series_pages_title = :sp_series_pages_title, sp_series_pages_description = :sp_series_pages_description, sp_series_pages_number_seasons = :sp_series_pages_number_seasons, sp_series_pages_number_episodes = :sp_series_pages_number_episodes, sp_series_pages_duration_episodes = :sp_series_pages_duration_episodes, sp_series_pages_diffusion_channel = :sp_series_pages_diffusion_channel, sp_series_pages_trailer = :sp_series_pages_trailer, sp_series_pages_image = :sp_series_pages_image, sp_series_pages_french_title = :sp_series_pages_french_title, sp_series_pages_original_title = :sp_series_pages_original_title, sp_series_pages_origin = :sp_series_pages_origin WHERE id = :id');
        $reqUpdateSeries->bindValue(':sp_series_pages_title', $this->sp_series_pages_title);
        $reqUpdateSeries->bindValue(':sp_series_pages_description', $this->sp_series_pages_description);
        $reqUpdateSeries->bindValue(':sp_series_pages_number_seasons', $this->sp_series_pages_number_seasons);
        $reqUpdateSeries->bindValue(':sp_series_pages_number_episodes', $this->sp_series_pages_number_episodes);
        $reqUpdateSeries->bindValue(':sp_series_pages_duration_episodes', $this->sp_series_pages_duration_episodes);
        $reqUpdateSeries->bindValue(':sp_series_pages_diffusion_channel', $this->sp_series_pages_diffusion_channel);
        $reqUpdateSeries->bindValue(':sp_series_pages_trailer', $this->sp_series_pages_trailer);
        $reqUpdateSeries->bindValue(':sp_series_pages_image', $this->sp_series_pages_image);
        $reqUpdateSeries->bindValue(':sp_series_pages_french_title', $this->sp_series_pages_french_title);
        $reqUpdateSeries->bindValue(':sp_series_pages_original_title', $this->sp_series_pages_original_title);
        $reqUpdateSeries->bindValue(':sp_series_pages_origin', $this->sp_series_pages_origin);
        $reqUpdateSeries->bindValue(':id', $this->id);
        if ($reqUpdateSeries->execute()) {
            return TRUE;
        }
    }

    // Method qui permet de supprimer une série

    public function deleteSeriesPages()
    {
        $reqdeleteSeriesPages = $this->db->prepare('DELETE FROM sp_series_pages WHERE id = :id');
        $reqdeleteSeriesPages->bindValue(':id', $this->id);
        if ($reqdeleteSeriesPages->execute()) {
            return TRUE;
        }
    }

    // Methode qui permet de mettre à jour le nombre de vote 

    public function updateNumberVote()
    {
        $reqUpdateNumberVote = $this->db->prepare('Update sp_series_pages SET sp_series_pages_number_vote = :sp_series_pages_number_vote, sp_series_pages_rate = :sp_series_pages_rate WHERE id = :id');
        $reqUpdateNumberVote->bindValue(':sp_series_pages_number_vote', $this->sp_series_pages_number_vote);
        $reqUpdateNumberVote->bindValue(':sp_series_pages_rate', $this->sp_series_pages_rate);
        $reqUpdateNumberVote->bindValue(':id', $this->id);
        if ($reqUpdateNumberVote->execute()) {
            return TRUE;
        }
    }
}