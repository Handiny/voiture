

<div Id="window">
  <a href="index.php?controller=utilisateur&action=auth" id="bal">Cliquez ici pour se connecter ! </a>
  <button onclick="simulator_FB_close ()" Id="close">Close</button>
</div>
<script type="text/javascript">
var outButton = document.querySelector('.click'),
    pop = document.getElementById('click_button');
var main = document.getElementById("window");
var shadow = document.querySelector("body");
var hide = document.getElementById("close");

function simulator_FB (){
  "use strict"
  main.style.display = "block";
  shadow.style.backgroundColor = "rgba(0, 0, 0, 0.38)"
}

function simulator_FB_close (){
  "use strict"
  main.style.display = "none";
   shadow.style.backgroundColor = "#FFF"

}</script>
<!-- prop 2 -->
<style>
	#bal{
		color:black;
		margin-top:23px;
	    display: block;
		font-size:20px;
		
	}
	.cont{
  display:flex;
  justify-content: center;
  margin-top:50px;
  margin-bottom: 100px;
}
.contbody{
	display:flex;
	flex-direction: column;
	align-items: center;
}
.tableauu{
	width: 400px;
	margin-bottom:40px;
}
.libelle{
	font-variant: small-caps;
    font-weight:bold;
}
</style>

<style>
.click{
  margin:0 auto;
  text-align:center;


}
button{
  
  margin:0 auto;
  text-align:center;
  width:120px;
  border:none;
  height:50px;
  font-family:tahoma;
  font-size:17px;
  margin-bottom:1px;
  
}

#window
{
  width:500px;
  height:150px;
  background-color:#bcff9f;
  position:absolute;
  text-align:center;
  top:20px;
  left:30%;
  border-radius:10%;
  display:none
}

#window p{
 font-family:tahoma;
 font-size:17px;
  line-height:140px;
  
  
}
a:hover{text-decoration:none}
#close{
  
  margin-bottom:30px;
  right:50px;
 
  cursor:pointer;
  background-color:#28a645;
  font-family:tahoma;
  color:#FFF;
}

</style>

<div class="container-fluid cont">
<div class="card mb-3 border-success" style="width: 1200px;">
  <div class="row g-0">
    <div class="col-md-7">
	<?php echo "<img src='assets/Images/".$u->getImage_voiture()."' class=' card-img-top' alt='Image indispo'>";?>
    </div>
    <div class="col-md-5">
      <div class="card-body contbody">
        <h5 class="card-title"><?php echo$u->getMarque()." ".$u->getModele();?></h5>
        <p class="card-text"><em><?php echo$u->getDescription()?></em></p>
		<table class="tableauu">
			<tr>
				<td class="libelle">Annee: </td>
				<td><?php echo$u->getAnnee()?> </td>
			</tr>
			<tr>
				<td class="libelle">Boite vitesse: </td>
				<td><?php echo$u->getBoitevitesse()?> </td>
			</tr>
			
			<tr>
				<td class="libelle">Kilomètrage :  </td>
				<td><?php echo$u->getKilometrage()?> </td>
			</tr>
			<tr>
				<td class="libelle">Puissance Fiscale : </td>
				<td><?php echo$u->getPuissance_fiscale()?> </td>
			</tr>
            <tr>
				<td class="libelle">Carburant : </td>
				<td><?php echo$u->getCarburant()?> </td>
			</tr>
			
			<tr>
				<td class="libelle">Date de validité du controle technique </td>
				<td><?php echo$u->getDate_validation_tech()?> </td>
			</tr>

			<tr>
				<td class="libelle">Prix de location (Dt) :  </td>
				<td><?php echo$u->getPrix_loc()?> </td>
			</tr>
		</table>
        <div class="card-body ">
		<?php 
              if (!isset($_SESSION["email"])) {
				  
             ?>
			 
			
			 
	         <a href="index.php?controller=voiture&action=readAll" class="btn btn-success  ">Retour</a>
               
			 <a href="#" class="btn btn-success click " onclick="simulator_FB ()" Id="click_button">Réserver</a> 
				<?php
              }
              else {?>
               <a  href="index.php?controller=reservation&action=create&immatriculation=<?=$immatriculation?>" class="btn btn-success">Réserver</a>
	           <a href="index.php?controller=voiture&action=readAll" class="btn btn-success">Retour</a><?php
              }
              ?>
	
  </div>
      </div>
	  
    </div>
  </div>
</div>
</div>