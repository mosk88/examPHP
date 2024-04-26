<?php
$title = "Dauphine";
require_once('../utils/connectdb.php');
$pdo = connectDB();
configPdo($pdo);
$reponse = $pdo->query('SELECT * FROM dauphineexam.annonce order by datePublication desc');
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

<body class="">
    <h1 class="text-center text-uppercase bg-light  "><?php echo ($title ?? "Default Title") ?></h1>
    <div class="d-flex justify-content-evenly align-items-center flex-wrap gap-3 bg-danger ">
        <?php foreach ($annonces as $annonce) { ?>
        <?php include("../block/annocecard.php");
        } ?>

    </div>
    <?php
include_once("../block/footer.php");
?>
</body>

</html>


