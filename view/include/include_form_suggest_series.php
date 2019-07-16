<form class="formAddSeries text-center p-5" method="POST" action="page_suggest_series.php">

    <p class="h2 mb-5"><u><b>Suggérer une série à rajouter?!</u></b></p>

    <label for="suggestSeriesTitleN1"><b>Titre de la série N°1 <i>(obligatoire)</i></b></label><span class="errorMessage d-block text-danger"><?= isset($errorMessage['suggestSeriesTitleN1']) ? $errorMessage['suggestSeriesTitleN1'] : ''; ?></span><input type="text" id="suggestSeriesTitleN1" class="form-control mb-4" name="suggestSeriesTitleN1" value="<?= isset($_POST['suggestSeriesTitleN1']) ? $_POST['suggestSeriesTitleN1'] : ''; ?>" required />

    <label for="suggestSeriesTitleN2"><b>Titre de la série N°2 <i>(facultatif)</i></b></label><span class="errorMessage d-block text-danger"><?= isset($errorMessage['suggestSeriesTitleN2']) ? $errorMessage['suggestSeriesTitleN2'] : ''; ?></span><input type="text" id="suggestSeriesTitleN2" class="form-control mb-4" name="suggestSeriesTitleN2" value="<?= isset($_POST['suggestSeriesTitleN2']) ? $_POST['suggestSeriesTitleN2'] : ''; ?>" />

    <label for="suggestSeriesTitleN3"><b>Titre de la série N°3 <i>(facultatif)</i></b></label><span class="errorMessage d-block text-danger"><?= isset($errorMessage['suggestSeriesTitleN3']) ? $errorMessage['suggestSeriesTitleN3'] : ''; ?></span><input type="text" id="suggestSeriesTitleN3" class="form-control mb-4" name="suggestSeriesTitleN3" value="<?= isset($_POST['suggestSeriesTitleN3']) ? $_POST['suggestSeriesTitleN3'] : ''; ?>" />

    <button class="spStyleButton btn btn-block text-white my-4" type="submit">Valider</button>
</form>