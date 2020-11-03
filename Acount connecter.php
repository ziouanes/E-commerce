<?php
	ob_start();

	session_start();
	$pageTitle = 'Login';
	if (isset($_SESSION['user'])) {
		header('Location:index.php');
	}
	include 'init.php';

 //Check If User Coming From HTTP Post Request

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		
		if (isset($_POST['login'])) {

			$user = $_POST['email'];
			$pass = $_POST['password'];
//			$hashedPass = sha1($pass);
            
           
//
			// Check If The User Exist In Database

			$stmt = $con->prepare("SELECT 
										email, password_utilisateur 
									FROM 
										utilisateur 
									WHERE 
										email = ? 
									AND 
										password_utilisateur = ?
                                    AND
                                        Rol = 2");

			$stmt->execute(array($user,$pass));

			$get = $stmt->fetch();

			$count = $stmt->rowCount();

			// If Count > 0 This Mean The Database Contain Record About This Username

			if ($count > 0) {

                
				$_SESSION['user'] = $user; // Register Session Name

			

 header('Location: ' . $_SERVER['HTTP_REFERER']);
// Redirect To Dashboard Page

				exit();
			
        }
      }
}
?>

  <!--breadcrumb area-->
    <section class="breadcrumb-area yellow-light-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 centered">
                    <div class="banner-title">
                        <h2>Account</h2>
                    </div>
                    <ul>
                        <li><a href="#">Acceuil</a></li>
                        <li><a href="Acount%20%C3%89diter.html">Account</a></li>
                        <li>se connecter</li>
                    </ul>
                </div>
            </div>
        </div>
    </section><!--/breadcrumb area-->
    <!--/account area-->
        <div class="container">
        
   		   <div class="row"><aside id="column-left" class="col-sm-3 hidden-xs">

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
      <div class="row">
        <div class="col-sm-6">
          <div class="well">
           <h3> Nouveau client </h3>
            <p> <strong> Enregistrer un compte </strong> </p>
            <p> En créant un compte, vous pourrez faire des achats plus rapidement, être à jour sur le statut d'une commande et garder une trace des commandes que vous avez déjà passées. </p>
            <a href="Acount%20-%20inscription.php" class="bttn-small btn-fill">Continue</a></div>
        </div>
        <div class="col-sm-6">
          <div class="well">
            <h3>Returning Customer</h3>
            <p><strong>I am a returning customer</strong></p>
              	<!-- Start Login Form -->

           <form class="login" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
              <div class="form-group">
                <label class="control-label" for="input-email">E-Mail Addresse</label>
                <input type="text" name="email" value="" placeholder="E-Mail Address" id="input-email" class="form-control" />
              </div>
              <div class="form-group">
                <label class="control-label" for="input-password">mot de pass</label>
                <input type="password" name="password" value="" placeholder="Password" id="input-password" class="form-control" />
               <a href="#" data-toggle="modal" data-target="#ForgotModal" data-dismiss="modal">Informations de compte oubliées ?</a></div>
              <input type="submit" value="Login" name="login"   class="bttn-small btn-fill" />
                            <input type="hidden" name="redirect" value="#" />
                          </form>
          </div>
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
	include  'footer.php';
?>