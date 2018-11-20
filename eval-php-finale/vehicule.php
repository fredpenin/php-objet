<?php
$currentPageTitle = 'vehicule';
// Le fichier header.php est inclus sur la page
require_once(__DIR__.'/partials/header.php');

/////////////////////////////////////////////////////////
//Récupération de la liste des vehicules pour affichage
$selectQuery = $db->query('SELECT * FROM vehicule');
$vehicules = $selectQuery->fetchAll();


/////////////////////////////////////////////////////////
// Traitement du formulaire
$mark = $model = $color = $reg = null;
// le formulaire est soumis
if (!empty($_POST)) {
    $mark = $_POST['mark'];
    $model = $_POST['model'];
    $color = $_POST['color'];
    $reg = $_POST['reg'];

    // Définir un tableau d'erreur vide qui va se remplir après chaque erreur
    $errors = [];
    // Vérifier la marque : 
    if (empty($mark)) {
        $errors['mark'] = 'La marque n\'est pas valide';
    }
    // Vérifier le modele : 
    if (empty($model)) {
        $errors['model'] = 'Le modèle n\'est pas valide';
    }
        // Vérifier le modele : 
    if (empty($model)) {
        $errors['model'] = 'Le modèle n\'est pas valide';
    }
    // Vérifier la couleur : 
    if (empty($color)) {
        $errors['color'] = 'La couleur n\'est pas valide';
    }
    // Vérifier l'immatriculation (registration). (On suppose qu'il y a toujours 9 charactères) : 
    if (strlen($reg) !== 9) {
        $errors['reg'] = 'L\'immatriculation n\'est pas valide';
    }

    // S'il n'y a pas d'erreurs dans le formulaire
    if (empty($errors)) {
        $query = $db->prepare('
            INSERT INTO vehicule (`marque`, `modele`, `couleur`, `immatriculation`) VALUES (:mark, :model, :color, :registration)
        ');
        $query->bindValue(':mark', $mark, PDO::PARAM_STR);
        $query->bindValue(':model', $model, PDO::PARAM_STR);
        $query->bindValue(':color', $color, PDO::PARAM_STR);
        $query->bindValue(':registration', $reg, PDO::PARAM_STR);

        if ($query->execute()) { // On insère le véhicule dans la BDD
            $success = true;
        }
    }
}
?>
<!--/////////////////////////////////////////////////////////////-->
<!--//////////////// Tableau d'affichage ////////////////////////-->

<h2>Liste des véhicules</h2>
<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">id_vehicule</th>
            <th scope="col">marque</th>
            <th scope="col">modele</th>
            <th scope="col">couleur</th>
            <th scope="col">immatriculation</th>
            <th scope="col">modification</th>
            <th scope="col">suppression</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($vehicules as $vehicule) { ?>
            <tr>
                <th scope="row"><?php echo $vehicule['id_vehicule']; ?></th>
                <td><?php echo $vehicule['marque']; ?></td>
                <td><?php echo $vehicule['modele']; ?></td>
                <td><?php echo $vehicule['couleur']; ?></td>
                <td><?php echo $vehicule['immatriculation']; ?></td>
                <td><img src="assets/img/stylo.png" alt="Modifier"></td>
                <td><img src="assets/img/croix.png" alt="Supprimer"></td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<hr>

<!-- /////////////////////// FORMULAIRE ///////////////////////// --> 
<!-- /////////// Message en cas de succès de l'ajout //////////// -->
<main class="container">
    <h2 class="page-title">Ajouter un véhicule</h1>

    <?php if (isset($success) && $success) { ?>
        <div class="alert alert-success alert-dismissible fade show">
            Le véhicule <strong><?php echo $mark . " " . $model . " " . $color  . " immatriculé " . $reg  . " "; ?></strong> a bien été ajouté avec l'id <strong><?php echo $db->lastInsertId(); ?></strong> !
            <button type="button" class="close" data-dismiss="alert">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php } ?>

    <form method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="mark">Marque :</label>
                    <input type="text" name="mark" id="mark" class="form-control <?php echo isset($errors['mark']) ? 'is-invalid' : null; ?>" value="<?php echo $mark; ?>">
                    <?php if (isset($errors['mark'])) {
                        echo '<div class="invalid-feedback">';
                            echo $errors['mark'];
                        echo '</div>';
                    } ?>
                </div>
                <div class="form-group">
                    <label for="model">Modèle :</label>
                    <input type="text" name="model" id="model" class="form-control <?php echo isset($errors['model']) ? 'is-invalid' : null; ?>" value="<?php echo $model; ?>">
                    <?php if (isset($errors['model'])) {
                        echo '<div class="invalid-feedback">';
                            echo $errors['model'];
                        echo '</div>';
                    } ?>
                </div>     
                <div class="col-md-6">
                <div class="form-group">
                    <label for="color">Couleur :</label>
                    <input type="text" name="color" id="color" class="form-control <?php echo isset($errors['color']) ? 'is-invalid' : null; ?>" value="<?php echo $color; ?>">
                    <?php if (isset($errors['color'])) {
                        echo '<div class="invalid-feedback">';
                            echo $errors['color'];
                        echo '</div>';
                    } ?>
                </div>
                <div class="form-group">
                    <label for="reg">Immatriculation :</label>
                    <input type="text" name="reg" id="reg" class="form-control <?php echo isset($errors['reg']) ? 'is-invalid' : null; ?>" value="<?php echo $reg; ?>">
                    <?php if (isset($errors['reg'])) {
                        echo '<div class="invalid-feedback">';
                            echo $errors['reg'];
                        echo '</div>';
                    } ?>
                </div>                              
            </div>
        </div>
        <div class="text-center">
            <button class="btn btn-lg btn-block btn-danger text-uppercase font-weight-bold">Ajouter ce véhicule</button>
        </div>
    </form>
</main>


<?php
// On inclue le fichier footer.php sur la page :
require_once(__DIR__ . '/partials/footer.php'); ?>