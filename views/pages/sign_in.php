<?php
if (COUNT($_POST) > 0) {
    require_once ('../include/form_security_sign_in.php');
    if (isset($errorMessageSignIn) AND COUNT($errorMessageSignIn) === 0) {
        header('Location: ../../index.php');
    } else {
        require_once ('../include/form_sign_in.php');
    }
} else { 
    require_once ('../include/form_sign_in.php');
}
    ?>