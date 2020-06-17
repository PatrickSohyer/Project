<?php

// Je crée la classe database qui permettra de se connecter à la base de données.

class Database
{

    // Je déclare mon attribut en protected

    protected $db; /*Je crée un attribut $db de propriété protected qui pourra être appelée de n’importe quel endroit du site 
    à l'aide de $this->db*/

    // J'utilise un constructeur qui est une méthode magique de POO.

    public function __construct() // La méthode __construct n'attend pas qu'on l'appelle, elle est automatiquement appelée.
    {
        try {
            /* Je créée un objet PDO pour me connecter à ma base de  données mysql.            
            Je définis l'objet database grâce à la variable $this.
            J'initialise l'objet PDO à ma variable de connexion $this->db et
            je lui définis les variables de connexion (interieur de la parenthèse). 
            en 1er : le type de base de données (mysql), l'adresse du serveur (localhost) et le nom de ma BDD (series_phil).
            en 2eme : le login de ma BDD (root).
            en 3eme : le mot de passe de ma BDD (''). */

            $this->db = new PDO('mysql:dbname=series_phil;host=localhost; charset=utf8', 'psohyer', 'psohyer', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
            /* J'utilise le couple TRY/CATCH pour me permettre de gérer une erreur de connexion à ma BDD.
            TRY : tente de se connecter à ma BDD et s'il y a une erreur CATCH renverra un message d'erreur
            personnalisé grâce à l'attribut des erreurs qui est défini en mode d’affichage :
            ERRMODE_EXCEPTION. */
        } catch (Exception $error) {
            die('Erreur de connexion ' . $error->getMessage());
        }
    }

    public function __destruct()
    {
        $this->database = NULL; /* // Une fois que la connexion a été faite ainsi que
        la requête, la méthode magique __destruct détruit la connexion avec la BDD. */
    }
}
