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





include 'init.php';

//    }else{
//      header('Location:index.php');
//}






if(isset($_GET['commande']) && isset($_GET['user'])){
    $user=$_GET['user'];
    $commande=$_GET['commande'];
    
    }else{
     header('Location:error.php');
}
   
   $stmt = $conn->prepare("select d.Quantite, c.Id_Commande,
   p.description_produit,
   p.Image_Produiit,
   p.Prix_produit,
   p.nom_produit ,
   d.url_face,
   d.url_back,
   t.Taille_name,
   c.Total_prix_commande from commande c INNER JOIN detail_command d on c.Id_Commande=d.id_commande INNER JOIN produit p on p.Id_produit = d.id_produit INNER JOIN Taille t on t.Taille_id = p.Taille WHERE c.Utilisateur = ? AND c.Id_Commande =?");
     $stmt->bind_param("ii",$user,$commande);
    $stmt->execute();
    $stmt->bind_result($Quantite,$Id_Commande,$description,$Image_Produiit, $Prix_produit,$nom_produit,$url_face,$url_back,$Taille_name,$Total_prix_commande );
    $stmt->fetch();
    
    





  








?>

  <!--breadcrumb area-->
    <section class="breadcrumb-area yellow-light-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 centered">
                    <div class="banner-title">
                        <h2>Check-Out
</h2>
                    </div>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li>CheckOut</li>
                    </ul>
                </div>
            </div>
        </div>
    </section><!--/breadcrumb area-->
    
   	
		<!-- checkout-area start -->
	 <div class="container">
     

      <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
          <br>
          <ul class="list-group mb-3">
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                 <div class="border border-success"
                      style="float: left;
    width: 100px;
    height: 100px;
    margin: 10px 6px 12px;
    overflow: hidden;">
          <img src="<?= $Image_Produiit?>" alt="">
          </div>
                <h7 class="my-0"><?= $nom_produit?></h7>
                <small class="text-muted"><?= $description?>&nbsp&nbsp<?= $Taille_name?></small>
              
               <span style="
    
    font-size: 16px;
    color: #999;width: 50px;float: right;">X<?= $Quantite?></span>
               
                  </div>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">Prix produit</h6>
                
              </div>
              <span class="text-muted"><?=$Prix_produit?>DH</span>
            </li>
              <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">Sous-total</h6>
                
              </div>
              <span class="text-muted"><?=$Total_prix_commande?>DH</span>
            </li>
            <?php
    if($url_face !='0'){
    ?>
            <li class="list-group-item d-flex justify-content-between bg-light">
              <div class="text-success">
           
                <h6 class="my-0">imprimer recto</h6>
               
              </div>
              <span class="text-success">+20DH</span>
            </li>
              
          <?php } ?>  
        <?php       
        if($url_back !='0'){
    ?>      
              <li class="list-group-item d-flex justify-content-between bg-light">
              <div class="text-success">
                <h6 class="my-0">imprimer verso</h6>
               
              </div>
              <span class="text-success">+20DH</span>
            </li>
              
      <?php } ?>         
               <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">Livraison</h6>
                <small id="amana" class="text-muted"></small>
              </div>
              <span id="livre" class="text-muted"></span>
            </li>
            <li class="list-group-item d-flex justify-content-between">
              <span>Total (Mad)</span>
              <strong id="total"></strong>
            </li>
          </ul>

         
        </div>
        <div class="col-md-8 order-md-1">
          <h4 class="mb-3">Adresse de facturation</h4>
          <form action="succes.php" method="POST"  class="needs-validation" novalidate>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName">Prénom</label>
                <input type="text" class="form-control" id="firstName" name="Prénom" placeholder="" value="" required>
                 
                <div class="invalid-feedback">
                  Un prénom valide est requis.
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="lastName">Nom de famille</label>
                <input name="name" type="text" class="form-control" id="lastName" placeholder="" value="" required>
                <div class="invalid-feedback">
Un nom de famille valide est requis.                </div>
              </div>
            </div>

          

            <div class="mb-3">
              <label for="email">Email <span class="text-muted">(Optionnelle)</span></label>
              <input type="email" class="form-control" id="email" name="e1" value="<?=$email?>" placeholder="nom@example.com">
              <div class="invalid-feedback">
                Veuillez saisir une adresse e-mail valide pour les mises à jour d'expédition.
              </div>
            </div>

            <div class="mb-3">
              <label for="address">Addresse</label>
              <input type="text" name="adress" class="form-control" id="address" placeholder="1234 Syba " required>
              <div class="invalid-feedback">
                Prière d'indiquer ton adresse d'expédition.
              </div>
            </div>

            <div class="mb-3">
              <label for="address2">Addresse 2 <span class="text-muted">(Optionnelle)</span></label>
              <input name="adress2" type="text" class="form-control" id="address2" placeholder="Apartment ">
            </div>

            <div class="row">
              <div class="col-md-5 mb-3">
                <label id="ss" for="country">Pays</label>
                <select name="option_country" class="custom-select d-block w-100" id="country" required>
                  <option value="">Choisir...</option>
                  <option value="Morocco">Morocco</option>
                </select>
                <div class="invalid-feedback">
Please select a valid country                </div>
              </div>
              <div class="col-md-4 mb-3">
                <label for="state">Ville</label>
                <select name="option_city" class="custom-select d-block w-100" id="state" required>
                  <option value="">Choisir...</option>
                  <option value="Marrakech">marrakech</option>
                    <option>Asilah </option>
                    <option>Larache</option>
                    <option>Tinghir</option>
                    <option>Jadida</option>
                    <option>Chefchaouen </option>
                    <option>Tetouan</option>
                    <option>Casablanca</option>
                    <option>Tangier</option>
                    <option>Agadir</option>
                    <option>Essaouira </option>
                </select>
                <div class="invalid-feedback">
Veuillez fournir un état valide.                </div>
              </div>
              <div class="col-md-3 mb-3">
                <label for="zip">Zip</label>
                <input name="zip" type="text" class="form-control" id="zip" placeholder="" required>
                <div class="invalid-feedback">
Code postal requis                </div>
              </div>
            </div>
            <hr class="mb-4">
            <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" id="same-address">
              <label class="custom-control-label" for="same-address">L'adresse de livraison est la même que mon adresse de facturation</label>
            </div>
            <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" id="save-info">
              <label class="custom-control-label" for="save-info">Enregistrez ces informations pour la prochaine fois</label>
            </div>
            <hr class="mb-4">

            <h4 class="mb-3">Paiement</h4>

           
          <div class="nav bg-light nav-pills rounded nav-fill mb-3" role="tablist">
	
		           
   <button type="submit" name="vailder" value="passer commande" class="bttn-small btn-fill btn-lg btn-block" >
		<i class="fa fa-check">VALIDER LA COMMANDE</i></button>
	<button type="submit" class="btn btn-primary btn-lg btn-block" >
		<i class="fa fa-paypal"></i>  PAYPAL</button>
              
  
          
	
</div>
                  
     
      
            
          </form>
        </div>
      </div>

     
    </div>
	<!-- checkout-area end -->
		
<!-- ------- PAYMENT FORM ------- -->
<div class="modal fade" id="PaymentModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
            </div>
            <div class="modal-body">
                <form>
                    <!-- Form Title -->
                    <div class="form-heading text-center">
                        <h3 class="title">paiement</h3>
                        <p class="title-description">Veuillez fournir la facturation&amp; informations de paiement ci-dessous</p>
                    </div>
                    <div class="row">
                        <div class="col-md-12"> 
                         
                             <i class="fa fa-cc fa-3x" aria-hidden="true">
                            &nbsp;</i><i class="fa fa-cc-mastercard fa-3x" aria-hidden="true">
                            &nbsp;</i>
                             <i class="fa fa-cc-visa fa-3x" aria-hidden="true">&nbsp;</i>
                            <i class="fa fa-truck fa-3x" aria-hidden="true">
                            &nbsp;</i>
                             <i class="fa fa-paper-plane fa-3x" aria-hidden="true">
                            &nbsp;</i>
                        <br /> <br /></div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <input type="text" required placeholder="Card Holder's Name" /> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <input type="text" placeholder="Card Number" /> 
                        </div>
                        <div class="col-md-4">
                            <select class="form-control">
                                <option disabled="" selected="">type de cart</option>
                                <option value="MasterCard"> MasterCard</option>
                                <option value="Visa"> Visa</option>
                               
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <select class="form-control">
                                <option disabled="" selected="">moi</option>
                                <option value="1"> 1 </option>
                                <option value="2"> 2 </option>
                                <option value="3"> 3 </option>
                                <option value="4"> 4 </option>
                                <option value="5"> 5 </option>
                                <option value="6"> 6 </option>
                                <option value="7"> 7 </option>
                                <option value="8"> 8 </option>
                                <option value="9"> 9 </option>
                                <option value="10"> 10 </option>
                                <option value="11"> 11 </option>
                                <option value="12"> 12 </option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <select class="form-control">
                                <option disabled="" selected="">Anneé</option>
                                <option value="2017"> 2017 </option>
                                <option value="2018"> 2018 </option>
                                <option value="2019"> 2019 </option>
                                <option value="2020"> 2020 </option>
                                <option value="2021"> 2021 </option>
                                <option value="2022"> 2022 </option>
                                <option value="2023"> 2023 </option>
                                <option value="2024"> 2024 </option>
                                <option value="2025"> 2025 </option>
                                <option value="2026"> 2026 </option>
                                <option value="2027"> 2027 </option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <input type="text" placeholder="CCV" /> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <input type="checkbox" />
                            <label>Acceptez-vous les <a href="#">Conditions et conditions?</a></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <button class="bttn-small btn-fill">Passer la commande</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- ------- PAYMENT FORM Ends ------- -->
   


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
    </footer>


      <?php
   include 'footer.php';
?>  
        
      <script>
$("#pay").click(function(){
     $("#PaymentModal").modal();
  
    
});


</script>  
  <script>
      
    
      
      // Example starter JavaScript for disabling form submissions if there are invalid fields
   (function() {
        'use strict';

        window.addEventListener('load', function() {
          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          var forms = document.getElementsByClassName('needs-validation');

          // Loop over them and prevent submission
          var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
              if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
      })();
    </script>

<script>
    
 var php_var = <?=$Total_prix_commande?> ;

  $('[name="option_city"]').change(function() {
       if ($('[name="option_city"]').val() == "Marrakech") {
           
        var livre = "10DH";
       var total =  10+  php_var;
         $('#livre').html(livre);
            $('#total').html(total+"HD");
            $('#amana').html("livraison local");
           
           
           
           }else{
              var livre = "40DH";
       var total =  40+  php_var;
           
         $('#livre').html(livre);
         $('#total').html(total+"DH"); 
          $('#amana').html("Amana maroc");
               
           }
      
     
    //$("#text-muted").val(php_var);
});

</script>

<script>
	paypal.Button.render({
    // Configure environment
    env: 'sb-0lgoh1832267@personal.example.com
',
    client: {
      sandbox: 'AUWaYpTNTecYX4Npc-gVaC6Qmz_s79h27iaRQIk7F1Ii5-sSHR_bRg-1qdt0rqcCs9MCiD8t7vf6zmJU'
    },
    // Set up a payment
    payment: function(data, actions) {
      return actions.payment.create({
        transactions: [{
          amount: {
            total: '0.01',
            currency: 'USD'
          }
        }]
      });
    },
    // Execute the payment
    onAuthorize: function(data, actions) {
      return actions.payment.execute().then(function() {
    	  document.getElementById("response").style.display = 'inline-block';
        document.getElementById("response").innerHTML = 'Thank you for making the payment!';
      });
    }
  }, '#paypal-button'); 

</script>
</body>

<!-- Mirrored from brotherslab.thesoftking.com/html/reptap/index-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 03 Mar 2020 13:09:45 GMT -->
</html>