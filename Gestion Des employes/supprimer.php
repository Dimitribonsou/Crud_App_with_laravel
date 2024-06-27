<?php   
// connection a la base de donnee 
include_once "connection.php";
// recuperation de l'id de l'employer a supprimer
$id=$_GET['id'];
//requete de suppression de l'employer
$req=mysqli_query($con," DELETE FROM employe WHERE id=$id LIMIT 1");
if($req)
{
    echo " Employer supprimer !";
    // redirection vers la page index.php
    header("Location:liste Employer.php");
}
else{
    echo" employer non supprimer";
}


?>