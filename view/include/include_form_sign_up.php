<form class="formSignUp text-center p-5" name="formSignUp" method="POST" action='page_form_sign_up.php'>

    <p class="h2 mb-4 signUpText">S'inscrire</p>

    <label for="pseudoSignUp" class="labelTextFormSignUp">Login</label><span class="errorMessage d-block text-danger"><?= isset($errorMessage['pseudoSignUp']) ? $errorMessage['pseudoSignUp'] : ''; ?></span><span class="errorMessage d-block text-danger"><?= isset($errorMessage['resultFilterLogin']) ? $errorMessage['resultFilterLogin'] : ''; ?></span><input type="text" value="<?= isset($_POST['pseudoSignUp']) ? $_POST['pseudoSignUp'] : ''; ?>" id="pseudoSignUp" class="form-control mb-4" name="pseudoSignUp" data-toggle="popover" data-trigger="focus" title="Login" data-content="Merci de saisir votre login, vous pourrez le modifier plus tard" required />

    <label for="emailSignUp" class="labelTextFormSignUp">Email</label><span class="errorMessage d-block text-danger"><?= isset($errorMessage['emailSignUp']) ? $errorMessage['emailSignUp'] : ''; ?></span><span class="errorMessage d-block text-danger"><?= isset($errorMessage['resultFilterMail']) ? $errorMessage['resultFilterMail'] : ''; ?></span><input type="email" id="emailSignUp" value="<?= isset($_POST['emailSignUp']) ? $_POST['emailSignUp'] : ''; ?>" class="form-control mb-4" name="emailSignUp" data-toggle="popover" data-trigger="focus" title="E-mail" data-content="Merci de saisir votre adresse mail" required />

    <label for="countrySignUp" class="labelTextFormSignUp">Pays</label>
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

    <label for="passwordSignUp" class="labelTextFormSignUp">Password</label><span class="errorMessage d-block text-danger"><?= isset($errorMessage['passwordSignUp']) ? $errorMessage['passwordSignUp'] : ''; ?></span><input type="password" id="passwordSignUp" placeholder="Mot de passe" class="form-control" name="passwordSignUp" data-toggle="popover" data-trigger="focus" title="Mot de passe" data-content="Votre mot de passe doit contenir au moins 8 caractères, une lettre majuscule, une lettre minuscule et un chiffre" required />

    <label for="passwordConfirmationSignUp" class="labelTextFormSignUp">Confirmation Password</label><span class="errorMessage d-block text-danger"><?= isset($errorMessage['passwordConfirmationSignUp']) ? $errorMessage['passwordConfirmationSignUp'] : ''; ?><?= isset($errorMessage['passwordConfirmation']) ? $errorMessage['passwordConfirmation'] : ''; ?></span><input type="password" id="passwordConfirmationSignUp" placeholder="Confirmation mot de passe" class="form-control mb-4" name="passwordConfirmationSignUp" data-toggle="popover" data-trigger="focus" title="Confirmation mot de passe" data-content="Merci de comfirmer votre mot de passe" required />

    <span class="errorMessage d-block text-danger"><?= isset($errorMessage['captcha']) ? $errorMessage['captcha'] : ''; ?></span><div class="g-recaptcha mx-auto mt-5" name="g-recaptcha-response" data-sitekey="6LcWVa4UAAAAAI6Nn6vhXIqrVlg3IPyGLzrzaDkZ"></div>

    <button class="spStyleButton btn my-4 btn-block text-white" type="submit" id="sign_up_button">S'inscrire</button>

    <hr>

    <p class="signUpText">En cliquant sur
        s'inscrire vous acceptez nos
        <a href="<?= $mentionsLegalsPage; ?>" target="_blank" class="text-primary">mentions légales</a></p>

</form>