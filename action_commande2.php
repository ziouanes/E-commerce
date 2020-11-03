<?php
	session_start();

if (isset($_SESSION['user'])) {
$email =$_SESSION['user'];
}require 'config.php';
	//include 'init.php';


$sql= $conn->prepare("SELECT u.Id_utilisateur FROM utilisateur u inner join cart c  WHERE u.email = ?");
 $sql->bind_param("s",$email);
            $sql->execute();
            $res = $sql->get_result();
            $r = $res->fetch_assoc();
if(isset($r)){
                $code = $r['Id_utilisateur'];

}





$sql = "SELECT c.Id_Commande,
c.Nome_Commande,
c.Date_Commande,
c.Total_prix_commande,
c.numero_suivi,
c.Etat_Commade,
d.quantite,
p.id_produit,
p.description_produit,
p.Image_Produiit,
t.Categorie_name
FROM commande c INNER JOIN detail_command d on c.Id_Commande=d.id_commande INNER JOIN produit p on p.Id_produit = d.id_produit INNER JOIN categorie t on t.Categorie_id = p.Categorie WHERE c.Utilisateur= '2' ";
if($result = mysqli_query($conn, $sql)){
    if(mysqli_num_rows($result) > 0){

        while($row = mysqli_fetch_array($result)){
       ?>
            <fieldset class="list-group-item" style="margin-top: 10px;padding: 0px">

                 <fieldset  style="margin-top: 3px;padding: 0px;border-bottom: 1px solid #DFDFDF;  ">
                     <div class="row">
                <div class="col-sm-2">
                     <p class="date"><?=$row['Date_Commande'] ;?></p>
                     </div>


                          <div class="col-sm-3"><p class="date">id :<a href="#">   <?=$row['Id_Commande'] ;?>  </a> </p>
                     </div>
                          <div class="col-sm-4"><p class="date">Numéro de suivi :<a><?=$row['numero_suivi'] ;?></a> </p>
                     </div>
                     <div class="col-sm-3">
            <?php
             if($row['Etat_Commade']=='pas_commander')
             {
               ?>
                <p class="date">   <?=$row['Etat_Commade'] ;?>  </p>
            <?php }
            if($row['Etat_Commade']=='commander'){

                ?>

                 <div style="">
      <a href="produit.php" class="order-again">annuler commande
</a>
          <?php  } ?>

                     </div>
                     </div>
                     </div>
                     </fieldset>

		<div class="row" style="border: 1px solid #e4e4e4 margin-top: 20px">
  <div class="col-sm-7">
      <ul>
      <li >

          <div  style="float: left;
    width: 100px;
    height: 100px;
    margin: 20px 13px 6px 18px;
    overflow: hidden;">
          <img  src="'.$Image_Produiit.'" alt="" />
          </div>

            <div>
                <div>
                <div ><a target="_blank" href="produit.php?produit='.$id_produit.'
" title="<?= $row['description_produit'];?>"><?= $row['description_produit'];?>></a></div>
                    <span style="position: absolute;

    right: 25px;
    font-size: 13px;
    color: #999;"><?= $row['quantite'].'X';?></span>
                </div>
         <div style="
    left: 131px;
    bottom: 20px;
    font-size: 13px;
    color: #999;">
    <?='categori:'.$row['Categorie_name'].' '.$row['Nome_Commande'];?>
                </div>
          </div>
            <div>

          </div>
          </li>
      </ul>
      </div>
  <div class="col-sm-2" style=" padding-top:  20px;
    padding-right: 10;
    text-align: center;"><p><?= $row['Total_prix_commande'].'X';?></p></div>
  <div class="col-sm-3" style="


    padding-top:  20px;
    padding-right: 10;
    text-align: center;


">
    <?php
  if($row['Etat_Commade']=='pas_commander'){

      ?>
      <div style="">
      <a href="produit.php" class="order-again">commander nouveau
</a>
      </div>
      <?php
  }
            elseif($row['Etat_Commade']=='livrer'){

        ?>
              <div style="">
      <a href="produit.php" class="order-again">commander nouveau
</a>
      </div>

      <div>
      <a  class="confirmer_order">commande livrer</a>
      </div>

      <?php
            }
          ?>




            </div>
</div>


           </fieldset>

          <?php

            }
        mysqli_free_result($result);

        }
    else{
        echo "No records matching your query were found.";



    }
}

?>






//
//  $stmt = $conn->prepare("SELECT c.Id_Commande,
//c.Nome_Commande,
//c.Date_Commande,
//c.Total_prix_commande,
//c.numero_suivi,
//c.Etat_Commade,
//d.quantite,
//p.id_produit,
//p.description_produit,
//p.Image_Produiit,
//t.Categorie_name
//FROM commande c INNER JOIN detail_command d on c.Id_Commande=d.id_commande INNER JOIN produit p on p.Id_produit = d.id_produit INNER JOIN categorie t on t.Categorie_id = p.Categorie WHERE c.Utilisateur= ? ");
// $stmt->bind_param("s",$code);
//    $stmt->execute();
// $result=$sql->get_result();
// $row=$result->fetch_array(MYSQLI_ASSOC);
//$Nome_Commande =$row['Nome_Commande'] ;
//$Date_Commande =$row['Date_Commande'] ;
//$Total_prix_commande =$row['Total_prix_commande'] ;
//$track =$row['numero_suivi'] ;
// $row['Etat_Commade']=$row['Etat_Commade'] ;
// $quantite=$row['quantite'] ;
// $id_produit=$row['id_produit'] ;
// $description_produit=$row['description_produit'] ;
// $Image_Produiit=$row['Image_Produiit'];
// $Categorie_name=$row['Categorie_name'];
//
//
//$output1='';
//while ($stmt->fetch()) {
//    if($row['Etat_Commade']=='pas_commande'){
//        echo $Nome_Commande;
//
////
////        $track ='';
//
//        }
//}
