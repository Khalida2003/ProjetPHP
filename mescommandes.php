<?php
        session_start();
        
        if (!isset($_SESSION['usernameClient']) ){
            header("location:../index.php"); }
        $link = mysqli_connect("localhost","root","","lyk") or die(mysqli_connect_error());
        
        $select = "SELECT * FROM client,commande,produit WHERE 
            client.usernameClient = '{$_SESSION['usernameClient']}'
            AND client.usernameClient = commande.usernameClient
         AND produit.numProduit = commande.numProduit 
         AND commande.numCommande = '{$_GET['id']}'
         AND commande.statut = 'commander' ";
        
         $result = mysqli_query($link,$select) or die(mysqli_error($link));
         $produits = mysqli_fetch_all($result,MYSQLI_ASSOC);
         $produit = $produits[0];
?>
               <pre style="font-weight : 700"><?PHP print_r($produit)?></pre>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/commandesvalide.css">
    <title>Commande validée</title>
</head>
<body>

                <div class="container">

                    <div class="first">
                        <div class="img-section">
                        <img src="imghomme/img7.webp" alt="">
                            <span>img title</span>
                        </div>
                        <div class="price-section">
                            <span>price</span>
                        </div>
                    </div>

                    <div class="second">
                        <span>Quantité : </span>
                        <span>Date de commande</span>
                        <span>Livraison : </span>
                    </div>

                    <div class="third">
                        <span>Total : 1000 DH</span>
                    </div>
                </div>
</body>
</html>
