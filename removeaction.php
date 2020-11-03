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



if(isset($_GET['remove']) && isset($_GET['user_id'])){
   $id=$_GET['remove'];
    $user=$_GET['user_id'];
    
    $stmt = $conn->prepare("delete from  cart where Produit = ? and Utilisateur = ? ");
     $stmt->bind_param("ii",$id,$user);
    $stmt->execute();
    
    header('Location: ' . $_SERVER['HTTP_REFERER']);  
}

    else {header('Location: 404.php' );}

?>