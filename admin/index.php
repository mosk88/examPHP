<?php



if (!isset($_SESSION['username'])) {
    header("location:../login.php");
}
$title = "Dauphine";
require_once('../utils/connectdb.php');
$pdo = connectDB();
configPdo($pdo);
$reponse = $pdo->query('SELECT * FROM dauphineexam.annonce order by datePublication desc');
$annonces = $reponse->fetchAll();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo ($title ?? "Default Title") ?></title>
</head>

<body class="">
    <h1 class="text-center text-uppercase bg-light  "><?php echo ($title ?? "Default Title") ?></h1>
    <div class="d-flex justify-content-evenly align-items-center flex-wrap gap-3 bg-danger ">
        <a class="btn btn-primary w-25 m-2  " href="../admin/addannonce.php">ajouter</a>

    </div>
    <div class="d-flex justify-content-evenly align-items-center flex-wrap gap-3 bg-danger ">
        <?php foreach ($annonces as $annonce) { ?>
        <?php include("annoncecardadmin.php");
        } ?>



    </div>
    <?php
    include_once("../block/footer.php");
    ?>
</body>

</html>