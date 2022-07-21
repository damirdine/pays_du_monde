<?php
$ContinentRequest = "SELECT * FROM t_continents";
// ------ ANCIEN OPTION -----
// $ContinentPrep = $db -> prepare($ContinentRequest);
// $ContinentPrep->execute() or die(print_r($db->errorInfo()));
// ------ NOUVELLE OPTION -----
$ContinentPrep = $db->query($ContinentRequest);
$continents = $ContinentPrep->fetchAll();

// REQUETTE RECUP TOUT LES REGIONS
$regionRequest = "SELECT * FROM t_regions";
$regionPrep = $db->query($regionRequest);
$regions = $regionPrep->fetchAll();

if (isset($_GET["continent"], $_GET["region"])) {
    if ($_GET["region"] == "") {
        $SqlREquest = "SELECT * 
            FROM t_pays p
            WHERE p.continent_id = " . $_GET["continent"];
    } else {
        $SqlREquest = "SELECT * 
        FROM t_pays p
        WHERE p.continent_id = " . $_GET["continent"] . " AND p.region_id = " . (int)$_GET["region"];
    }
    $statsPrep = $db->query($SqlREquest);
    $stats = $statsPrep->fetchAll();

    $continentID = $_GET["continent"];
}
if (isset($_GET["region"], $_GET["continent"]) && $_GET["continent"] != "") {
    $regionRequest = "SELECT * FROM t_regions r WHERE r.continent_id =" . $_GET["continent"];
    $regionPrep = $db->query($regionRequest);
    $regions = $regionPrep->fetchAll();
}