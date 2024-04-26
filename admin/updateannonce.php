<?php

require_once('../utils/connectdb.php');
$title = "Update annonce";
include_once('../block/header.php');
$pdo = connectDB();
configPdo($pdo);
$reponse = $pdo->prepare('SELECT * FROM annonce WHERE id = :id');
$reponse->execute([':id' => $_GET['id']]);
$annonce = $reponse->fetch();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $opd = connectdb();
    $query = $opd->prepare('UPDATE annonce SET  imageUrl = :imageUrl, contenu = :contenu, titre = :titre, auteur = :auteur WHERE id = :id');
    $query->execute([
        ':imageUrl' => $_POST['imageUrl'],
        ':contenu' => $_POST['contenu'],
        ':titre' => $_POST['titre'],
        ':auteur' => $_POST['auteur'],
        ':id' => $_GET['id']
        
    ]);
    header("location: indexadmin.php");
}


?>
<h1 class="text-center text-uppercase bg-light  "><?php echo ($title ?? "Default Title") ?></h1>
<div>
<form class="d-flex flex-column justify-content-evenly align-items-center bg-danger" action="updateannonce.php?id=<?php echo $_GET['id'] ?>" method="POST">
    <label for="titre" class="text-white">Titre :</label>
    <input class="w-50 form-control mb-3" type="text" name="titre" id="titre" value="<?php echo $annonce['titre'] ?>">
    
    <label for="imageUrl" class="text-white">Image :</label>
    <input class="w-75 form-control mb-3" type="text" name="imageUrl" id="imageUrl" value="<?php echo $annonce['imageUrl'] ?>">
    
    <label for="contenu" class="text-white">Contenu :</label>
   <textarea name="contenu" id="contenu" cols="100" rows="10"><?php echo $annonce['contenu'] ?></textarea>
    
    <label for="auteur" class="text-white">Auteur :</label>
    <input class="w-50 form-control mb-3" type="text" name="auteur" id="auteur" value="<?php echo $annonce['auteur'] ?>">
    
    <input class="m-3 w-25 btn btn-primary text-uppercase" type="submit" value="Update">
</form>


</div>


