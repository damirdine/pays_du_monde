<?php
include "db.php";
include "script.php";

// REQUETTE RECUP TOUT LES CONTINENT

$ContinentRequest = "SELECT * FROM t_continents";
// ------ ANCIEN OPTION -----
// $ContinentPrep = $db -> prepare($ContinentRequest);
// $ContinentPrep->execute() or die(print_r($db->errorInfo()));
// ------ NOUVELLE OPTION -----
$ContinentPrep = $db->query($ContinentRequest);
$continents = $ContinentPrep->fetchAll();


// REQUETTE RECUP TOUT LES REGIONS
$regionRequest = "SELECT * FROM t_regions";
$regionPrep = $db -> query($regionRequest);
$regions = $regionPrep->fetchAll();

if(isset($_GET["continent"],$_GET["region"])){
    if($_GET["region"]==""){
        $SqlREquest = "SELECT * 
            FROM t_pays p
            WHERE p.continent_id = " . (int)$_GET["continent"];
    }else{
        $SqlREquest = "SELECT * 
        FROM t_pays p
        WHERE p.continent_id = " . (int)$_GET["continent"] . " AND p.region_id = " .(int)$_GET["region"]; 
    }
    $statsPrep = $db -> query($SqlREquest);
    $stats = $statsPrep->fetchAll();

    $continentID = $_GET["continent"];
}
if(isset($_GET["region"],$_GET["continent"])&& $_GET["continent"]!=""){
    $regionRequest = "SELECT * FROM t_regions r WHERE r.continent_id =" .$_GET["continent"];
    $regionPrep = $db -> query($regionRequest);
    $regions = $regionPrep->fetchAll();
}
?>

<form action="http://localhost/Sakila/" method="GET">
    <select name="continent" id="continent" value="<?=$continentID?>" onchange="this.form.submit()">
    <option value="">Choisir un Continent></option>
    <?php foreach ($continents as $continent) : ?>
        <?php if(isset($_GET["continent"]) && $_GET["continent"]==$continent["id_continent"]) :?>
            <option value=<?= $continent["id_continent"]?> selected><?= $continent["libelle_continent"]?></option>
        <?php else:?>
            <option value=<?= $continent["id_continent"]?>><?= $continent["libelle_continent"]?></option>
        <?php endif ?>
    <?php endforeach ?>
    </select>  
    <select name="region" id="region" onchange="this.form.submit()">
    <option value="">Choisir une region></option>
    <?php foreach ($regions as $region) : ?>
        <?php if(isset($_GET["region"]) && $_GET["region"]==$region["id_region"]) :?>
            <option value=<?= $region["id_region"]?> selected><?= $region["libelle_region"]?></option>
        <?php else:?>
            <option value=<?= $region["id_region"]?>><?= $region["libelle_region"]?></option>
        <?php endif ?>
    <?php endforeach ?>
    </select>
</form>

<table class="table">
    <thead>
        <tr>
            <th scope="col">Pays</th>
            <th scope="col">Population totale (en milliers)</th>
            <th scope="col">Taux de natalité</th>
            <th scope="col">Taux de mortalité</th>
            <th scope="col">Espérance de vie</th>
            <th scope="col">Taux de mortalité infantile</th>
            <th scope="col">Nombre d'enfant(s) par femme</th>
            <th scope="col">Taux de croissance</th>
            <th scope="col">Population de 65 ans et plus (en milliers)</th>
        </tr>
    </thead>
    <tbody>
        <?php if(isset($stats)):?>
            <?php foreach ($stats as $pays) : ?>
                <tr>
                    <td><?= $pays['libelle_pays'] ?></td>
                    <td><?= $pays['population_pays'] ?></td>
                    <td><?= $pays['taux_natalite_pays'] ?></td>
                    <td><?= $pays['taux_mortalite_pays'] ?></td>
                    <td><?= $pays['esperance_vie_pays'] ?></td>
                    <td><?= $pays['taux_mortalite_infantile_pays'] ?></td>
                    <td><?= $pays['nombre_enfants_par_femme_pays'] ?></td>
                    <td><?= $pays['taux_croissance_pays'] ?></td>
                    <td><?= $pays['population_plus_65_pays'] ?></td>
                <tr>
            <?php endforeach ?>
        <?php else:?>
            <tr><td colspan="15">No data available in table</td></tr>
        <?php endif ?>
    </tbody>
</table>