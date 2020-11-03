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
                        <h2>Account</h2>
                    </div>
                    <ul>
                        <li><a href="index.php">Accueil</a></li>
                        
                        <li>Edit informaation</li>
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
   
  <a href="order.php" class="list-group-item">Mes Commandes </a>
   
  <a href="orders.php" class="list-group-item">Edit Account</a> <a href="Acount%20change%20pass.php" class="list-group-item">Edit mot de pass</a>
   
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
                    <h4> Vos informations personnelles </h4>

        <fieldset>
            
          <div class = "form-group required">
            <label class = "col-sm-2 control-label" for = "input-firstname"> Prénom </label>
            <div class = "col-sm-10">
              <input type = "text" name = "firstname" value = "" placeholder = "First name" id = "input-firstname" class = "form-control">
                          </div>
          </div>
          <div class = "form-group required">
            <label class = "col-sm-2 control-label" for = "input-lastname"> Nom </label>
            <div class = "col-sm-10">
              <input type = "text" name = "lastname" value = "" placeholder = "Last Name" id = "input-lastname" class = "form-control">
                          </div>
          </div>
          <div class = "form-group required">
            <label class = "col-sm-2 control-label" for = "input-email"> E-mail </label>
            <div class = "col-sm-10">
              <input type = "email" name = "email" value = "" placeholder = "E-Mail" id = "input-email" class = "form-control">
                          </div>
          </div>
          <div class = "form-group required">
            <label class = "col-sm-2 control-label" for = "input-telephone"> Téléphone </label>
            <div class = "col-sm-10">
              <input type = "tel" name = "telephone" value = "" placeholder = "Telephone" id = "input-telephone" class = "form-control">
                          </div>
          </div>
                  </fieldset>
           <form>
        <div class="buttons clearfix">
          <div class="pull-left"><a href="Acount%20Éditer.php" class="btn btn-default">Back</a></div>
          <div class="pull-right">
            <input type="submit" value="Continue" class="bttn-small btn-fill">
          </div>
        </div>
      </form>
      </div>    </div>     </div>
    
      
        <?php
   include 'footer.php';
?>
        
      