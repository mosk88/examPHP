
<?php $reponse = $pdo->query('SELECT * FROM dauphineexam.annonce');
$annonces = $reponse->fetchAll();?>
<div class="   col-2 border border-danger  rounded bg-black text-white mx-auto   ">
<p class="text-center"><?php echo ($annonce['titre']); ?></p>
        <img src="<?php echo ($annonce['imageUrl']); ?>" class="img-fluid  " alt="img annonce">
        <p class="text-center"><?php echo ($annonce['contenu']); ?></p>
        <p class="text-center"><?php echo ($annonce['datePublication']); ?></p>
        <p class="text-center"><?php echo ($annonce['auteur']); ?></p>
        <div class=" d-flex justify-content-evenly">
        <a href="updateannonce.php?id=<?php echo ($annonce['id']); ?>" class=" w-30 m-2  btn btn-primary">Update</a>
        <a href="deleteannonce.php?id=<?php echo ($annonce['id']); ?> " class=" w-30 m-2   btn btn-danger">Supprime</a>
        </div>

</div>