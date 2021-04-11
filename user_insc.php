<?php/*
$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$login=$_POST['login'];
$password=$_POST['password'];*/
?>

<?php

try
{
    $bdd = new PDO('mysql:host = localhost ; dbname = lyk ; charset = utf8','root','');
}
catch(Exeception $e){ die ('Erreur:'.$e -> getMessage()); }
$userReq = $bdd -> prepare('INSERT INTO lyk(nom_user, prenom ,login,password)
                            VALUES (:nom_user , :prenom ,:login,:password)');
$userReq -> execute(array(
    'nom_user' => $_POST['nom']
    'prenom' => $_POST['prenom'],
    'login' => $_POST['login'],
    'password' => $_POST['password']

)) ;

?>                       
                          



