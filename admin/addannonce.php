<?php
if (!isset($_SESSION['username'])) {
    header("location:login.php");
}



//appel de la fonction de connexion a la bdd
require_once('../utils/connectdb.php');
$title = "add annonce";
//include header
include_once('../block/header.php');
//renforcer la securité de la page 

//traitement du formulaire de l'admin
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $opd = connectdb();
    $query = $opd->prepare('INSERT INTO annonce ( imageUrl,  contenu, titre, auteur, datePublication)
    VALUES (:imageUrl, :contenu, :titre, :auteur, NOW())');
    $query->execute([
        ':imageUrl' => $_POST['imageUrl'],
        ':contenu' => $_POST['contenu'],
        ':titre' => $_POST['titre'],
        ':auteur' => $_POST['auteur']
    ]);
    header("location: indexadmin.php");
}

?>
<h1 class="text-center text-uppercase bg-light  "><?php echo ($title ?? "Default Title") ?></h1>
<div >
    <form class="d-flex flex-column justify-content-evenly align-items-center bg-danger " method="POST" action="addannonce.php">
        <label for="titre">titre:</label>
        <input class="w-25" type="text" name="titre" required>
        <label for="imageUrl">Image:</label>
        <input class="w-50" type="text" name="imageUrl" required>
        <label for="contenu">contenu:</label>
        <textarea name="contenu" id="contenu" cols="100" rows="10"></textarea>
        <label for="auteur">auteur:</label>
        <input class="w-25" type="text" name="auteur" required>
        <input class=" m-3 w-25 btn btn-primary text-uppercase " type="submit" value="Add">
    </form>

</div>
<?php include_once('../block/footer.php'); ?>