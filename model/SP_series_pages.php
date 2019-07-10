<?php

class Series extends Database {

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

    public function __construct() {
        parent::__construct();
    }

    // Function ajouter une série

    public function addSeries() {
        $reqAddSeries = $this->db->prepare('INSERT INTO sp_series_pages(sp_series_pages_title, sp_series_pages_description, sp_series_pages_number_seasons, sp_series_pages_number_episodes, sp_series_pages_duration_episodes, sp_series_pages_diffusion_channel) VALUES (:sp_series_pages_title, :sp_series_pages_description, :sp_series_pages_number_seasons, :sp_series_pages_number_episodes, :sp_series_pages_duration_episodes, :sp_series_pages_diffusion_channel)');
        $reqAddSeries->bindValue(':sp_series_pages_title', $this->sp_series_pages_title);
        $reqAddSeries->bindValue(':sp_series_pages_description', $this->sp_series_pages_description);
        $reqAddSeries->bindValue(':sp_series_pages_number_seasons', $this->sp_series_pages_number_seasons);
        $reqAddSeries->bindValue(':sp_series_pages_number_episodes', $this->sp_series_pages_number_episodes);
        $reqAddSeries->bindValue(':sp_series_pages_duration_episodes', $this->sp_series_pages_duration_episodes);
        $reqAddSeries->bindValue(':sp_series_pages_diffusion_channel', $this->sp_series_pages_diffusion_channel);
        if ($reqAddSeries->execute()) {
            return true;
        }
    }

    public function selectSeriesImages() {
        $reqSelectSeries = $this->db->prepare('SELECT sp_series_pages_image, id FROM sp_series_pages WHERE sp_series_pages_verification = 1 LIMIT :nbSeriesPerPages OFFSET :firstPageSeries');
        $reqSelectSeries->bindValue(':nbSeriesPerPages', $this->nbSeriesPerPages, PDO::PARAM_INT);
        $reqSelectSeries->bindValue(':firstPageSeries', $this->firstPageSeries, PDO::PARAM_INT);
        $reqSelectSeries->execute();
        $reqFetchSeries = $reqSelectSeries->fetchAll();
        return $reqFetchSeries;
    }

    public function seriesPagination() {
        $reqSeriesPagination = $this->db->query('SELECT COUNT(*) AS total FROM sp_series_pages WHERE sp_series_pages_verification = 1');
        $fetchSeriesPagination = $reqSeriesPagination->fetchAll();
        return $fetchSeriesPagination;
    }

    public function seriesPagesInfo() {
        $reqSeriesPageInfo = $this->db->prepare('SELECT * FROM sp_series_pages WHERE id = :id AND sp_series_pages_verification = 1');
        $reqSeriesPageInfo->bindValue(':id', $this->id);
        $reqSeriesPageInfo->execute();
        $fetchSeriesPageInfo = $reqSeriesPageInfo->fetch();
        return $fetchSeriesPageInfo;
    }

    public function seriesPagesAllSeries() {
        $reqSeriesPagesAllSeries = $this->db->query('SELECT * FROM sp_series_pages');
        $reqSeriesPagesAllSeries->execute();
        $fetchSeriesPagesAllSeries = $reqSeriesPagesAllSeries->fetchAll();
        return $fetchSeriesPagesAllSeries;
    }

    public function seriesPagesActor() {
        $reqSeriesPagesActor = $this->db->prepare('SELECT * FROM sp_series_pages INNER JOIN relation_series_pages_actor ON sp_series_pages.id = relation_series_pages_actor.id INNER JOIN sp_actor ON sp_actor.id = relation_series_pages_actor.id_sp_actor WHERE sp_series_pages.id = :id AND sp_series_pages.sp_series_pages_verification = 1');
        $reqSeriesPagesActor->bindValue(':id', $this->id);
        $reqSeriesPagesActor->execute();
        $fetchSeriesPagesActor = $reqSeriesPagesActor->fetchAll();
        return $fetchSeriesPagesActor;
    }

    public function seriesPagesCreator() {
        $reqSeriesPagesCreator = $this->db->prepare('SELECT * FROM sp_series_pages INNER JOIN relation_series_pages_creator ON sp_series_pages.id = relation_series_pages_creator.id_sp_series_pages INNER JOIN sp_creator ON sp_creator.id = relation_series_pages_creator.id WHERE sp_series_pages.id = :id AND sp_series_pages.sp_series_pages_verification = 1');
        $reqSeriesPagesCreator->bindValue(':id', $this->id);
        $reqSeriesPagesCreator->execute();
        $fetchSeriesPagesCreator = $reqSeriesPagesCreator->fetchAll();
        return $fetchSeriesPagesCreator;
    }

    public function seriesPagesEpisodes() {
        $reqSeriesPagesEpisodes = $this->db->prepare('SELECT * FROM sp_series_pages INNER JOIN sp_episodes_infos ON sp_episodes_infos.id_sp_series_pages = sp_series_pages.id WHERE sp_series_pages.id = :id AND sp_series_pages.sp_series_pages_verification = 1');
        $reqSeriesPagesEpisodes->bindValue(':id', $this->id);
        $reqSeriesPagesEpisodes->execute();
        $fetchSeriesPagesEpisodes = $reqSeriesPagesEpisodes->fetchAll();
        return $fetchSeriesPagesEpisodes;
    }

    public function seriesPagesVerification() {
        $reqSeriesPageVerification = $this->db->query('SELECT * FROM sp_series_pages WHERE sp_series_pages_verification = 0');
        $fetchSeriesPageVerification = $reqSeriesPageVerification->fetchAll();
        return $fetchSeriesPageVerification;
    }

    public function seriesPagesUpdateVerif() {
        $reqSeriesPageUpdateVerif = $this->db->prepare('UPDATE sp_series_pages SET sp_series_pages_verification = :sp_series_pages_verification WHERE id = :id');
        $reqSeriesPageUpdateVerif->bindValue(':sp_series_pages_verification', $this->sp_series_pages_verification);
        $reqSeriesPageUpdateVerif->bindValue(':id', $this->id);
        if ($reqSeriesPageUpdateVerif->execute()) {
            return TRUE;
        }
    }

    public function seriesPagesDeleteVerif() {
        $reqSeriesPageDeleteVerif = $this->db->prepare('DELETE FROM sp_series_pages WHERE id = :id');
        $reqSeriesPageDeleteVerif->bindValue(':id', $this->id);
        if ($reqSeriesPageDeleteVerif->execute()) {
            return TRUE;
        }
    }

    public function updateNumberVote() {
        $reqUpdateNumberVote = $this->db->prepare('Update sp_series_pages SET sp_series_pages_number_vote = :sp_series_pages_number_vote, sp_series_pages_rate = :sp_series_pages_rate WHERE id = :id');
        $reqUpdateNumberVote->bindValue(':sp_series_pages_number_vote', $this->sp_series_pages_number_vote);
        $reqUpdateNumberVote->bindValue(':sp_series_pages_rate', $this->sp_series_pages_rate);
        $reqUpdateNumberVote->bindValue(':id', $this->id);
        if($reqUpdateNumberVote->execute()) {
            return TRUE;
        }
    }

}
