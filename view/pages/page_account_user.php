<?php
session_start();
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
    <link rel="shortcut icon" type="image/x-icon" href="../../assets/images/favicon/favicon.ico">

    <title>SériesPhil!</title>

</head>

<body>

    <?php
    require_once('../include/include_header.php');
    ?>

    <div class="container container-fluid">
        <div class="row mt-3 mb-3">
            <div class="col-xl-6 col-lg-6 col-md-12 col-12 mx-auto">
                <div class="card" id="cardmyAccount">
                    <div class="card-body">
                        <p class="h2 mb-3 text-center">Mon Compte</p>
                        <ul class="list-group list-group-flush">

                            <form method="POST" action="page_account_user.php" class="text-center">

                                <span class="errorMessage d-block text-danger"><?= isset($errorMessage['newLogin']) ? $errorMessage['newLogin'] : ''; ?></span>
                                <span class="errorMessage d-block text-danger"><?= isset($errorMessage['resultFilterLogin']) ? $errorMessage['resultFilterLogin'] : ''; ?></span>
                                <li class="list-group-item infoUsersLogin" name="accountLogin">Login : <?= $usersResult['sp_users_login'] ?><a class="buttonModifyLogin"><i class="fas fa-pencil-alt ml-5"></i></a></li>
                                <label class="modifyInfoUsersLogin list-group-item" for="newlogin">Nouveau Login :
                                    <input class="modifyInfoUsersLogin" type="text" name="newLogin" value="<?= $usersResult['sp_users_login'] ?>" /> <button type="submit" name="modifyLoginValidate" class="spStyleButton text-white btn buttonValidateLogin ml-4 mb-2"><i class="fas fa-check-circle"></i></button> </label>

                            </form>

                            <form method="POST" action="page_account_user.php" class="text-center">

                                <span class="errorMessage d-block text-danger"><?= isset($errorMessage['newEmail']) ? $errorMessage['newEmail'] : ''; ?></span>
                                <span class="errorMessage d-block text-danger"><?= isset($errorMessage['resultFilterEmail']) ? $errorMessage['resultFilterEmail'] : ''; ?></span>
                                <li class="list-group-item infoUsersEmail" name="accountEmail">Email : <?= $usersResult['sp_users_email'] ?><a class="buttonModifyEmail"><i class="fas fa-pencil-alt ml-5"></i></a></li>
                                <label class="modifyInfoUsersEmail list-group-item" for="newEmail">Nouveau Email :
                                    <input class="modifyInfoUsersEmail" type="text" name="newEmail" value="<?= $usersResult['sp_users_email'] ?>" /> <button type="submit" name="modifyEmailValidate" class="spStyleButton text-white btn buttonValidateEmail ml-4 mb-2"><i class="fas fa-check-circle"></i></button></label>

                            </form>

                            <form method="POST" action="page_account_user.php" class="text-center">

                                <li class="list-group-item infoUsersCountry" name="accountCountry">Pays : <?= $usersResult['sp_users_country'] ?><a class="buttonModifyCountry"><i class="fas fa-pencil-alt ml-5"></i></a></li>

                                <label class="modifyInfoUsersCountry list-group-item">Nouveau Pays :
                                    <select id="countrySelect" style="width:6rem" class="form-control d-inline mb-4 modifyInfoUsersCountry" name="newCountry" required>
                                        <?php
                                        foreach ($countryCode as $valueCountry) {
                                            ?>

                                            <option <?php
                                                    if (empty($_POST['newCountry'])) {
                                                        echo '';
                                                    } elseif ($_POST['newCountry'] == $valueCountry) {
                                                        echo 'selected';
                                                    };
                                                    ?> value="<?= $valueCountry; ?>"><?= $valueCountry; ?></option>

                                        <?php
                                        }
                                        ?></select>
                                    <button type="submit" name="modifyCountryValidate" class="spStyleButton text-white btn buttonCountryEmail ml-4 mb-2"><i class="fas fa-check-circle"></i></button></label>

                            </form>

                            <form method="POST" action="page_account_user.php" class="text-center">

                                <span class="errorMessage d-block text-danger"><?= isset($errorMessage['newPassword']) ? $errorMessage['newPassword'] : ''; ?></span>
                                <span class="errorMessage d-block text-danger"><?= isset($errorMessage['newPasswordConfirm']) ? $errorMessage['newPasswordConfirm'] : ''; ?></span>
                                <span class="errorMessage d-block text-danger"><?= isset($errorMessage['newPasswordDiff']) ? $errorMessage['newPasswordDiff'] : ''; ?></span>
                                <li class="list-group-item infoUsersPassword" name="accountPassword">Changer de mot de passe<a class="buttonModifyPassword"><i class="fas fa-pencil-alt ml-5"></i></a></li>
                                <label class="modifyInfoUsersPassword list-group-item" for="newPassword">Nouveau mot de passe :
                                    <input class="modifyInfoUsersPassword" type="password" name="newPassword" required /></label>
                                <label class="modifyInfoUsersPasswordConfirm list-group-item" for="newPasswordConfirm">Confirmer mot de passe :
                                    <input class="modifyInfoUsersPasswordConfirm" type="password" name="newPasswordConfirm" required /></label>
                                <button type="submit" name="modifyPasswordValidate" class="mx-auto spStyleButton text-white btn buttonValidatePassword ml-4 mt-4">Confirmer le changement de mot de passe</button>

                            </form>

                            <form method="POST" action="page_account_user.php" class="text-center">

                                <li class="list-group-item infoUsersDelete" name="accountDelete">Supprimer le compte<a class="buttonModifyDelete"><i class="far fa-trash-alt ml-5"></i></a></li>
                                <label class="modifyInfoUsersDelete list-group-item" for="newDelete">Êtes vous sur de vouloir quitter ce merveilleux site?</label>
                                <img class="img-fluid modifyInfoUsersDelete" src="../../assets/images/imgAccueil/chefDeleteAccount.png">
                                <button type="submit" name="deleteUsers" value=<?= $_SESSION['id'] ?> class="btnDeleteSeries btn btn-danger modifyInfoUsersDelete">Supprimer son compte <i class="fas fa-sad-tear"></i></button></a>
                                <button class="btnDeleteSeries btn btn-success modifyInfoUsersDelete"><a href="page_account_user.php" class="buttonmodifyDeleteNo h5 text-white m-4">Rester sur le site <i class="fas fa-laugh-beam"></i></a></button>

                            </form>
                        </ul>

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