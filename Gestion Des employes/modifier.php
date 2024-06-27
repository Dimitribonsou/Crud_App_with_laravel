<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>modifier Employer </title>
    <link rel="stylesheet" href="Style.css">
</head>
<body>
    <?php
      include_once "connection.php";
      // recuperation de l'id de l'employe dans le lien
      $id=$_GET['id'];
      //requete pour afficher les infos d'un employer
      $req=mysqli_query($con," SELECT * FROM employe WHERE id=$id");
      $row= mysqli_fetch_assoc($req);

      //verifier si l'utilisateur clique sur le bouton Modifier
      if(isset($_POST['modifier']))
      {
        //extraction des variables par la methode post
        extract($_POST);
        // verifier si les champs sont vide 
        if(isset($nom)&& isset($prenom)&&$age&&$mtp)
        {
            include_once "connection.php";
            //requete d'ajout dans la base de donnees 
            $req= mysqli_query($con," UPDATE employe SET nom='$nom',prenom='$prenom',age='$age',mtp='$mtp' WHERE id=$id");
            if($req)
            {
              // si la requete a ete bien effectuer ,on fait une redirection vers la page Employer.php
              $message=" employe   Modifier avec success !";
              header("location:liste Employer.php");
            }
            else
            {
                $message=" Modification  non  effectuer";
            }
        }
        else
        {
            $message=" veuillez renseigner tout les champs !";
        }
      }
    ?>
    <div class="form"> 
     
       <a href="liste Employer.php" class="back_btn"><img src="image/back.png" alt="home"> Retour</a>
      <h2>modifier l' Employé : <?php echo $row['nom']?></h2>
       <p class="erreur_message">
        <?php
         if(isset($message))
         echo $message;
        ?>
       </p>
       <form action="" method="post">
        <label for="nom"> Nom</label>
        <input type="text" name="nom" value="<?php echo $row['nom']?>">
        <label for="prenom"> Prénom</label>
        <input type="text" name="prenom"value="<?php echo$row['prenom']?>">
        <label for="age"> Age</label>
        <input type="number" name="age"value="<?php echo$row['age']?>"><br>
        <label for="mtp">Password</label>
         <input type="text" name="mtp" id="mtp" value="<?php echo $row['mtp']?>"><br>
         <label for="poste"> Poste</label>
        <input type="text" name="poste"value=<?php echo$row['poste']?>>
        <input type="submit" name="modifier" value="modifier">
       </form>
    </div>
</body>
</html>