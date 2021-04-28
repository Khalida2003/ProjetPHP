<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/productstyle.css">
    <style>
    .links{
    width : 80%; }
        .links a:hover{
            color : rgb(59, 213, 224);
        }
    </style>
    <title>search</title>
</head>
<body>
<div class="imgnav">

</div>
        <div class="links">
            <ul>
              <li><a href="index.php">Accueil</a></li>
                <li><a href="homme.php">Homme</a></li>
                <li><a href="femme.php" >Femme</a></li>
                <li><a href="enfant.php">Enfant</a></li>
                <li><a href="accessoire.php">Accessoires</a></li>
                <li><a href="nutrition.php">Nutrition</a></li>
            </ul>
        </div>

        <div class="imgnav">

        </div>
            <div class="container">
            <div class="box">
            <?php 
   session_start();
   $link = mysqli_connect("localhost","root","","lyk") or die(mysqli_connect_error());
   if (isset($_POST['recherche'])){
       $sear=$_POST['search'];
       $sql = "SELECT * FROM produit where genreProduit like'%$sear%'" ;
       $sql1 = "SELECT * FROM produit where nomProduit like'%$sear%'" ;
       $result = mysqli_query($link,$sql) or die(mysqli_errno($link));
       $result1 = mysqli_query($link,$sql1) or die(mysqli_errno($link));
       $pro = " <table><tr>nomProduit</tr>
       <tr>prix</tr>
       <tr>imageProduit</tr>
       </table>";
       if(mysqli_num_rows($result)>= 1){

       while($row1 = mysqli_fetch_assoc($result)){
       $pro = "<tr><td><img src=images/".$row1['imageProduit']."> <br><br>" .$row1['nomProduit']." <br>" .$row1['prix']." <br><br><br></td></tr>";
       echo $pro ;}}
       else if(mysqli_num_rows($result1)>= 1){
        while($row2 = mysqli_fetch_assoc($result1)){
            $pro = "<tr><td><img src=images/".$row2['imageProduit']."> <br><br>" .$row2['nomProduit']." <br>" .$row2['prix']." <br><br><br></td></tr>";
           
            echo $pro ;}
       }
       else if (mysqli_num_rows($result1)==0 && mysqli_num_rows($result)==0){
         echo "<h3><strong>OoOuPs ARTICLE NOT FOUND!!</strong></h3>
         Votre recherche  ne correspond à aucun résultat.<br>
         Essayez par exemple <br>
         Utilisez des termes plus généraux<br>
         Vérifiez l orthographe";
       }
   }
?>
</div>
      </div>
</body>
</html>