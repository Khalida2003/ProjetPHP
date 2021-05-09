<?php
$numProduit = $_POST["numProduit"];
$nomProduit = $_POST["nomProduit"];
$carct = $_POST["caract"];
$qteProduit = $_POST["qntProduit"];
$prix = $_POST["prix"];
$imageProduit = $_POST["imageProduit"];
$genreProduit = $_POST["genreProduit"];
?>

<?php

try
{
	$bdd = new PDO('mysql:host=localhost;dbname=lyk;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

$produitReq = $bdd -> prepare('INSERT INTO produit(numProduit, nomProduit, caract,qteProduit,prix,imageProduit,genreProduit)
VALUES (:numProduit,:nomProduit,:caract,:qteProduit,:prix,:imageProduit,:genreProduit)');
$produitReq -> execute(array(
    'numProduit' => $numProduit,
    'nomProduit' => $nomProduit,
    'caract' => $carct,
    'qteProduit' => $qteProduit,
    'prix' => $prix,
    'imageProduit' => $imageProduit,
    'genreProduit' => $genreProduit
)) ;

?>