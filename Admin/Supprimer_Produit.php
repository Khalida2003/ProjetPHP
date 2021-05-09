<?php

$link = mysqli_connect("localhost","root","","lyk") or die(mysqli_connect_error());
$numProduit = mysqli_real_escape_string($link,$_GET["id"]);

#Supprimer de la table commande :
$delete1 = "DELETE FROM commande WHERE
            numProduit = '$numProduit'
            AND statut = 'en panier' ";
$result1 = mysqli_query($link,$delete1) or die(mysqli_error($link));

#Supprimer de la table produits :
$delete2 = "DELETE  FROM produit WHERE
            numProduit = '$numProduit'";
$result2 = mysqli_query($link,$delete2) or die(mysqli_error($link));

header("location:listeproduits.php");

?>