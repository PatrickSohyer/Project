<form class="formAddSeries text-center p-5" method="POST" action="page_form_add_series.php">

    <p class="h2 mb-5 formAddSeriesText"><u><b>Ajouter une série!</u></b></p>

    <label for="addSeriesTitle"><b>Titre de la série</b></label><span class="errorMessage d-block text-danger"><?= isset($errorMessageAddSeries['addSeriesTitle']) ? $errorMessageAddSeries['addSeriesTitle'] : ''; ?></span><input type="text" id="addSeriesTitle" class="form-control mb-4" name="addSeriesTitle" value="<?= isset($_POST['addSeriesTitle']) ? $_POST['addSeriesTitle'] : ''; ?>" required />

    <label for="addSeriesDescription"><b>Description de la série</b></label><span class="errorMessage d-block text-danger"><?= isset($errorMessageAddSeries['addSeriesDescription']) ? $errorMessageAddSeries['addSeriesDescription'] : ''; ?></span><textarea id="addSeriesDescription" class="form-control mb-4" name="addSeriesDescription" value="<?= isset($_POST['addSeriesDescription']) ? $_POST['addSeriesDescription'] : ''; ?>" required /></textarea>

    <label for="addSeriesSeasonsNumber"><b>Nombre de saisons</b></label><span class="errorMessage d-block text-danger"><?= isset($errorMessageAddSeries['addSeriesSeasonsNumber']) ? $errorMessageAddSeries['addSeriesSeasonsNumber'] : ''; ?></span><input type="number" id="addSeriesSeasonsNumber" min="1" class="form-control mb-4" name="addSeriesSeasonsNumber" value="<?= isset($_POST['addSeriesSeasonsNumber']) ? $_POST['addSeriesSeasonsNumber'] : ''; ?>" required />

    <label for="addSeriesEpisodesNumber"><b>Nombre d'épisodes</b></label><span class="errorMessage d-block text-danger"><?= isset($errorMessageAddSeries['addSeriesEpisodesNumber']) ? $errorMessageAddSeries['addSeriesEpisodesNumber'] : ''; ?></span><input type="number" id="addSeriesEpisodesNumber" min="1" class="form-control mb-4" name="addSeriesEpisodesNumber" value="<?= isset($_POST['addSeriesEpisodesNumber']) ? $_POST['addSeriesEpisodesNumber'] : ''; ?>" required />

    <label for="addSeriesEpisodesDuration"><b>Durée d'un épisode</b></label><span class="errorMessage d-block text-danger"><?= isset($errorMessageAddSeries['addSeriesEpisodesDuration']) ? $errorMessageAddSeries['addSeriesEpisodesDuration'] : ''; ?></span><input type="number" id="addSeriesEpisodesDuration" min="1" class="form-control mb-4" name="addSeriesEpisodesDuration" value="<?= isset($_POST['addSeriesEpisodesDuration']) ? $_POST['addSeriesEpisodesDuration'] : ''; ?>" required />

    <label for="addSeriesDiffusion"><b>Chaîne de diffusion</b></label><span class="errorMessage d-block text-danger"><?= isset($errorMessageAddSeries['addSeriesDiffusion']) ? $errorMessageAddSeries['addSeriesDiffusion'] : ''; ?></span><input type="text" id="addSeriesDiffusion" class="form-control mb-4" name="addSeriesDiffusion" value="<?= isset($_POST['addSeriesDiffusion']) ? $_POST['addSeriesDiffusion'] : ''; ?>" required />

    <label for="addSeriesTrailer"><b>Trailer</b></label><span class="errorMessage d-block text-danger"><?= isset($errorMessageAddSeries['addSeriesTrailer']) ? $errorMessageAddSeries['addSeriesTrailer'] : ''; ?></span><input type="text" id="addSeriesTrailer" class="form-control mb-4" name="addSeriesTrailer" value="<?= isset($_POST['addSeriesTrailer']) ? $_POST['addSeriesTrailer'] : ''; ?>" required />

    <label for="addSeriesImage"><b>Image de la série</b></label><span class="errorMessage d-block text-danger"><?= isset($errorMessageAddSeries['addSeriesImage']) ? $errorMessageAddSeries['addSeriesImage'] : ''; ?></span><input type="text" id="addSeriesImage" class="form-control mb-4" name="addSeriesImage" value="<?= isset($_POST['addSeriesImage']) ? $_POST['addSeriesImage'] : ''; ?>" required />

    <label for="addSeriesFrenchTitle"><b>Titre français</b></label><span class="errorMessage d-block text-danger"><?= isset($errorMessageAddSeries['addSeriesFrenchTitle']) ? $errorMessageAddSeries['addSeriesFrenchTitle'] : ''; ?></span><input type="text" id="addSeriesFrenchTitle" class="form-control mb-4" name="addSeriesFrenchTitle" value="<?= isset($_POST['addSeriesFrenchTitle']) ? $_POST['addSeriesFrenchTitle'] : ''; ?>" required />

    <label for="addSeriesOriginalTitle"><b>Titre original</b></label><span class="errorMessage d-block text-danger"><?= isset($errorMessageAddSeries['addSeriesOriginalTitle']) ? $errorMessageAddSeries['addSeriesOriginalTitle'] : ''; ?></span><input type="text" id="addSeriesOriginalTitle" class="form-control mb-4" name="addSeriesOriginalTitle" value="<?= isset($_POST['addSeriesOriginalTitle']) ? $_POST['addSeriesOriginalTitle'] : ''; ?>" required />

    <label for="addSeriesOrigin"><b>Origine de la série</b></label><span class="errorMessage d-block text-danger"><?= isset($errorMessageAddSeries['addSeriesOrigin']) ? $errorMessageAddSeries['addSeriesOrigin'] : ''; ?></span><input type="text" id="addSeriesOrigin" class="form-control mb-4" name="addSeriesOrigin" value="<?= isset($_POST['addSeriesOrigin']) ? $_POST['addSeriesOrigin'] : ''; ?>" required />

    <button class="spStyleButton btn btn-block text-white my-4" type="submit" id="add_series_button">Valider</button>
</form>