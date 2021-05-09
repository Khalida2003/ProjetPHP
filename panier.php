<?php

       session_start();
       if (!isset($_SESSION['usernameClient']) )
       {
              header("location:inscription/login.php");
       }
       $link = mysqli_connect("localhost","root","","lyk") or die(mysqli_connect_error());

        $select = "SELECT 
        commande.qte_demande,commande.numProduit,produit.nomProduit , produit.imageProduit
        , produit.prix , commande.numCommande , commande.statut , commande.error, produit.genreProduit
         FROM 
        client,commande,produit WHERE 
            client.usernameClient = '{$_SESSION['usernameClient']}'
            AND client.usernameClient = commande.usernameClient
         AND produit.numProduit = commande.numProduit ";
        
         $result = mysqli_query($link,$select) or die(mysqli_error($link));
         $produits = mysqli_fetch_all($result,MYSQLI_ASSOC);
        
         #UPDATE QUANTITY
      
        if(isset($_POST["plus"]))
         {
               $currentProduit =   $_POST["numCommande"];
                 $plus = "UPDATE commande SET qte_demande = commande.qte_demande + 1  WHERE numCommande = '$currentProduit' ";
                 $result_update= mysqli_query($link,$plus) or die(mysqli_error($link));
                
                 header("location:panier.php");

         } 
         if(isset($_POST["minus"]))
         {
               $currentProduit =   $_POST["numCommande"];
                 $plus = "UPDATE commande SET qte_demande = commande.qte_demande - 1  WHERE numCommande = '$currentProduit' ";
                 $result_update= mysqli_query($link,$plus) or die(mysqli_error($link));
                 
                 header("location:panier.php");

         } 
        

         #DELETE ITEM
         if(isset($_POST["delete"]))
         {
                $currentProduit =   $_POST["numCommande"];
                $delete = "DELETE FROM commande WHERE commande.numCommande = '$currentProduit' ";
                $result_delete = mysqli_query($link,$delete) or die(mysqli_error($link));
               

                header("location:panier.php");
         }
        # SI LE PRODUIT A ETE ACHETER :
        if(isset($_POST["submit"]))
        {       
              
               $currentProduit =   $_POST["numProduit"];
                $numCommande = $_POST["numcommande"];
                $qte_demande = $_POST["qte_demande"];
                
                 $select = "SELECT qteProduit FROM produit WHERE numProduit = '$currentProduit' ";
                $result = mysqli_query($link,$select) or die(mysqli_error($link));
                $row = mysqli_fetch_row($result);
                $qte_stock = $row[0];
               
                if( $qte_stock < $qte_demande)
                {
                        $update_error = "UPDATE commande SET error = 'Quantité en stock insuffisante !'  WHERE numCommande = '$numCommande' ";
                        $request =  mysqli_query($link,$update_error) or die(mysqli_error($link));
                       

                        header("location:panier.php");
                } 
                else if( $qte_demande <= 0)
                {
                        $update_error = "UPDATE commande SET error = 'Quantité invalide'  WHERE numCommande = '$numCommande' ";
                        $request =  mysqli_query($link,$update_error) or die(mysqli_error($link));
                        

                        header("location:panier.php");
                }
                else{
                        $update_error = "UPDATE commande SET error = ''  WHERE numCommande = '$numCommande' ";
                        $request =  mysqli_query($link,$update_error) or die(mysqli_error($link));
                        
                        $update2 = "UPDATE commande SET statut = 'commander' WHERE numCommande = '$numCommande'";
                        $result2 = mysqli_query($link,$update2) or die(mysqli_error($link));
                        
                        $quantite = $qte_stock - $qte_demande;
                        $update3 = "UPDATE produit SET qteProduit = '$quantite' WHERE numProduit = '$currentProduit'";
                        $result3 = mysqli_query($link,$update3) or die(mysqli_error($link));


                        header("location:valide.php?id=$numCommande");

                } 


        }

        mysqli_close($link);

?>
               <pre style="font-weight : 700"><?PHP #print_r($produits)?></pre>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/panier.css">
        <title>Votre Panier</title>
</head>
<body>
        <div class="container">
                <?php $t = false ?>
                <?php foreach($produits as $produit) : ?>
                                <?php if($produit['statut']== "en panier"): $t = true;?>
                <div class="pseudo-container">
                <div class="box">
                        <div class="product-box">
                        <span class="prod-header">Produit</span>
                        <div class="global-content">
                                <div class="image-produit">
                                <img src="images/<?php echo $produit['imageProduit'] ?>" alt="img" class="image">
                                </div>
                                <div class="content">
                                        <span><?php echo $produit['nomProduit'] ?></span>
                                        <form action="panier.php" method="POST">
                                        <input type="hidden" name="numCommande" value="<?php echo $produit['numCommande'];?>">
                                        <button type="submit" name="delete"><svg xmlns="http://www.w3.org/2000/svg" height="427pt" viewBox="-40 0 427 427.00131" width="427pt"><path d="m232.398438 154.703125c-5.523438 0-10 4.476563-10 10v189c0 5.519531 4.476562 10 10 10 5.523437 0 10-4.480469 10-10v-189c0-5.523437-4.476563-10-10-10zm0 0"/><path d="m114.398438 154.703125c-5.523438 0-10 4.476563-10 10v189c0 5.519531 4.476562 10 10 10 5.523437 0 10-4.480469 10-10v-189c0-5.523437-4.476563-10-10-10zm0 0"/><path d="m28.398438 127.121094v246.378906c0 14.5625 5.339843 28.238281 14.667968 38.050781 9.285156 9.839844 22.207032 15.425781 35.730469 15.449219h189.203125c13.527344-.023438 26.449219-5.609375 35.730469-15.449219 9.328125-9.8125 14.667969-23.488281 14.667969-38.050781v-246.378906c18.542968-4.921875 30.558593-22.835938 28.078124-41.863282-2.484374-19.023437-18.691406-33.253906-37.878906-33.257812h-51.199218v-12.5c.058593-10.511719-4.097657-20.605469-11.539063-28.03125-7.441406-7.421875-17.550781-11.5546875-28.0625-11.46875h-88.796875c-10.511719-.0859375-20.621094 4.046875-28.0625 11.46875-7.441406 7.425781-11.597656 17.519531-11.539062 28.03125v12.5h-51.199219c-19.1875.003906-35.394531 14.234375-37.878907 33.257812-2.480468 19.027344 9.535157 36.941407 28.078126 41.863282zm239.601562 279.878906h-189.203125c-17.097656 0-30.398437-14.6875-30.398437-33.5v-245.5h250v245.5c0 18.8125-13.300782 33.5-30.398438 33.5zm-158.601562-367.5c-.066407-5.207031 1.980468-10.21875 5.675781-13.894531 3.691406-3.675781 8.714843-5.695313 13.925781-5.605469h88.796875c5.210937-.089844 10.234375 1.929688 13.925781 5.605469 3.695313 3.671875 5.742188 8.6875 5.675782 13.894531v12.5h-128zm-71.199219 32.5h270.398437c9.941406 0 18 8.058594 18 18s-8.058594 18-18 18h-270.398437c-9.941407 0-18-8.058594-18-18s8.058593-18 18-18zm0 0"/><path d="m173.398438 154.703125c-5.523438 0-10 4.476563-10 10v189c0 5.519531 4.476562 10 10 10 5.523437 0 10-4.480469 10-10v-189c0-5.523437-4.476563-10-10-10zm0 0"/></svg></button>
                                </form>
                                </div>
                        </div>
                        </div>
                        <div class="price-box">
                        <span class="prix-header">Prix</span>
                        

                                <span class="price"><?php echo $produit['prix'] ?> DH</span>
                        </div>
                        <div class="quantity-box">
                        <span class="quantité-header">Quantité</span>

                        <div class="quantity">
                        <form action="panier.php" method="POST">
                            <button type="submit" name="minus"><svg  class="minus" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" width="121.805px" height="121.804px" viewBox="0 0 121.805 121.804" style="enable-background:new 0 0 121.805 121.804;" xml:space="preserve"><g><g><path d="M7.308,68.211h107.188c4.037,0,7.309-3.272,7.309-7.31c0-4.037-3.271-7.309-7.309-7.309H7.308    C3.272,53.593,0,56.865,0,60.902C0,64.939,3.272,68.211,7.308,68.211z"/></g></g></svg></button>
                          <input min="1" type="number" name="qte_demande" id="qte_demande" value="<?php echo $produit['qte_demande'] ?>">
                          <input type="hidden" name="numCommande" value="<?php echo $produit['numCommande'];?>">
                          <button type="submit" name="plus"><svg  class="plus" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" width="349.03px" height="349.031px" viewBox="0 0 349.03 349.031" style="enable-background:new 0 0 349.03 349.031;" xml:space="preserve"><g><path d="M349.03,141.226v66.579c0,5.012-4.061,9.079-9.079,9.079H216.884v123.067c0,5.019-4.067,9.079-9.079,9.079h-66.579   c-5.009,0-9.079-4.061-9.079-9.079V216.884H9.079c-5.016,0-9.079-4.067-9.079-9.079v-66.579c0-5.013,4.063-9.079,9.079-9.079   h123.068V9.079c0-5.018,4.069-9.079,9.079-9.079h66.579c5.012,0,9.079,4.061,9.079,9.079v123.068h123.067   C344.97,132.147,349.03,136.213,349.03,141.226z"/></g></svg></button> 
                        </div>    
                        <span class="error"><?php echo $produit["error"] ?></span>
                        </form>
                        </div>
                        <div class="total-box">
                        <span class="total-header">Total</span>
                                <span class="total"><?php echo $produit['prix']*$produit['qte_demande'] ?> DH</span>
                                <form action="panier.php" method="POST">
                                        <button type="submit" name="submit" id="valider">Valider la commande</button>
                                        <input type="hidden" name="numProduit" value="<?php echo $produit['numProduit'];?>">
                                        <input type="hidden" name="numcommande" value="<?php echo $produit['numCommande'];?>">
                                        <input type="hidden" name="qte_demande" value="<?php echo $produit['qte_demande'];?>">
                                </form>
                        </div>
                </div>
                </div>
                <?php endif; ?>
                <?php endforeach ; ?>
                <?php if($t == false): ?>
                        <div class="container2">
                        <div class="iconcart">   <svg viewBox="0 -31 512.00029 512" xmlns="http://www.w3.org/2000/svg"><path d="m15 30h92c8.269531 0 15 6.730469 15 15 0 1.292969-1.898438-16.261719 28.585938 258.113281-16.714844 6.574219-28.585938 22.863281-28.585938 41.886719 0 24.8125 20.1875 44.988281 45 44.988281h17.578125c-1.664063 4.695313-2.578125 9.753907-2.578125 15.011719 0 24.8125 20.1875 45 45 45s45-20.1875 45-45c0-5.257812-.914062-10.316406-2.578125-15.011719h95.160156c-1.667969 4.695313-2.582031 9.753907-2.582031 15.011719 0 24.8125 20.1875 45 45 45s45-20.1875 45-45-20.1875-45-45-45h-240c-8.269531 0-15-6.730469-15-15s6.730469-15 15-15h274.585938c22.089843 0 40.757812-15.8125 44.386718-37.601562l25.824219-154.933594c.722656-4.347656-.5-8.796875-3.351563-12.160156-2.851562-3.363282-7.035156-5.304688-11.445312-5.304688h-45v-75c0-8.285156-6.714844-15-15-15h-120c-8.285156 0-15 6.714844-15 15v15h-75c-8.285156 0-15 6.714844-15 15v45h-51.574219l-8.433593-75.914062c-.492188-24.390626-20.484376-44.085938-44.992188-44.085938h-92c-8.285156 0-15 6.714844-15 15s6.714844 15 15 15zm227 375c0 8.269531-6.730469 15-15 15s-15-6.730469-15-15 6.730469-15.011719 15-15.011719 15 6.742188 15 15.011719zm165 15c-8.269531 0-15-6.730469-15-15 0-8.296875 6.730469-15 15-15s15 6.730469 15 15-6.730469 15-15 15zm-75-360h90v60h-90zm-90 30h60v30h-60zm237.292969 60-22.910157 137.464844c-1.210937 7.265625-7.433593 12.535156-14.796874 12.535156h-261.160157l-16.667969-150zm0 0"/><path d="m227 270c8.285156 0 15-6.714844 15-15v-60c0-8.285156-6.714844-15-15-15s-15 6.714844-15 15v60c0 8.285156 6.714844 15 15 15zm0 0"/><path d="m317 270c8.285156 0 15-6.714844 15-15v-60c0-8.285156-6.714844-15-15-15s-15 6.714844-15 15v60c0 8.285156 6.714844 15 15 15zm0 0"/><path d="m407 270c8.285156 0 15-6.714844 15-15v-60c0-8.285156-6.714844-15-15-15s-15 6.714844-15 15v60c0 8.285156 6.714844 15 15 15zm0 0"/></svg>               </div>                   
                       
                                <span class="vide">Votre panier est vide</span> 
                    
                      <span class="subtitle">Avant de passer à la commande, vous devez ajouter des produits à votre panier.
Vous trouverez de nombreux produits intéressants sur notre page "Boutique".</span>
                        <div class="btn">
                        <a href="boutique.php"><button id="valider">Retourner au Shop</button></a>
                        </div>
                                
                </div>
                        <?php endif; ?>
        </div>
</body>
</html>