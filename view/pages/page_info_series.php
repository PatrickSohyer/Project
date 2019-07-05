<?php
require '../../controller/controller_info_series.php';
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


        <div class="container-fluid container">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-4 col-xl-4 text-center mt-3">
                    <img id="seriesImagesInformation" src="../../assets/images/imgSeries/13ReasonsWhy.jpg" />
                    <div class="rating rating2 mt-3"><!--
                        --><a href="#5" title="Give 5 stars">★</a><!--
                        --><a href="#4" title="Give 4 stars">★</a><!--
                        --><a href="#3" title="Give 3 stars">★</a><!--
                        --><a href="#2" title="Give 2 stars">★</a><!--
                        --><a href="#1" title="Give 1 star">★</a>
                    </div>
                    <button class="btn btn-success">Ajouter aux favoris <i class="fas fa-heart"></i></button>
                </div>
                <div class="col-12 col-md-6 col-lg-6 col-xl-6 mt-3">
                    <p class="textSeriePage h1 text-center p-1">13 Reasons Why</p>
                    <p class="textSeriePage text-center p-1 mb-2">Description :<br />Un garçon nommé Clay reçoit une boîte à chaussures remplies de
                        cassettes de la part d'une
                        de ses amies, Hannah Baker, récemment suicidée. Sur les cassettes qui doivent être passées de mains en mains, Hannah explique que chacun a joué un rôle dans sa mort, et donne les 13 raisons expliquant son passage à
                        l'acte.</p>
                    <ol class="textSeriePage text-center p-1">
                        <li>Nombre de Saisons : 2</li>
                        <li>Nombre d'épisodes : 26</li>
                        <li>Durée d'un épisode : 55</li>
                        <li>Diffusion : Netflix</li>
                        <li></li>
                    </ol>
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/LVVMvRpmu0s" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>

                </div>
            </div>
        </div>




        <nav class="slidemenu">       
            <!--                     Item 1 -->
            <input type="radio" name="slideItem" id="slideItemPresentation" class="slide-toggle" checked/>
            <label for="slideItemPresentation"><p class="icon"><i class="fas fa-home"></i></p><span>Présentation</span></label>

            <!--                     Item 2 -->
            <input type="radio" name="slideItem" id="slideItemSeasons" class="slide-toggle"/>
            <label for="slideItemSeasons"><p class="icon"><i class="fas fa-list-alt"></i></p><span>Saisons</span></label>

            <!--                     Item 3 -->
            <input type="radio" name="slideItem" id="slideItemComment" class="slide-toggle"/>
            <label for="slideItemComment"><p class="icon"><i class="fas fa-comments"></i></p><span>Avis</span></label>

            <!--                     Item 4 -->
            <input type="radio" name="slideItem" id="slideItemArticle" class="slide-toggle"/>
            <label for="slideItemArticle"><p class="icon"><i class="fas fa-pen-nib"></i></p><span>Articles</span></label>

            <div class="clear"></div>

            <!--                     Bar -->
            <div class="slider">
                <div class="bar"></div>
            </div>
        </nav>

        <div class="container container-fluid" id="contentPresentationSerie">
            <div class="row">
                <div class="col-xl-7 col-lg-7 col-md-7 col-12 informationSeriesCard">
                    <p class="h2 mt-2"><b>Informations sur la série</b></p>
                    <p class="mt-3"><b>Titre Original</b> : <i>13 Reasons Why</i><br /><br />

                        <b>Titre français</b> :	<i>13 Reasons Why</i><br /><br />

                        <b>Année de création</b> : <i>2017</i><br /> <br />

                        <b>Chaîne(s) de diffusion</b> : <i>Netflix</i><br /><br />

                        <b>Nationalité</b> : <i>Américaine</i><br /><br />

                        <b>Genres</b> : <i>Drame, Mystere</i><br /><br />

                        <b>Résumé</b> : <i>Un garçon nommé Clay reçoit une boîte à chaussures remplies de
                            cassettes de la part d'une
                            de ses amies, Hannah Baker, récemment suicidée. Sur les cassettes qui doivent être passées de mains en mains, Hannah explique que chacun a joué un rôle dans sa mort, et donne les 13 raisons expliquant son passage à
                            l'acte.</i>
                    </p>
                </div>
                <div class="col-xl-5 col-lg-5 col-md-5 col-12 h-100 mt-2">
                    <div class="informationSeriesCard">
                        <p class="h2 mt-2 text-center"><b>Création / Production</b></p>
                        <p class="h5 text-center"><i>Brian Yorkey<br />
                                July Moon Productions<br />
                                Kicked to the Curb Productions <br />
                                Anonymous Content <br />
                                Paramount Television</i></p>
                    </div>
                    <div class="informationSeriesCard mt-2">
                        <p class="h2 mt-2 text-center"><b>Acteurs Principaux</b></p>
                        <p class="h5 text-center">Dylan Minnette<br />
                            Katherine Langford<br />
                            Christian Navarro<br />
                            Alisha Boe<br />
                            Brandon Flynn<br />
                            Justin Prentice<br />
                            Miles Heizer</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="container container-fluid" id="contentSeasons">
            <div class="row">
                <div class="col-lg-8 col-xl-8 col-md-8 col-8 mx-auto">
                    <div class=" seasonsSeriesCard">
                        <p class="mt-3 text-center"><span class="seasonsClick" id="seasons1Click">Saison 1</span> / <span class="seasonsClick" id="seasons2Click">Saison 2</span></p>  
                    </div>
                    <div class=" seasonsSeriesCard text-center">
                        <p id="season1Episode">1.1 : Cassette 1, face A<br />
                            1.2 : Cassette 1, face B<br />
                            1.3 : Cassette 2, face A<br />
                            1.4 : Cassette 2, face B<br />
                            1.5 : Cassette 3, face A<br />
                            1.6 : Cassette 3, face B<br />
                            1.7 : Cassette 4, face A<br />
                            1.8 : Cassette 4, face B<br />
                            1.9 : Cassette 5, face A<br />
                            1.10 : Cassette 5, face B<br />
                            1.11 : Cassette 6, face A<br />
                            1.12 : Cassette 6, face B<br />
                            1.13 : Cassette 7, face A</p>
                        <p id="season2Episode">2.1 : Premier polaroid<br />
                            2.2 : Deux filles qui s'embrassent<br />
                            2.3 : Juste une s*** ivre<br />
                            2.4 : Deuxième polaroid<br />
                            2.5 : La traceuse de terrain<br />
                            2.6 : Le sourire au bout du quai<br />
                            2.7 : Troisième polaroid<br />
                            2.8 : Notre petite fille<br />
                            2.9 : La page arrachée<br />
                            2.10 : Souriez, s*** !<br />
                            2.11 : Bryce et Chloe<br />
                            2.12 : La boîte de polaroids<br />
                            2.13 : Au revoir</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="container container-fluid" id="contentComment">
            <div class="row">
                <div class="col-">
                    <p class="text-light">La partie avis et commentaires sera ici!</p>  
                </div>
            </div>
        </div>

        <div class="container container-fluid" id="contentArticle">
            <div class="row">
                <div class="col-">
                    <p class="text-light">C'est un Test numéro 3!</p>  
                </div>
            </div>
        </div>

<?php require_once('../include/include_footer.php') ?>

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
