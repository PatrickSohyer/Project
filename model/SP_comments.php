<?php

// Création de ma classe Comments qui est une enfant de la classe Database 

class Comments extends Database
{

    // Déclaration de mes attributs

    public $id; // attribut id
    public $sp_message; // attribut commentaire
    public $sp_date_message; // attribut date du message
    public $sp_id_users; // attribut id de l'utilisateur
    public $sp_id_series_pages; // attribut id de la série


    // Methode pour ajouter un commentaire dans la base de données

    public function insertComments() // Methode pour ajouter un commentaire dans la base de données
    {
        $reqInsertComments = $this->db->prepare('INSERT INTO sp_comments (sp_message, sp_date_message, sp_id_users, sp_id_series_pages) VALUES (:sp_message, :sp_date_message, :sp_id_users, :sp_id_series_pages)'); // requete SQL qui permet d'ajouter un message dans la base de données
        $reqInsertComments->bindValue(':sp_message', $this->sp_message, PDO::PARAM_STR); // je donne une valeur à mon marqueur nominatif :sp_message
        $reqInsertComments->bindValue(':sp_date_message', $this->sp_date_message, PDO::PARAM_STR); // je donne une valeur à mon marqueur nominatif :sp_date_message
        $reqInsertComments->bindValue(':sp_id_users', $this->sp_id_users, PDO::PARAM_INT); // je donne une valeur à mon marqueur nominatif :sp_id_users
        $reqInsertComments->bindValue(':sp_id_series_pages', $this->sp_id_series_pages, PDO::PARAM_INT); // je donne une valeur à mon marqueur nominatif :sp_id_series_pages
        if ($reqInsertComments->execute()) { // si la requete s'execute
            return TRUE; // je retourne un booléen true
        }
    }

    // Methode pour selectionner les commenataires en fonction de la série et afficher les 10 derniers

    public function selectComments() // Methode pour selectionner les commenataires en fonction de la série et afficher les 10 derniers
    {
        $reqSelectComments = $this->db->prepare('SELECT sp_comments.id AS idComment, sp_comments.sp_message, sp_comments.sp_date_message, sp_comments.sp_id_users, sp_comments.sp_id_series_pages AS idSeries, sp_users.id, sp_users.sp_users_login FROM sp_comments INNER JOIN sp_users ON sp_comments.sp_id_users = sp_users.id WHERE sp_comments.sp_id_series_pages = :id ORDER BY sp_date_message DESC LIMIT 10'); // requete SQL pour selectionner les commentaires en fonction de l'id de l'utilisateur et de la série grace à une jointure
        $reqSelectComments->bindValue(':id', $this->sp_id_series_pages, PDO::PARAM_INT); // je donne une valeur à mon marqueur nominatif :id
        if ($reqSelectComments->execute()) { // si la requete s'execute
            $fetchSelectComments = $reqSelectComments->fetchAll(PDO::FETCH_ASSOC); // alors je fetchAll (je récupère toutes les données du tableau)
            return $fetchSelectComments; // je retourne le résultat 
        }
    }

    // Methode pour supprimer un commentaire

    public function deleteComments() // Methode pour supprimer un commentaire
    {
        $reqDeleteComments = $this->db->prepare('DELETE FROM sp_comments WHERE id = :id'); // requete SQL pour supprimer un commentaires
        $reqDeleteComments->bindValue(':id', $this->id, PDO::PARAM_INT); // je donne une valeur à mon marqueur nominatif :id
        if ($reqDeleteComments->execute()) { // si la requete s'execute
            return TRUE; // je retourne un booléen (TRUE)
        }
    }

    // Methode poud mettre à jour un commentaire si l'utilisateur supprime son compte

    public function updateCommentsUser() // Methode poud mettre à jour un commentaire si l'utilisateur supprime son compte
    {
        $reqUpdateCommentUser = $this->db->prepare('UPDATE sp_comments SET sp_id_users = 1 WHERE sp_id_users = :id'); // requete SQL pour mettre à jour un commentaire si jamais un utilisateur quitte le site
        $reqUpdateCommentUser->bindValue(':id', $this->sp_id_users, PDO::PARAM_INT);  // je donne une valeur à mon marqueur nominatif :id
        if ($reqUpdateCommentUser->execute()) { // si la requete s'execute 
            return TRUE; // je retourne un booléen (TRUE)
        }
    }
}
