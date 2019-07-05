<form class="formSignUp text-center p-5" name="formSignUp" method="POST" action='page_form_sign_up.php'>

    <p class="h2 mb-4 signUpText">S'inscrire</p>

    <label for="pseudoSignUp" class="labelTextFormSignUp">Pseudonyme</label><span class="errorMessage d-block text-danger"><?= isset($errorMessage['pseudoSignUp']) ? $errorMessage['pseudoSignUp'] : ''; ?></span><span class="errorMessage d-block text-danger"><?= isset($errorMessage['resultFilterLogin']) ? $errorMessage['resultFilterLogin'] : ''; ?></span><input type="text" value="<?= isset($_POST['pseudoSignUp']) ? $_POST['pseudoSignUp'] : ''; ?>" id="pseudoSignUp" class="form-control mb-4" name="pseudoSignUp" required />

    <label for="emailSignUp" class="labelTextFormSignUp">Email</label><span class="errorMessage d-block text-danger"><?= isset($errorMessage['emailSignUp']) ? $errorMessage['emailSignUp'] : ''; ?></span><span class="errorMessage d-block text-danger"><?= isset($errorMessage['resultFilterMail']) ? $errorMessage['resultFilterMail'] : ''; ?></span><input type="email" id="emailSignUp" value="<?= isset($_POST['emailSignUp']) ? $_POST['emailSignUp'] : ''; ?>" class="form-control mb-4" name="emailSignUp" required />

    <select id="country" class="form-control mb-4" name="countrySignUp" required>                                              
        <?php
        foreach ($countryCode as $valueCountry) {
            ?>

            <option <?php
            if (empty($_POST['countrySignUp'])) {
                echo '';
            } elseif ($_POST['countrySignUp'] == $valueCountry) {
                echo 'selected';
            };
            ?>  value="<?= $valueCountry; ?>"><?= $valueCountry; ?></option>

            <?php
        }
        ?></select>

    <label for="passwordSignUp" class="labelTextFormSignUp">Password</label><span class="errorMessage d-block text-danger"><?= isset($errorMessage['passwordSignUp']) ? $errorMessage['passwordSignUp'] : ''; ?></span><input type="password" id="passwordSignUp" placeholder="Mot de passe" class="form-control" name="passwordSignUp" required />
    <small id="passwordInstruction" class="form-text text-muted mb-2">
        Au moins 8 caractères comportant une majuscule, une minuscule et un chiffre 
    </small>

    <label for="passwordConfirmationSignUp" class="labelTextFormSignUp">Confirmation Password</label><span class="errorMessage d-block text-danger"><?= isset($errorMessage['passwordConfirmationSignUp']) ? $errorMessage['passwordConfirmationSignUp'] : ''; ?><?= isset($errorMessage['passwordConfirmation']) ? $errorMessage['passwordConfirmation'] : ''; ?></span><input type="password" id="passwordConfirmationSignUp" placeholder="Confirmation mot de passe" class="form-control mb-4" name="passwordConfirmationSignUp" required />

    <button class="spStyleButton btn my-4 btn-block text-white" type="submit" id="sign_up_button">S'inscrire</button>

    <hr>

    <p class="signUpText">En cliquant sur
        s'inscrire vous acceptez nos
        <a href="<?= $mentionsLegalsPage; ?>" target="_blank">mentions légales</a></p>

</form>