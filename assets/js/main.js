// Afficher et cacher les élements de la navigation dans SeriesCard

$('#contentPresentationSerie').show();
$('#contentSeasons').hide();
$('#contentComment').hide();
$('#contentArticle').hide();
$('.modifyInfoUsers').hide();
$('.buttonSendModify').hide();

$('#slideItemSeasons').click(function () {
    $('#contentPresentationSerie').hide();
    $('#contentSeasons').show();
    $('#contentComment').hide();
    $('#contentArticle').hide();
});

$('#slideItemPresentation').click(function () {
    $('#contentPresentationSerie').show();
    $('#contentSeasons').hide();
    $('#contentComment').hide();
    $('#contentArticle').hide();
});

$('#slideItemComment').click(function () {
    $('#contentPresentationSerie').hide();
    $('#contentSeasons').hide();
    $('#contentComment').show();
    $('#contentArticle').hide();
});

$('#slideItemArticle').click(function () {
    $('#contentPresentationSerie').hide();
    $('#contentSeasons').hide();
    $('#contentComment').hide();
    $('#contentArticle').show();
});

// Afficher et cacher les saisons


$('#season1Episode').show();
$('#season2Episode').hide();
$('#season3Episode').hide();
$('#season4Episode').hide();
$('#season5Episode').hide();
$('#season6Episode').hide();
$('#season7Episode').hide();
$('#season8Episode').hide();
$('#season9Episode').hide();
$('#season10Episode').hide();
$('#season11Episode').hide();
$('#season12Episode').hide();
$('#season13Episode').hide();
$('#season14Episode').hide();
$('#season15Episode').hide();

$('#seasons1Click').click(function () {
    $('#season1Episode').show();
    $('#season2Episode').hide();
    $('#season3Episode').hide();
    $('#season4Episode').hide();
    $('#season5Episode').hide();
    $('#season6Episode').hide();
    $('#season7Episode').hide();
    $('#season8Episode').hide();
    $('#season9Episode').hide();
    $('#season10Episode').hide();
    $('#season11Episode').hide();
    $('#season12Episode').hide();
    $('#season13Episode').hide();
    $('#season14Episode').hide();
    $('#season15Episode').hide();
});

$('#seasons2Click').click(function () {
    $('#season1Episode').hide();
    $('#season2Episode').show();
    $('#season3Episode').hide();
    $('#season4Episode').hide();
    $('#season5Episode').hide();
    $('#season6Episode').hide();
    $('#season7Episode').hide();
    $('#season8Episode').hide();
    $('#season9Episode').hide();
    $('#season10Episode').hide();
    $('#season11Episode').hide();
    $('#season12Episode').hide();
    $('#season13Episode').hide();
    $('#season14Episode').hide();
    $('#season15Episode').hide();
});


$(function () {
  $('[data-toggle="popover"]').popover();
});

$('.buttonModify').click(function () {
    $('.infoUsers').hide();
    $('.modifyInfoUsers').show();
    $('.buttonModify').hide();
    $('.buttonSendModify').show();
});