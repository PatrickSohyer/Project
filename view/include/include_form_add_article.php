<form class="formAddArticle text-center p-5" method="POST" action="page_form_add_article.php">

    <p class="h2 mb-5 formAddSeriesText"><u><b>Ajouter un article!</u></b></p>

    <label for="addArticleTitle"><b>Titre de l'article</b></label><span class="errorMessage d-block text-danger"><?= isset($errorMessage['addArticleTitle']) ? $errorMessage['addArticleTitle'] : ''; ?></span><input type="text" id="addArticleTitle" class="form-control mb-4" name="addArticleTitle" value="<?= isset($_POST['addArticleTitle']) ? $_POST['addArticleTitle'] : ''; ?>" required />

    <label for="addArticleDescription"><b>Description de l'article</b></label><span class="errorMessage d-block text-danger"><?= isset($errorMessage['addArticleDescription']) ? $errorMessage['addArticleDescription'] : ''; ?></span><textarea id="addArticleDescription" class="form-control mb-4" name="addArticleDescription" value="<?= isset($_POST['addArticleDescription']) ? $_POST['addArticleDescription'] : ''; ?>" required></textarea>

    <label for="addArticleImage"><b>Image de l'article</b></label><span class="errorMessage d-block text-danger"><?= isset($errorMessage['addArticleImage']) ? $errorMessage['addArticleImage'] : ''; ?></span><input type="text" id="addArticleImage" class="form-control mb-4" name="addArticleImage" value="<?= isset($_POST['addArticleImage']) ? $_POST['addArticleImage'] : ''; ?>" required />

    <label for="addArticleResume"><b>Contenu de l'article</b></label><span class="errorMessage d-block text-danger"><?= isset($errorMessage['addArticleResume']) ? $errorMessage['addArticleResume'] : ''; ?></span><textarea id="addArticleResume" class="form-control mb-4" name="addArticleResume" value="<?= isset($_POST['addArticleResume']) ? $_POST['addArticleResume'] : ''; ?>" required></textarea>

    <label for="addIdSpSeries"><b>Série liée à l'article</b></label><span class="errorMessage d-block text-danger"><?= isset($errorMessage['addIdSpSeries']) ? $errorMessage['addIdSpSeries'] : ''; ?></span><select class="form-control" name="addIdSpSeries">
        <?php foreach($selectSeries as $value) { ?>
        <option value="<?= $value['id'] ?>"><?= $value['sp_series_pages_title'] ?></option>
        <?php } ?>
    </select>


    <button class="spStyleButton btn btn-block text-white my-4" type="submit">Valider</button>
</form>