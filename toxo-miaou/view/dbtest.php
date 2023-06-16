

<?php 

$dsn = "pgsql:host=localhost;port=5432;dbname=fuel-dataviz;user=postgres;password=password";
$pdo = new PDO($dsn);

?>

<!-- PAS TOUCHE MINOUCHE     -->

<!-- 1 -->

<div class="table-responsive mx-auto pt-5" style="max-width: 50%;">
    <h6 class="text-left"><b>1. Récupérez les stations qui possèdent le service "Vente de gaz domestique"</b></h6>
    <h7><i>a. Affichez uniquement le code postal de ces stations<br>b. Retirez les doublons -> "DISTINCT"</i></h7>
    <table id="resultsTable" class="table table-striped table-dark">
        <thead>
            <tr>
                <th>Code postal</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $questionOne = "SELECT DISTINCT code_postal
                FROM point_de_vente pdv, service_point_de_vente spdv, service
                WHERE spdv.point_de_vente_id = pdv.id
                AND service.id = spdv.service_id
                AND service.nom = 'Vente de gaz domestique'";
                $qOne = $pdo->prepare($questionOne);
                $qOne->execute();
                $resultOne = $qOne->fetchAll(PDO::FETCH_ASSOC);
                $totalResults = count($resultOne);
                $displayedResults = 10; // Number of results to display initially
                for ($i = 0; $i < $displayedResults; $i++) {
                    echo '<tr><td>' . $resultOne[$i]['code_postal'] . '</td></tr>';
                }
            ?>
        </tbody>
    </table>
    <?php if ($totalResults > $displayedResults) {?>
        <button id="showMoreButton" class="btn btn-dark" onclick="showMoreResults()">Voir plus de résultats ( ! attention 500+ résultats)</button>
    <?php }?>
    <div id="moreResults" style="display: none;">
        <table class="table table-striped table-dark">
            <thead>
                <tr>
                    <th>Code postal</th>
                </tr>
            </thead>
            <tbody>
                <?php for ($i = $displayedResults; $i < $totalResults; $i++) {?>
                    <tr>
                        <td><?php echo $resultOne[$i]['code_postal']?></td>
                    </tr>
                <?php }?>
            </tbody>
        </table>
    </div>
    <script>
        var showMoreButton = document.getElementById("showMoreButton");
        var moreResults = document.getElementById("moreResults");
        showMoreButton.addEventListener("click", function () {
            moreResults.style.display = "block";
            showMoreButton.style.display = "none";
        });
    </script>
</div>

<!-- 2 -->

<div class="table-responsive mx-auto pt-5" style="max-width: 50%;">
    <h6 class="text-left"><b>2. Sélectionner le nombre de stations se trouvant à Annecy</b></h6>
    <h7><i>a. Affichez les stations qui sont ouvertes 24h/24</i></h7>
    <table class="table table-striped table-dark">
        <thead>
            <tr>
                <th>Nombre de stations</th>
            </tr>
            <thead>
            <tr>
                <th>Adresse</th>
                <th>Ville</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $questionTwo = "SELECT adresse, ville
                FROM point_de_vente pdv
                WHERE pdv.automate_24_24 = true
                AND pdv.ville = 'ANNECY'";
                $qTwo = $pdo->prepare($questionTwo);
                $qTwo->execute();
                $resultTwo = $qTwo->fetchAll(PDO::FETCH_ASSOC);
          ?>
            <?php foreach ($resultTwo as $row) {?>
                <tr>
                    <td><?php echo $row['adresse']?></td>
                    <td><?php echo $row['ville']?></td>
                </tr>
            <?php }?>
        </tbody>
    </table>
</div>

<!-- 3 -->


<div class="table-responsive mx-auto pt-5" style="max-width: 50%;">
<h6 class="text-left"><b>3. Récupérez le nombre total de stations en France</b></h6>
<h7><i>a. Filtrez pour afficher le nombre de stations se trouvant dans le département 29, 23 et 69</i></h7>
    <table class="table table-striped table-dark">
        <thead>
            <tr>
                <th>Nombre de stations</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $sql = "SELECT count(*)  
                FROM point_de_vente pdv 
                WHERE pdv.code_postal LIKE '29%' 
                OR pdv.code_postal LIKE '23%' 
                OR pdv.code_postal LIKE '69%'";
                $stmt = $pdo->prepare($sql);
                $stmt->execute();
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
            ?>
            <tr>
                <td><?php echo $result['count']?></td>
            </tr>
        </tbody>
    </table>
</div>

<!-- 4a -->

<div class="table-responsive mx-auto pt-5" style="max-width: 50%;">
  <h6 class="text-left"><b>4. Calculez la moyenne des prix du Gazole en France : </b></h6>
<h7><i>a. En 2007</i></h7>
  <table class="table table-striped table-dark">
    <thead>
      <tr>
        <th>Prix moyenne</th>
      </tr>
    </thead>
    <tbody>
    <?php 
$questionFourA = "SELECT AVG(valeur) AS averagePrice
FROM prix
JOIN carburant c on prix.carburant_id = c.id
WHERE c.nom = 'Gazole'
AND prix.date::text LIKE '2007%'";
$fourA = $pdo->prepare($questionFourA);
$fourA->execute();
$result = $fourA->fetch(PDO::FETCH_ASSOC);
?>
        <tr>
          <td><?php echo $result['averageprice'];?></td>
        </tr>
    </tbody>
  </table>
</div>

<!-- 4b -->

<div class="table-responsive mx-auto" style="max-width: 50%;">
  <h6 class="text-left"><b>4. Calculez la moyenne des prix du Gazole en France : </b></h6>
<h7><i>b. en 2014</i></h7>
  <table class="table table-striped table-dark">
    <thead>
      <tr>
        <th>Prix moyenne</th>
      </tr>
    </thead>
    <tbody>
    <?php 
$questionFourA = "SELECT AVG(valeur) AS averagePrice
FROM prix
JOIN carburant c on prix.carburant_id = c.id
WHERE c.nom = 'Gazole'
AND prix.date::text LIKE '2014%'";
$fourA = $pdo->prepare($questionFourA);
$fourA->execute();
$result = $fourA->fetch(PDO::FETCH_ASSOC);
?>
        <tr>
          <td><?php echo $result['averageprice'];?></td>
        </tr>
    </tbody>
  </table>
</div>

<!-- 4c -->

<div class="table-responsive mx-auto" style="max-width: 50%;">
  <h6 class="text-left"><b>4. Calculez la moyenne des prix du Gazole en France : </b></h6>
<h7><i>c. en 2023</i></h7>
  <table class="table table-striped table-dark">
    <thead>
      <tr>
        <th>Prix moyenne</th>
      </tr>
    </thead>
    <tbody>
    <?php 
$questionFourA = "SELECT AVG(valeur) AS averagePrice
FROM prix
JOIN carburant c on prix.carburant_id = c.id
WHERE c.nom = 'Gazole'
AND prix.date::text LIKE '2023%'";
$fourA = $pdo->prepare($questionFourA);
$fourA->execute();
$result = $fourA->fetch(PDO::FETCH_ASSOC);
?>
        <tr>
          <td><?php echo $result['averageprice'];?></td>
        </tr>
    </tbody>
  </table>
</div>

 <!-- 5 -->

<div class="table-responsive mx-auto pt-5" style="max-width: 50%;">
  <h6 class="text-left"><b>5. Calculez la moyenne des prix du Gazole par département (on nommera bien la colonne
“departement” dans les résultats). Trier les résultats par département croissant (01, 02...)</b></h6>
<h7><i>a. Affichez le département où la moyenne du prix du Gazole est la moins cher (LIMIT 10)</i></h7>
  <table class="table table-striped table-dark">
    <thead>
      <tr>
        <th>Département</th>
        <th>Prix moyenne</th>
      </tr>
    </thead>
    <tbody>
    <?php 

$questionFive = $pdo->query(
"SELECT LEFT(code_postal, 2) AS departement, AVG(valeur) AS avg_price
FROM point_de_vente pdv
JOIN prix ON pdv.id = prix.point_de_vente_id
JOIN carburant c ON prix.carburant_id = c.id
WHERE c.nom = 'Gazole'
GROUP BY departement
ORDER BY departement
LIMIT 10");

$rowsFive = $questionFive->fetchAll(PDO::FETCH_ASSOC);

?>
      <?php foreach ($rowsFive as $rowFive):?>
        <tr>
          <td><?php echo $rowFive['departement'];?></td>
          <td><?php echo $rowFive['avg_price'];?></td>
        </tr>
      <?php endforeach;?>
    </tbody>
  </table>
</div>

<!-- Graph pour question 5 -->

<?php
$questionFive = $pdo->query(
    "SELECT LEFT(code_postal, 2) AS departement, AVG(valeur) AS avg_price
    FROM point_de_vente pdv
    JOIN prix ON pdv.id = prix.point_de_vente_id
    JOIN carburant c ON prix.carburant_id = c.id
    WHERE c.nom = 'Gazole'
    GROUP BY departement
    ORDER BY departement"
);

$rowsFive = $questionFive->fetchAll(PDO::FETCH_ASSOC);
?>

<div id="chart_div" class="pt-5">
    <?php
    $data = [];
    foreach ($rowsFive as $rowFive) {
        $departement = $rowFive['departement'];
        $avg_price = number_format($rowFive['avg_price'], 2);
        $data[] = "['$departement', $avg_price]";
    }
    $data = implode(",\n", $data);
    ?>

    <script src="https://www.gstatic.com/charts/loader.js"></script>
    <script>
        google.charts.load('current', {'packages': ['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Département');
            data.addColumn('number', 'Prix moyen');
            data.addRows([
                <?php echo $data; ?>
            ]);

            var options = {
                title: 'Prix moyen de gazole par département',
                hAxis: {
                    title: 'Département'
                },
                vAxis: {
                    title: 'Prix moyen'
                }
            };

            var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
            chart.draw(data, options);
        }
    </script>
</div>

<!-- 6 -->


<!-- 6A -->
<div class="table-responsive mx-auto pt-5" style="width: 50%;">
  <h6 class="text-left">
    <b>6. Sélectionnez le carburant qui était le plus souvent en rupture entre le mois de Janvier 2023 et
Mars 2023</b></h6>
<h7><i>a. Sélectionnez le carburant le plus souvent en rupture entre le mois de Janvier 2023 et
Mars 2023 à ANNECY</i></h7>
  <table class="table table-striped table-dark">
    <thead>
      <tr>
        <th>Nom</th>
        <th>Count</th>
      </tr>
    </thead>
    <tbody>
    <?php
$questionSix = $pdo->query(
"SELECT nom, count(nom) AS count
FROM carburant c 
JOIN rupture r on c.id = r.carburant_id 
JOIN point_de_vente pdv on r.point_de_vente_id = pdv.id 
WHERE r.debut::text > '2023-01%' 
AND r.fin::text < '2023-04%' 
AND pdv.ville = 'ANNECY' 
GROUP BY nom 
ORDER BY count DESC LIMIT 1");

$rowsSix = $questionSix->fetchAll(PDO::FETCH_ASSOC);
?>
      <?php foreach ($rowsSix as $rowSix):?>
        <tr>
          <td><?php echo $rowSix['nom'];?></td>
          <td><?php echo $rowSix['count'];?></td>
        </tr>
      <?php endforeach;?>
    </tbody>
  </table>
</div>



<!-- 6B -->


<div class="table-responsive mx-auto" style="width: 50%;">
<h7><i> b. Affichez le département où le plus de rupture (tout types de carburants confondus) a eu
lieu entre Février 2023 et Mars 2023</i></h7>
<table class="table table-striped table-dark">
    <thead>
      <tr>
        <th>Département</th>
        <th>Nombre de ruptures</th>
      </tr>
    </thead>
    <tbody>
    <?php
$questionSixB = $pdo->query(
"SELECT LEFT(code_postal, 2) AS departement, count(nom) AS count
FROM carburant c
JOIN rupture r on c.id = r.carburant_id
JOIN point_de_vente pdv on r.point_de_vente_id = pdv.id
WHERE r.debut::text > '2023-02%' AND r.fin::text < '2023-04%'
GROUP BY departement
ORDER BY count DESC
LIMIT 1;");

$rowsSixB = $questionSixB->fetchAll(PDO::FETCH_ASSOC);
?>
      <?php foreach ($rowsSixB as $rowSixB):?>
        <tr>
          <td><?php echo $rowSixB['departement'];?></td>
          <td><?php echo $rowSixB['count'];?></td>
        </tr>
      <?php endforeach;?>
    </tbody>
  </table>
      </div>



<!-- 7 -->

<div class="table-responsive mx-auto pt-5" style="width: 50%;">
<h7><i>7. Sélectionnez le point de vente et la date où le prix de l’E10 était le plus élevé</i></h7>
<table class="table table-striped table-dark">
    <thead>
      <tr>
        <th>Adresse</th>
        <th>Ville</th>
        <th>Date</th>
        <th>Valeur</th>
        <th>Nom du carburant</th>
      </tr>
    </thead>
    <tbody>
    <?php
$questionSeven = $pdo->query(
"SELECT adresse, ville, date, valeur, nom
FROM point_de_vente pdv
JOIN prix p on pdv.id = p.point_de_vente_id
JOIN carburant c on p.carburant_id = c.id
WHERE c.nom = 'E10'
ORDER BY valeur DESC
LIMIT 1;");

$rowsSeven = $questionSeven->fetchAll(PDO::FETCH_ASSOC);
?>
      <?php foreach ($rowsSeven as $rowSeven):?>
        <tr>
          <td><?php echo $rowSeven['adresse'];?></td>
          <td><?php echo $rowSeven['ville'];?></td>
          <td><?php echo $rowSeven['date'];?></td>
          <td><?php echo $rowSeven['valeur'];?></td>
          <td><?php echo $rowSeven['nom'];?></td>
        </tr>
      <?php endforeach;?>
    </tbody>
  </table>
</div>

<!-- 8 -->

<div class="table-responsive mx-auto pt-5" style="width: 50%;">
<h7><i> 8. Afficher pour chaque département le nombre de station sur autoroute qu’ils possède par
ordre décroissant (LIMIT 10)</i></h7>
<table class="table table-striped table-dark">
    <thead>
      <tr>
        <th>Département</th>
        <th>Nombre de points de vente</th>
      </tr>
    </thead>
    <tbody>
    <?php
$questionEight = $pdo->query(
"SELECT LEFT(code_postal, 2) AS cp, count(code_postal) AS nombre
FROM point_de_vente pdv
WHERE pdv.type = 'A'
GROUP BY cp
ORDER BY nombre DESC
LIMIT 10;");

$rowsEight = $questionEight->fetchAll(PDO::FETCH_ASSOC);
?>
      <?php foreach ($rowsEight as $rowEight):?>
        <tr>
          <td><?php echo $rowEight['cp'];?></td>
          <td><?php echo $rowEight['nombre'];?></td>
        </tr>
      <?php endforeach;?>
    </tbody>
  </table>
</div>

<!-- 9 -->

<div class="table-responsive mx-auto pt-5" style="width: 50%;">
<h7><i> 9. Comparez la moyenne du prix du Gazole entre les stations autoroutières et routières en 2023</i></h7>
<table class="table table-striped table-dark">
    <thead>
      <tr>
        <th>Type de station</th>
        <th>Prix moyen du Gazole</th>
      </tr>
    </thead>
    <tbody>
    <?php
$questionNine = $pdo->query(
"SELECT AVG(valeur) AS prixmoyen, type
FROM prix p
JOIN point_de_vente pdv ON p.point_de_vente_id = pdv.id
JOIN carburant c ON c.id = p.carburant_id
WHERE p.date > '2023-01-01' AND c.nom = 'Gazole'
GROUP BY type;");

$rowsNine = $questionNine->fetchAll(PDO::FETCH_ASSOC);
?>
      <?php foreach ($rowsNine as $rowNine):?>
        <tr>
          <td><?php echo $rowNine['type'];?></td>
          <td><?php echo $rowNine['prixmoyen'];?></td>
        </tr>
      <?php endforeach;?>
    </tbody>
  </table>
</div>

<!-- 10 -->

<div class="table-responsive mx-auto pt-5" style="width: 50%;">
<h7><i>10. Sélectionnez et affichez pour chaque carburant le nombre de jours de l’année où celui-ci
coûtait entre 1.50 et 1.80 en 2014 et faire pareil pour 2023.</i></h7>
<table class="table table-striped table-dark">
    <thead>
      <tr>
        <th>Carburant</th>
        <th>Nombre de jours</th>
      </tr>
    </thead>
    <tbody>
    <?php
$questionTen = $pdo->query("
SELECT c.nom AS carburant, count(DISTINCT DATE_TRUNC('day', p.date)) AS nombre_de_jours
FROM prix p
JOIN carburant c ON p.carburant_id = c.id
WHERE p.valeur >= 1.50 AND p.valeur <= 1.80
AND EXTRACT(YEAR FROM p.date) = 2014
GROUP BY c.nom;");

$rowsTen = $questionTen->fetchAll(PDO::FETCH_ASSOC);
?>
      <?php foreach ($rowsTen as $rowTen):?>
        <tr>
          <td><?php echo $rowTen['carburant'];?></td>
          <td><?php echo $rowTen['nombre_de_jours'];?></td>
        </tr>
      <?php endforeach;?>
    </tbody>
  </table>
</div>


<!-- 11 -->

<div class="table-responsive mx-auto pt-5" style="width: 50%;">
<h7><i> 11. Nous sommes le 2023-05-23 au matin, et je prends la voiture sur l’autoroute autour de Lyon, dans le 69. Ai-je des chances de trouver une station essence avec du Gazole et des toilettes publiques ? (Résultats: 32, LIMIT 10)</i></h7>
<table class="table table-striped table-dark">
    <thead>
      <tr>
        <th>Adresse</th>
        <th>Ville</th>
        <th>Code Postal</th>
      </tr>
    </thead>
    <tbody>
    <?php
$questionEleven = $pdo->query(
"SELECT DISTINCT adresse, ville, code_postal
FROM point_de_vente pdv, service s, carburant c
WHERE LEFT(pdv.code_postal, 2) = '69'
AND s.nom = 'Toilettes publiques'
AND c.nom = 'Gazole'
AND pdv.type = 'A'
LIMIT 10;");

$rowsEleven = $questionEleven->fetchAll(PDO::FETCH_ASSOC);
?>
      <?php foreach ($rowsEleven as $rowEleven):?>
        <tr>
          <td><?php echo $rowEleven['adresse'];?></td>
          <td><?php echo $rowEleven['ville'];?></td>
          <td><?php echo $rowEleven['code_postal'];?></td>
        </tr>
      <?php endforeach;?>
    </tbody>
  </table>
</div>


<!-- 12 -->

<div class="table-responsive mx-auto pt-5" style="width: 50%;">
<h7><i> 12. Sélectionner toutes les stations qui était en rupture de Gazole au mois de Janvier 2023 mais qui possédaient toujours du SP95 (Résultats: 1237, LIMIT 10)</i></h7>
<table class="table table-striped table-dark">
    <thead>
      <tr>
        <th>Adresse</th>
        <th>Ville</th>
      </tr>
    </thead>
    <tbody>
    <?php
$questionTwelve = $pdo->query(
"SELECT adresse, ville
FROM point_de_vente pdv
JOIN rupture r ON pdv.id = r.point_de_vente_id
JOIN carburant c ON c.id = r.carburant_id
WHERE r.debut::text >= '2023-01-01' AND r.fin::text <= '2023-01-31'
AND c.nom = 'Gazole'
AND NOT EXISTS (SELECT 1
    FROM rupture r
    JOIN carburant c ON c.id = r.carburant_id
    WHERE r.point_de_vente_id = pdv.id
    AND r.debut::text >= '2023-01-01' AND r.fin::text <= '2023-01-31'
    AND c.nom = 'SP95')
    LIMIT 10;");

$rowsTwelve = $questionTwelve->fetchAll(PDO::FETCH_ASSOC);
?>
      <?php foreach ($rowsTwelve as $rowTwelve):?>
        <tr>
          <td><?php echo $rowTwelve['adresse'];?></td>
          <td><?php echo $rowTwelve['ville'];?></td>
        </tr>
      <?php endforeach;?>
    </tbody>
  </table>
</div>



<!-- 13 -->

<div class="table-responsive mx-auto pt-5 pb-5" style="width: 50%;">
<h7><i> 13. Sélectionnez les stations et les dates pendant le mois d’avril 2023, où le SP95 était moins cher que la valeur moyenne du prix du Gazole en France. (Résultats: 31 LIMIT: 10)</i></h7>
<table class="table table-striped table-dark">
    <thead>
      <tr>
        <th>Adresse</th>
        <th>Ville</th>
        <th>Date</th>
      </tr>
    </thead>
    <tbody>
    <?php
$questionThirteen = $pdo->query(
"SELECT adresse, ville, date
FROM point_de_vente
JOIN prix p on point_de_vente.id = p.point_de_vente_id
JOIN carburant c on p.carburant_id = c.id
WHERE p.valeur < (SELECT AVG(valeur)
                  FROM point_de_vente pdv
                    JOIN prix p on pdv.id = p.point_de_vente_id
                    JOIN carburant c on p.carburant_id = c.id
                    WHERE c.nom = 'Gazole'
                    AND p.date >= '2023-04-01' AND p.date <= '2023-04-30')
AND p.date >= '2023-04-01' AND p.date <= '2023-04-30'
AND c.nom = 'SP95'
LIMIT 10;");

$rowsThirteen = $questionThirteen->fetchAll(PDO::FETCH_ASSOC);
?>
      <?php foreach ($rowsThirteen as $rowThirteen):?>
        <tr>
          <td><?php echo $rowThirteen['adresse'];?></td>
          <td><?php echo $rowThirteen['ville'];?></td>
          <td><?php echo $rowThirteen['date'];?></td>
        </tr>
      <?php endforeach;?>
    </tbody>
  </table>
</div>

<!-- 14 -->


*
 14. À partir de votre dernière requête, créez une vue des données correspondante, à quoi cela
peut-il servir ?
 */

CREATE VIEW vue_prix_carburant AS
SELECT adresse, ville, date
FROM point_de_vente
         JOIN prix p on point_de_vente.id = p.point_de_vente_id
         JOIN carburant c on p.carburant_id = c.id
WHERE p.valeur < (SELECT AVG(valeur)
                  FROM point_de_vente pdv
                           JOIN prix p on pdv.id = p.point_de_vente_id
                           JOIN carburant c on p.carburant_id = c.id
                  WHERE c.nom = 'Gazole'
                    AND p.date >= '2023-04-01' AND p.date <= '2023-04-30')
  AND p.date >= '2023-04-01' AND p.date <= '2023-04-30'
  AND c.nom = 'SP95';

/*
La création d'une vue des données correspondante à partir de la dernière requête vous permet de stocker
et de réutiliser facilement les résultats filtrés dans d'autres requêtes, simplifiant ainsi le processus
de requête et facilitant l'analyse ultérieure des données.
*/

SELECT adresse
FROM vue_prix_carburant

