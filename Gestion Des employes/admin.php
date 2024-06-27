<?php
    include "connection.php";
    extract($_POST);
    $vr=false;
    $id=$_GET['id'];
    $req=mysqli_query($con," SELECT nom,mtp FROM employe WHERE poste='admin'");
    while ($row=mysqli_fetch_assoc($req))
    {
        if(isset($_POST['envoyer'])&& $nom==$row['nom']&&$mtp==$row['mtp'])
        {
            header("location:modifier.php?id=$id");
            $vr=true;
        }
      
    }
    if(isset($_POST['envoyer'])&&$vr==false)
    {
        $message="Se compte n'est pas un compte administrateur";
    }
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Operation Employer</title>
    <link rel="stylesheet" href="Style.css">
 </head>
 <body>
 <div class="form">
 <a href="liste Employer.php" class="back_btn"><img src="image/back.png" alt=""> Retour</a>
       <form action="" method="post">
       <h2>Connexion Admin</h2>
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