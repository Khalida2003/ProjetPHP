<?php
     require "verification.php";
    $username = $_GET["id"];
    #supprimer les commandes qui sont en panier de cet utilisateur
    $sql = "DELETE FROM commande WHERE usernameClient = '$username' AND statut = 'en panier' ";
    $result = mysqli_query($link,$sql) or die(mysqli_error($link));

    #mettre l'utilisateur en etat banni

    $sql2 = "UPDATE client SET etat = 'banni' WHERE usernameClient = '$username' ";
    $result2 = mysqli_query($link,$sql2) or die(mysqli_error($link));

    header("location:listeclients.php");

?>