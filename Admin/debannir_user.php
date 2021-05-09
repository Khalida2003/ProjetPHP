<?php
     require "verification.php";
    $username = $_GET["id"];

     #mettre l'utilisateur en etat normal ( enlever l'etat banni)

     $sql2 = "UPDATE client SET etat = 'normal' WHERE usernameClient = '$username' ";
     $result2 = mysqli_query($link,$sql2) or die(mysqli_error($link));
     header("location:listeclients.php");


?>