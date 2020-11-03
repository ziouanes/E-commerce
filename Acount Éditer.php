<?php
	ob_start();
	session_start();
	$pageTitle = 'account Editer';
if (!isset($_SESSION['user'])) {
		header('Location:index.php');
	}

	include 'init.php';

?>
 <!--breadcrumb area-->
    <section class="breadcrumb-area yellow-light-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 centered">
                    <div class="banner-title">
                        <h2>Mon Espace</h2>
                    </div>
                    <ul>
                        <li><a href="index.html">Acceuil</a></li>
                        <li>editer Acount</li>
                    </ul>
                </div>
            </div>
        </div>
    </section><!--/breadcrumb area-->
    <!--/account area-->
        <div class="container">
        
   		<div class="row">

                <aside id="column-left" class="col-sm-3 hidden-xs">
    <div class="box">
        <br>
  <div class="sidebar-title">Account</div>
 <div class="list-group">
   
 <a href="#" class="list-group-item">Mes Commandes </a>
   
  <a href="orders.php" class="list-group-item">Edit Account</a> <a href="Acount%20change%20pass.php" class="list-group-item">Password</a>
   
    <a href="orders.php" class="list-group-item">Order Historie </a> <a href="#" class="list-group-item">Transactions </a> 
   
  <a href="logout.php" class="list-group-item">se déconnecter </a>
   
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
					<a class="list-group-item" data-toggle="modal" data-target="#ContactModal">Contact  </a>
	</div>
</div>
  </aside>
            
            
            <div id="content" class="col-sm-9">
                <br>
                <br>
                  <fieldset>
          <div class="form-group required">
           <ul class="list-unstyled">
        <div class="mb-3">
           <li> <a href="Acount%20edit%20information.php"> Modifier les informations de votre compte </a> </li> </div>
                <div class = "mb-3">
                    <li> <a href="Acount%20change%20pass.php"> Modifiez votre mot de passe </a> </li> </div>
                <div class = "mb-3">
                    <li> <a href="#"> Modifiez les entrées de votre carnet d'adresses </a> </li> </div>
                
                    <li> <a href="#"> Modifiez votre liste de souhaits </a> </li>
      </ul>
                      </div>
                      </fieldset>
                                 
                     
     
      </div>
    </div>     </div>
         
      


        
        
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
        
  