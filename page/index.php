<?php

$title = "Dauphine";
require_once('../utils/connectdb.php');
$pdo = connectDB();
configPdo($pdo);
//recuperation des annonces de la bdd
$reponse = $pdo->prepare('SELECT * FROM dauphineexam.annonce order by datePublication desc');
$reponse->execute();
$annonces = $reponse->fetchAll();
//var_dump($annonces);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo ($title ?? "Default Title") ?></title>
</head>

<body >
    <h1 class="text-center text-uppercase bg-light  "><?php echo ($title ?? "Default Title") ?></h1>
    <div class="d-flex justify-content-between align-items-center  bg-danger ">
        <!-- boucle affichage des annonces -->
        <?php foreach ($annonces as $annonce) { ?>
        <?php include("../block/annocecard.php");
        } ?>

    </div>
    <!-- include du footer -->
    <?php
include_once("../block/footer.php");
?>
</body>

</html>


