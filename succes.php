<?php

ob_start();
session_start();
$pageTitle = 'check out';
if (!isset($_SESSION['user'])) {
  header('Location:index.php');
}
$email = $_SESSION['user'];

require 'config.php';

$sql= $conn->prepare("SELECT u.Id_utilisateur FROM utilisateur u inner join commande c  WHERE u.email = ?");
 $sql->bind_param("s",$email);
            $sql->execute();
            $res = $sql->get_result();
            $r = $res->fetch_assoc();
if(isset($r)){
    
    $id = $r['Id_utilisateur'];
    
}






if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    
    

 if (isset($_POST['vailder'])) {
     
     
       
   $stmt3 = $conn->prepare("SELECT Id_Commande FROM commande where Utilisateur = ? ORDER BY Id_Commande DESC LIMIT 1");
    if($stmt3->bind_param("i",$id)){
      $stmt3->execute();
      $stmt3->bind_result($Commandefin);
      $stmt3->fetch();
    }else{
      $error = $conn->errno . ' ' . $conn->error; 
      echo $error; 
    }     
        

   $stmt3->close(); 
     

  
   
  
   $prenom=$_POST['Prénom'];
   $name=$_POST['name'];
   $adress=$_POST['adress'];
   $adress2=$_POST['adress2'];
   $country=$_POST['option_country'];
   $city=$_POST['option_city'];
   $zip=$_POST['zip'];
   
     
   
 }
 
 

 $res = $adress.' '.$adress2;
 

 $stmt1 = $conn->prepare("update utilisateur set nom_utilisateur = ? , prénom_utilisateur = ? , adresse_utilisateur =? , Ville_utilisateur = ? , city_user = ? , zipcode = ? where Id_utilisateur = ? ");
 $stmt1->bind_param("ssssssi",$prenom,$name, $res,$country,$city,$zip,$id);
 
 if ( $stmt1->execute()) {
}


$stmt1->close();




  $etat = 'complet';
  $stmt2 = $conn->prepare("update commande set Etat_commade = ? , Total_prix_commande = ?  where Id_Commande = ?   ");
  $stmt2->bind_param("ssi",$etat,$Total_prix_commande,$Commandefin);
  $stmt2->execute();
  
  if ( $stmt2->execute()) {
  
   
  }
    else{
             header('Location:error.php');

    }
    
    
    
}else{
         header('Location:error.php');

}


?>



<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Sucess</title>
  <link rel="stylesheet" href="./style.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

</head>
<body>
<!-- partial:index.partial.html -->
<div id="container">
  <div id="success-box">
    <div class="dot"></div>
    <div class="dot two"></div>
    <div class="face">
      <div class="eye"></div>
      <div class="eye right"></div>
      <div class="mouth happy"></div>
    </div>
    <div class="shadow scale"></div>
    <div class="message"><h1 class="alert">Commande valide!</h1><p>Nous vous recontacterons plus tard.</p></div>
    <a href="orders.php"><button class="button-box"><h1 class="green"> Mes Commandes</h1></button></a>
  </div>
  
</div>

<footer>
  
</footer>
<!-- partial -->
  
</body>
</html>
