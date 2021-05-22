<p>La voiture a bien été modifié</p>
<?php
$immatriculation = $u->getImmatriculation(); 
echo "<p> La voiture <a href='index.php?controller=voiture&action=read&immatriculation=$immatriculation'> $immatriculation </a> </p>" ;
?>