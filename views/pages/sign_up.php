<?php
if (COUNT($_POST) > 0) {
    require_once ('../include/country.php');
    require_once ('../include/form_security_sign_up.php');
    if (isset($errorMessage) AND COUNT($errorMessage) === 0) {
        header('Location: ../../index.php');
    } else {
        require_once ('../include/form_sign_up.php');
    }
} else { 
    require_once ('../include/form_sign_up.php');
}
    ?>