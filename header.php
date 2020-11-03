

<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
        
       
    <link rel="shortcut icon" href="images/icons8_t-shirt.ico" type="image/x-icon">
    <link rel="icon" href="images/icons8_t-shirt.ico" type="image/x-icon">

    <title><?php echo $pageTitle; ?></title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.css" rel="stylesheet">

    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/magnific-popup.css" rel="stylesheet">
    <link href="css/jquery-ui.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="styleprint.css">
    <link rel="stylesheet" type="text/css" href="css/styleprint.css">
    <link rel="stylesheet" type="text/css" href="css/fontprint.css">
    <link rel="stylesheet" type="text/css" href="css/customprint.css">


    <link href="css/animate.css" rel="stylesheet">
    <link href="css/owl.carousel.min.css" rel="stylesheet">
 <!-- cart css -->
    
    <link rel="shortcut icon" type="image/png" href="img/favicon.png">
        <!-- Place favicon.ico in the root directory -->
        <link rel="stylesheet" href="css/normalize.css">
		<!-- font stylesheet.css -->
        <link rel="stylesheet" href="fonts/stylesheet.css">
		<!-- owl.carousel.min.css -->
        <link rel="stylesheet" href="css/owl.carousel.min.css">
		<!-- font-awesome.min.css -->
        <link rel="stylesheet" href="css/font-awesome.min.css">
		<!-- magnific-popup.css -->
        <link rel="stylesheet" href="css/magnific-popup.css">
     <link rel="stylesheet" href="css/animate.css">
		<!-- slicknav.min.css -->
        <link rel="stylesheet" href="css/slicknav.min.css">
       <link rel="stylesheet" href="css/responsive.css">
    
    	<!-- Color Css Files Start -->
		<link href="css/switcher/switcher.css" rel="stylesheet">
		<link href="css/switcher/style-1.css" rel="stylesheet" id="colors">	
     <link rel="stylesheet" href="css/style.css">
		<!-- Color Css Files End -->
 <!-- cart css -->
    
    <!-- Main css -->
    <link href="css/main.css" rel="stylesheet">
         <!-- BootStrap -->

    <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/vendor/bootstrap.min.js"></script>

    
  <script src="js/vendor/jquery.min.js"></script>
        <!------ print ---------->

        <link href="css/spectrum.min.css" rel="stylesheet">

    <script src="js/vendor/spectrum.min.js"></script>
</head>
    
        <body>
    <!-- Preloader -->
	<div class="apreloader">
		
    </div><!-- /Preloader -->
            <!--Header Area-->
        		<header class="home2-header-area">
			<div class="header-top bg-2">
				<div class="container">
					<div class="row">
						<div class="col-md-8 col-lg-7 col-sm-9 col-xs-12">
  <?php 
     if (isset($_SESSION['user']))
     { ?>
		<div class='profile-wrap'>
								<ul>
									<li><a href='Acount Éditer.php'><i class='fa fa-user'></i>Mon espace</a></li>
									<li><a href='orders.php'><i class='fa fa-key'> </i> Mes Commandes</a></li>
									<li><a href='produit.php'><i class='fa fa-shopping-basket'></i>produit</a></li>
									
									<li><a href='logout.php' ><i class='fa fa-sign-out'></i>se déconnecter</a></li>
								</ul>
							</div>
						</div> 
 <?php 
	} else{
         ?>
         <div class='profile-wrap'>
								<ul>
									
									
									<li><a href='produit.php'><i class='fa fa-shopping-basket'></i>produit</a></li>
									
									<li><a href='Acount%20connecter.php' ><i class='fa fa-sign-in'></i>Se connecter</a></li>
								</ul>
							</div>
						</div> 
    <?php  }  ?>                    
                            
                            
							
                                
                             
						<div class="col-md-4 col-lg-5 col-sm-3 col-xs-12">
							<div class="header-bottom-right text-right">
									<ul>
                                
									
									<?php 
     if (isset($_SESSION['user']))
     { ?>
<li><a href="cart.php"><i class="fa fa-shopping-cart"></i> <span id="cart-item" ></span></a>
										<ul class="wishlist-wrap">
											
											
					<li class="wishlist" id="cart-items" >
					<div class="wishlist-image">
		<img src="img/product/small/3.png" alt="" />
												</div>
					<div class="wishlist-content">
					<p>T-shirt enfant</p>
													<p>200.00Dh</p>
                        <a href="produit.php" class="bttn-small btn-fill">َprint</a>
                        
												</div>
											</li>
                                            
										</ul>
									</li>

<?php 
	} else{
         ?>
<li><a href="#" data-toggle="modal" data-target="#LogInModal"><i class="fa fa-shopping-cart"></i> </a>
										<ul class="wishlist-wrap">
											
											
											<li class="wishlist">
											<div class="title">
	<h5 > please se connecter</h5>
										</div>
											</li>
										</ul>
									</li>

<?php 
	} 
         ?>  
									<li><a href="javascript:void(0);"><i class="fa fa-search"></i></a>
										<ul class="search">
											<li class="search-wrap">
												<form action="#">
													<input type="text" placeholder="rechercher.."/>
													<button><i class="fa fa-search"></i></button>
												</form>
											</li>
										</ul>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="header-muddil-area bg-1">
				<div class="container">
					<div class="row">
						<div class="col-md-3 col-sm-4 col-xs-12">
							<div class="logo">
                                <a href="http://localhost:8080/client/index.php">
							<img src="images/logo-2.png" class="d-inline-block align-top" alt="">
                                    </a>
							</div>
						</div>
						<div class="col-md-9 col-sm-8 col-xs-12">
							<div class="select-form">
                               
								<form action="#">
		<div class="as-track-button" data-size="large" data-domain="track.aftership.com"></div>
                                    
      <div id="as-root"></div><script>(function(e,t,n){var r,i=e.getElementsByTagName(t)[0];if(e.getElementById(n))return;r=e.createElement(t);r.id=n;r.src="https://button.aftership.com/all.js";i.parentNode.insertBefore(r,i)})(document,"script","aftership-jssdk")</script>
    
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
					</header>
       
        <!--/Header Area-->
<!-- ------- LOGIN ------- -->
<div class="modal fade" id="LogInModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
            </div>
            <div class="modal-body">
                
               <form id="form" action="login.php" method="POST">   
                    <!-- Form Title -->
                    <div class="form-heading text-center">
                        <div class="title">se connecter</div>
                                <p class="title-description">Vous n'avez pas de compte? <a href="#" data-toggle="modal" data-target="#RegistrationModal" data-dismiss="modal">Créer un compte.</a></p>
                        <!-- Social Line -->
                        <div class="social-line"> 
                           <a href="#"><i class="ff fa fa-facebook"></i></a> 
                            <a href="#"><i class="ff fa fa-google"></i></a> 
                            <a href="#"><i class="ff fa fa-twitter"></i></a> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <input type="text" 
                                name="email"   placeholder="Username" required /> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <input type="password" 
                                   name="pass"
                                   placeholder="Password" required /> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <input type="checkbox" />
                            <label>souviens-toi de moi</label>
                        </div>
                        <div class="col-md-5 col-md-offset-1">
                            <label><a href="#" data-toggle="modal" data-target="#ForgotModal" data-dismiss="modal">Informations de compte oubliées ?</a></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <button type="submit" name="submit" class="bttn-small btn-fill">Connexion</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- ------- LOGIN Ends ------- -->
<!-- ------- REGISTRATION ------- -->
<div class="modal fade" id="RegistrationModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
            </div>
            <div class="modal-body">
                <form>
                    <!-- Form Title -->
                    <div class="form-heading text-center">
                        <div class="title">Inscription</div>
                        <p class="title-description">Vous avez déjà un compte? <a href="#" data-toggle="modal" data-target="#LogInModal" data-dismiss="modal">se connecter.</a></p>
                        <!-- Social Line -->
                        <div class="social-line"> 
                            <a href="#"><i class="ff fa fa-facebook"></i></a> 
                            <a href="#"><i class="ff fa fa-google"></i></a> 
                            <a href="#"><i class="ff fa fa-twitter"></i></a> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <input type="text" placeholder="Prénom" /> 
                        </div>
                        <div class="col-md-6">
                            <input type="text" placeholder="Nom de famille" /> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <input type="text" placeholder="Nom d'utilisateur" /> 
                        </div>
                        <div class="col-md-6">
                            <input type="email" placeholder="Email Addresse" required /> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <input type="password" placeholder="Mot de passe" /> 
                        </div>
                        <div class="col-md-6">
                            <input type="password" placeholder="Re-mot de passe" /> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <input type="checkbox" />
                            <label>Acceptez-vous les <a href="#">Termes et conditions?</a></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <button class="bttn-small btn-fill">Créer un compte</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- ------- REGISTRATION Ends ------- -->
       <!-- ------- CONTACT FORM ------- -->
<div class="modal fade" id="ContactModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
        </div>
        <div class="modal-body">
            <form>
                <!-- Form Title -->
                <div class="form-heading text-center">
                    <div class="title">Contactez-nous </div>
                    <p class="title-description">Contactez-moi si vous avez besoin d'aide</p>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <input type="text" placeholder="Prénom" required /> 
                    </div>
                    <div class="col-md-6">
                        <input type="text" placeholder="Nom" required /> 
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <input type="text" placeholder="sujet" /> 
                    </div>
                    <div class="col-md-6">
                        <input type="email" placeholder="Email Addresse" required /> 
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <textarea placeholder="Ceci est une zone de texte limitée à 150 caractères." rows="3" maxlength="150"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <input type="checkbox" />
                        <label>Je ne suis pas un robot</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <button class="bttn-small btn-fill">Envoyer le message</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
<!-- ------- CONTACT FORM  Ends------- -->

<!-- ------- FORGOT FORM ------- -->
<div class="modal fade" id="ForgotModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">fermer</span></button>
            </div>
            <div class="modal-body">
<form action="" method="POST" role="form" class="p-3" id="reg-box">                    <!-- Form Title -->
    
                    <div class="form-heading text-center">
                        <div class="title">Retrouvez votre compte</div>
                        <p class="title-description">Veuillez saisir votre adresse e-mail pour rechercher votre compte.</p>
                    </div>
   
                    <div class="row">
                        <div class="col-md-12">
                            <input type="text" name="email" required placeholder="adresse e-mail" /> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <input type="submit" name="submit" id="verefication" value="envoier à email" class="bttn-small btn-fill" />
                        </div>
                    </div>
     <div class="text-center">
        <img src="images/Gear-0.5s-197px.gif" id="loader" width="100" style="display:none;" >
        <h5 class="text-center text-denger" id="msg"></h5>
    
    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- ------- FORGOT FORM ends ------- -->
    <!--Hero Area-->
    <!--Hero Area-->