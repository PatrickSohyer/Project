<?php

class Categories extends Database {

    public $id;
    public $sp_categories_gender;




    public function getSeriesPagesCategories() {
        $reqSeriesPagesCategories = $this->db->prepare('SELECT * FROM sp_series_pages INNER JOIN relation_series_pages_categories ON sp_series_pages.id = relation_series_pages_categories.id INNER JOIN sp_categories ON sp_categories.id = relation_series_pages_categories.id_sp_categories WHERE sp_catories.sp_categories_gender = :sp_categories_gender AND sp_series_pages.sp_series_pages_verification = 1');
        $reqSeriesPagesCategories->bindValue(':sp_categories_gender', $this->sp_categories_gender);
        $reqSeriesPagesCategories->execute();
        $fetchSeriesPagesCategories = $reqSeriesPagesCategories->fetchAll();
        return $fetchSeriesPagesCategories;
    }
}
