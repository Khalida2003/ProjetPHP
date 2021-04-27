<?php 
   session_start();
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

        <title>Accueil - LYK</title>
</head>
<body>
<header >


    <div class="searchbar">
        <div class="logo">
            <img src="imgs/shop.png" alt="logo"><a href="index.php"><h1>LYK</h1></a>
        </div>
            <div class="form">
        <form action="">
        
            <button  type="reset" id="resetsearch"><img src="imgs/cancel.png" id="cancelbtn"alt="cancel" class=" search_cancel hide"></button>
            <input type="text" name="" id="search_input" required autocomplete="off">
            <button type="submit" class="searchbtn">Rechercher</button>
        </form>
            </div>
        <div class="login">
            <ul>
                <?php if ( !(isset($_SESSION['usernameClient']) ) ):?>
                <li><img src="imgs/login.png" alt="login"><a href="inscription/login.php">Se connecter</a></li>
                <li><img src="imgs/signup.png" alt="signup"><a href="inscription/insc.html">S'inscrire</a></li>
                <?php else:?>
                    <li><img src="imgs/clientimg.png" alt="login"><a class="connecter" href="#">Bienvenue <?php echo $_SESSION['usernameClient']?></a></li>
                    <li><img src="imgs/deconnexion.png" alt="logOut"><a href="inscription/logout.php">Se Deconnecter?</a></li>
                    <?php endif; ?>
                <li><img src="imgs/panier.png" alt="panier"><a href="panier.php">Panier</a></li>
            </ul>
        </div>
    </div>

        <div class="secondnav">
                <ul>
                    <li ><a class="active" href="#">Accueil</a></li>
                    <li><a href="boutique.php">Boutique</a>
                        <ul>
                            <li><a href="homme.php">Homme</a></li>
                            <li><a href="femme.php">Femme</a></li>
                            <li><a href="enfant.php">Enfant</a></li>
                            <li><a href="nutrition.php">Nutrition</a></li>
                            <li><a href="#">Accessoires</a></li>
                            
                        </ul>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Contact</a></li>
                </li>
                </ul>

        </div>
        <div class="header">
        <div class="lefthalf_header">
                <h1>Bienvenue à LYK Shop</h1>
                <p>Besoin d'équipement de sport , tenues , accessoires .. ? Tu es dans le bon endroit !</p>
              <a href="#">Shop now</a>
            </div>
        </div>
   </div>
</header>


    <!--====COLLECTION====-->

<section class="collection section99">

 <div class="collection_box">
    <img src="imgs/imgcard1.jpg" alt="imgcard" >

        <div class="collection_data">
        <h2 class="collection_title"><span class="collection_subtitle">Survêtement</span><br>Homme</h2>
        <a href="#" class="collection_new"><STROng> Nouvelle collection</STROng></a>
        </div>
</div>

<div class="collection_box">
  
        <div class="collection_data">
        <h2 class="collection_title"><span class="collection_subtitle">Survêtement</span><br>Femme</h2>
        <a href="#" class="collection_new"><STROng> Nouvelle collection</STROng></a>
        </div>
        <img src="imgs/imgcard2.webp" alt="imgcard" >
</div>
</section>


    <!--====FEATURED PRODUCTS====-->
    <section class="featuredsection" id="featured">
        <h1 class="big_title" >FEATURED PRODUCTS</h1>
        <a href="#" class="section-al" ><h5 class="small_title">View All</h5></a>

    <div class="featured_img">
        <section>
            <div class='container'> 
                <div class='card' id="card">
                    <div class='imgBx'>
                        <img src='imgs/blackshoes.PNG'>
                        <h2>Nike Shoes</h2>
                    </div>
                    <div class="content">
                            <div class="size">
                                <h3>Size :</h3>
                                <span>8</span>
                                <span>9</span>
                                <span>10</span>
                            </div>
                            <div class="color">
                                <h3>Color :</h3>
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        <a href="#">Acheter</a>
                    </div>
                </div>
            </div>
        </section>  
        <section>
            <div class='container'> 
                <div class='card' id="card">
                    <div class='imgBx'>
                        <img src='imgs/abdoimg.png'>
                        <h2>Abdo Trainer </h2>
                    </div>
                    <div class="content">
                            <div class="size">
                                <h3>Size :</h3>
                                <span>small</span>
                                <span>med</span>
                                <span>large</span>
                            </div>
                            <div class="color">
                                <h3>Color :</h3>
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        <a href="#">Acheter</a>
                    </div>
                </div>
            </div>
        </section>  
        <section>
            <div class='container'> 
                <div class='card' id="card">
                    <div class='imgBx'>
                        <img src='imgs/ball.png' width="150px" height="150px">
                        <h2>Yoga Ball</h2>
                    </div>
                    <div class="content">
                            <div class="size">
                                <h3>Size :</h3>
                                <span>small</span>
                                <span>med</span>
                                <span>big</span>
                            </div>
                            <div class="color">
                                <h3>Color :</h3>
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        <a href="#">Acheter</a>
                    </div>
                </div>
            </div>
        </section>  
        <section>
            <div class='container'> 
                <div class='card' id="card">
                    <div class='imgBx'>
                        <img src='imgs/bottle.png' width="150px" height="150px">
                        <h2>Protein Bottle </h2>
                    </div>
                    <div class="content">
                            <div class="size">
                                <h3>Size :</h3>
                                <span>small</span>
                                <span>med</span>
                                <span>large</span>
                            </div>
                            <div class="color">
                                <h3>Color :</h3>
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        <a href="#">Acheter</a>
                    </div>
                </div>
            </div>
        </section>  
</div>
    </section>
    <!--=====offer=====-->
    <section class="offer section">
        <div class="offer-bg">
            <div class="offer_data">
                <h2 class="offer_title">OFFRE SPECIALE</h2>
                <pre class="offer_desc"> Special offerts discount for women this
week only</pre>
                <a href="#" class="button">Shop Now</a>
            </div>
        </div>
    </section>
    <!--=====new arrivals=====-->
   <section class="new_section" id="new">
       <h2  class="big_title">NEW ARRIVALS</h2>
       <a href="#" class="section-al"><h5 class="small_title">View All</h5></a>

       <div class="new_container">
           <ul>
               <li>
           <div class="new_box">
               <img src="https://images.asos-media.com/products/adidas-training-leggings-in-black-with-side-logo/20454937-1-black?$XXL$&wid=513&fit=constrain" alt="" class="new_img">
               <div class="new_link">
                   <a href="#" class="button">VIEW PRODUCT</a>
               </div>
           </div>
        </li><li>
           <div class="new_box">
            <img src="https://images.asos-media.com/products/adidas-training-aeroknit-seamless-leggings-in-grey/21280041-1-grey?$XXL$&wid=513&fit=constrain" alt="" class="new_img">
            <div class="new_link">
                <a href="#" class="button">VIEW PRODUCT</a>
            </div>
        </div>
    </li><li>
        <div class="new_box">
            <img src="https://images.asos-media.com/products/adidas-training-warpknit-legging-in-orange/8611206-4?$XXL$&wid=513&fit=constrain" alt="" class="new_img">
            <div class="new_link">
                <a href="#" class="button">VIEW PRODUCT</a>
            </div>
        </div>
    </li>
    </ul>
    <ul><li>
            <tr>
        <div class="new_box">
            <img src="https://images.asos-media.com/products/adidas-originals-sweatpants-in-navy-with-contrast-stitch/22918921-1-navy?$XXL$&wid=513&fit=constrain" alt="" class="new_img">
            <div class="new_link">
                <a href="#" class="button">VIEW PRODUCT</a>
            </div>
        </div>
    </li><li>
        <div class="new_box">
            <img src="https://images.asos-media.com/products/adidas-originals-essentials-hoodie-in-white/20803094-1-white?$XXL$" alt="" class="new_img">
            <div class="new_link">
                <a href="#" class="button">VIEW PRODUCT</a>
            </div>
        </div>
    </li><li>
        <div class="new_box">
            <img src="https://images.asos-media.com/products/adidas-originals-premium-sweats-overdyed-hoodie-in-burnt-orange/23162965-1-burntorange?$XXL$&wid=513&fit=constrain" alt="" class="new_img">
            <div class="new_link">
                <a href="#" class="button">VIEW PRODUCT</a>
            </div>
        </div>
    </li></ul>
       </div>
   </section>
   <!--===== SPONSORS =====-->
   <section class="sponsors section">
       <div class="sponsors_container">
           <div class="sponsors_logo">
               <img src="imgs/logo1.png" alt="logo1">
           </div>
           <div class="sponsors_logo">
            <img src="imgs/logo2.png" alt="logo2">
        </div>
        <div class="sponsors_logo">
            <img src="imgs/logo3.png" alt="logo3">
        </div>
        <div class="sponsors_logo">
            <img src="imgs/logo4.png" alt="logo4">
        </div>
        <div class="sponsors_logo">
            <img src="imgs/logo4.png" alt="logo5">
        </div>
       </div>
   </section>
   <br><br><br>
    <!--===== FOOTER =====-->
    <footer class="footer">
    <div class="container">
        <div class="row">
            <div class="footer-col">
          <img src="imgs/shop.png" alt="logo"><a href="index.php"><h1>LYK</h1></a>
            </div>
            <div class="footer-col">
                <h4>EXPLORE</h4>
                <ul>
                    <li><a href="#"><strong>Accueil</strong></a></li>
                    <li><a href="#"><strong>Shop</strong></a></li>
                    <li><a href="#"><strong>About</strong></a></li>
                    <li><a href="#"><strong>Contact</strong></a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>Devenir un membre?</h4>
                <ul>
                    <li><a href="#"><strong>Sign up</strong></a></li>
                    <li><a href="#"><strong>Login</strong></a></li>
                    <li><a href="#"><strong>Panier</strong></a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>follow us</h4>
                <div class="social-links">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>
    </div>
    <p class="footer_copy" >&#169; 2021 copyright all right reserved</p>
</footer>

    <script src="js/cancel.js"></script>
</body>
</html>