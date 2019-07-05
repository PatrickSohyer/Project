<form class="formSignIn text-center p-5" name="formSignIn" method="POST" action='page_form_sign_in.php'>

    <p class="h2 mb-4 signInText">Se Connecter</p>

    <label for="loginSignIn" class="labelTextFormSignIn">Login</label><span class="errorMessage d-block text-danger"><?= isset($errorMessageSignIn['loginSignIn']) ? $errorMessageSignIn['loginSignIn'] : ''; ?></span><input type="text" value="<?= isset($_POST['loginSignIn']) ? $_POST['loginSignIn'] : ''; ?>" id="loginSignIn" class="form-control mb-4" name="loginSignIn" required />

    <label for="passwordSignIn" class="labelTextFormSignIn">Mot de passe</label><span class="errorMessage d-block text-danger"><?= isset($errorMessageSignIn['passwordSignIn']) ? $errorMessageSignIn['passwordSignIn'] : ''; ?></span><input type="password" id="passwordSignIn" placeholder="Mot de passe" class="form-control" name="passwordSignIn" required />

    <button class="spStyleButton btn my-4 btn-block text-white" type="submit" id="signInButton">Se Connecter</button>


</form>