<?php
$login = $_POST['login'];
$password = $_POST['password'];
?>
<?php

try
{
	$bdd = new PDO('mysql:host=localhost;dbname=lyk;charset=utf8', 'root', '',array( PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
$verification = $bdd -> prepare('SELECT login,password FROM user WHERE login=? AND password=?');
$verification -> execute(array($login,$password));
if($resultat=$verification->fetch()){echo "yes";}
else{echo "no";}


?>