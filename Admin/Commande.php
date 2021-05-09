<?php 
  require "verification.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
      integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="stylesAdmin.css" />
    <title>PAGE ADMIN</title>
  </head>
  <body id="body">
    <div class="container">
      <nav class="navbar">
        <div class="nav_icon" onclick="toggleSidebar()">
          <i class="fa fa-bars" aria-hidden="true"></i>
        </div>
        <div class="navbar__left">
          
          <a class="active_link" href="Admin.php">Admin</a>
        </div>
        <div class="navbar__right">
        <span ><?php echo $client["usernameClient"] ?></span>
            <a href="#">
              
              <img width="30" src="assets/avatar.svg" alt="" />
              <!-- <i class="fa fa-user-circle-o" aria-hidden="true"></i> -->
            </a>
        </div>
      </nav>

      <main>
        <div class="main__container">
          <!-- MAIN TITLE STARTS HERE -->

          <div class="main__title">
            <img src="assets/hello.svg" alt="" />
            <div class="main__greeting">

              <h1>Hello Mr Admin </h1>
              <p>Vous trouvez ici tout les information sur les commandes.</p>
            </div>
          </div>
          

          
          <!-- MAIN TITLE ENDS HERE -->

          <!-- MAIN CARDS STARTS HERE -->
          <div class="main__cards">
 <?php

try
{
	$bdd = new PDO('mysql:host=localhost;dbname=lyk;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
$userComande=$bdd -> query ('SELECT * FROM commande');


while ($donnees = $userComande->fetch())
{
?> 
    
                  <div class="card"> 
              <i class="fa fa-archive"></i>Date:
                  <?php echo $donnees['date_commande'];?> <br/>
              <div class="card_inner">
               <span class="font-bold text-title">
              <h6> Numero Commande:<?php echo $donnees['numCommande'];?></h6>
              <h6> Numero Produit:<?php echo $donnees['numProduit'];?></h6>
              <h6> Quantite: <?php echo $donnees['qte_demande'];?></h6></p>
                  </span>
              </div>
            </div>
            <?php
}

$userComande->closeCursor(); 

?>
          </div>
          <!-- MAIN CARDS ENDS HERE -->

         
          <!-- CHARTS ENDS HERE -->
        </div>
      </main>

      <div id="sidebar">
        <div class="sidebar__title">
          <div class="sidebar__img">
            <h1>LYK ADMIN</h1>
          </div>
          <i
            onclick="closeSidebar()"
            class="fa fa-times"
            id="sidebarIcon"
            aria-hidden="true"
          ></i>
        </div>

        <div class="sidebar__menu">
          <div class="sidebar__link ">
            <i class="fa fa-home"></i>
            <a href="index.php">Dashboard</a>
          </div>
          <h2>MNG</h2>

          <div class="sidebar__link">
              <i class="fa fa-building-o"></i>
              <a href="listeproduits.php">Liste Produits</a>
            </div>
            <div class="sidebar__link">
              <i class="fa fa-wrench"></i>
              <a href="listeclients.php">Liste Clients</a>
            </div>
            <div class="sidebar__link " >
            <i class="fa fa-wrench"></i>
            <a href="listeadmins.php">Liste Admins</a>
          </div>
            </div>
            
            <div class="sidebar__link active_menu_link">
              <i class="fa fa-files-o"></i>
              <a href="#">Les Commandes</a>
            </div>
          
          <div class="sidebar__logout">
            <i class="fa fa-power-off"></i>
            <a href="#">Log out</a>
          </div>

        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="script.js"></script>
  </body>
</html>