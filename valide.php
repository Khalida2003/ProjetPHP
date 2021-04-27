<?php
        session_start();
        
        if (!isset($_SESSION['usernameClient']) ){
            header("location:../index.php"); }

            $link = mysqli_connect("localhost","root","","lyk") or die(mysqli_connect_error());
            if(isset($_GET['id'])){
                $id = mysqli_real_escape_string($link,$_GET['id']);
            }
        
        $select = "SELECT * FROM client,commande,produit WHERE 
            client.usernameClient = '{$_SESSION['usernameClient']}'
            AND client.usernameClient = commande.usernameClient
         AND produit.numProduit = commande.numProduit 
         AND commande.numCommande = '$id'
         AND commande.statut = 'commander' ";
        
         $result = mysqli_query($link,$select) or die(mysqli_error($link));
         $produit = mysqli_fetch_assoc($result);
         
         mysqli_free_result($result);
         mysqli_close($link);

?>
               <pre style="font-weight : 700"><?PHP #print_r($produit)?></pre>
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
                        <div class="client-info flex">
                            <span>Bonjour Mr/Mme <span class="user"><?php echo $produit['usernameClient'] ?></span>, voici votre commande</span>
                        </div>
                    <div class="first">
                        <div class="img-section">
 <div class="img flex"><img src="img<?php echo $produit['genreProduit'] ?>/<?php echo $produit['imageProduit'] ?>" alt="img"></div>
                            <span><?php echo $produit['nomProduit']?></span>
                        </div>
                        <div class="price-section flex">
                            <span><?php echo $produit['prix']?> DH</span>
                        </div>
                    </div>

                    <div class="second">
                        <div class="second-left">
                        <span>Quantité</span>
                        <span>Date de commande </span>
                        <span>Livraison </span>
                        </div>
                        <div class="second-right">
                            <span ><?php echo $produit['qte_demande']?></span>
                        <span ><?php echo $produit['date_commande']?></span>
                            <span >Gratuite</span>
                        </div>
                    </div>

                    <div class="third">
                        <div class="left-third">
                        <span>Total</span>
                        </div>
                        <div class="right-third">
                        <span><?php echo $produit['qte_demande'] * $produit['prix'] ?> DH</span>
                        </div>
                    </div>
                    <div class="message flex">
                        <span class="gg">Achat reussie ! nous vous remercions de nous avoir fait confiance</span>
                        <div class="visiter">
                        <span class="more"> Besoin d'autres produits ?</span>
                        <a href="boutique.php"><button id="valider">Visiter notre boutique</button></a>
                        </div>
                       
                    </div>
                </div>
</body>
</html>
