// Je cache et affiche ce dont j'ai besoin dans mes différentes pages

$('#contentPresentationSerie').show();
$('#contentSeasons').hide();
$('#contentComment').hide();
$('#contentArticle').hide();
$('.modifyInfoUsers').hide();
$('.buttonValidateLogin').hide();
$('.modifyInfoUsersLogin').hide();
$('.buttonValidateEmail').hide();
$('.modifyInfoUsersEmail').hide();
$('.buttonValidateCountry').hide();
$('.modifyInfoUsersCountry').hide();
$('.buttonValidatePassword').hide();
$('.modifyInfoUsersPassword').hide();
$('.modifyInfoUsersPasswordConfirm').hide();
$('.modifyInfoUsersDelete').hide();
$('.buttonmodifyDeleteNo').hide();
$('.buttonmodifyDeleteYes').hide();


// fonction au click pour passer sur les saisons

$('#slideItemSeasons').click(function () {
    $('#contentPresentationSerie').hide();
    $('#contentSeasons').show();
    $('#contentComment').hide();
    $('#contentArticle').hide();
});

// fonction au click pour passer sur presentation

$('#slideItemPresentation').click(function () {
    $('#contentPresentationSerie').show();
    $('#contentSeasons').hide();
    $('#contentComment').hide();
    $('#contentArticle').hide();
});

// fonction au click pour passer sur les commentaires

$('#slideItemComment').click(function () {
    $('#contentPresentationSerie').hide();
    $('#contentSeasons').hide();
    $('#contentComment').show();
    $('#contentArticle').hide();
});

// fonction au click pour passer sur les articles

$('#slideItemArticle').click(function () {
    $('#contentPresentationSerie').hide();
    $('#contentSeasons').hide();
    $('#contentComment').hide();
    $('#contentArticle').show();
});

// Afficher et cacher les saisons


$('#season1Episode').show();

// fonction pour les popovers

$(function () {
    $('[data-toggle="popover"]').popover();
});

// fonction pour modifier le login

$('.buttonModifyLogin').click(function () {
    $('.infoUsersLogin').hide();
    $('.modifyInfoUsersLogin').show();
    $('.buttonModifyLogin').hide();
    $('.buttonValidateLogin').show();
});

// fonction pour modifier le mail

$('.buttonModifyEmail').click(function () {
    $('.infoUsersEmail').hide();
    $('.modifyInfoUsersEmail').show();
    $('.buttonModifyEmail').hide();
    $('.buttonValidateEmail').show();
});

// fonction pour modifier le pays

$('.buttonModifyCountry').click(function () {
    $('.infoUsersCountry').hide();
    $('.modifyInfoUsersCountry').show();
    $('.buttonModifyCountry').hide();
    $('.buttonValidateCountry').show();
});

// fonction pour modifier le mot de passe

$('.buttonModifyPassword').click(function () {
    $('.infoUsersLogin').hide();
    $('.infoUsersDelete').hide();
    $('.infoUsersEmail').hide();
    $('.infoUsersCountry').hide();
    $('.infoUsersPassword').hide();
    $('.modifyInfoUsersPassword').show();
    $('.buttonModifyPassword').hide();
    $('.buttonValidatePassword').show();
    $('.modifyInfoUsersPasswordConfirm').show();
});

// fonction pour supprimer un compte

$('.buttonModifyDelete').click(function () {
    $('.infoUsersLogin').hide();
    $('.infoUsersEmail').hide();
    $('.infoUsersCountry').hide();
    $('.infoUsersPassword').hide();
    $('.buttonModifyPassword').hide();
    $('.infoUsersDelete').hide();
    $('.modifyInfoUsersDelete').show();
    $('.buttonmodifyDeleteNo').show();
    $('.buttonmodifyDeleteYes').show();
});

$('#refreshComment').on('click', function() {
	location.reload();
});
