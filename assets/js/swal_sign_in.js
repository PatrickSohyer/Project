// Sweet Alert pour la connexion

window.onload = function () {
    Swal.fire({
        text: 'Vous êtes bien connecté(e)',
        type: 'success',
        confirmButtonText: '<a class="text-white" href="../../index.php">Retour à l\'acceuil</a>'
    });
    setTimeout(function () {

        document.location.href = '../../index.php'; 
    }, 1300); 
};