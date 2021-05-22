
<p>La voiture a bien été ajoutée : </p>
<?php
$i = $u->getImmatriculation(); 
echo "<p>Voiture <a href='index.php?controller=voiture&action=read&immatriculation=$immatriculation'> $i </a> </p>" ;
?>