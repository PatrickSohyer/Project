<?php
$bdd = new PDO('mysql:host=localhost;dbname=series_phil;charset=utf8', 'root', '');
$seriesPerPage = 12; 
$totalSeriesReq = $bdd->query('SELECT COUNT(*) AS total FROM sp_series_pages');
$seriesFetch = $totalSeriesReq->fetchAll(PDO::FETCH_OBJ);
$seriesPage = $seriesFetch[0]->total/$seriesPerPage;
if(isset($_GET['page']) AND !empty($_GET['page'])) {
    $defautPage = htmlspecialchars($_GET['page']);
    $startPage = ($defautPage - 1) * $seriesPerPage;
} else {
    header('Location: xxxxxxxx');
}
if (isset($_GET['searchSeries']) AND ! empty($_GET['searchSeries'])) {
    $search = htmlspecialchars($_GET['searchSeries']);
    $seriesSearch = $bdd->query("SELECT * FROM patients WHERE firstname LIKE  '%$recherche%' OR lastname LIKE '%$recherche%' LIMIT $depart, $patientsPerPage");
    $reqFetch = $patients->fetchAll();
} else {
    $patients = $bdd->query("SELECT * FROM patients LIMIT $depart, $patientsPerPage");
    $reqFetch = $patients->fetchAll();  
}

// DELETE INFORMATIONS 

if (isset($_GET['deleteID'])) {
    $bdd = new PDO('mysql:host=localhost;dbname=hospitale2n;charset=utf8', 'root', '');
    $reqPat = $bdd->prepare('DELETE FROM patients WHERE id = :id');
    $reqPat->bindValue(':id', $_GET['deleteID']);
    $reqPat->execute();
    header('Location: liste-patients.php');
}
 

?>