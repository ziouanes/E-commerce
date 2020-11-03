<?php
require 'config.php';


 



    if(isset($_POST['action'])&& $_POST['action']=='register'){
        if (isset($_POST['Prénom'])) {
    $prenom = $_POST['Prénom'];

}
        $name=$_POST['nom'];
        $telephone=$_POST['telephone'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $confirm=$_POST['confirm'];
            $role=2;
        if($password!=$confirm){
          
             echo "
                    <div class='alert alert-danger' >
     <strong>password did not matched</strong>
     </div>
                    ";
            exit();
        }else{
            $sql=$conn->prepare("select email from utilisateur where email = ?");
            $sql->bind_param("s",$email);
            $sql->execute();
            $result=$sql->get_result();
            $row=$result->fetch_array(MYSQLI_ASSOC);
if (isset($row['email']) && $row['email']==$email) {
   
               
   echo "
                    <div class='alert alert-danger' >
     <strong>email is already taken diiferent</strong>
     </div>
                    ";
            }
           else{
                $stmt = $conn->prepare("insert into utilisateur(nom_utilisateur,prénom_utilisateur,téléphone_utilisateur,email,password_utilisateur,Rol) VALUES (?,?,?,?,?,?) ");
$stmt->bind_param("sssssi",$name,$telephone,$prenom,$email,$password,$role);
                if($stmt->execute()){
                     echo "
                    <div class='alert alert-success' >
     <strong>successfuly please se connecter now </strong>
     </div>
                    ";
                   
                }else{
                     echo "
                    <div class='alert alert-danger' >
     <strong>error</strong>
     </div>
                    ";
                }
            }
        }


        
    }
function check_input($data){
    $data=trim($data);
    $data=stripslashes($data);
    $data=htmlspecialchars($data);
    return $data;
}
?>