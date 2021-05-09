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
    <link rel="stylesheet" href="styles.css" />
    <title>PAGE ADMIN</title>
  </head>
  <body id="body">
    <div class="container">
      <nav class="navbar">
        <div class="nav_icon" onclick="toggleSidebar()">
          <i class="fa fa-bars" aria-hidden="true"></i>
        </div>
        <div class="navbar__left">
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
          
          <!-- MAIN CARDS STARTS HERE -->
          <div class="main__cards">
    <?php 
            $select = "SELECT * FROM client WHERE typeClient = 'admin' ";
            $send = mysqli_query($link,$select);
            $clients = mysqli_fetch_all($send,MYSQLI_ASSOC);
           
    ?>
          <?php foreach($clients as $client ) : ?>
                <div class="cards">
                    <div class="lefthalf">
                        <img src="assets/adminimg.png" alt="user">
                    </div>
                     <div class="righthalf">
                            <div class="top">
                                <span class="fullname"><?php echo $client['nomClient']?></span>
                            <span style="color:red"><STRONG>ADMIN</STRONG></span>
                              </div>

                            <div class="bottom">
                              
                            <div class="first grid">
                            <span >Username</span>
                            <span class="right"><?php echo $client['usernameClient']?></span>
                            </div>

                            <div class="second grid">
                            <span>Adresse</span>
                            <span class="right"><?php echo $client['adresseClient']?></span>
                            </div>

                            <div class="third grid">
                            <span>Email</span>
                            <span class="right"><?php echo $client['emailClient']?></span>
                            </div>

                            <div class="forth grid">
                            <span>Num Tél</span>
                            <span class="right">06 12 34 55 11</span>
                            </div>
                            </div>
                     </div>
                </div>
                <?php endforeach; ?>
          </div>
          <!-- MAIN CARDS ENDS HERE -->

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

          <div class="sidebar__link " >
            <i class="fa fa-wrench"></i>
            <a href="listeclients.php">Liste Clients</a>
          </div>

          <div class="sidebar__link active_menu_link" >
            <i class="fa fa-wrench"></i>
            <a href="listeclients.php">Liste Admins</a>
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