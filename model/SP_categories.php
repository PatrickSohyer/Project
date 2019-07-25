<?php

// Création de ma classe Categories qui est une enfant de la classe Database 

class Categories extends Database
{

    // Déclaration de mes attributs

    public $id; // attibut id 
    public $sp_categories_gender; // attribut genre


    // Methode qui permet de selectionner les séries en fonction de leurs catégories

    public function getSeriesPagesCategories() // Methode qui permet de selectionner les séries en fonction de leurs catégories
    {
        $reqSeriesPagesCategories = $this->db->prepare('SELECT sp_series_pages.id AS seriesId, sp_series_pages.sp_series_pages_image AS seriesImage, sp_categories.sp_categories_gender FROM sp_series_pages INNER JOIN relation_series_pages_categories ON sp_series_pages.id = relation_series_pages_categories.id INNER JOIN sp_categories ON sp_categories.id = relation_series_pages_categories.id_sp_categories WHERE sp_categories.sp_categories_gender = :sp_categories_gender AND sp_series_pages.sp_series_pages_verification = 1'); // requete SQL qui permet de selectionner les séries en fonction de leurs catégorie grace a une jointure
        $reqSeriesPagesCategories->bindValue(':sp_categories_gender', $this->sp_categories_gender, PDO::PARAM_STR); // je donne une valeur à mon marqueur nominatif :sp_categories_gender
        if ($reqSeriesPagesCategories->execute()) { // si la requete s'execute
            $fetchSeriesPagesCategories = $reqSeriesPagesCategories->fetchAll(PDO::FETCH_ASSOC); // alors je fetchAll (je récupère toutes les données du tableau)
            return $fetchSeriesPagesCategories; // je retourne le résultat
        }
    }

    public function selectAllCategories() {
        $reqSelectAllCategories = $this->db->query('SELECT * FROM sp_categories');
        if ($reqSelectAllCategories->execute()) { // si la requete s'execute 
            $fetchSelectAllCategories = $reqSelectAllCategories->fetchAll(PDO::FETCH_ASSOC); // alors je fectch (Je récupère seulement la ligne du tableau qui m'intéresse)
            return $fetchSelectAllCategories; // je retourn mon résultat
        }
    }
}
