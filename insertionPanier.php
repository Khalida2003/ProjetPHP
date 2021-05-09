<?php
 session_start();
 if (!isset($_SESSION['usernameClient']) )
 {
         header("location:inscription/login.php");
         die();
 }
                $link = mysqli_connect("localhost","root","","lyk") or die(mysqli_connect_error());

                $qte_demande = $_POST["qte_demande"];
                $idProduit = $_POST["numProduit"];
                


        #check si la meme personne a commandé le meme produit et le produit se trouve dans le panier
        #donc on augmonte la quantitée au lieu d'ajouter le produit dans le panier

        $check = "SELECT * from commande WHERE numProduit = '$idProduit' AND usernameClient = '{$_SESSION['usernameClient']}' ";
        $result = mysqli_query($link,$check) or die(mysqli_errno($link));
        $produits = mysqli_fetch_all($result,MYSQLI_ASSOC);
       if(mysqli_num_rows($result) && $produits[0]["statut"]=="en panier"):
               #on a deux produits identique , il faut en afficher que 1 avec addition de quantitée.

                 $newquantity = $qte_demande + $produits[0]['qte_demande'];

            
                $update_qte =   " UPDATE commande SET qte_demande = '$newquantity' WHERE commande.numProduit =  '$idProduit' ";
                $result = mysqli_query($link,$update_qte ) or die(mysqli_errno($link));
                        header("location:panier.php");

       
                else:
        $statut = "en panier";
        $insert = "INSERT INTO commande(usernameClient,numProduit,qte_demande,statut) VALUES('{$_SESSION['usernameClient']}','$idProduit',' $qte_demande','$statut') ";
        $send =  mysqli_query($link,$insert) or die(mysqli_errno($link)); 
       
           header("location:panier.php");
                endif;

 ?>