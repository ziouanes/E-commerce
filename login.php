<?php
	ob_start();
include 'init.php';
	session_start();
	$pageTitle = 'Login';
	if (isset($_SESSION['user'])) {
header('Location: index.php'); 	
	
    }
 //Check If User Coming From HTTP Post Request

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		
	

			$user = $_POST['email'];
			$pass = $_POST['pass'];
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
?>
