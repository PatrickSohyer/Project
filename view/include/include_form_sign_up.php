<form class="formSignUp text-center p-5" name="formSignUp" method="POST" action='page_form_sign_up.php'>

    <p class="h2 mb-4 signUpText"><b><u>Inscription</u></b></p>

    <label for="pseudoSignUp" class="labelTextFormSignUp h5">Login <i class="fas fa-user-circle ml-2"></i></label><span class="errorMessage d-block text-danger"><?= isset($errorMessage['pseudoSignUp']) ? $errorMessage['pseudoSignUp'] : ''; ?></span><span class="errorMessage d-block text-danger"><?= isset($errorMessage['resultFilterLogin']) ? $errorMessage['resultFilterLogin'] : ''; ?></span><input type="text" value="<?= isset($_POST['pseudoSignUp']) ? $_POST['pseudoSignUp'] : ''; ?>" id="pseudoSignUp" class="form-control mb-4" name="pseudoSignUp" data-toggle="popover" data-trigger="focus" title="Login" data-content="Merci de choisir votre login, vous aurez la possibilité de le modifier plus tard." required />

    <label for="emailSignUp" class="labelTextFormSignUp h5">Email <i class="fas fa-at ml-2"></i></label><span class="errorMessage d-block text-danger"><?= isset($errorMessage['emailSignUp']) ? $errorMessage['emailSignUp'] : ''; ?></span><span class="errorMessage d-block text-danger"><?= isset($errorMessage['resultFilterMail']) ? $errorMessage['resultFilterMail'] : ''; ?></span><input type="email" id="emailSignUp" value="<?= isset($_POST['emailSignUp']) ? $_POST['emailSignUp'] : ''; ?>" class="form-control mb-4" name="emailSignUp" data-toggle="popover" data-trigger="focus" title="E-mail" data-content="Merci de rentrer votre adresse mail, vous aurez la possibilité de le modifier plus tard." required />

    <label for="countrySignUp" class="labelTextFormSignUp h5">Pays <i class="fas fa-globe-europe ml-2"></i></label>
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
                    ?> value="<?= $valueCountry; ?>"><?= $valueCountry; ?></option>

        <?php
        }
        ?></select>

    <label for="passwordSignUp" class="labelTextFormSignUp h5">Password <i class="fas fa-lock ml-2"></i></label><span class="errorMessage d-block text-danger"><?= isset($errorMessage['passwordSignUp']) ? $errorMessage['passwordSignUp'] : ''; ?></span><input type="password" id="passwordSignUp" placeholder="Mot de passe" class="form-control mb-4" name="passwordSignUp" data-toggle="popover" data-trigger="focus" title="Mot de passe" data-content="Votre mot de passe doit contenir au moins 8 caractères, une lettre majuscule, une lettre minuscule et un chiffre" required />

    <label for="passwordConfirmationSignUp" class="labelTextFormSignUp h5">Confirmation Password <i class="fas fa-lock ml-2"></i></label><span class="errorMessage d-block text-danger"><?= isset($errorMessage['passwordConfirmationSignUp']) ? $errorMessage['passwordConfirmationSignUp'] : ''; ?><?= isset($errorMessage['passwordConfirmation']) ? $errorMessage['passwordConfirmation'] : ''; ?></span><input type="password" id="passwordConfirmationSignUp" placeholder="Confirmation mot de passe" class="form-control mb-4" name="passwordConfirmationSignUp" data-toggle="popover" data-trigger="focus" title="Confirmation mot de passe" data-content="Merci de comfirmer votre mot de passe" required />

    <span class="errorMessage d-block text-danger"><?= isset($errorMessage['captcha']) ? $errorMessage['captcha'] : ''; ?></span>
    <div class="g-recaptcha mt-4" name="g-recaptcha-response" data-sitekey="6LcWVa4UAAAAAI6Nn6vhXIqrVlg3IPyGLzrzaDkZ"></div>

    <button class="spStyleButton btn my-4 btn-block text-white" type="submit" id="sign_up_button">S'inscrire</button>

    <hr>

    <p class="signUpText">En cliquant sur
        s'inscrire vous acceptez nos
        <a href="<?= $mentionsLegalsPage; ?>" target="_blank" class="text-primary">mentions légales</a></p>

</form>