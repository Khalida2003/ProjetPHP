<?php 
    session_start();
    if ( isset($_SESSION['usernameClient']) ){
        header("location:../index.php");
    }
    $link = mysqli_connect("localhost","root","","lyk") or die(mysqli_connect_error());

        $error = "";
    if(isset($_POST["submit"]))
    {
        $username = $_POST["usernameClient"];
        $password = $_POST["passwordClient"];
   

     $verification = "SELECT *FROM client WHERE usernameClient='$username' AND passwordClient = '$password'";
     $result = mysqli_query($link,$verification) or die(mysqli_error($link));   
    $client = mysqli_fetch_assoc($result);

    if(mysqli_num_rows($result))
    {
              # connexion reussi
              if($client["etat"] == "banni"):
              $error = "Vous êtes banni , vous ne pouvez plus acceder au site"; 
              else:
        $_SESSION["usernameClient"] = $username;
        if($client["typeClient"] == "user")
        header("location:../index.php");
        else
        header("location:../Admin/index.php");
              endif;
    }
else{
   #connexion non reussi
   $error = "Login ou mot de passe incorrect . Veuiller réssayer à nouveau"; 
} 

  
}
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="loginPage.css">
    <title>Login page</title>
</head>
<body>
<header >
<div class="searchbar">
    <div class="logo">
        <img src="../imgs/shop.png" alt="logo"><a href="../index.php"><h1>LYK</h1></a>
    </div>
        <div class="form">
    <form action="">
    
        <button  type="reset" id="resetsearch"><img src="../imgs/cancel.png" id="cancelbtn"alt="cancel" class=" search_cancel hide"></button>
        <input type="text" name="" id="search_input">
        <button type="submit" class="searchbtn">Rechercher</button>
    </form>
        </div>
    <div class="login">
        <ul>
            <li><img src="../imgs/login.png" alt="login"><a href="#">Se connecter</a></li>
            <li><img src="../imgs/signup.png" alt="signup"><a href="insc.html">S'inscrire</a></li>
            <li><img src="../imgs/panier.png" alt="panier"><a href="#">Panier</a></li>
        </ul>
    </div>
</div>
</header>
        <div class="loginContainer">
                <div class="loginBox">
                    <form action="login.php" method="POST">
                        <h1>Login</h1>
                        <div class="inputs">
                      
                        <input required autocomplete="off" type="text" name="usernameClient" id="usernameClient" placeholder="Entrer votre login" >
                        <input required autocomplete="off" type="password" name="passwordClient" id="passwordClient" placeholder="Entrer votre mot de passe" >
                      <button type="submit"class="submit" name="submit">Login</button>
                        </div>
                        <div class="pasdecompte"><a href="insc.html">Pas de compte toujours?</a></div>
                    </form>
                    <div class="erros">
                            <p><?php echo $error ?></p>
                            </div>
                </div>
        </div>


            <!--_____________FOOTER___________-->
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="footer-col">
          <img src="../imgs/shop.png" alt="logo"><a href="../index.php"><h1>LYK</h1></a>
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

<script src="../js/cancel.js"></script>
</body>
</html>