<?php
        session_start();
        if(!isset($_POST["numProduit"])) header("location:index.php");
        $idProduit = $_POST["numProduit"];
        $link = mysqli_connect("localhost","root","","lyk") or die(mysqli_connect_error());

        $sql = "SELECT * from produit WHERE numProduit = '$idProduit' ";
        $result = mysqli_query($link,$sql) or die(mysqli_errno($link));

        $produit = mysqli_fetch_assoc($result);
        
        mysqli_free_result($result);
        mysqli_close($link);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/shopstyle.css">
    <title><?php echo $produit["nomProduit"]." Collection" ?></title>
</head>
<body>
    <div class="container">
            <div class="pseudo-container">
                <div class="img-section">
                    <img src="images/<?php echo $produit['imageProduit'] ?>" alt="img" class="image">
                </div>
                <div class="info-section">
                    <span class="title"><?php echo $produit["nomProduit"] ?></span><br>
                    <span class="price"><?php echo $produit["prix"] ?> DH</span><br><br><br>
                    <span class="description"><?php echo $produit["description"] ?></span>
                    <div class="addproduct">
                        <div class="quantity">
                        <form action="insertionPanier.php" method="POST">
                            <svg  class="minus" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" width="121.805px" height="121.804px" viewBox="0 0 121.805 121.804" style="enable-background:new 0 0 121.805 121.804;" xml:space="preserve"><g><g><path d="M7.308,68.211h107.188c4.037,0,7.309-3.272,7.309-7.31c0-4.037-3.271-7.309-7.309-7.309H7.308    C3.272,53.593,0,56.865,0,60.902C0,64.939,3.272,68.211,7.308,68.211z"/></g></g></svg>
                            <input min="1" type="number" name="qte_demande" id="qte_demande">
                            <svg  class="plus" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" width="349.03px" height="349.031px" viewBox="0 0 349.03 349.031" style="enable-background:new 0 0 349.03 349.031;" xml:space="preserve"><g><path d="M349.03,141.226v66.579c0,5.012-4.061,9.079-9.079,9.079H216.884v123.067c0,5.019-4.067,9.079-9.079,9.079h-66.579   c-5.009,0-9.079-4.061-9.079-9.079V216.884H9.079c-5.016,0-9.079-4.067-9.079-9.079v-66.579c0-5.013,4.063-9.079,9.079-9.079   h123.068V9.079c0-5.018,4.069-9.079,9.079-9.079h66.579c5.012,0,9.079,4.061,9.079,9.079v123.068h123.067   C344.97,132.147,349.03,136.213,349.03,141.226z"/></g></svg>
                        </div>    
                        <input type="hidden" name="numProduit" value="<?php echo $produit["numProduit"] ?>">
                        <button type="submit" name="submit" id="add">Ajouter</button>                 
                        </form>
                    </div>
                        <img src="https://cdn.shopify.com/s/files/1/0332/6420/5963/files/trust_img2_360x.png?v=1587092488" alt="brands">
                        <div class="details">
                            <span class="categories"><span class="det">Categories</span> : All, Fitness , Sport , Musculation , Nature</span>
                            <span class="tags"><span class="det">Tags</span>: Couleurs, sports, femmes, prix, soldes, enfants, hommes, accessoires, nutrition</span>
                        </div>
                            <div class="icons">
                    <a href="#"><svg xmlns="http://www.w3.org/2000/svg" id="Bold" enable-background="new 0 0 24 24" height="512" viewBox="0 0 24 24" width="512"><path d="m15.997 3.985h2.191v-3.816c-.378-.052-1.678-.169-3.192-.169-3.159 0-5.323 1.987-5.323 5.639v3.361h-3.486v4.266h3.486v10.734h4.274v-10.733h3.345l.531-4.266h-3.877v-2.939c.001-1.233.333-2.077 2.051-2.077z"/></svg></a>
                <a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="511pt" viewBox="0 0 511 511.9" width="511pt"><path d="m510.949219 150.5c-1.199219-27.199219-5.597657-45.898438-11.898438-62.101562-6.5-17.199219-16.5-32.597657-29.601562-45.398438-12.800781-13-28.300781-23.101562-45.300781-29.5-16.296876-6.300781-34.898438-10.699219-62.097657-11.898438-27.402343-1.300781-36.101562-1.601562-105.601562-1.601562s-78.199219.300781-105.5 1.5c-27.199219 1.199219-45.898438 5.601562-62.097657 11.898438-17.203124 6.5-32.601562 16.5-45.402343 29.601562-13 12.800781-23.097657 28.300781-29.5 45.300781-6.300781 16.300781-10.699219 34.898438-11.898438 62.097657-1.300781 27.402343-1.601562 36.101562-1.601562 105.601562s.300781 78.199219 1.5 105.5c1.199219 27.199219 5.601562 45.898438 11.902343 62.101562 6.5 17.199219 16.597657 32.597657 29.597657 45.398438 12.800781 13 28.300781 23.101562 45.300781 29.5 16.300781 6.300781 34.898438 10.699219 62.101562 11.898438 27.296876 1.203124 36 1.5 105.5 1.5s78.199219-.296876 105.5-1.5c27.199219-1.199219 45.898438-5.597657 62.097657-11.898438 34.402343-13.300781 61.601562-40.5 74.902343-74.898438 6.296876-16.300781 10.699219-34.902343 11.898438-62.101562 1.199219-27.300781 1.5-36 1.5-105.5s-.101562-78.199219-1.300781-105.5zm-46.097657 209c-1.101562 25-5.300781 38.5-8.800781 47.5-8.601562 22.300781-26.300781 40-48.601562 48.601562-9 3.5-22.597657 7.699219-47.5 8.796876-27 1.203124-35.097657 1.5-103.398438 1.5s-76.5-.296876-103.402343-1.5c-25-1.097657-38.5-5.296876-47.5-8.796876-11.097657-4.101562-21.199219-10.601562-29.398438-19.101562-8.5-8.300781-15-18.300781-19.101562-29.398438-3.5-9-7.699219-22.601562-8.796876-47.5-1.203124-27-1.5-35.101562-1.5-103.402343s.296876-76.5 1.5-103.398438c1.097657-25 5.296876-38.5 8.796876-47.5 4.101562-11.101562 10.601562-21.199219 19.203124-29.402343 8.296876-8.5 18.296876-15 29.398438-19.097657 9-3.5 22.601562-7.699219 47.5-8.800781 27-1.199219 35.101562-1.5 103.398438-1.5 68.402343 0 76.5.300781 103.402343 1.5 25 1.101562 38.5 5.300781 47.5 8.800781 11.097657 4.097657 21.199219 10.597657 29.398438 19.097657 8.5 8.300781 15 18.300781 19.101562 29.402343 3.5 9 7.699219 22.597657 8.800781 47.5 1.199219 27 1.5 35.097657 1.5 103.398438s-.300781 76.300781-1.5 103.300781zm0 0"/><path d="m256.449219 124.5c-72.597657 0-131.5 58.898438-131.5 131.5s58.902343 131.5 131.5 131.5c72.601562 0 131.5-58.898438 131.5-131.5s-58.898438-131.5-131.5-131.5zm0 216.800781c-47.097657 0-85.300781-38.199219-85.300781-85.300781s38.203124-85.300781 85.300781-85.300781c47.101562 0 85.300781 38.199219 85.300781 85.300781s-38.199219 85.300781-85.300781 85.300781zm0 0"/><path d="m423.851562 119.300781c0 16.953125-13.746093 30.699219-30.703124 30.699219-16.953126 0-30.699219-13.746094-30.699219-30.699219 0-16.957031 13.746093-30.699219 30.699219-30.699219 16.957031 0 30.703124 13.742188 30.703124 30.699219zm0 0"/></svg></a>
                <a href="#"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 250.57 250.57" style="enable-background:new 0 0 250.57 250.57;" xml:space="preserve">
<path d="M23.032,220.285h204.506c12.7,0,23.032-10.333,23.032-23.034V53.318c0-12.701-10.332-23.033-23.032-23.033H23.032  C10.332,30.285,0,40.618,0,53.318v143.933C0,209.952,10.332,220.285,23.032,220.285z M15,53.318c0-4.436,3.601-8.033,8.032-8.033  h204.506c4.433,0,8.032,3.597,8.032,8.033v143.933c0,4.437-3.6,8.034-8.032,8.034H23.032c-4.432,0-8.032-3.597-8.032-8.034V53.318z   M44.738,194.677h-15V56.529l93.674,60.815c1.102,0.715,2.643,0.716,3.748-0.002l93.673-60.813v138.148h-15V84.151l-70.507,45.774  c-2.992,1.941-6.464,2.966-10.041,2.966s-7.049-1.025-10.039-2.965L44.738,84.151V194.677z"/></svg></a>            
                </div>
                    </div>
            </div>
    </div>

    <script src="js/addquantity.js"></script>
</body>
</html>