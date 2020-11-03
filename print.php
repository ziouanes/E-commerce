<?php
    ob_start();
	session_start();
	$pageTitle = 'print';
if (!isset($_SESSION['user'])) {
		header('Location:index.php');
	}
	include 'init.php';

require 'config.php';


if(isset($_GET['print_id']) && isset($_GET['user_id'])&&
  isset($_GET['count'])){
   $printid=$_GET['print_id'];
    $user=$_GET['user_id'];
    $count=$_GET['count'];
    
    }


    
     $stmt = $conn->prepare("select c.Quantite,p.Image_Produiit,p.Prix_produit,p.nom_produit from cart c inner join Produit p on c.Produit = p.Id_produit where Produit = ? and Utilisateur = ?");
     $stmt->bind_param("ii",$printid,$user);
    $stmt->execute();
    $stmt->bind_result($Quantite,$Image_Produit ,$Prix_produit, $nom_produit );
    $stmt->fetch(); 
        
    $stmt->close();


$image1='false';
$image2='false';





if(isset($_POST['commander'])){
    
if(isset($_FILES['image'])){
$fille=$_FILES['image'];
$filname = $_FILES['image']['name'];
$filtmpname = $_FILES['image']['tmp_name'];
$filsizename = $_FILES['image']['size'];
$fileType = $_FILES['image']['type'];
$fileExt = explode('.', $filname);
$fileActualExt=strtolower(end($fileExt));
$allowed=array('jpg','jpeg','png','pdf');
 if(in_array($fileActualExt,$allowed))
{
  $fileNameNew=uniqid('',true).".".$fileActualExt;
  $fileDestination='printpicture/'.$fileNameNew;
  move_uploaded_file($filtmpname,$fileDestination);
}
     if(isset($fileNameNew)){
         $ffinale='printpicture/'.$fileNameNew;
         $image1='true';
     }
    
    

  
 }
   
    if(isset($_FILES['image2'])){
  $fille2=$_FILES['image2'];
$filname2 = $_FILES['image2']['name'];
$filtmpname2 = $_FILES['image2']['tmp_name'];
$filsizename2 = $_FILES['image2']['size'];
$fileType2 = $_FILES['image2']['type'];
$fileExt2 = explode('.', $filname2);
$fileActualExt2=strtolower(end($fileExt2));
$allowed2=array('jpg','jpeg','png','pdf');
 if(in_array($fileActualExt2,$allowed2))
{
  $fileNameNew2=uniqid('',true).".".$fileActualExt2;
  $fileDestination2='printpicture/'.$fileNameNew2;
  move_uploaded_file($filtmpname2,$fileDestination2);      
         
    }
        if(isset($fileNameNew2)){
           $ffinale2='printpicture/'.$fileNameNew2; 
            $image2=true;
        }
        
        

            
        
    
        

      
}
    if(($image1=='false') && ($image2=='false')){
                    $ffinale=0;
                    $ffinale2=0;
            $total_Prix_produit=$Prix_produit * $Quantite  ;
               

    }
        
        if(($image1=='false')&& ($image2=='true')){
            $ffinale=0;
            $total_Prix_produit=($Prix_produit + 20)*$Quantite;
        }
        if(($image2=='false') && ($image1=='true')){
            $ffinale2=0;
            $total_Prix_produit=($Prix_produit + 20)*$Quantite;
        }
        if(($image1=='true') && ($image2=='true')){
            $total_Prix_produit=($Prix_produit + 40)*$Quantite;
        }
        
      $date = date("Y-m-d"); 
     $etat='pas_commande';
        
    $sql=("
    insert into Commande(Nome_Commande, Date_Commande,Utilisateur,Etat_Commade,Total_prix_commande) 
    VALUES('$nom_produit','$date','$user','$etat','$total_Prix_produit')");
   $con->query($sql);
        
    
///////////////////:
        
   $stmt1 = $conn->prepare("SELECT Id_Commande FROM commande where Utilisateur = ? ORDER BY Id_Commande DESC LIMIT 1");
    if($stmt1->bind_param("i",$user)){
      $stmt1->execute();
      $stmt1->bind_result($id_Commande);
      $stmt1->fetch();
    }else{
      $error = $conn->errno . ' ' . $conn->error; 
      echo $error; 
    }     
        

   $stmt1->close();
        
 ////////////////////
  
        
 

    $stmt2=("
insert into detail_command(id_commande, id_produit, quantite,url_face,url_back)

VALUES('$id_Commande','$printid','$count','$ffinale','$ffinale2')");

                $con->query($stmt2);

        
       


        
        header('Location:check-out.php?user='.$user.'&commande='.$id_Commande.'');
    
      
    
    
}
    


?>
  <!--breadcrumb area-->
    <section class="breadcrumb-area yellow-light-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 centered">
                    <div class="banner-title">
                        <h2>Print</h2>
                    </div>
                    <ul>
                        <li><a href="index.php">Accueil</a></li>
                        <li><a href="cart.php">Panier</a></li>
                        <li>Print</li>
                    </ul>
                </div>
            </div>
        </div>
    </section><!--/breadcrumb area-->
    <!--/account area-->
         <form action="" method="POST" enctype="multipart/form-data">
        <div class="container">
        
   		   <div class="row">
               
               <aside id="column-left" class="col-sm-3 hidden-xs">
    <div class="box">
  
 <div class="list-group">
   
  
   
</div>
</div>
<br>
    <div class="box">
          <div class="box-heading"><h3 class="sidebar-title">Interface produit <i class="fab fa-rev pull-right"></i></h3></div>

        <div class="list-group">
            <ul>
        <div class="list-group-item" >
       <li >
				  <a class="front_btn" ><i class="fas fa-tshirt pull-right" aria-hidden="true"></i><span>Front</span></a>
				</li>
        </div>
                <div class="list-group-item" >
       <li>
				 <a class="back_btn" ><i class="fas fa-tshirt pull-right" aria-hidden="true"></i><span>Back</span></a>
				</li>
        </div>
            </ul>  
        </div>
  <div class="box-heading"><h3 class="sidebar-title"> Information <i class="fab fa-rev pull-right"></i></h3></div>
        
        <div class="list-group">
            <ul>
        <div class="list-group-item" >
       <li>
				  <a  data-toggle="modal" data-target="#previewModal"><i class="fa fa-eye pull-right" aria-hidden="true"></i><span>Aperçu</span></a>
				</li>
        </div>
                <div class="list-group-item" >
       <li>
				 <a class="reset_btn" ><i class="fa fa-refresh pull-right" aria-hidden="true"></i><span>Réinitialiser</span></a>
				</li>
        </div>
            </ul>  
        </div>
          <div class="box-heading"><h3 class="sidebar-title">Éditer<i class="fab fa-rev pull-right"></i></h3></div>

	<div class="list-group">
        <ul>
        <div class="list-group-item" >
            
            <li>
           <span>quantity : </span>
				  	<input type="number" class="itemQty" value="<?=$count?>" min="1" style="width: 53px;height: 26px;">
                </li>
                
      
        </div>
        
			<div class="list-group-item" >
        <li class="add_text">
					<a class="open_window">
						<i class="fa fa-text-width pull-right" aria-hidden="true"></i>
						<span>Ajouter un texte</span>
					</a>
					<div class="text_tool_window">
						<div class="header clear_fix">
							<p class="title"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Éditer le texte</p>
							<i id="close_window" class="fa fa-window-close" aria-hidden="true"></i>
						</div>
						<textarea id="text_area"> Bonjour
						</textarea>
						<br>
						<div class="wrapper clear_fix">
					        <div class="font_area">
					        	<p>Choisissez une police</p>
				        		<select id="text_font">

				        			<!-- all fonts -->
									<option>arial</option>
									<option>tahoma</option>
									<option>times new roman</option>
									<option>anton</option>
									<option>Akronim</option>
									<option>Alex Brush</option>
									<option>Aguafina Script</option>
						        </select>
					        </div>
					        
						</div>
                        <div class="color_area">
					        	<p>Couleur du texte</p>
					        	<!-- colour -->
						        <input type="text" id="text_colour" />
							</div>
				        <div class="font_style">
				        	<p>Text style</p>
			        		<select id="text_style">

			        			<!-- font style -->
								<option>normal</option>
								<option>italic</option>
								<option>oblique</option>
								<option>bold</option>
					        </select>
				        </div>
				        <div class="font_size">
				        	<!-- font size -->
				        	<p>Font Size :</p> <input type="range"  min="0" max="100" value="30" id="text_size" /><br>
				        </div>
					</div>
				</li>
        </div>
           
        <div class="list-group-item image1" >
        <li>
				  	<a  data-toggle="modal" data-target="#imgUploadModal"><i class="fa fa-picture-o pull-right" aria-hidden="true"></i><span>Ajouter une image recto</span></a>
				</li>
        </div>
            
             <div class="list-group-item image2 " style="display:none" >
        <li>
				  	<a  data-toggle="modal" data-target="#imgUploadModal2"><i class="fa fa-picture-o pull-right" aria-hidden="true"></i><span>Ajouter une image verso</span></a>
				</li>
        </div>
        
        <div class="list-group-item" >
        <li>
					<a  class="export_btn" data-toggle="modal" data-target="#previewModal"><i class="fa fa-arrow-up pull-right" aria-hidden="true"></i><span>exporter</span></a>
<!--				  	 <a href="#" data-toggle="modal" data-target="#previewModal"><i class="fa fa-arrow-up" aria-hidden="true"></i><span>Export</span></a> -->
				</li>
        </div>		
            <br>
              <div class="box-heading"><h3 class="sidebar-title">Produits associés <i class="fab fa-rev pull-right"></i></h3></div>
			<div class="list-group-item">
								
								<div class="related-product-sidebar">
									<div class="related-product-item clear">
										<div class="related-product-img">
											<img src="img/related/1.jpg" alt="" />
										</div>
										<div class="related-product-content">
											<a href="orders.html">
T-SHIRT FEMME</a>
											<div class="ratting">
												<ul>
													<li><i class="fa fa-star"></i></li>
													<li><i class="fa fa-star"></i></li>
													<li><i class="fa fa-star"></i></li>
													<li><i class="fa fa-star"></i></li>
													<li><i class="fa fa-star"></i></li>
												</ul>
											</div>
											<p>$30.00</p>
										</div>
									</div>
									<div class="related-product-item clear">
										<div class="related-product-img">
											<img src="img/related/2.jpg" alt="" />
										</div>
										<div class="related-product-content">
											<a href="orders.html">T-SHIRT HOMME</a>
											<div class="ratting">
												<ul>
													<li><i class="fa fa-star"></i></li>
													<li><i class="fa fa-star"></i></li>
													<li><i class="fa fa-star"></i></li>
													<li><i class="fa fa-star"></i></li>
													<li><i class="fa fa-star-o"></i></li>
												</ul>
											</div>
											<p>$30.00</p>
										</div>
									</div>
									<div class="related-product-item clear">
										<div class="related-product-img">
											<img src="img/related/3.jpg" alt="" />
										</div>
										<div class="related-product-content">
											<a href="orders.html">T-SHIRT ENFANT</a>
											<div class="ratting">
												<ul>
													<li><i class="fa fa-star"></i></li>
													<li><i class="fa fa-star"></i></li>
													<li><i class="fa fa-star"></i></li>
													<li><i class="fa fa-star"></i></li>
													<li><i class="fa fa-star"></i></li>
												</ul>
											</div>
											<p>$30.00</p>
										</div>
									</div>
								</div>
							</div>
		
		</ul>
	</div>
</div>
  </aside>

                <div id="content" class="col-sm-9">
      <div class="row">
       
                                    <div class="hero-shade">

          <div class="design_area">

             
			<div class="canvas_area_front">
				<canvas id="front_canvas" width="192" height="302"></canvas>
	        </div>
	        <div class="canvas_area_back">
				<canvas id="back_canvas" width="192" height="302"></canvas>
	        </div>
		</div>
                     </div>
          	<div class="cart-btn text-right">
								<ul>
                                    <li><input  type="submit" name="commander" value="check-out" class="confirmer_order" ></li>
									
									
								</ul>
               
							</div>
          
          <div class="cart-btn text-left" style="padding-left: 530px;">
           <ul>
                <li><div class="bttn-small btn-fill"  href="index.php">Accueil</div></li>
                </ul>
          
          </div>
                    </div>
                    
                    
                    <!--<========================================
			right help area
		=========================================-->
		<div class="help_area">

			<!-- help popup window -->
			<div class="help_window_wrapper">
				<div class="help_window">
					<div class="header clear_fix">
						<p class="title"><i class="fa fa-question-circle" aria-hidden="true"></i> Aidez-moi</p>
						<i id="close_help_window" class="fa fa-window-close" aria-hidden="true"></i>
					</div>

					<p><i class="fa fa-leaf" aria-hidden="true"></i> <span>Choisissez un produit </span> - Utilisez ce bouton pour sélectionner votre produit.</p>

					<p><i class="fa fa-text-width" aria-hidden="true"></i> <span>Ajouter du texte </span> - Utilisez ce bouton pour ajouter un texte.</p>

					<p><i class="fa fa-pencil-square-o" aria-hidden="true"></i> <span>Modifier le texte </span> - Cliquez sur le texte et modifiez votre texte à partir de la fenêtre contextuelle</p>

					<p><i class="fa fa-picture-o" aria-hidden="true"></i> <span>Ajouter une image </span> - Utilisez ce bouton pour ajouter une image.</p>

					<p><i class="fa fa-arrow-up" aria-hidden="true"></i> <span>Exporter </span> - Cliquez sur ce bouton, une fenêtre contextuelle apparaîtra avec des boutons de téléchargement </p>

					<p><i class="fa fa-trash-o" aria-hidden="true"></i> <span>Supprimer </span> - Cliquez sur le <i class="fa fa-trash-o" aria-hidden="true"></i> icône pour supprimer un élément</p>
					
				</div>
			</div>
			<a class="open_help_window" href="#">
				<i class="fa fa-question-circle" aria-hidden="true"></i>
				<p>Help</p>
			</a>
		</div>
        
        
		<!-- ========== End right help area =================== -->
                   <!--========================================
			front-back button section
		=========================================-->
		
		<!-- ========== End front-back button section =================== -->
      </div>
               
    </div>
        </div>

        
		<!--========================================
			product modal
		=========================================-->
		<div class="modal" id="productModal" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Des produits</h4>
					</div>
					<div class="modal-body ">
					</div>
					<div class="modal-footer">
					    <button type="button" class="btn btn-default" data-dismiss="modal">fermer</button>
					</div>
				</div>
			</div>
		</div>
		<!-- ========== End product modal =================== -->

        	<!-- =====	Image1 Upload Modal
		=========================================-->
			<div class="modal fade" id="imgUploadModal" role="dialog">
			<div class="modal-dialog modal-lg">

				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">ajouter une image</h4>
					</div>
					<div class="modal-body">
						<input name="image"
                               type="file" id="imgfile">
					</div>
					<div class="modal-footer">

						<button type="button" class="btn btn-default btn_add_image" name="button">Télécharger</button>

					    <button type="button" class="btn btn-default" data-dismiss="modal">fermer</button>
					</div>
				</div>
			</div>
        </div>
        <div class="modal fade" id="imgUploadModal2" role="dialog">
			<div class="modal-dialog modal-lg">

				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">ajouter une image</h4>
					</div>
					<div class="modal-body">
						<input 
                               name="image2"
                               type="file" id="imgfile2">
					</div>
					<div class="modal-footer">

						<button type="button" class="btn btn-default btn_add_image2" name="button">Télécharger</button>

					    <button type="button" class="btn btn-default" data-dismiss="modal">fermer</button>
					</div>
				</div>
			</div>
		</div>
</form>
		<!-- ========== End Image Upload Modal 
		<!-- =====preview image modal
		=========================================-->
		<div class="modal fade" id="previewModal" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Aperçu</h4>
					</div>
					<div class="modal-body clear_fix">
						<div id="front_preview">
							<div class="canvas_wrapper">
								<canvas id="previewcanvasfront" width="500" height="500"></canvas>
							</div>
							<a href="#" class="download" download="YourFileName.jpg"><i class="fa fa-download" aria-hidden="true"></i><span>Téléchargement  recto</span></a>
						</div>
			            <div id="back_preview">
			            	<div class="canvas_wrapper">
				            	<canvas id="previewcanvasback" width="500" height="500"></canvas>
			            	</div>
				            <a href="#" class="download_back" download="YourFileName.jpg"><i class="fa fa-download" aria-hidden="true"></i><span>Télécharger verso</span></a>
			            </div>
					</div>
					<div class="modal-footer">
					    <button type="button" class="btn btn-default" data-dismiss="modal">fermer</button>
					</div>
				</div>
			</div>
		</div>
		<!-- ========== End preview image modal =================== -->

        
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
                                    
                                    <li>
                                        <a href="check-out.html">check-out </a>
                                    </li>
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
<!--<script type="text/javascript" src="js/previews.js"></script>-->



<script>


"use strict";


$(function(){

	// front canvas
	var frontCanvas = new fabric.Canvas('front_canvas');
	
	// back canvas
	var backCanvas = new fabric.Canvas('back_canvas');

	// front canvas in preview modal
	var previewCanvasFront = new fabric.Canvas('previewcanvasfront');
	
	// back canvas in preview modal
	var previewCanvasBack = new fabric.Canvas('previewcanvasback');

	// by default t-shirt front side is shown
	var frontFace = true;

	var allProducts, proIdOfSelectedPro ;

	var productsJson = '{"products":[' +
	'{"productId": 1,"productName":"dus","frontImgUrl":"<?=$Image_Produit?>","backImgUrl":"<?=$Image_Produit?>" }]}';	

	var allProducts = JSON.parse(productsJson);
	var proIdOfSelectedPro = allProducts.products[0].productId;

    $('.design_area').css('background-image','url('+allProducts.products[0].frontImgUrl+')');
    $('.design_area').css({"background-repeat":" no-repeat","background-position":"center"});
	
	// productUrl: the server (file) location
	/*var productUrl = "/json/product.json";

	loadProduct(productUrl, perseProductJson);

	// request to get the products
	function loadProduct(url, givenFunction) {
		var xhttp;
		xhttp = new XMLHttpRequest();
		
		xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				givenFunction(this.responseText);			
			}
		};

		xhttp.open("GET", url, true);
		
		xhttp.send(null);
	}

	// perse product json
	function perseProductJson(xhttp){
		allProducts = JSON.parse(xhttp);

		// set first id as default
		proIdOfSelectedPro = allProducts.products[0].productId;
		setProductModel(allProducts.products);
	}*/
	
	setProductModel(allProducts.products);

	frontCanvas.on({
		'object:selected':onObjectSelected,
		'selection:cleared':onSelectedCleared,
		'object:modified':onObjectModified
    });

    backCanvas.on({
		'object:selected':onObjectSelected,
		'selection:cleared':onSelectedCleared,
		'object:modified':onObjectModified
    });

	function onObjectSelected(e) {
		var selectedObject = e.target;
        if (selectedObject && selectedObject.type != 'image') {
			$('.text_tool_window').addClass("show");
        }

        addDeleteBtn(e.target.oCoords.mt.x, e.target.oCoords.mt.y, e.target.width);
	}

	function onSelectedCleared(e){
		$('.text_tool_window').removeClass("show");
		$(".deleteBtn").remove();
	}

	function onObjectModified(e){
		addDeleteBtn(e.target.oCoords.mt.x, e.target.oCoords.mt.y, e.target.width);
	}





	// get the product which is selected by user
	function getSelectedProduct(productId){
		var productObj = allProducts.products.filter(function ( obj ) {
		    return obj.productId === productId;
		})[0];

		return productObj;
	}


	// show all products into product modal
	function setProductModel(givenProducts) {
		for (var i = 0; i < givenProducts.length; i++) {
			$(".product_area").append('<div class="product_details" ><img src="'+givenProducts[i].frontImgUrl+'"data-myval="'+givenProducts[i].productId+'"><p >'+givenProducts[i].productName+'</p></div>');			
		}

		$(".product_details img").on("click", function(event){
		    
		    $("[data-dismiss=modal]").trigger({ type: "click" });

		    proIdOfSelectedPro = parseInt($(this).attr("data-myval"), 10);

		    var proObj = getSelectedProduct(proIdOfSelectedPro);

		    console.log(proObj.frontImgUrl);

			$('.design_area').css('background-image','url('+proObj.frontImgUrl+')');
		});

		$(".front_btn").trigger({ type: "click" });
	}

	$(".open_window, #close_window").on( "click", function() {
		var text_tool_window = $('.text_tool_window');
		text_tool_window.toggleClass('show');
	});

	$(".open_help_window, #close_help_window").on( "click", function() {
		var help_window = $('.help_window');
		help_window.toggleClass('show');
	});

	// front button click listener
	$(".front_btn").on( "click", function() {
		frontFace = true;
		var proObj = getSelectedProduct(proIdOfSelectedPro);
		$(".image2").hide();
		$(".image1").show();

		
		$('.design_area').css('background-image','url('+proObj.frontImgUrl+')');
		$('.canvas_area_front').css('display','block');
		$('.canvas_area_back').css('display','none');
	});

	// back button click listener
	$(".back_btn").on( "click", function() {
		frontFace = false;
		var proObj = getSelectedProduct(proIdOfSelectedPro);
		$(".image1").hide();
		$(".image2").show();
		
		$('.design_area').css('background-image','url('+proObj.backImgUrl+')');
		$('.canvas_area_front').css('display','none');
		$('.canvas_area_back').css('display','block');
	});
	

	// text area keyup listener
	$("#text_area").on( "keyup", function() {

		if(frontFace){
			var obj = frontCanvas.getActiveObject();
			if(obj){
				obj.setText(this.value);
				frontCanvas.renderAll();
			}
		}
		
		else{
			var obj = backCanvas.getActiveObject();
			if(obj){
				obj.setText(this.value);
				backCanvas.renderAll();
			}
		}
	});

	$(".open_window").on( "click", function() {
		
		// add text into canvas
		var oText = new fabric.IText('Hello', {
			left: 50,
			top: 100
		});
		
		if(frontFace){
			frontCanvas.add(oText);
			frontCanvas.setActiveObject(oText);
		}
		
		else{
			backCanvas.add(oText);
			backCanvas.setActiveObject(oText);
		}
		$('#text_font, #text_colour, #text_style, #text_size').trigger('change');
		oText.bringToFront();
	});


	// font change listener
	$('#text_font').on("change", function(){
	    if(frontFace){
	      var obj = frontCanvas.getActiveObject();
	    }
	    else{
	      var obj = backCanvas.getActiveObject();
	    }
	    if(obj){
	      obj.setFontFamily($(this).val());
	    }
	    frontCanvas.renderAll();
	    backCanvas.renderAll();
	});

	// adding spectrum color picker
	$("#text_colour").spectrum({
	    color: "#333",
	    change: function(color) {
		    if(frontFace){
		      var obj = frontCanvas.getActiveObject();
		    }
		    else{
		      var obj = backCanvas.getActiveObject();
		    }
		    if(obj){
		      obj.setFill(color.toHexString());
		    }
		    frontCanvas.renderAll();
		    backCanvas.renderAll();
		}
	});

	// text style change listener
	$('#text_style').on("change", function(){
	    if(frontFace){
	      var obj = frontCanvas.getActiveObject();
	    }
	    else{
	      var obj = backCanvas.getActiveObject();
	    }
	    if(obj){
	      obj.setFontStyle($(this).val());
	    }
	    frontCanvas.renderAll();
	    backCanvas.renderAll();
	});

	// font size change listener
	$('#text_size').on("change", function(){
		
		if(frontFace){
	      var obj = frontCanvas.getActiveObject();
	    }
	    else{
	      var obj = backCanvas.getActiveObject();
	    }
	    
	    if(obj){
	      obj.setFontSize($(this).val());
	    }

	    frontCanvas.renderAll();
	    backCanvas.renderAll();

	});

	var file;
	$('#imgfile').on("change", function(e){

		file = e.target.files[0];
	
	});
	var file2;
	$('#imgfile2').on("change", function(e){

		file2 = e.target.files[0];
	
	});

	$(".btn_add_image2").on( "click", function() {

		$("[data-dismiss=modal]").trigger({ type: "click" });
		

		// add image into canvas
		var reader2 = new FileReader();

		reader2.onload = function (f) {
		
			var data = f.target.result;
			
			fabric.Image.fromURL(data, function (img2) {
			
				var oImg2 = img2.set({left: 20, top: 100, width: 150, height: 150, angle: 0}).scale(0.9);
				
				
			
				
				    backCanvas.add(oImg2).renderAll();
				    backCanvas.setActiveObject(oImg2);
				
			});
		};
		reader2.readAsDataURL(file2);
	});
	$(".btn_add_image").on( "click", function() {

		$("[data-dismiss=modal]").trigger({ type: "click" });
		

		// add image into canvas
		var reader = new FileReader();

		reader.onload = function (f) {
		
			var data = f.target.result;
			
			fabric.Image.fromURL(data, function (img) {
			
				var oImg = img.set({left: 20, top: 100, width: 150, height: 150, angle: 0}).scale(0.9);
				
				
					frontCanvas.add(oImg).renderAll();
					frontCanvas.setActiveObject(oImg);
				
				
				   
				
			});
		};
		reader.readAsDataURL(file);
	});


	// converts a canvas to an image
	function convertCanvasToImage(can) {
		var image = new Image();
		image.src = can.toDataURL("image/png");
		return image;
	}

	
	// setting the preview modal
	function setPreviewCanvas(){

		var proObj = getSelectedProduct(proIdOfSelectedPro);

		var frontImgUrl = proObj.frontImgUrl;
		var backImgUrl = proObj.backImgUrl;

		previewCanvasFront.clear();
		previewCanvasBack.clear();

		// setting background image to a canvas
		previewCanvasFront.setBackgroundImage(frontImgUrl, previewCanvasFront.renderAll.bind(previewCanvasFront), {
			width: previewCanvasFront.width,
			height: previewCanvasFront.height,
			// Needed to position backgroundImage at 0/0
			originX: 'left',
			originY: 'top'
		});

		previewCanvasBack.setBackgroundImage(backImgUrl, previewCanvasBack.renderAll.bind(previewCanvasBack), {
			width: previewCanvasBack.width,
			height: previewCanvasBack.height,
			// Needed to position backgroundImage at 0/0
			originX: 'left',
			originY: 'top'
		});

		var frontImg = convertCanvasToImage(frontCanvas);
		var backImg = convertCanvasToImage(backCanvas);

		
		frontImg.onload=function(){

			var imgInstanceFront = new fabric.Image(frontImg, {
				left: 155,
				top: 95,
				selectable:false
			});

			previewCanvasFront.add(imgInstanceFront);
			previewCanvasFront.renderAll();
		};

		backImg.onload=function(){

			var imgInstanceBack = new fabric.Image(backImg, {
				left: 155,
				top: 95,
				selectable:false
			});

			previewCanvasBack.add(imgInstanceBack);
			previewCanvasBack.renderAll();

		};
	}


	// preview button click listener
	$(".preview_btn").on("click", function(){

		setPreviewCanvas();
		
		$("#previewModal .modal-title").text("Preview");
		$('#previewModal a').css('display','none');
		$('.download_back').css('display','none');

	});


	// export button click listener
	$(".export_btn").on("click", function(){

		setPreviewCanvas();
		
		$("#previewModal .modal-title").text("Export");
		$('#previewModal a').css('display','inline-block');
		$('.download_back').css('display','inline-block');

	});

	// download front button click listener
	$(".download").on("click", function(){

		$("[data-dismiss=modal]").trigger({ type: "click" });
		var dt = previewCanvasFront.toDataURL('image/jpg');
	    this.href = dt;

	});

	// download back button click listener
	$(".download_back").on("click", function(){

		$("[data-dismiss=modal]").trigger({ type: "click" });
		var dt = previewCanvasBack.toDataURL('image/jpg');
	    this.href = dt;

	});

	
	// add deleteIcon to an element
	function addDeleteBtn(x, y, w){

		$(".deleteBtn").remove(); 
		var btnLeft = x;
		var btnTop = y - 10;
		var widthadjust=w/2;
		btnLeft=widthadjust+btnLeft-10;
		
		var deleteBtn = '<i class="fa fa-trash-o deleteBtn" aria-hidden="true" style="position:absolute;top:'+btnTop+'px;left:'+btnLeft+'px;cursor:pointer;"></i>';

		$(".canvas_area_front").append(deleteBtn);
		$(".canvas_area_back").append(deleteBtn);
		// delete icon click listener	
		$(".deleteBtn").on( "click", function() {
			
			if(frontCanvas.getActiveGroup()){
				frontCanvas.getActiveGroup().forEachObject(function(o){ frontCanvas.remove(o); });
				frontCanvas.discardActiveGroup().renderAll();
			}

			else {

				frontCanvas.remove(frontCanvas.getActiveObject());
			}

			if(backCanvas.getActiveGroup()){
				backCanvas.getActiveGroup().forEachObject(function(o){ backCanvas.remove(o); });
				backCanvas.discardActiveGroup().renderAll();
			}

			else {

				backCanvas.remove(backCanvas.getActiveObject());
			}

			$(".deleteBtn").remove(); 

		});
	}


	// reset button click listener
	$(".reset_btn").on( "click", function() {
			
		if(frontFace)
			frontCanvas.clear();
		
		else
			backCanvas.clear();

	});

});













</script>