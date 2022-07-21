<?php
require "db.php";
require "app.php";
// REQUETTE RECUP TOUT LES CONTINENT
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <title>Les pays du monde</title>
</head>

<body>
    <h1>Les pays du mondes</h1>
    <form action="http://localhost/Sakila/" method="GET">
        <select name="continent" id="continent" value="<?= $continentID ?>" onchange="this.form.submit()">
            <option value="">Choisir un Continent></option>
            <?php foreach ($continents as $continent) : ?>
                <?php if (isset($_GET["continent"]) && $_GET["continent"] == $continent["id_continent"]) : ?>
                    <option value=<?= $continent["id_continent"] ?> selected><?= $continent["libelle_continent"] ?></option>
                <?php else : ?>
                    <option value=<?= $continent["id_continent"] ?>><?= $continent["libelle_continent"] ?></option>
                <?php endif ?>
            <?php endforeach ?>
        </select>
        <select name="region" id="region" onchange="this.form.submit()">
            <option value="">Choisir une region></option>
            <?php foreach ($regions as $region) : ?>
                <?php if (isset($_GET["region"]) && $_GET["region"] == $region["id_region"]) : ?>
                    <option value=<?= $region["id_region"] ?> selected><?= $region["libelle_region"] ?></option>
                <?php else : ?>
                    <option value=<?= $region["id_region"] ?>><?= $region["libelle_region"] ?></option>
                <?php endif ?>
            <?php endforeach ?>
        </select>
    </form>
    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Pays</th>
                <th>Population totale (en milliers)</th>
                <th>Taux de natalité</th>
                <th>Taux de mortalité</th>
                <th>Espérance de vie</th>
                <th>Taux de mortalité infantile</th>
                <th>Nombre d'enfant(s) par femme</th>
                <th>Taux de croissance</th>
                <th>Population de 65 ans et plus (en milliers)</th>
            </tr>
        </thead>
        <tbody>
            <?php if (isset($stats)) : ?>
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
                    </tr>
                <?php endforeach ?>
            <?php else : ?>
                <tr>
                    <td>No data available in table</td>
                </tr>
            <?php endif ?>
        </tbody>
    </table>
</body>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="script.js"></script>
</html>
