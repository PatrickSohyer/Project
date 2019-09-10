<form class="formSignIn text-center p-5" name="formSignIn" method="POST" action='page_form_sign_in.php'>

    <p class="h2 mb-4 signInText"><b><u>Connexion</u></b></p>

    <label for="loginSignIn" class="labelTextFormSignIn h5">Login <i class="fas fa-user-circle ml-2"></i></label><span class="errorMessage d-block text-danger"><?= isset($errorMessageSignIn['loginExist']) ? $errorMessageSignIn['loginExist'] : ''; ?></span><span class="errorMessage d-block text-danger"><?= isset($errorMessageSignIn['loginSignIn']) ? $errorMessageSignIn['loginSignIn'] : ''; ?></span><input type="text" value="<?= isset($_POST['loginSignIn']) ? $_POST['loginSignIn'] : ''; ?>" id="loginSignIn" class="form-control mb-4" name="loginSignIn" required />

    <label for="passwordSignIn" class="labelTextFormSignIn h5">Mot de passe <i class="fas fa-lock ml-2"></i></label><span class="errorMessage d-block text-danger"><?= isset($errorMessageSignIn['passwordSignIn']) ? $errorMessageSignIn['passwordSignIn'] : ''; ?></span><span class="errorMessage d-block text-danger"><?= isset($errorMessageSignIn['passwordConnect']) ? $errorMessageSignIn['passwordConnect'] : ''; ?></span><input type="password" id="passwordSignIn" placeholder="Mot de passe" class="form-control" name="passwordSignIn" required />

    <span class="errorMessage d-block text-danger"><?= isset($errorMessageSignIn['captcha']) ? $errorMessageSignIn['captcha'] : ''; ?></span>
    <div class="g-recaptcha mx-auto mt-4" name="g-recaptcha-response" data-sitekey="6LcWVa4UAAAAAI6Nn6vhXIqrVlg3IPyGLzrzaDkZ">
    </div>

    <button class="spStyleButton btn my-4 btn-block text-white" type="submit" id="signInButton">Se Connecter</button>

    <a class="text-primary" href="#">Mot de passe oublié?</a>

    <!-- Le mot de passe sera renvoyé par mail sous 8 caractères générés aléatoirement entre des lettres et des chiffres -->

</form>