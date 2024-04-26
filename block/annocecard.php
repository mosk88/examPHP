
<?php $reponse = $pdo->query('SELECT * FROM dauphineexam.annonce');
$annonces = $reponse->fetchAll();?>
<div class="col-2 border border-danger b-2 rounded bg-black text-white mx-auto    ">
<p class="text-center"><?php echo ($annonce['titre']); ?></p>
        <img src="<?php echo ($annonce['imageUrl']); ?>" class="img-fluid  " alt="img annonce">
       
        <p class="text-center"><?php echo ($annonce['contenu']); ?></p>
        <p class="text-center"><?php echo ($annonce['datePublication']); ?></p>
        <p class="text-center"><?php echo ($annonce['auteur']); ?></p>
      
    

</div>