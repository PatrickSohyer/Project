<?php
if (COUNT($_POST) > 0) {
    require_once ('../include/form_security_add_series.php');
    if (isset($errorMessageAddSeries) AND COUNT($errorMessageAddSeries) === 0) {
        header('Location: ../../index.php');
    } else {
        require_once ('../include/form_add_series.php');
    }
} else { 
    require_once ('../include/form_add_series.php');
}
    ?>