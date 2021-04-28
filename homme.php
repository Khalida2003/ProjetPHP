<?php
session_start();
        $link = mysqli_connect("localhost","root","","lyk") or die(mysqli_connect_error());

        $sql = "SELECT * FROM produit";
        $result = mysqli_query($link,$sql) or die(mysqli_errno($link));

        $produits = mysqli_fetch_all($result,MYSQLI_ASSOC);
        
        mysqli_free_result($result);
        mysqli_close($link);
?>
        

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/productstyle.css">
    <title>Homme - Collections</title>
</head>
<body>
<div class="imgnav">

</div>
        <div class="links">
            <ul>
              <li><a href="index.php">Accueil</a></li>
                <li><a href=""class="active">Homme</a></li>
                <li><a href="femme.php" >Femme</a></li>
                <li><a href="enfant.php">Enfant</a></li>
                <li><a href="accessoire.php">Accessoires</a></li>
                <li><a href="nutrition.php">Nutrition</a></li>
            </ul>
        </div>
        <div class="imgnav">

        </div>
            <div class="container">
            <?php foreach($produits as $produit): ?>
            <?php if($produit["genreProduit"]=="homme"): ?>
            <div class="box">
                            <div class="product_img">
                            <img src="images/<?php echo $produit["imageProduit"]?>" alt="imghomme">
                                <div class="img-content">
                                <form action="shop.php" method="POST">
                                <input type="hidden" name="numProduit" value="<?php echo $produit["numProduit"] ?>">
                                <button type="submit" name="submit">ACHETER</button>
                                </form>
                                </div>
                            </div>
                            <div class="product_info">
                                <span class="nomProduit"><?php echo $produit["nomProduit"] ?></span><br>
                                <span class="money"><?php echo $produit["prix"] ?> DH</span>
                               
                            </div>
                    </div>
                    <?php endif; ?>
                <?php endforeach;  ?>
            </div>
</body>
</html>