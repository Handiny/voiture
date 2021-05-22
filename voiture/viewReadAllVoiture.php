
 <h1>Bienvenue au marketplace ! </h1>
 <div>
	 trouvez une panoplie de voitures mises à votre disposition,cliquez sur Voir plus pour plus de détails !
 </div>
 <section class="p-sm-5 p-2 " id="block3">
	 <div class="container-fluid">
 <div class="row row-cols-1 row-cols-md-3 g-4">

 <?php
/* boucle d’affichage */
foreach ($tab_u as $u){
	$immatriculation=$u->getImmatriculation();
	?>
	<div class="col">
		<div class="card w-80 border-success mb-3">
		<?php echo "<img src='assets/Images/".$u->getImage_voiture()."' class=' card-img-top' alt='Image indispo'>";?>
			<div class="card-body">
				<h5 class="card-title"><?php echo $u->getMarque()." ".$u->getModele() ?></h5>
				<p class="card-text"><?php echo $u->getDescription() ?></p>
				
				<a href="index.php?controller=voiture&action=read&immatriculation=<?=$immatriculation?>" class="btn btn-success">Voir plus</a>
			</div>
		</div>
	</div>
	<?php
	}
	// fin foreach
?>
 </div>
</div>
</section>
