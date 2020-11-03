<?php
	session_start();

if (isset($_SESSION['user'])) {
$email =$_SESSION['user'];	
}



require 'config.php';


$sql= $conn->prepare("SELECT u.Id_utilisateur FROM utilisateur u inner join cart c  WHERE u.email = ?");
 $sql->bind_param("s",$email);
            $sql->execute();
            $res = $sql->get_result();
            $r = $res->fetch_assoc();
if(isset($r)){
                $code = $r['Id_utilisateur'];

}

if($code){
    $_SESSION['code'] = $code;
}


   
       
       if(isset($_POST['pidd'])&& $pcode=$_POST['pidd']){
            
       
       //  echo $pcode;
       
       $pqty = 1;
       
        $sql=$conn->prepare("select produit from cart where produit = ? and Utilisateur = ? ");
            $sql->bind_param("ss",$pcode,$code);
            $sql->execute();
            $res = $sql->get_result();
            $r = $res->fetch_assoc();
            if (isset($r['produit'])){
                $id = $r['produit'];
            }
            
       
            
       if(!isset($id)){
           $query  = $conn->prepare("insert into cart(produit , Utilisateur ) Values (?,?)");
           $query->bind_param("ss",$pcode,$code);
           $query->execute();
           
            echo "
                    <div class='alert alert-success' >
     <strong>bien ajouter</strong>
     </div>
                    ";
       }else{
           
            echo "
                    <div class='alert alert-danger' >
     <strong>item deja ajouter au panier</strong>
     </div>
                    ";
       }
       
           
       }
       
   
if(isset($_GET['cartitem']) && isset($_GET['cartitem'])=='cart_item'){
    $stmt = $conn->prepare("select * from cart where Utilisateur = ?  ");
 $stmt->bind_param("s",$code);
    $stmt->execute();
    $stmt->store_result();
    $rows=$stmt->num_rows;
    
    echo $rows;
}

///////////////////////


if(isset($_GET['cartitems']) && isset($_GET['cartitems'])=='cart_items'){
    $stmt = $conn->prepare("select p.Id_produit,c.Quantite,p.nom_produit,p.Prix_produit,p.Image_Produiit from cart c INNER JOIN Produit p on c.Produit = p.Id_produit where Utilisateur = ? ");
 $stmt->bind_param("s",$code);
    $stmt->execute();
$stmt->bind_result($id_product,$Quantite, $nom_produit, $Prix_produit, $Image_Produit );
$output1='';
while ($stmt->fetch()) {
    if(empty($Quantite)){
        $Quantite=1;
        }
    
    $output1.= ' <div class="list-group-item">
      <div  class="wishlist-image">
    <img src="'.$Image_Produit.'" alt="" style="width:5em; height:6em;" />
                        </div>
          <div class="wishlist-content">
          <p>'.$nom_produit.'</p>
        <p>'.$Prix_produit.'DH'.'</p>
        <input type="number" style="float: right;
width: 42px;
height: 23px;
margin-bottom: 4px;
right: 65px;
position: relative;" value="'.$Quantite.'"min="1"/>
                        <a href="print.php?print_id='.$id_product.'&user_id='.$code.'&count='.$Quantite.'" class="bttn-small btn-fill">َprint</a>
                        
                        </div>
                      </li>
                                            
                    </ul>
				  	
        </div>
   ';
        }
    echo $output1;
            
   }
//else{
//        $output1 = "<p>no produit</p>";
//    }


    



 

?>