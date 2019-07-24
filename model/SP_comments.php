<?php

// Création de ma classe Comments qui est une enfant de la classe Database 

class Comments extends Database
{

    // Déclaration de mes attributs

    public $id;
    public $sp_message;
    public $sp_date_message;
    public $sp_id_users;
    public $sp_id_series_pages;


    // Déclaration de la method

    public function insertComments()
    {
        $reqInsertComments = $this->db->prepare('INSERT INTO sp_comments (sp_message, sp_date_message, sp_id_users, sp_id_series_pages) VALUES (:sp_message, :sp_date_message, :sp_id_users, :sp_id_series_pages)');
        $reqInsertComments->bindValue(':sp_message', $this->sp_message, PDO::PARAM_STR);
        $reqInsertComments->bindValue(':sp_date_message', $this->sp_date_message, PDO::PARAM_STR);
        $reqInsertComments->bindValue(':sp_id_users', $this->sp_id_users, PDO::PARAM_INT);
        $reqInsertComments->bindValue(':sp_id_series_pages', $this->sp_id_series_pages, PDO::PARAM_INT);
        if ($reqInsertComments->execute()) {
            return TRUE;
        }
    }

    public function selectComments()
    {
        $reqSelectComments = $this->db->prepare('SELECT sp_comments.id AS idComment, sp_comments.sp_message, sp_comments.sp_date_message, sp_comments.sp_id_users, sp_comments.sp_id_series_pages AS idSeries, sp_users.id, sp_users.sp_users_login FROM sp_comments INNER JOIN sp_users ON sp_comments.sp_id_users = sp_users.id WHERE sp_comments.sp_id_series_pages = :id ORDER BY sp_date_message DESC LIMIT 10');
        $reqSelectComments->bindValue(':id', $this->sp_id_series_pages, PDO::PARAM_INT);
        $reqSelectComments->execute();
        $fetchSelectComments = $reqSelectComments->fetchAll();
        return $fetchSelectComments;
    }

    public function deleteComments()
    {
        $reqDeleteComments = $this->db->prepare('DELETE FROM sp_comments WHERE id = :id');
        $reqDeleteComments->bindValue(':id', $this->id, PDO::PARAM_INT);
        if ($reqDeleteComments->execute()) {
            return TRUE;
        }
    }

    public function updateCommentsUser() {
        $reqUpdateCommentUser = $this->db->prepare('UPDATE sp_comments SET sp_id_users = 1 WHERE sp_id_users = :id');
        $reqUpdateCommentUser->bindValue(':id', $this->sp_id_users, PDO::PARAM_INT);
        if ($reqUpdateCommentUser->execute()) {
            return TRUE;
        }
    }
}
