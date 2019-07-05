<?php
require '../../controller/controller_account_user.php';
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
        <link rel="shortcut icon" type="image/x-icon" href="../../images/favicon/favicon.ico">

        <title>SériesPhil!</title>

    </head>



    <body>

        <?php
        require_once ('../include/include_header.php');
        ?>

        <div class="container container-fluid">
            <div class="row mt-3 mb-3">
                <div class="col-xl-6 col-lg-6 col-md-12 col-12 mx-auto">
                    <div class="card" id="cardmyAccount">
                        <div class="card-body">
                            <p class="h2 mb-3 text-center">Mon Compte</p>
                            <ul class="list-group list-group-flush">
                                <form method="POST" action="page_account_user.php">
                                    <li class="list-group-item infoUsers" name="accountLogin">Login : </li>
                                    <label class="modifyInfoUsers list-group-item" for="newlogin">Nouveau Login : </label><input class="modifyInfoUsers" type="text" name="newLogin" />
                                    <li class="list-group-item infoUsers" name="accountEmail">Email : </li>
                                    <label class="modifyInfoUsers list-group-item" for="newEmail">Nouveau Email : </label><input class="modifyInfoUsers" type="text" name="newEmail" />
                                    <li class="list-group-item infoUsers" name="accountCountry">Pays : </li>
                                    <label class="modifyInfoUsers list-group-item" for="newCountry">Nouveau Pays : </label><input class="modifyInfoUsers" type="text" name="newCountry" />
                                    <li class="list-group-item infoUsers" name="accountPassword">Mot de passe : </li>
                                    <label class="modifyInfoUsers list-group-item" for="newPassword">Nouveau mot de passe : </label><input class="modifyInfoUsers" type="password" name="newPassword" />
                                                                        <label class="modifyInfoUsers list-group-item" for="newConfirmPassword">Confirmer mot de passe : </label><input class="modifyInfoUsers" type="password" name="newConfirmPassword" /> 
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-success buttonSendModify">Envoyer Modifications</button>
                                    </div>
                                </form>
                            </ul>
                            <div class="text-center">
                                <button type="button" class="btn btn-danger mt-2 buttonModify">Modifier</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <?php
        require_once('../include/include_footer.php');
        ?>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://ajax.googleapis.com/ajax/libs/hammerjs/2.0.8/hammer.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="../../assets/bootstrap-4.3.1-dist/js/bootstrap.min.js"></script>
        <script src="../../assets/js/main.js"></script>
    </body>

</html>

