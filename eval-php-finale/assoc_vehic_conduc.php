<?php
$currentPageTitle = 'association_vehicule_conducteur';
// Le fichier header.php est inclus sur la page
require_once(__DIR__.'/partials/header.php');

/////////////////////////////////////////////////////////
//Récupération des infos de la BDD
$selectAssocQuery = $db->query('SELECT * FROM association_vehicule_conducteur');
$associations = $selectAssocQuery->fetchAll();

$selectVehicQuery = $db->query('SELECT * FROM vehicule');
$selectDriversQuery = $db->query('SELECT * FROM conducteur');




?>





<!--/////////////////////////////////////////////////////////////-->
<!--//////////////// Tableau d'affichage ////////////////////////-->
<h2>Liste des associations</h2>
<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">id_association</th>
            <th scope="col">conducteur</th>
            <th scope="col">vehicule</th>
            <th scope="col">modicication</th>
            <th scope="col">suppression</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($associations as $association) { 
            $selectVehicQuery = $db->query('SELECT * FROM vehicule INNER JOIN association_vehicule_conducteur ON vehicule.id_vehicule = association_vehicule_conducteur.id_vehicule');
            $selectDriversQuery = $db->query('SELECT * FROM conducteur INNER JOIN association_vehicule_conducteur ON conducteur.id_conducteur = association_vehicule_conducteur.id_conducteur');
            $vehicule = $selectVehicQuery->fetch();
            $driver = $selectDriversQuery->fetch();


            ?>      
            <tr>
                <th scope="row"><?php echo $association['id_association']; ?></th>
                <td><?php echo $vehicule['marque']; ?></td>
                <td><?php echo $driver['prenom']." ".$driver['nom']."<br>".$driver['id_conducteur']; ?></td>
                <td><?php echo $vehicule['marque']." ".$vehicule['modele']."<br>".$vehicule['id_vehicule']; ?></td>
                <td><img src="assets/img/stylo.png" alt="Modifier"></td>
                <td><img src="assets/img/croix.png" alt="Supprimer"></td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<!--/////////////////////////////////////////////////////////////-->
<!--//////////////// Formulaire ////////////////////////-->

<hr>









<?php
// On inclue le fichier footer.php sur la page :
require_once(__DIR__ . '/partials/footer.php'); ?>