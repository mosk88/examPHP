
<?php 
//appel de l'annoce de la bdd
$reponse = $pdo->prepare('SELECT * FROM dauphineexam.annonce');
$reponse->execute();
$annonces = $reponse->fetchAll();?>
<div class="container col-2 row justify-content-center border-danger b-2 rounded bg-black text-white mx-auto    ">
<p class="text-center"><?php echo ($annonce['titre']); ?></p>
        <img src="<?php echo ($annonce['imageUrl']); ?>" class="img-fluid"  alt="img annonce">
       
        <p class="text-center"><?php echo ($annonce['contenu']); ?></p>
        <p class="text-center"><?php echo ($annonce['datePublication']); ?></p>
        <p class="text-center"><?php echo ($annonce['auteur']); ?></p>
      
    

</div>