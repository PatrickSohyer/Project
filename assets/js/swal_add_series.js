window.onload = function () {
    Swal.fire({
    text: 'La série a bien été ajoutée, elle sera examinée par un administrateur!',
            type: 'success',
            confirmButtonText: '<a class="text-white" href="../../index.php">Retour à l\'acceuil</a>',
            onAfterClose: () => {
    document.location.href="../../index.php";
    }
    });
};