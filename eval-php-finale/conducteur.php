<?php
$currentPageTitle = 'conducteur';
// Le fichier header.php est inclus sur la page
require_once(__DIR__.'/partials/header.php');

//////////////////// PARTIE AFFICHAGE /////////////////////////
//Récupération de la liste des conducteurs pour affichage
$selectQuery = $db->query('SELECT * FROM conducteur');
$drivers = $selectQuery->fetchAll();


///////////////////// PARTIE AJOUT //////////////////////
// Traitement du formulaire
$firstName = $lastName = null;
// le formulaire est soumis
if (!empty($_POST)) {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];

    // Définir un tableau d'erreur vide qui va se remplir après chaque erreur
    $errors = [];
    // Vérifier le prénom : 
    if (empty($firstName)) {
        $errors['firstName'] = 'Le prénom n\'est pas valide';
    }
    // Vérifier le nom : 
    if (empty($lastName)) {
        $errors['lastName'] = 'Le nom n\'est pas valide';
    }

    // S'il n'y a pas d'erreurs dans le formulaire
    if (empty($errors)) {
        $query = $db->prepare('
            INSERT INTO conducteur (`prenom`, `nom`) VALUES (:firstname, :lastname)
        ');
        $query->bindValue(':firstname', $firstName, PDO::PARAM_STR);
        $query->bindValue(':lastname', $lastName, PDO::PARAM_STR);

        if ($query->execute()) { // On insère le conducteur dans la BDD
            $success = true;
        }
    }
}
////////////////////// PARTIE SUPPRESSION ///////////////////////
//Suppression du conducteur SI on clique sur le bouton
if (isset($_POST['delete'])){
    $delQuery = $db->prepare('DELETE FROM conducteur WHERE id_conducteur = :id');
    $delQuery->bindValue(':id', $this->value , PDO::PARAM_INT); //<script>$("#delete").val();</script> : marche pas
    $delQuery-> execute();
    ?>
    <div class="alert alert-success alert-dismissible fade show">
        Le conducteur <strong><?php echo $drivers['id_conducteur']; ?></strong> a été supprimé avec succès.<strong>
        <button type="button" class="close" data-dismiss="alert">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php } ?>



?>
<!--/////////////////////////////////////////////////////////////-->
<!--//////////////// Tableau d'affichage ////////////////////////-->

<h2>Liste des conducteurs</h2>
<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">id_conducteur</th>
            <th scope="col">prenom</th>
            <th scope="col">nom</th>
            <th scope="col">modification</th>
            <th scope="col">suppression</th>



        </tr>
    </thead>
    <tbody>
        <?php foreach ($drivers as $driver) { ?>
            <tr>
                <th scope="row"><?php echo $driver['id_conducteur']; ?></th>
                <td><?php echo $driver['prenom']; ?></td>
                <td><?php echo $driver['nom']; ?></td>
                <td><button name="modify" id="modify" value="modify"><img src="assets/img/stylo.png" alt="Modifier"></button></td>
                <td><button name="delete" id="delete" value= <?php $driver['id_conducteur'] ?>><img src="assets/img/croix.png" alt="Supprimer"></button></td>
                <!--
                <td><a href="conducteur_modify.php?id=<?php //echo $driver['id_conducteur']; ?>" class="btn btn-danger"><img src="assets/img/stylo.png" alt="Modifier"></a></td>
                     on envoie d'id du conducteur dans l'url           
                <td><a href="conducteur_delete.php?id=<?php //echo $driver['id_conducteur']; ?>" class="btn btn-danger"><img src="assets/img/croix.png" alt="Supprimer"></a></td>
                -->
            </tr>
        <?php } ?>
    </tbody>
</table>










<hr>

<!-- /////////////////////// FORMULAIRE ///////////////////////// --> 
<!-- /////////// Message en cas de succès de l'ajout //////////// -->
<main class="container">
    <h2 class="page-title">Ajouter un conducteur</h1>

    <?php if (isset($success) && $success) { ?>
        <div class="alert alert-success alert-dismissible fade show">
            Le conducteur <strong><?php echo $firstName . " " . $lastName ; ?></strong> a bien été ajouté avec l'id <strong><?php echo $db->lastInsertId(); ?></strong> !
            <button type="button" class="close" data-dismiss="alert">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php } ?>
     
    <form method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="firstName">Prénom :</label>
                    <input type="text" name="firstName" id="firstName" class="form-control <?php echo isset($errors['firstName']) ? 'is-invalid' : null; ?>" value="<?php echo $firstName; ?>">
                    <?php if (isset($errors['firstName'])) {
                        echo '<div class="invalid-feedback">';
                            echo $errors['firstName'];
                        echo '</div>';
                    } ?>
                </div>
                <div class="form-group">
                    <label for="firstName">Nom :</label>
                    <input type="text" name="lastName" id="lastName" class="form-control <?php echo isset($errors['lastName']) ? 'is-invalid' : null; ?>" value="<?php echo $lastName; ?>">
                    <?php if (isset($errors['lastName'])) {
                        echo '<div class="invalid-feedback">';
                            echo $errors['lastName'];
                        echo '</div>';
                    } ?>
                </div>                
            </div>
        </div>
        <div class="text-center">
            <button class="btn btn-lg btn-block btn-danger text-uppercase font-weight-bold">Ajouter ce conducteur</button>
        </div>
    </form>
</main>



<?php
// On inclue le fichier footer.php sur la page :
require_once(__DIR__ . '/partials/footer.php'); ?>