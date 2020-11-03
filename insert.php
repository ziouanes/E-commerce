

<?php
$conn = new mysqli('localhost', 'root', '', 'projetfinformation');
if($conn->connect_error){
    die("could not connect to data base !".$conn->connect_error);

}
$name=$_POST['name'];
$prenom=$_POST['prenom'];
$telephone=$_POST['telephone'];
$email=$_POST['email'];
$password=$_POST['password'];
$confirm=$_POST['confirm'];
$role=2;
$stmt = $conn->prepare("insert into utilisateur(nom_utilisateur,prénom_utilisateur,email,password_utilisateur,téléphone_utilisateur,Role) VALUES (?,?,?,?,?,?)");
$stmt->bind_param("sssssi",$name,$prenom,$email,$password,$telephone,$role);


if($stmt->execute()) {
    echo "data inserted";
}
else 
{
    echo "failed";
}
?>
 
   