<?php
    include_once "connection.php";
    // $nom=htmlspecialchars($_POST['nom']);
    // $password=htmlspecialchars($_POST['mdp']);
    extract($_POST);
    $vr=false;
    $id=$_GET['id'];
    if(isset($_post['login']))
    {
        if(isset($nom)&&isset($password))
        {
            $req=mysqli_query($con,"SELECT nom,mtp FROM  employe WHERE poste='admin' ");
            while($row=mysqli_fetch_assoc($req))
            {
                if($nom==$row['nom']&&$password==$row['mtp'])
                {
                    header("location:supprimer.php?id=$id");
                    $vr=true;
                }
                
            }
           if(isset($_POST['login'])&&$vr==false) 
                {
                    $message=" Vous n'avez pas le droit de supprimer un employer !";
                }
        }
        else
        {
            $message=" veuillez renseigner tout les champs !";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin delete</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
        <div class="form">
        <a href="liste Employer.php" class="back_btn"><img src="image/back.png" alt=""> Retour</a>
            <form  method="POST">
                <H2>CONNECTION ADMIN</H2>
                <p class="erreur_message">
                    <?php
                        if(isset($message))
                             echo $message
                    ?>
                </p>
                <label for="nom">Nom</label>
                <input type="text" name="nom">
                <label for="mdp">Password</label>
                <input type="password" name="mdp">
                <input type="submit" name="envoyer" value=" Connexion">
            </form>
        </div>
      
</body>
</html>