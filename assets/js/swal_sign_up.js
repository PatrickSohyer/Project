// Sweet Alert pour l'inscription

window.onload = function () {
    Swal.fire({
    text: 'Vous vous êtes bien inscrit(e), Vous pouvez désormais vous connecter!',
            type: 'success',
            confirmButtonText: '<a class="text-white" href="../../index.php">Retour à l\'acceuil</a>',
            onAfterClose: () => {
    document.location.href="../../index.php";
    }
    });
};