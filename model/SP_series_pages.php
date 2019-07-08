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

    public function __construct() {
        parent::__construct();
    }

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

}
