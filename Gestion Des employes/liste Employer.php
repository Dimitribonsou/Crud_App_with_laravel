<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Employer </title>
    <link rel="stylesheet" href="Style.css">
</head>
<body>
    
<!-- <a href="index.php" class="btn_Add deconnect" > Se Deconnecter</a><br>    -->
    <div class="container"> 
  
        <div class="btn_Add">
       
            <a href="Ajouter.php"><img src="image/add.png" alt=""> Ajouter</a>
           
        </div>
        <table>
            <tr>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Age</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
            <?php
              include_once("connection.php");
               $req=mysqli_query($con," SELECT * FROM employe ");
               if(mysqli_num_rows($req)==0)
               {
                 echo " il n'a pas encore d'Employer ajouter dans la base de donnee !";
               }
               else
               {
                //include_once("connection.php");
                //affficher les  infos de l'utilisateur dans le tableau
                 while($row=mysqli_fetch_assoc($req))
                 {
                    ?>
                    <tr>
                       <!-- <td><?= $row['nom']?></td>
                       <td><?= $row['prenom']?></td>
                       <td><?= $row['age']?></td> -->
                       <td><?php echo $row['nom']?></td>
                       <td><?php echo $row['prenom']?></td>
                       <td><?php echo $row['age']?></td>
                       <!-- nous allons mettre l'id de chaque employer dans le lien-->
                       <!-- <td><a href="modifier.php?id=<?php echo $row['id']?>"><img src="image/update1.png" alt="image crayon"></a></td>
                       <td><a href="supprimer.php?id=<?php echo $row['id']?>"><img src="image/delete.png" alt="image corbeille"></a></td> -->
                       <!-- <td><img src="image/delete.png" alt=""></td>-->
                       <td><a href="admin.php?id=<?php echo $row['id']?>"><img src="image/update1.png" alt="image crayon"></a></td>
                       <td><a href="admindel.php?id=<?php echo $row['id']?>"><img src="image/delete.png" alt="image corbeille"></a></td>
                    </tr>
                    <?php
                 }
              
              
               }
            ?>
           <!-- <tr>
                <td>Bonsou</td>
                <td>Dimitri</td>
                <td>22</td>
                <td><a href="modifier.php"><img src="image/update1.png" alt=""></a></td>
                <td><img src="image/delete.png" alt=""></td>
            </tr>
            <tr>
                <td>kameni</td>
                <td>jeanne</td>
                <td>30</td>
                <td><a href="modifier.php"><img src="image/update1.png" alt=""></a></td>
                <td><img src="image/delete.png" alt=""></td>
            </tr> -->
        </table>
    </div>
</body>
</html>