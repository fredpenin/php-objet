<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Capitales et pays</h1>
    

    
    <?php
    include "CountryCapital.php";



    $europa = new CountryCapital("europa.json");

    $europa->getCapitals();














    /////////////////// Traitement du fichier CSV pour le convertir en tableau de tableaux ////////////
    // $file = "users.csv";
    // $fileContents = file_get_contents ($file);

    // $users = explode("\n", $fileContents);

    // //var_dump($users);

    // $usersArray = [];
    // foreach($users as $user){
    //     $line = explode(";", $user);
    //     array_push($usersArray, $line);
    // }

    ?>


</body>
</html>


