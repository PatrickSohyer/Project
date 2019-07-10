<?php
session_start();
require '../../controller/controller_page_admin_verif.php';
?> 
<!DOCTYPE html>
<html lang="fr" dir="ltr">

    <head>

        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="../../assets/bootstrap-4.3.1-dist/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../../assets/css/main.css">
        <link href="https://fonts.googleapis.com/css?family=Acme&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <link rel="shortcut icon" type="image/x-icon" href="../../assets/images/favicon/favicon.ico">

        <title>SériesPhil!</title>

    </head>



    <body>

        <?php
        require_once ('../include/include_header.php');
        ?>

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <table class="table text-white">
                        <thead class="text-center">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nom Séries</th>
                                <th scope="col">Description</th>
                                <th scope="col">Nombre saisons</th>
                                <th scope="col">Nombre épisodes</th>
                                <th scope="col">Durée épisodes</th>
                                <th scope="col">Diffusion</th>
                                <th scope="col">Ajouter</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($seriesVerif as $value) { ?>
                            <tr>
                                <th scope="row"><?= $value['id'] ?></th>
                                <td><?= $value['sp_series_pages_title'] ?></td>
                                <td><?= $value['sp_series_pages_description'] ?></td>
                                <td><?= $value['sp_series_pages_number_seasons'] ?></td>
                                <td><?= $value['sp_series_pages_number_episodes'] ?></td>
                                <td><?= $value['sp_series_pages_duration_episodes'] ?></td>
                                <td><?= $value['sp_series_pages_diffusion_channel'] ?></td>
                                <td><a href="page_admin_verif.php?validation=<?= $value['id'] ?>"><i class="fas fa-check-circle"></i></a></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>



        <?php
        require_once('../include/include_footer.php')
        ?>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://ajax.googleapis.com/ajax/libs/hammerjs/2.0.8/hammer.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="../../assets/bootstrap-4.3.1-dist/js/bootstrap.min.js"></script>
        <script src="../../assets/js/main.js"></script>
    </body>

</html>