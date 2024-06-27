<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter  Employer </title>
    <link rel="stylesheet" href="Style.css">
</head>
<body>
    <?php
     
      //verifier si l'utilisateur clique sur le bouton ajouter
      if(isset($_POST['ajouter']))
      {
        //extraction des variables par la methode post
        //extract($_POST);
        $nom=$_POST['nom'];
        $prenom=$_POST['prenom'];
        $age=$_POST['age'];
        // verifier si les champs sont vide 
        if(isset($nom)&& isset($prenom)&&isset($age)&&isset($mtp))
        {
          
            include_once "connection.php";
            //requete d'ajout dans la base de donnees 
            $req= mysqli_query($con," INSERT INTO employe  VALUES (NULL,'$nom','$prenom','$age','$mtp')");
            if($req)
            {
              // si la requete a ete bien effectuer ,on fait une redirection vers la page index.php
              $message=" employe   ajoute avec success !";
              header("location:liste Employer.php");
            }
            else
            {
                $message=" employe  non ajoute";
            }

        }
        else
        {
            $message=" veuillez renseigner tout les champs !";
        }
      }
    
    ?>
    <div class="form"> 
     
       <a href="liste Employer.php" class="back_btn"><img src="image/back.png" alt=""> Retour</a>
      <h2>Ajouter un Employé</h2>
       <p class="erreur_message">

        <?php
        // si la variable message existe alors
        if(isset($message))
          echo $message
        ?>
       </p>
       <form action="" method="post">
        <label for="nom"> Nom</label>
        <input type="text" name="nom">
        <label for="prenom"> Prénom</label>
        <input type="text" name="prenom">
        <label for="age"> Age</label>
        <input type="number" name="age"><br>
        <label for="poste"> Poste</label>
        <input type="text" name="poste">
        <label for="mtp">Password</label>
         <input type="password" name="mtp" id="mtp"><br>
        <input type="submit" name="ajouter" value="Ajouter">
       </form>

    </div>
</body>
</html>