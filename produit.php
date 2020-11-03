

<?php
	ob_start();
	session_start();
	$pageTitle = 'Produit';
	include 'init.php';
?>
  <!--breadcrumb area-->
    <section class="breadcrumb-area yellow-light-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 centered">
                    <div class="banner-title">
                        <h2>Offrir des produits</h2>
                    </div>
                    <ul>
                        <li><a href="index.html">Accueil</a></li>
                        <li>Produit</li>
                    </ul>
                </div>
            </div>
        </div>
    </section><!--/breadcrumb area-->
    
    <!--Product area-->
   
<!--/product Area orange-->
            
         <!-- shop-area start -->
		<div class="shop-area ptb-100 bg-4 shop-sidebar-area">
			<div class="container"   >
				<div class="row">
					<div class="col-lg-9 col-md-8 col-xs-12">
						<div class="row mb-40">
							<div class="col-md-5 col-lg-6 col-sm-6 col-xs-12">
								<h3 class="shop-title">Affichage 1-12 de 64 résultats</h3>
							</div>
                            
                            
							<div class="col-md-7 col-lg-6 col-sm-6 col-xs-12">
								
								<div class="shop-menu">
                                    
									<ul class="nav">
										<li class="nav-item"><a id="filtershow" href="#grid" class="nav-link active" data-toggle="tab"><i class="fa fa-th "></i></a></li>
										<li class="nav-item"><a id="filterhide" href="#list" class="nav-link" data-toggle="tab"  ><i class="fa fa-list"></i></a></li>
									</ul>
								</div>
							</div>
						</div>
                      <div class="col-lg-12 offest-lg-4" id="message" style="display:none;">
                   
                    </div>    
						<div class="row">
							<div class="col-xs-12">
								<div class="tab-content">
									<div class="tab-pane fade show active" id="grid">
										<div class="row" id="result">
                                            
                                          <?php
                         $sql="select * from  produit";
                              $result=$con->query($sql);
                            while($row=$result->fetch()){
                                        ?> 
                                    <input type="hidden"  class="pid" value="<?= $row['Id_produit'];?>">          
                 
	<div class="col-xs-12 col-lg-4 col-md-6 col-sm-6">
                            
					<div class="product-wrap mb-30">
                                                  
							<div class="product-img">
								<a href="#">
	<img class="primary" src="<?= $row['Image_Produiit'];?>" alt="">
	<img class="secondary" src="<?= $row['Image_Produiit'];?>" alt="">
									</a>
                               
						<div class="product-icon">
															<ul>
                                                                
<!--        /////-->
          <?php 
     if (isset($_SESSION['user']))
     { ?>                                                      
								<li>
                                 <form action="" class="form-submit">
                           
								<a class="addItemBtn"  >
<i class="fa fa-shopping-cart"></i>
<span>Add to Cart</span>
                                     <input type="hidden"  class="pid" value="<?= $row['Id_produit'];?>">  
								</a>
                 
                        </form>            
								</li>
								<li>
				<a>
				<i class="fa fa-shopping-bag"></i>
				<span>print</span>
				</a>
				</li>
<!--    /////-->
        <?php 
	} else{
         ?>
                                                                
        <li>
                                    
								<a href="#" data-toggle="modal" data-target="#LogInModal"  >
<i class="fa fa-shopping-cart"></i>
<span>Add to Cart</span>
								</a>
                 
                                    
								</li>
								<li>
				<a href="#" data-toggle="modal" data-target="#LogInModal">
				<i  class="fa fa-shopping-bag" ></i>
				<span>print</span>
				</a>
				</li> 
            
             <?php  }  ?>                                                       
<!--    ///////                                                            -->
                                                                
				<li>
				<a href="#">
				<i class="fa fa-compress"></i>
				<span>Compare</span>
				</a>
				</li>
											</ul>
														</div>
                                   
					<span class="sale">remise</span>
													</div>
		<div class="product-content text-center">
<a href="product-details.html"><?= $row['nom_produit'];?></a>
								<div class="ratting">
															<ul>
				<li><i class="fa fa-star"></i></li>
			<li><i class="fa fa-star"></i></li>
			<li><i class="fa fa-star"></i></li>
				<li><i class="fa fa-star"></i></li>
				<li><i class="fa fa-star"></i></li>
															</ul>
														</div>
 	<span><?= $row['Prix_produit'].'DH';?></span>
	
													</div>
                                              
											
                                                </div>
        
<!--
        <div class="card-footer p-1">
            <form action="" class="form-submit">
                <input type="hidden" class="pid" value="<?= $row['id'].'DH';?>">
                 <input type="hidden" class="pname" value="<?= $row['nom_produit'].'DH';?>">
                 <input type="hidden" class="pimage" value="<?= $row['Image_Produiit'].'DH';?>">
                 <input type="hidden" class="pcode" value="<?= $row['Prix_produit'].'DH';?>">
            
            
            
            
            </form>
        
        
        </div>
-->
                                                    
											</div>
                                     
 <?php } ?> 
										</div>
										<div class="row">
                                            
                                            
											<div class="col-xs-12">
												<div class="pagination-wrap">
													<ul>
														<li><a href="#"><i class="fa fa-angle-left"></i></a></li>
														<li class="active"><a href="#">1</a></li>
														<li><a href="#">2</a></li>
														<li><a href="#">3</a></li>
														<li><a href="#"><i class="fa fa-angle-right"></i></a></li>
													</ul>
												</div>
											</div>
										</div>
									</div>
									<div class="tab-pane fade" id="list">
										<div class="shop-list-area">
											<div class="row">
    <?php
                         $sql="select * from  produit";
                              $result=$con->query($sql);
                            while($row=$result->fetch()){
                                        ?>                                             
												<div class="col-xs-12">
	<div class="product-wrap shop-list-wrap mb-30">							<div class="shop-list-img">
		<img src="<?= $row['Image_Produiit'];?>" alt="" />
						</div>
					<div class="shop-list-content">
				<h3><?= $row['nom_produit'];?></h3>
							<div class="ratting">
								<ul>
				<li><i class="fa fa-star"></i></li>
				<li><i class="fa fa-star"></i></li>
				<li><i class="fa fa-star"></i></li>
				<li><i class="fa fa-star"></i></li>
				<li><i class="far fa-star" aria-hidden="true"></i></li>
										</ul>
								</div>												<div class="price">
<span><?= $row['Prix_produit'];?></span>																									</div>												<div class="stock">
								<strong>Aveilable</strong>
					<span>In Stock</span>
								</div>
<p><?= $row['description_produit'];?></p>										<div class="product-action">
								<ul>
<li><a id="addItemBtn1" class="" ><i class="fa fa-shopping-cart "></i> Add To Cart</a></li>
<li><a href="print.php?id=<?=$row['id']?>"><i class="fa fa-shopping-bag"></i> print</a></li>
<li><a href="#"><i class="fa fa-compress"></i></a></li>																</ul>
												</div>
														</div>
													</div>

												</div>
                                                	<?php
                            } ?>
											</div>
											<div class="row">
												<div class="col-xs-12">
													<div class="pagination-wrap">
														<ul>
															<li><a href="#"><i class="fa fa-angle-left"></i></a></li>
															<li class="active"><a href="#">1</a></li>
															<li><a href="#">2</a></li>
															<li><a href="#">3</a></li>
															<li><a href="#"><i class="fa fa-angle-right"></i></a></li>
														</ul>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
                               
					</div>
					<div id="hide" class="col-lg-3 col-md-4 col-xs-12">
						<aside class="sm-mt-50">
							<!-- categorie-wrap -->
							<div class="categorie-wrap mb-30">
								<h3 class="sidebar-title">categorie <i class="fa fa-cube pull-right"></i></h3>
								<div class="color-menu p-20">
                                    <ul>
                                        	<li> <input type = "radio" id="allcategorie" name = "a" class="form-check-input allproduct_check"
                                                /> All </li>
                                    <?php
                                    $sql="select distinct Categorie_name from categorie";
                                    $result=$con->query($sql);
                                    while($row=$result->fetch()){
                                        ?>
								

										<li>
    <input type="radio" name = "a"   class="form-check-input product_check"
        value="<?= $row['Categorie_name'];?>" id="Categorie_name">
                <?=$row['Categorie_name']; ?></li>
										<?php } ?>
									</ul>
								</div>
							</div>
							<!-- categorie-wrap -->
							<!-- color-wrap -->
							<div class="product-color mb-30">
								<h3 class="sidebar-title">Product Color <i class="fa fa-paint-brush  pull-right"></i></h3>
								<div class="color-menu p-20">
									<ul>
										<li> <input type = "radio" name = "a" checked = "" /> <a href="#"> Army Green </a> </li>
<li> <input type = "radio" name = "a" /> <a href="#"> Beige (6) </a> </li>
<li> <input type = "radio" name = "a" /> <a href="#"> Noir (13) </a> </li>
<li> <input type = "radio" name = "a" /> <a href="#"> Bleu (6) </a> </li>
<li> <input type = "radio" name = "a" /> <a href="#"> Marron (5) </a> </li>
<li> <input type = "radio" name = "a" /> <a href="#"> Vert (3) </a> </li>
<li> <input type = "radio" name = "a" /> <a href="#"> Gris (6) </a> </li>
<li> <input type = "radio" name = "a" /> <a href="#"> Kaki (2) </a> </li>
<li> <input type = "radio" name = "a" /> <a href="#"> Bleu marine (2) </a> </li>
<li> <input type = "radio" name = "a" /> <a href="#"> Rose (3) </a> </li>
									</ul>
								</div>
							</div>
							<!-- color-wrap -->
							
							<!-- price-range -->
							<div class="sidebar-wrap mb-30">
								<h3 class="sidebar-title"> Range de prix <i class="fa fa-money pull-right"></i></h3>
								<div class="price-range">
									<div id="slider"></div>
								</div>
							</div>
							<!-- price-range -->
							
							<!-- tag-wrap -->
							<div class="tag-wrap mb-30">
								<h3 class="sidebar-title"> <i class="fa fa-tags pull-right"></i></h3>
								<div class="tag p-20">
									<ul>
										<li><a href="#">T-SHIRT</a></li>
										<li><a href="#">homme</a></li>
										<li><a href="#">T-Shirt</a></li>
										<li><a href="#">femme</a></li>
										<li><a href="#">Shirt</a></li>
										<li><a href="#">Photo</a></li>
										
									</ul>
								</div>
							</div>
							<!-- tag-wrap -->
							<div class="related-product">
								<h3 class="sidebar-title">Produits associés  <i class="fab fa-rev pull-right"></i></h3>
								<div class="related-product-sidebar p-20">
									<div class="related-product-item clear">
										<div class="related-product-img">
											<img src="img/related/1.jpg" alt="" />
										</div>
										<div class="related-product-content">
											<a href="#">T-SHIRT FEMME</a>
											<div class="ratting">
												<ul>
													<li><i class="fa fa-star"></i></li>
													<li><i class="fa fa-star"></i></li>
													<li><i class="fa fa-star"></i></li>
													<li><i class="fa fa-star"></i></li>
													<li><i class="far fa-star"></i></li>
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
											<a href="#">T-SHIRT HOMME</a>
											<div class="ratting">
												<ul>
													<li><i class="fa fa-star"></i></li>
													<li><i class="fa fa-star"></i></li>
													<li><i class="fa fa-star"></i></li>
													<li><i class="fa fa-star"></i></li>
													<li><i class="far fa-star"></i></li>
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
											<a href="#">T-SHIRT HOMME</a>
											<div class="ratting">
												<ul>
													<li><i class="fa fa-star"></i></li>
													<li><i class="fa fa-star"></i></li>
													<li><i class="fa fa-star"></i></li>
													<li><i class="fa fa-star"></i></li>
													<li><i class="far fa-star"></i></li>
												</ul>
											</div>
											<p>$30.00</p>
										</div>
									</div>
								</div>
							</div>
						</aside>
					</div>
				</div>
			</div>
		</div>
		<!-- .shop-area end -->
	
            
            
            
            <!--/product Area orange-->
            
            
            
    

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



         <!-- jQuery (necessary for Bootstrap's 

JavaScript plugins) -->

 <?php
   include 'footer.php';
?>
<script>
  $("#filtershow").click(function(e){
      $("#hide").show();
  });
    
    $("#filterhide").click(function(e){
             $("#hide").hide();

  });
</script>
    