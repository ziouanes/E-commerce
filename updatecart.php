<?php
ob_start();
require 'config.php';
  session_start();

$email =$_SESSION['user'];


  $sql= $conn->prepare("SELECT u.Id_utilisateur FROM utilisateur u inner join cart c  WHERE u.email = ?");
 $sql->bind_param("s",$email);
            $sql->execute();
            $res = $sql->get_result();
            $r = $res->fetch_assoc();
if(isset($r)){
                $code = $r['Id_utilisateur'];

}


    
    if(isset($_POST['itemQty'])){
    $qty =$_POST['itemQty'];
    $pid =$_POST['pid'];
    $pprice =$_POST['pprice'];
    
    $stmt1 = $conn->prepare("update cart set Quantite = ?
    where Produit = ? and Utilisateur = ? ");
    $stmt1->bind_param("iii", $qty, $pid, $code);

    
    $tprice = $qty*$pprice;
    $stmt1->execute();
    if ($stmt1->error) {
      echo "FAILURE!!! " . $stmt1->error;
    }
    else{
        echo  $tprice."DH";
    }
    $stmt1->close();       
    } 
    else {header('Location: 404.php' );}

?>