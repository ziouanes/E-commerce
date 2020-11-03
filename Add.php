<?php 
session_start();
include 'init.php';
if(isset($_SESSION['ID'])){
    header('Location:lblasa fin bitih imchi ila makantch 3ndo session');


}

if($_SERVER['REQUEST_METHOD']=='POST'){
    $username=$_POST['email'];
    $password=$_POST['pass'];
    $stmt = $con->prepare("SELECT Id_utilisateur,nom_utilisateur,prénom_utilisateur FROM utilisateur WHERE adresse_utilisateur=? AND password_utilisateur=? AND Rol=2 ");
	$stmt->execute(array($username,$password));
	$row=$stmt->fetch();
    $count=$stmt->rowCount();
    
    if($count>0)
    {
		$_SESSION['Username']=$username;
		$_SESSION['ID']=$row['Id_utilisateur'];

        echo'asi khona rak smeytek '.$_SESSION['Username'] .'o id dialk'.$_SESSION['ID'];
    }


}

?>