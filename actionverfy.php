<?php
require 'config.php';

//    if(isset($_POST['action']) && $_POST['action']=='submit'){
      
      $email=$_POST['email'];

       $code=substr(md5(mt_rand()), 0,15);
       $sql=$conn->prepare("select email from utilisateur where email = ?");
            $sql->bind_param("s",$email);
            $sql->execute();
            $result=$sql->get_result();
            $row=$result->fetch_array(MYSQLI_ASSOC);
if (isset($row['email']) && $row['email']==$email) {
   
           $stmt = $conn->prepare("update utilisateur set verification = ? where email = ?  ");
     $stmt->bind_param("ss",$code,$email);
      if($stmt->execute()){
         
          $to=$email;
          $subject="Activation lik verify";
          $from="zioian.hamza@outlook.fr";
          
          $body="<h3>activaton code id:".$code."<br> linl : <br>
          <a href='http://http://localhost:8080/client/verify.php?email=".$email."&code=".$code."'>http://http://localhost:8080/client/verify.php?email=".$email."&code=".$code."</a></h3>";
          
            
          $headers="From:".$from."\r\n";
          $headers.="MIME-Version:1.0"."\r\n";
          $headers.="Content-Type:text/html;charset=UTF-8";
          
          if(mail($to,$subject,$body,$headers)){
              echo 'An Activation';
          }else{
               echo"<br> <div class='alert alert-danger' >
     <strong>wrrong</strong>
     </div>";
          }
        

      }    
  
    
     
}else{
    echo" <br> <div class='alert alert-danger' >
     <strong>email is not enregistred</strong>
     </div>"; 
}


    


?>