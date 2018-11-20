<?php
// On inclue le fichier header.php sur la page :
require_once(__DIR__ . '/partials/header.php'); ?>


    <main class="container">
        <h5>Affichage divers</h5>
    <?php
    // $query = $db->query('SELECT * FROM pizza');
    // $pizzas = $query->fetchAll();

    echo "o Afficher le nombre de conducteur.<br />";
    $query = $db->query('SELECT COUNT(id_conducteur) FROM conducteur');
    $r = $query->fetch();
    echo "<h5>".$r['COUNT(id_conducteur)']."</h5>";


    echo "o Afficher le nombre de vehicule.<br />";
    $query = $db->query('SELECT COUNT(id_vehicule) FROM vehicule');
    $r = $query->fetch();
    //var_dump($r);
    echo "<h5>".$r['COUNT(id_vehicule)']."</h5>";
    

    echo "o Afficher le nombre d’association.<br />";
    $query = $db->query('SELECT COUNT(id_association) FROM association_vehicule_conducteur');
    $r = $query->fetch();
    //var_dump($r);
    echo "<h5>".$r['COUNT(id_association)']."</h5>";
    
    
    echo "o Afficher les vehicules n’ayant pas de conducteur<br />";
    $query = $db->query(' SELECT *  
    FROM vehicule 
    INNER JOIN association_vehicule_conducteur ON vehicule.id_vehicule = association_vehicule_conducteur.id_vehicule
    INNER JOIN conducteur ON association_vehicule_conducteur.id_conducteur = conducteur.id_conducteur
    ');//WHERE COUNT(id_conducteur) = 0 // marche pas
    $r = $query->fetchall();
    var_dump($r);

    
    echo "o Afficher les conducteurs n’ayant pas de vehicule<br />";
    
    
    echo "o Afficher les vehicules conduit par « Philippe Pandre »<br />";
    
    
    echo "o Afficher tous les conducteurs (meme ceux qui n'ont pas de correspondance) ainsi que les vehicules<br />";
    
    
    echo "o Afficher les conducteurs et tous les vehicules (meme ceux qui n'ont pas de correspondance)<br />";
    
    
    echo "o Afficher tous les conducteurs et tous les vehicules, peut importe les correspondances. <br />";
    
    
    ?>
    </main>





<?php
// On inclue le fichier footer.php sur la page :
require_once(__DIR__ . '/partials/footer.php'); ?>