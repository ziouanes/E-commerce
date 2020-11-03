

<?php
	ob_start();
	session_start();
	$pageTitle = 'Mes commaneds';
if (!isset($_SESSION['user'])) {
		header('Location:index.php');
	}
require 'config.php';
	include 'init.php';

$email=$_SESSION['user'];
$sql= $conn->prepare("SELECT u.Id_utilisateur FROM utilisateur u inner join Commande c  WHERE u.email = ?");
 $sql->bind_param("s",$email);
            $sql->execute();
            $res = $sql->get_result();
            $r = $res->fetch_assoc();
if(isset($r)){
                $code = $r['Id_utilisateur'];
echo $code;
}


?>
 

<!--breadcrumb area-->
    <section class="breadcrumb-area yellow-light-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 centered">
                    <div class="banner-title">
                        <h2>Mes commandes</h2>
                    </div>
                    <ul>
                        <li><a href="index.php">Accueil</a></li>
                        
                        <li>commandes</li>
                    </ul>
                </div>
            </div>
        </div>
    </section><!--/breadcrumb area-->
    <!--/account area-->
        <div class="container" style="min-height: 1000px;"  >
        
   		<div class="row">
                <aside id="column-left" class="col-sm-3 hidden-xs">
        
    <div class="box boxwidth">
  <div class="sidebar-title">Ordres</div>
 <div class="list-group">
     
   
 
   
  <a href="orders.html" class="list-group-item">Tous les ordres</a> <a href="orders.html" class="list-group-item">En attente de paiement ( 0 )</a>
   
  <a href="orders.html" class="list-group-item">En attente d' expédition ( 0 ) </a> <a href="orders.html " class="list-group-item">En attente de livraison ( 2 )  </a> <a href="orders.html " class="list-group-item">Les différends ( 0 )  </a> <a href="orders.html" class="list-group-item">Messages non lus de commande ( 1 ) </a><a href="orders.html" class="list-group-item">Adresse de livraison </a> 
  <a href="orders.html" class="list-group-item">Logout </a>
   
</div>
</div>
<br>
    <div class="box">
  <div class="sidebar-title">Information</div>
	<div class="list-group">
				<a class="list-group-item"> À propos de nous </a>
<a class="list-group-item"> Informations de livraison </a>
<a class="list-group-item"> Politique de confidentialité </a>
<a class="list-group-item"> Conditions d'utilisation &amp; Conditions </a>
					<a class="list-group-item">Contact  </a>
	</div>
</div>
                  
  </aside>
            
       <div id="content" class="col-sm-9">
      
     <br>
            <br>
                     <h4>orders</h4>

       
            <div class="container"  >
        	<div class="row row-no-gutters" >
              
  <div class="col-sm-7" style="padding: 15px;
    background-color: #b6a2c1 ;
    border: 1px solid #D8D8D8;">Product</div>
  <div class="col-sm-2" style="padding: 15px;
    background-color: #b6a2c1;
    border: 1px solid #D8D8D8;">Montant</div>
  <div class="col-sm-3" style="padding: 15px;
    background-color: #b6a2c1;
    border: 1px solid #D8D8D8;">Etat order</div>
<br>
                
               
               
                
        <br>
                <br>
                 
  
               
 <?php
                



$sql = "SELECT c.Id_Commande,
c.Nome_Commande,
c.Date_Commande,
c.Total_prix_commande,
c.Etat_Commade,
c.numero_suivi,
d.quantite,
p.id_produit,
p.description_produit,
p.Image_Produiit,
t.Categorie_name FROM commande c INNER JOIN detail_command d on c.Id_Commande=d.id_commande INNER JOIN produit p on p.Id_produit = d.id_produit INNER JOIN categorie t on t.Categorie_id = p.Categorie  WHERE c.Utilisateur=  '2' ";
if($result = mysqli_query($conn, $sql)){
    if(mysqli_num_rows($result) > 0){

        while($row = mysqli_fetch_array($result)){
       ?>
                
        <br>
        <br>
        <br>        
            <fieldset class="list-group-item" style="margin-top: 10px;padding: 0px;width: 800px; ">

                 <fieldset  style="margin-top: 3px;padding: 0px;border-bottom: 1px solid #DFDFDF;  ">
                     <div class="row">
                <div class="col-sm-2">
                     <p class="date"><?=$row['Date_Commande'] ;?></p>
                     </div>


                          <div class="col-sm-2"><p class="date">id :<a href="#">   <?=$row['Id_Commande'] ;?>  </a> </p>
                <input type="hidden" value="'.<?=$row['Id_Commande'] ;?>.'">              
                     </div>
                          <div class="col-sm-5"><p class="date">Numéro de suivi :<a class="track"><?=$row['numero_suivi'] ;?></a> </p>
                     </div>
                     <div class="col-sm-3">
            <?php
             if($row['Etat_Commade']=='pas_commande')
             {
               ?>
                <p class="date">   <?=$row['Etat_Commade'] ;?>  </p>
            <?php }
            if($row['Etat_Commade']=='complet'){

                ?>

                 <div style="">
      <a href="produit.php" class="order-button">despute
</a>
                     </div>
          <?php  } 
                     
              ?>       
                     
                     
          <?php if($row['Etat_Commade']=='livrer'){
                  
            ?>      

                

                 <div style="">
      <a href="produit.php" class="order-button">commander nouveau
</a>             
          </div>           
                     
        <?php   }
            
               ?>      
                    
                     
                     

                     
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
          <img  src="<?=$row['Image_Produiit'] ;?>" alt="" />
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
    text-align: center;"><p><?= $row['Total_prix_commande'].'Dh';?></p></div>
  <div class="col-sm-3" style="


    padding-top:  20px;
    padding-right: 10;
    text-align: center;


">
    <?php
  if($row['Etat_Commade']=='pas_commande'){

      ?>
      <div style="">
      <a href="produit.php" class="order-again">commander nouveau
</a>
      </div>
       <div style="">
      <a href="produit.php" class="confirmer_order">continue shopping
</a>
      </div>
      <?php
  }
            if($row['Etat_Commade']=='livrer'){

        ?>
              
      
     

      <div>
      <a  class="confirmer_order">commande livrer</a>
      </div>

      <?php
            }
            
         if($row['Etat_Commade']=='complet'){
    
          ?>

 <div>
      <a href="action_commande.php?id_commande=<?=$row['Id_Commande'] ;?>&user_id=<?=$r['Id_utilisateur'];?>"   class="confirmer_order">Confermer livrer</a>
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
                
        
                
            
         </div>  
                  
                </div>
           
            </div>
            </div>
        </div>
        


        
        
    <!--/account area-->


    <!--Footer Area-->
   <footer class="footer-area section-padding-2 yellow-light-bg">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                    <div class="frelated-product-item clear">
                        <h3>À propos de nous</h3>
                        <p>l'outil incontournable pour quiconque vend des produits personnalisés
service client très efficace 
et bon produit </p>
                        <br>
                        <div class="médias sociaux">
                            <h3>À propos de nous</h3>
                            <a href="#" class="cl-facebook"><i class="ff fa fa-facebook"></i></a>
                            <a href="#" class="cl-twitter"><i class="ff fa fa-twitter"></i></a>
                            <a href="#" class="cl-whatsapp"><i class="ff fa fa-google"></i></a>
                            <a href="#" class="cl-pinterest"><i class="ff fa fa-whatsapp"></i></a>
                        </div>
                        <br>
                       
                    </div>
                </div>
                <div class="col-xl-5 col-lg-5 col-md-6 col-sm-6">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                            <div class="footer-widget footer-nav">
                                <h3>Regular Links
</h3>
                                <ul>
                                    <li><a href="index.html">Acceuil</a></li>
                                    <li><a href="#">À propos de nous</a></li>
                                    <li><a href="orders.html"> produits</a></li>
                                    <li><a href="Acount%20%C3%89diter.html">MON ESPACE</a></li>
                                    <li><a href="#" data-toggle="modal" data-target="#ContactModal" >contact </a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                            <div class="footer-widget footer-nav">
                                <h3>Essentiel</h3>
                                <ul>
                                    <li><a href="orders.html"> MES COMMANDES</a></li>
                                    <li><a href="Cart.html">PANIER</a></li>
                                    <li><a href="#" data-toggle="modal" data-target="#LogInModal">Se connecter</a></li>
                                    
                                    <li><a href="check-out.html">check-out </a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                    <div class="footer-widget footer-insta portfolio-gallery">
                       <div class="social">
                            <h3>méthodes payement</h3>
                            <i class="fa fa-cc fa-3x" aria-hidden="true">
                            &nbsp;</i><i class="fa fa-cc-mastercard fa-3x" aria-hidden="true">
                            &nbsp;</i>
                             <i class="fa fa-cc-visa fa-3x" aria-hidden="true">&nbsp;</i>
                            
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer><!--/Footer Area-->

 <?php
   include 'footer.php';
?>
        