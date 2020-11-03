<?php
	ob_start();
	session_start();
	$pageTitle = 'panier';
if (!isset($_SESSION['user'])) {
		header('Location:index.php');
	}

$email =$_SESSION['user'];

	include 'init.php';
?>
  <!--breadcrumb area-->
    <section class="breadcrumb-area yellow-light-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 centered">
                    <div class="banner-title">
                        <h2>Panier</h2>
                    </div>
                    <ul>
                        <li><a href="index.html">Acceuil</a></li>
                        <li>Panier</li>
                    </ul>
                </div>
            </div>
        </div>
    </section><!--/breadcrumb area-->
    
   	
		<!-- cart-area start -->
		<div  class="cart-area ptb-100 bg-4">
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						
						<div class="table-responsive mb-40">
							<table  class="table unresponsive">
								<thead>
									<tr>
										<th>supprimer</th>
										<th>Image</th>
										<th>Produit </th>
										<th>PRIX</th>
										<th>QUANTITÉ</th>
                                        <th>STATUT </th>
										<th>TOTAL</th>
                                        <th>PRINT </th>
									</tr>
								</thead>
								<tbody>
       
                            
                                    
               <?php                require 'config.php'; 
  $sql= $conn->prepare("SELECT u.Id_utilisateur FROM utilisateur u inner join cart c  WHERE u.email = ?");
 $sql->bind_param("s",$email);
            $sql->execute();
            $res = $sql->get_result();
            $r = $res->fetch_assoc();
if(isset($r)){
                $code = $r['Id_utilisateur'];

}
                                    
                                 
            
                    $stmt=$conn->prepare("select p.Id_produit,c.Quantite,p.nom_produit,p.Prix_produit,p.Image_Produiit from cart c INNER JOIN Produit p on c.Produit = p.Id_produit where Utilisateur = ? ");
                                     $stmt->bind_param("s",$code);
    $stmt->execute();
$stmt->bind_result($id_product, $Quantite, $nom_produit, $Prix_produit, $Image_Produit );
$output1='';
                
                

while ($stmt->fetch()) {
    if(empty($Quantite)){
        $Quantite=1;
        }
    
      
        
    
                                    
        $output1.='                              
                                
									<tr>
	<td><a class="trash" href="removeaction.php?remove='.$id_product.'&user_id='.$code.'"><i class="fa fa-trash fa-3x"></i></a>
    <input type="hidden" class="pid" value="'.$id_product.'"></td>
	<td><img src="'.$Image_Produit.'" alt="" /></td>
	<td><h4>'.$nom_produit.'</h4></td>
	<td><span>'.$Prix_produit.'DH'.'</span><input type="hidden" class="pprice" value="'.$Prix_produit.'">  </td>
	<td><input type="number" class="itemQty"  value="'.$Quantite.'" min="1"/></td>
     <td><span class="stok">En Stock</span></td>
	<td><span class="total'.$id_product.'"></span></td>
      <td><a href="print.php?print_id='.$id_product.'&user_id='.$code.'&count='.$Quantite.'" class="bttn-small btn-fill">print</a></td>
									</tr>
									
							<?php 
                ';            
    
    
                }
                             echo $output1;        ?>		
									
								
								</tbody>
							</table>
							<div class="cart-btn text-right">
								<ul>
									<li><a href="index.php">Accueil</a></li>
									<li><a href="produit.php">CONTINUER VOS ACHATS </a></li>
								</ul>
							</div>
						</div>
						
					</div>
				</div>
			</div>
		</div>
		<!-- cart-area end -->
		


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
