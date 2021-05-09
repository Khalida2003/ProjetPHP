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
      <link rel="stylesheet" href="stylesAdmin.css" >

      <title>PAGE ADMIN</title>
    </head>
    <body id="body">
      <div class="container">
        <nav class="navbar">
          <div class="nav_icon" onclick="toggleSidebar()">
            <i class="fa fa-bars" aria-hidden="true"></i>
          </div>
          <div class="navbar__left">
            
            <a class="active_link" href="#">Admin</a>
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
                <h1>Hello, <?php echo $client["nomClient"]?></h1>
                <p>Bienvenue à votre panneau d'administration</p>
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
  $user=$bdd -> query ('SELECT * FROM client');
  $i=0;
  while ($donnees = $user->fetch())
  {$i++;
  ?> 
      <?php    } $user->closeCursor();?>
          
            </div>
            <!-- MAIN CARDS ENDS HERE -->
  
            <!-- CHARTS STARTS HERE -->
            <div class="charts">
              <div class="charts__left">
                <div class="charts__left__title">
                  <div>
                    <h1>Daily Reports</h1>
                    <p>Des Information Sur Votre Site</p>
                  </div>
                  <i class="fa fa-usd" aria-hidden="true"></i>
                </div>
                <div id="apex1"></div>
              </div>
  
              <div class="charts__right">
                <div class="charts__right__title">
                  <div>
                    <h1>Stats Reports</h1>
                    <p>Des Information Sur Votre Site</p>
                  </div>
                  <i class="fa fa-usd" aria-hidden="true"></i>
                </div>
  
                
                <?php
  try
  {
    $bdd = new PDO('mysql:host=localhost;dbname=lyk;charset=utf8', 'root', '');
  }
  catch(Exception $e)
  {
          die('Erreur : '.$e->getMessage());
  }
  $Commande=$bdd -> query ("SELECT numProduit,qte_demande,statut FROM commande WHERE statut='commander'");
  $Somme=0;
  while ($arrayCommande = $Commande->fetch())
  {
      $Produit=$bdd -> prepare ('SELECT numProduit,prix FROM produit WHERE numProduit=?');
      $Produit-> execute(array($arrayCommande['numProduit']));
      $arrayProduit= $Produit->fetch();
      $Somme = $Somme+($arrayCommande['qte_demande']*$arrayProduit['prix']);
  }
  $Produit->closeCursor(); 
  $Commande->closeCursor(); 
  
  ?>
  
  
                <div class="charts__right__cards">
                  <div class="card1">
                    <h1>Income</h1>
                    <p><?php echo $Somme;?> DH</p>
                  </div>
  
                  <div class="card2">
                    <h1>Sales</h1>
                    <p>1200 DH</p>
                  </div>
  
                  <div class="card3">
                    <h1>Users</h1>
                    <p><?php echo $i;?></p>
                  </div>
  
                  <div class="card4">
                    <h1>Visitor</h1>
                    <p>81</p>
                  </div>
                </div>
              </div>
            </div>
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
            <div class="sidebar__link active_menu_link">
              <i class="fa fa-home"></i>
              <a href="#">Dashboard</a>
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
            </div>
            <div class="sidebar__link " >
            <i class="fa fa-wrench"></i>
            <a href="listeadmins.php">Liste Admins</a>
          </div>

            <div class="sidebar__link">
              <i class="fa fa-files-o"></i>
              <a href="Commande.php">Les Commandes</a>
            </div>
            
            <div class="sidebar__logout">
              <i class="fa fa-power-off"></i>
              <a href="../inscription/logout.php">Log out</a>
            </div>
          </div>
        </div>
      </div>
      <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
      <script src="script.js"></script>
    </body>
  </html>