<?php
session_start();
require_once '../../controller/controller_sign_in.php';
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script src="https://www.google.com/recaptcha/api.js"></script>

    <title>SériesPhil!</title>

</head>

<body>

    <?php
    require_once '../include/include_header.php';
    ?>

    <?php if (count($errorMessageSignIn) > 0 or count($_POST) == 0) { ?>

        <div class="container container-fluid">
            <div class="row mt-3 mb-3">
                <div class="col-xl-6 col-lg-6 col-md-12 col-12 mx-auto">
                    <div class="card" id="cardSignIn">
                        <div class="card-body">
                            <?php
                            include '../include/include_form_sign_in.php';
                        } else {
                            ?>
                            <div class="container container-fluid">
                                <div class="row mt-3 mb-3">
                                    <div class="col-xl-6 col-lg-6 col-md-12 col-12 mx-auto">
                                        <div class="card" id="cardSignIn">
                                            <div class="card-body">
                                                <?php
                                                include '../include/include_form_sign_in.php';
                                                ?>
                                                <script src="../../assets/js/swal_sign_in.js"></script>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    require_once '../include/include_footer.php';
    ?>

    <script src="https://ajax.googleapis.com/ajax/libs/hammerjs/2.0.8/hammer.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="../../assets/bootstrap-4.3.1-dist/js/bootstrap.min.js"></script>
    <script src="../../assets/js/main.js"></script>

</body>

</html>