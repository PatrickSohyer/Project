<?php

// Require des model dont j'ai besoin

require_once '../../model/SP_database.php'; // require de ma database
require_once '../../model/SP_series_pages.php'; // require de ma base de donnée sp_series_pages
require_once '../../model/SP_suggest_series.php';
require_once '../include/include_page_admin.php';
require_once '../include/include_route.php';

$series = new Series();
$seriesCountVerif = $series->countSeriesVerifAdmin();
$suggest = new SuggestSeries();
$suggestCount = $suggest->countSuggestAdmin();
