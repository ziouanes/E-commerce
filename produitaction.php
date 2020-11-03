<?php
require 'config.php';


 if(isset($_POST['allaction'])){
    $sql ="select * from produit !='' ";
    
   
        
    
   
  
    
    $result=$conn->query($sql);
    $output1='';
    
    if($result->num_rows>0){
        
        while($row=$result->fetch_assoc()){
            $output1 .='<div class="col-xs-12 col-lg-4 col-md-6 col-sm-6">
                            
					<div class="product-wrap mb-30">
                                                  
							<div class="product-img">
								<a href="#">
	<img class="primary" src="'.$row['Image_Produiit'].'" alt="">
	<img class="secondary" src="'.$row['Image_Produiit'].'" alt="">
									</a>
						<div class="product-icon">
															<ul>
								<li>
								<a href="cart.html">
<i class="fa fa-shopping-cart"></i>
<span>Add to Cart</span>
								</a>
								</li>
								<li>
				<a href="print.html">
				<i class="fa fa-shopping-bag"></i>
				<span>print</span>
				</a>
				</li>
				<li>
				<a href="checkout.html">
				<i class="fa fa-compress"></i>
				<span>Compare</span>
				</a>
				</li>
											</ul>
														</div>
					<span class="sale">remise</span>
													</div>
		<div class="product-content text-center">
<a href="product-details.html">'.$row['nom_produit'].'</a>
								<div class="ratting">
															<ul>
				<li><i class="fa fa-star"></i></li>
			<li><i class="fa fa-star"></i></li>
			<li><i class="fa fa-star"></i></li>
				<li><i class="fa fa-star"></i></li>
				<li><i class="fa fa-star"></i></li>
															</ul>
														</div>
 	<span>'.$row['Prix_produit'].'DH'.'</span>
	
													</div>
                                              
											
                                                </div>
                                                    
											</div>';
        }
    }else{
        $output1 = "<h3>no produit</h3>";
    }echo $output1;
}



//////
if(isset($_POST['action'])){
    $sql ="select p.* from produit p INNER JOIN Categorie c on p.Categorie = c.Categorie_id inner JOIN Color o on o.Id_color = p.Color inner join Taille t on t.Taille_id = p.Taille INNER JOIN sexe s on s.Sexe_id=p.Sex where p.Categorie !=''";
    
   
        
    
   
    if(isset($_POST['Categorie_name'])){
        $categorie = implode("','",$_POST['Categorie_name']);
        $sql .="and c.categorie_name = '".$categorie."' ";
    }
    
    
    $result=$conn->query($sql);
    $output='';
    
    if($result->num_rows>0){
        
        while($row=$result->fetch_assoc()){
            $output .='<div class="col-xs-12 col-lg-4 col-md-6 col-sm-6">
                            
					<div class="product-wrap mb-30">
                                                  
							<div class="product-img">
								<a href="#">
	<img class="primary" src="'.$row['Image_Produiit'].'" alt="">
	<img class="secondary" src="'.$row['Image_Produiit'].'" alt="">
									</a>
						<div class="product-icon">
															<ul>
								<li>
								<a href="cart.html">
<i class="fa fa-shopping-cart"></i>
<span>Add to Cart</span>
								</a>
								</li>
								<li>
				<a href="print.html">
				<i class="fa fa-shopping-bag"></i>
				<span>print</span>
				</a>
				</li>
				<li>
				<a href="checkout.html">
				<i class="fa fa-compress"></i>
				<span>Compare</span>
				</a>
				</li>
											</ul>
														</div>
					<span class="sale">remise</span>
													</div>
		<div class="product-content text-center">
<a href="product-details.html">'.$row['nom_produit'].'</a>
								<div class="ratting">
															<ul>
				<li><i class="fa fa-star"></i></li>
			<li><i class="fa fa-star"></i></li>
			<li><i class="fa fa-star"></i></li>
				<li><i class="fa fa-star"></i></li>
				<li><i class="fa fa-star"></i></li>
															</ul>
														</div>
 	<span>'.$row['Prix_produit'].'DH'.'</span>
	
													</div>
                                              
											
                                                </div>
                                                    
											</div>';
        }
    }else{
        $output = "<h3>no produit</h3>";
    }echo $output;
}



?>