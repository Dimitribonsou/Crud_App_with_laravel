<?php 
 include_once "connection.php";
  
    //extract($_POST);
  $req=mysqli_query($con," SELECT nom,mtp FROM employe ");
  if(isset($_POST['envoyer']))
  {
    $nom= htmlspecialchars($_POST['nom']);
    $password=htmlspecialchars($_POST['mtp']);
    while($row=mysqli_fetch_array($req))
    {
        if($row['nom']==$nom&&$row['mtp']==$password)
        {
            $message=" Bienvenue".$row['nom'];
            header("location:liste Employer.php");
        }
        else
        {
            $message=" Nom d'utilisateur ou mot de passe incorrect";
        }
    }
  }
  
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Se connecter</title>
      <link rel="stylesheet" href="Style.css">
</head>
<body>
    <div class="form">
        <h2>Connexion au compte</h2>
       <form action="" method="post">
        <p class="erreur_message"> <?php
        if(isset($message))
        {
            echo $message;
        }
        ?></p>
       
         <label for="nom">Nom d'utilisateur</label>
         <input type="text" name="nom" id="nom"><br>
         <label for="mtp">Password</label>
         <input type="password" name="mtp" id="mtp"><br>
         <input type="submit" name="envoyer" value=" Connexion">
       </form>
    </div> 
</body>
</html>