<?php
ob_start();

  session_start();



require 'config.php';
if(isset($_GET["user_id"])&& isset($_GET['id_commande'])){
  $id=$_GET['id_commande'];
  $user=$_GET['user_id'];
  $stmt = $conn->prepare("update commande set Etat_Commade='livrer' where Id_Commande = ? and Utilisateur =   ? ");
  $stmt->bind_param("ii",$id,$user);
  $stmt->execute();
  $url = 'orders.php';
}
 else{
  $url = '404.php';
}
ob_end_clean();

header('Location: '.$url );