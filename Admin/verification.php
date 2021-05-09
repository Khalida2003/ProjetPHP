<?php
session_start();
$link = mysqli_connect("localhost","root","","lyk") or die(mysqli_connect_error());
if(!isset($_SESSION['usernameClient'])) header("location:../index.php");

$sql = "SELECT * FROM client WHERE usernameClient = '{$_SESSION['usernameClient']}'";
$result = mysqli_query($link,$sql) or die(mysqli_error($link));
$client = mysqli_fetch_assoc($result);
   if (  $client["typeClient"]=="user"){
         # si le type du client est user , il ne peut pas être dans la page admin :
    header("location:../index.php");
  }
  ?>