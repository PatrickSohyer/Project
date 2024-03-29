<?php

// Je créer ma classe Series qui est une enfant de ma class Database

class Series extends Database
{

    // Je déclare mes attributs

    public $id; // attribut id
    public $sp_series_pages_title; // attribut titre
    public $sp_series_pages_description; // attribut description
    public $sp_series_pages_number_seasons; // attribut nombre de saison
    public $sp_series_pages_number_episodes; // attribut nombre d'épisode
    public $sp_series_pages_duration_episodes; // attribut durée d'un épisode
    public $sp_series_pages_diffusion_channel; // attribut de la chaine
    public $sp_series_pages_trailer; // attribut trailer
    public $sp_series_pages_image; // attribut image
    public $sp_series_pages_french_title; // attribut titre français
    public $sp_series_pages_original_title; // attribut titre original
    public $sp_series_pages_origin; // attribut origine 
    public $sp_series_pages_verification; // attribut vérification
    public $sp_series_pages_rate; // attribut note
    public $sp_series_pages_number_vote; // attribut nombre de vote
    public $nbSeriesPerPages = 12; // attribut nombre de série par page
    public $firstPageSeries; // attribut page

    // Methode qui permet d'ajouter une série à la base de données

    public function addSeries()
    {
        $reqAddSeries = $this->db->prepare('INSERT INTO sp_series_pages(sp_series_pages_title, sp_series_pages_description, sp_series_pages_number_seasons, sp_series_pages_number_episodes, sp_series_pages_duration_episodes, sp_series_pages_diffusion_channel, sp_series_pages_trailer, sp_series_pages_image, sp_series_pages_french_title, sp_series_pages_original_title, sp_series_pages_origin) VALUES (:sp_series_pages_title, :sp_series_pages_description, :sp_series_pages_number_seasons, :sp_series_pages_number_episodes, :sp_series_pages_duration_episodes, :sp_series_pages_diffusion_channel, :sp_series_pages_trailer, :sp_series_pages_image, :sp_series_pages_french_title, :sp_series_pages_original_title, :sp_series_pages_origin)');
        $reqAddSeries->bindValue(':sp_series_pages_title', $this->sp_series_pages_title, PDO::PARAM_STR);
        $reqAddSeries->bindValue(':sp_series_pages_description', $this->sp_series_pages_description, PDO::PARAM_STR);
        $reqAddSeries->bindValue(':sp_series_pages_number_seasons', $this->sp_series_pages_number_seasons, PDO::PARAM_INT);
        $reqAddSeries->bindValue(':sp_series_pages_number_episodes', $this->sp_series_pages_number_episodes, PDO::PARAM_INT);
        $reqAddSeries->bindValue(':sp_series_pages_duration_episodes', $this->sp_series_pages_duration_episodes, PDO::PARAM_INT);
        $reqAddSeries->bindValue(':sp_series_pages_diffusion_channel', $this->sp_series_pages_diffusion_channel, PDO::PARAM_STR);
        $reqAddSeries->bindValue(':sp_series_pages_trailer', $this->sp_series_pages_trailer, PDO::PARAM_STR);
        $reqAddSeries->bindValue(':sp_series_pages_image', $this->sp_series_pages_image, PDO::PARAM_STR);
        $reqAddSeries->bindValue(':sp_series_pages_french_title', $this->sp_series_pages_french_title, PDO::PARAM_STR);
        $reqAddSeries->bindValue(':sp_series_pages_original_title', $this->sp_series_pages_original_title, PDO::PARAM_STR);
        $reqAddSeries->bindValue(':sp_series_pages_origin', $this->sp_series_pages_origin, PDO::PARAM_STR);
        if ($reqAddSeries->execute()) {
            return true;
        }
    }

    // Methode qui permet de selectionner les images d'une séries vérifier et en fonction de la pagination

    public function selectSeriesImages()
    {
        $reqSelectSeries = $this->db->prepare('SELECT sp_series_pages_image, id, sp_series_pages_title FROM sp_series_pages WHERE sp_series_pages_verification = 1 LIMIT :nbSeriesPerPages OFFSET :firstPageSeries');
        $reqSelectSeries->bindValue(':nbSeriesPerPages', $this->nbSeriesPerPages, PDO::PARAM_INT);
        $reqSelectSeries->bindValue(':firstPageSeries', $this->firstPageSeries, PDO::PARAM_INT);
        if ($reqSelectSeries->execute()) {
            $reqFetchSeries = $reqSelectSeries->fetchAll(PDO::FETCH_ASSOC);
            return $reqFetchSeries;
        }
    }

      // Methode qui permet de selectionner les images d'une séries vérifier et en fonction de la pagination et de la recherche

      public function selectSeriesImagesSearch()
      {
          $reqSeriesImagesSearch = $this->db->prepare('SELECT sp_series_pages_image, id, sp_series_pages_title FROM sp_series_pages WHERE sp_series_pages_verification = 1 AND sp_series_pages_title LIKE :search LIMIT :nbSeriesPerPages OFFSET :firstPageSeries');
          $reqSeriesImagesSearch->bindValue(':nbSeriesPerPages', $this->nbSeriesPerPages, PDO::PARAM_INT);
          $reqSeriesImagesSearch->bindValue(':firstPageSeries', $this->firstPageSeries, PDO::PARAM_INT);
          $reqSeriesImagesSearch->bindValue(':search', $this->sp_series_pages_title, PDO::PARAM_STR);
          if ($reqSeriesImagesSearch->execute()) {
              $fetchSeriesImagesSearch = $reqSeriesImagesSearch->fetchAll(PDO::FETCH_ASSOC);
              return $fetchSeriesImagesSearch;
          }
      }

    // Methode qui permet de compter le nombre de série total pour la pagination si la série est valider

    public function countSeriesPagination()
    {
        $reqCountSeriesPagination = $this->db->query('SELECT COUNT(*) AS total FROM sp_series_pages WHERE sp_series_pages_verification = 1');
        $fetchCountSeriesPagination = $reqCountSeriesPagination->fetchAll(PDO::FETCH_ASSOC);
        return $fetchCountSeriesPagination;
    }

    // Methode qui permet de compter le nombre de série total pour la pagination sur ma console admin

    public function countSeriesPaginationAdmin()
    {
        $reqCountSeriesPaginationAdmin = $this->db->query('SELECT COUNT(*) AS total FROM sp_series_pages');
        $fetchCountSeriesPaginationAdmin = $reqCountSeriesPaginationAdmin->fetchAll(PDO::FETCH_ASSOC);
        return $fetchCountSeriesPaginationAdmin;
    }

    // Methode qui permet de compter le nombre de série pas vérifier 

    public function countSeriesVerifAdmin()
    {
        $reqcountSeriesVerifAdmin = $this->db->query('SELECT COUNT(*) AS total FROM sp_series_pages WHERE sp_series_pages_verification = 0');
        $fetchcountSeriesVerifAdmin = $reqcountSeriesVerifAdmin->fetch(PDO::FETCH_ASSOC);
        return $fetchcountSeriesVerifAdmin;
    }

    // Methode qui permet de selectionner toutes les séries à mettre à jour

    public function selectSeriesPagesUpdate()
    {
        $reqSeriesPageInfo = $this->db->prepare('SELECT * FROM sp_series_pages WHERE id = :id');
        $reqSeriesPageInfo->bindValue(':id', $this->id, PDO::PARAM_INT);
        if ($reqSeriesPageInfo->execute()) {
            $fetchSeriesPageInfo = $reqSeriesPageInfo->fetchAll(PDO::FETCH_ASSOC);
            return $fetchSeriesPageInfo;
        }
    }

    // Methode qui permet de selectionner toutes les informations de sp_series_pages si la séries est validée

    public function selectSeriesPagesInfo()
    {
        $reqselectSeriesPagesInfo = $this->db->prepare('SELECT * FROM sp_series_pages WHERE id = :id AND sp_series_pages_verification = 1');
        $reqselectSeriesPagesInfo->bindValue(':id', $this->id, PDO::PARAM_INT);
        if ($reqselectSeriesPagesInfo->execute()) {
            $fetchselectSeriesPagesInfo = $reqselectSeriesPagesInfo->fetch(PDO::FETCH_ASSOC);
            return $fetchselectSeriesPagesInfo;
        }
    }

    // Methode qui permet de selectionner toutes les série validé

    public function selectAllSeries()
    {
        $reqSelectAllSeries = $this->db->query('SELECT * FROM sp_series_pages WHERE sp_series_pages_verification = 1 ORDER BY sp_series_pages_title');
        $fetchSelectAllSeries = $reqSelectAllSeries->fetchAll(PDO::FETCH_ASSOC);
        return $fetchSelectAllSeries;
    }

    // Methode qui permet de Selectionner selon la limit définis pour la pagination

    public function selectSeriesPagesAllSeries()
    {
        $reqSelectSeriesPagesAllSeries = $this->db->prepare('SELECT * FROM sp_series_pages LIMIT :nbSeriesPerPages OFFSET :firstPageSeries');
        $reqSelectSeriesPagesAllSeries->bindValue(':nbSeriesPerPages', $this->nbSeriesPerPages, PDO::PARAM_INT);
        $reqSelectSeriesPagesAllSeries->bindValue(':firstPageSeries', $this->firstPageSeries, PDO::PARAM_INT);
        if ($reqSelectSeriesPagesAllSeries->execute()) {
            $fetchSelectSeriesPagesAllSeries = $reqSelectSeriesPagesAllSeries->fetchAll(PDO::FETCH_ASSOC);
            return $fetchSelectSeriesPagesAllSeries;
        }
    }

    // Methode qui permet de selectionner les acteurs en fonctions de l'id de la série

    public function selectSeriesPagesActor()
    {
        $reqSelectSeriesPagesActor = $this->db->prepare('SELECT * FROM sp_series_pages INNER JOIN relation_series_pages_actor ON sp_series_pages.id = relation_series_pages_actor.id INNER JOIN sp_actor ON sp_actor.id = relation_series_pages_actor.id_sp_actor WHERE sp_series_pages.id = :id AND sp_series_pages.sp_series_pages_verification = 1'); 
        $reqSelectSeriesPagesActor->bindValue(':id', $this->id, PDO::PARAM_INT);
        if ($reqSelectSeriesPagesActor->execute()) {
            $fetchSelectSeriesPagesActor = $reqSelectSeriesPagesActor->fetchAll(PDO::FETCH_ASSOC);
            return $fetchSelectSeriesPagesActor;
        }
    }

    // Methode qui permet de Selectionner les créateurs en fonctions de l'id de la série

    public function selectSeriesPagesCreator()
    {
        $reqSelectSeriesPagesCreator = $this->db->prepare('SELECT * FROM sp_series_pages INNER JOIN relation_series_pages_creator ON sp_series_pages.id = relation_series_pages_creator.id_sp_series_pages INNER JOIN sp_creator ON sp_creator.id = relation_series_pages_creator.id WHERE sp_series_pages.id = :id AND sp_series_pages.sp_series_pages_verification = 1');
        $reqSelectSeriesPagesCreator->bindValue(':id', $this->id, PDO::PARAM_INT);
        if ($reqSelectSeriesPagesCreator->execute()) {
            $fetchSelectSeriesPagesCreator = $reqSelectSeriesPagesCreator->fetchAll(PDO::FETCH_ASSOC);
            return $fetchSelectSeriesPagesCreator;
        }
    }

    // Methode qui permet de Selectionner les épisodes d'une série en fonction de l'id de la série

    public function selectSeriesPagesEpisodes()
    {
        $reqSelectSeriesPagesEpisodes = $this->db->prepare('SELECT * FROM sp_series_pages INNER JOIN sp_episodes_infos ON sp_episodes_infos.id_sp_series_pages = sp_series_pages.id WHERE sp_series_pages.id = :id AND sp_series_pages.sp_series_pages_verification = 1');
        $reqSelectSeriesPagesEpisodes->bindValue(':id', $this->id, PDO::PARAM_INT);
        if ($reqSelectSeriesPagesEpisodes->execute()) {
            $fetchSelectSeriesPagesEpisodes = $reqSelectSeriesPagesEpisodes->fetchAll(PDO::FETCH_ASSOC);
            return $fetchSelectSeriesPagesEpisodes;
        }
    }

    // Methode qui permet de Selectionner les séries qui n'ont pas encore été valider

    public function selectSeriesPagesVerification()
    {
        $reqSelectSeriesPagesVerification = $this->db->query('SELECT * FROM sp_series_pages WHERE sp_series_pages_verification = 0');
        $fetchSelectSeriesPagesVerification = $reqSelectSeriesPagesVerification->fetchAll(PDO::FETCH_ASSOC);
        return $fetchSelectSeriesPagesVerification;
    }

    // Methode qui permet de vérifier et valider une série

    public function updateVerifSeriesPages()
    {
        $reqUpdateVerifSeriesPages = $this->db->prepare('UPDATE sp_series_pages SET sp_series_pages_verification = :sp_series_pages_verification WHERE id = :id');
        $reqUpdateVerifSeriesPages->bindValue(':sp_series_pages_verification', $this->sp_series_pages_verification, PDO::PARAM_INT);
        $reqUpdateVerifSeriesPages->bindValue(':id', $this->id, PDO::PARAM_INT);
        if ($reqUpdateVerifSeriesPages->execute()) {
            return TRUE;
        }
    }

    // Methode qui permet de modifier les informations d'une série

    public function updateSeries()
    {
        $reqUpdateSeries = $this->db->prepare('UPDATE sp_series_pages SET sp_series_pages_title = :sp_series_pages_title, sp_series_pages_description = :sp_series_pages_description, sp_series_pages_number_seasons = :sp_series_pages_number_seasons, sp_series_pages_number_episodes = :sp_series_pages_number_episodes, sp_series_pages_duration_episodes = :sp_series_pages_duration_episodes, sp_series_pages_diffusion_channel = :sp_series_pages_diffusion_channel, sp_series_pages_trailer = :sp_series_pages_trailer, sp_series_pages_image = :sp_series_pages_image, sp_series_pages_french_title = :sp_series_pages_french_title, sp_series_pages_original_title = :sp_series_pages_original_title, sp_series_pages_origin = :sp_series_pages_origin WHERE id = :id');
        $reqUpdateSeries->bindValue(':sp_series_pages_title', $this->sp_series_pages_title, PDO::PARAM_STR);
        $reqUpdateSeries->bindValue(':sp_series_pages_description', $this->sp_series_pages_description, PDO::PARAM_STR);
        $reqUpdateSeries->bindValue(':sp_series_pages_number_seasons', $this->sp_series_pages_number_seasons, PDO::PARAM_INT);
        $reqUpdateSeries->bindValue(':sp_series_pages_number_episodes', $this->sp_series_pages_number_episodes, PDO::PARAM_INT);
        $reqUpdateSeries->bindValue(':sp_series_pages_duration_episodes', $this->sp_series_pages_duration_episodes, PDO::PARAM_INT);
        $reqUpdateSeries->bindValue(':sp_series_pages_diffusion_channel', $this->sp_series_pages_diffusion_channel, PDO::PARAM_STR);
        $reqUpdateSeries->bindValue(':sp_series_pages_trailer', $this->sp_series_pages_trailer, PDO::PARAM_STR);
        $reqUpdateSeries->bindValue(':sp_series_pages_image', $this->sp_series_pages_image, PDO::PARAM_STR);
        $reqUpdateSeries->bindValue(':sp_series_pages_french_title', $this->sp_series_pages_french_title, PDO::PARAM_STR);
        $reqUpdateSeries->bindValue(':sp_series_pages_original_title', $this->sp_series_pages_original_title, PDO::PARAM_STR);
        $reqUpdateSeries->bindValue(':sp_series_pages_origin', $this->sp_series_pages_origin, PDO::PARAM_STR);
        $reqUpdateSeries->bindValue(':id', $this->id, PDO::PARAM_INT);
        if ($reqUpdateSeries->execute()) {
            return TRUE;
        }
    }

    // Method qui permet de supprimer une série

    public function deleteSeriesPages()
    {
        $reqdeleteSeriesPages = $this->db->prepare('DELETE FROM sp_series_pages WHERE id = :id');
        $reqdeleteSeriesPages->bindValue(':id', $this->id, PDO::PARAM_INT);
        if ($reqdeleteSeriesPages->execute()) {
            return TRUE;
        }
    }

    // Methode qui permet de mettre à jour le nombre de vote 

    public function updateNumberVote()
    {
        $reqUpdateNumberVote = $this->db->prepare('UPDATE sp_series_pages SET sp_series_pages_number_vote = :sp_series_pages_number_vote, sp_series_pages_rate = :sp_series_pages_rate WHERE id = :id');
        $reqUpdateNumberVote->bindValue(':sp_series_pages_number_vote', $this->sp_series_pages_number_vote, PDO::PARAM_INT);
        $reqUpdateNumberVote->bindValue(':sp_series_pages_rate', $this->sp_series_pages_rate, PDO::PARAM_INT);
        $reqUpdateNumberVote->bindValue(':id', $this->id, PDO::PARAM_INT);
        if ($reqUpdateNumberVote->execute()) {
            return TRUE;
        }
    }
}
