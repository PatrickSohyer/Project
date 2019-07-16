// Sweet Alert pour l'envoi d'une suggestion de séries

window.onload = function () {
    Swal.fire({
    text: 'Votre message a bien été envoyé, il sera examiné par un administrateur au plus vite!',
            type: 'success',
            confirmButtonText: '<a class="text-white" href="../../index.php">Retour à l\'acceuil</a>',
            onAfterClose: () => {
    document.location.href="../../index.php";
    }
    });
};