<?php 
  require "verification.php";
  if(isset($_GET["id"]))
  $numProduit = mysqli_real_escape_string($link,$_GET["id"]);
  else $numProduit = $_POST["id"];

    #selectionner le produit  pour afficher ses caracteristiques dans les input
    $sql1 = "SELECT * FROM produit WHERE numProduit = '$numProduit' ";
    $result1 = mysqli_query($link,$sql1) or die(mysqli_error($link));
    $produit = mysqli_fetch_assoc($result1);
  $error = [
    "qte" => "",
    "prix" => ""
  ];
  $succes = "";

    if(isset($_POST["save"]))
    {
        $nom = $_POST["nom"];
        $qte = $_POST["qte"];
        $prix = $_POST["prix"];
        $details = $_POST["details"];

        if($qte <=0)
        $error["qte"] = "Veuiller entrer une quantité valide";
        if($prix <= 0 || !is_numeric($prix))
        $error["prix"] = "Veuiller entrer un prix valide";

        if(!array_filter($error)) #si $error[] est vide donc il n y a pas d'erreurs !
        {
            $sql = "UPDATE produit SET 
            nomProduit = '$nom',
            qteProduit = '$qte',
            prix = '$prix',
            produit.description = '$details'
            WHERE numProduit = '$numProduit'
            ";
            $result = mysqli_query($link,$sql) or die(mysqli_error($link));
            $url = urldecode("editproduit.php?id=$numProduit");
            header("location:$url");
            $succes = "Operation reussi ! ";

          }
    }


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
          <h1>MODIFIER PRODUIT</h1>
              <form action="editproduit.php" class="edit" method="POST">
                <div class="wrapper">


              <div>
              <label for="nom">Nom du produit</label>
              <div>
              <input type="text" name="nom" id="nom" placeholder="Inserer un nom pour le produit"  autocomplete="off" value="<?php echo $produit["nomProduit"]?>">
              <p class="error"></p>
              </div>
              </div>

              <div>
              <label for="qte">Quantité</label>
              <div>
              <input type="number" name="qte" id="qte" placeholder="Entrer une quantité ( > 0 ) "value="<?php echo $produit["qteProduit"]?>">
              <p class="error"><?php echo $error["qte"] ?></p>
              </div>
              </div>

              <div>
              <label for="prix">Prix par unité</label>
              <div>
              <input type="text" name="prix" id="prix" min="0" placeholder="Entrer un prix"value="<?php echo $produit["prix"]?>">
              <p class="error"><?php echo $error["prix"] ?></p>
              </div>
              </div>

              <div>
              <label for="details">Description</label>
              <div>
              <textarea name="details" id="details" cols="30" rows="5" ><?php echo $produit["description"]?></textarea>
              </div>
            </div>

              <button type ="submit" name ="save" class="enregistrer">Enregistrer</button>
              <input type="hidden" name="id" value="<?php echo $numProduit ?>">

              <span class="succesEdit"><?php echo $succes ?></span>
              </div>
              </form>
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
          
          <div class="sidebar__link ">
            <i class="fa fa-building-o " ></i>
            <a href="listeproduits.php">Liste Produits</a>
          </div>
          <div class="sidebar__link " >
            <i class="fa fa-wrench"></i>
            <a href="listeclients.php">Liste Clients</a>
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