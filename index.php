<?php
include "db.php";
include "script.php";

$SqlREquest = "SELECT * FROM t_continents 
    INNER JOIN t_pays ON (t_pays.continent_id=t_continents.id_continent) 
    GROUP BY libelle_continent";
$statsPrep = $db -> prepare($SqlREquest);
$statsPrep->execute() or die(print_r($db->errorInfo()));
$stats = $statsPrep->fetchAll();
echo("<pre>");
//var_dump($stats);

$ContinentRequest = "SELECT * FROM t_continents";
$ContinentPrep = $db -> prepare($ContinentRequest);
$ContinentPrep->execute() or die(print_r($db->errorInfo()));
$continents = $ContinentPrep->fetchAll();

//var_dump($_GET)
?>


<form action="http://localhost/Sakila/" method="GET">
    <select name="continent" id="continent" onchange="this.form.submit()">
    <?php foreach ($continents as $continent) : ?>
        <option value=<?= $continent["id_continent"]?>><?= $continent["libelle_continent"]?></option>
    <?php endforeach ?>
    </select> 
    <select name="regions" id="continent" onchange="this.form.submit()">
    <?php foreach ($continents as $continent) : ?>
        <option value=<?= $continent["id_continent"]?>><?= $continent["libelle_continent"]?></option>
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
<?php foreach ($stats as $pays) : ?>
    <tbody>
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
        <?php endforeach ?>
    </tbody>
</table>
