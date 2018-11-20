<?php
// Inclusion du fichier functions.php
require_once(__DIR__ . '/../config/functions.php');
// Inclusion du fichier config
require_once(__DIR__ . '/../config/config.php');
// On inclue le fichier database.php sur la page :
require_once(__DIR__ . '/../config/database.php'); 
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Concession de véhicules">
    <meta name="author" content="">
    <link rel="icon" href="assets/img/favicon.ico">

    <title>
        <?php
            if(empty($CurrentPageTitle)){ // Si on est sur la page d'accueil
                echo $siteName . ' - Concession vtc'; 
            } else { // Si on est sur une autre page
                echo $CurrentPageTitle . ' - ' . $siteName;
            }
        ?>
    </title>

    <!-- Bootstrap core CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
    <!-- My Style -->
    <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php"><?php echo $siteName; ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item <?php echo ($CurrentPageUrl === 'index') ? 'active' : ''; ?>">
                    <a class="nav-link" href="index.php">Accueil</a>
                <li class="nav-item <?php echo ($CurrentPageUrl === 'conducteur') ? 'active' : ''; ?>">
                    <a class="nav-link" href="conducteur.php">conducteur</a>
                </li>
                <li class="nav-item <?php echo ($CurrentPageUrl === 'assoc_vehic_conduc') ? 'active' : ''; ?>">
                    <a class="nav-link" href="assoc_vehic_conduc.php">association_vehicule_conducteur</a>
                </li>
                <li class="nav-item <?php echo ($CurrentPageUrl === 'vehicule') ? 'active' : ''; ?>">
                    <a class="nav-link" href="vehicule.php">vehicule</a>
                </li>
                <li class="nav-item <?php echo ($CurrentPageUrl === 'affichage_divers') ? 'active' : ''; ?>">
                    <a class="nav-link" href="affichage_divers.php">affichage_divers</a>
                </li>

                
            </ul>
        </div>
    </nav>