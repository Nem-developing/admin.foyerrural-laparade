<?php
session_start();

if(!isset($_SESSION['utilisateur'])) {
  header('Location: ./connexion.php');
  exit();
}
?> 
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <title>ADMINISTRATION - FoyerRural-Laparade</title>
    </head>
    <body>


    <center>
        <div id="page">

            
            <a href="pages/ajouter.php"><button type="button" class="btn btn-primary btn-lg btn-block">Ajouter un évenement</button></a>
            <!-- Tableau avec tout les évenements. -->



            <table class="table table-dark">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Date</th>
                        <th scope="col">Heure</th>
                        <th scope="col">Événement</th>
                        <th scope="col">Lieu</th>
                        <th scope="col">Supprimer</th>
                    </tr>
                </thead>
                <tbody>





                    
                    <?php
                    include './config/config.php';  // Import des informations de connexion à la base de données.
                    // Établissement de la connexion au serveur mysql.
                    $cnx = new PDO("mysql:host=$hotedeconnexion;dbname=$basededonnee", "$utilisateur", "$motdepasse", array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
                    // Commande SQL permetant de récupérer la liste des serveurs actifs.
                        $req = 'SELECT * FROM `actufr` where `etat` = "0";';
                    // Envoie au serveur la commande via le biais des informations de connexion.
                    $res = $cnx->query($req);

                    // Boucle tant qu'il y a de lignes corespondantes à la requettes
                    while ($ligne = $res->fetch(PDO::FETCH_OBJ)) {                        
                        // Affichage des différents évennements (Dans des éléments de type card.)
                        $id = $ligne->id;
                        echo "
                                <tr>
                                    <th scope='row'>$ligne->id</th>
                                    <td>$ligne->date</td>
                                    <td>$ligne->heure</td>
                                    <td>$ligne->evenement</td>
                                    <td>$ligne->lieu</td>
                                    <td><a href='../actions/suppression.php?id=$id'><button type='button' class='btn btn-danger'>Supprimer</button></a></td>
                                </tr>
                             ";
                    
                    }
                    ?>


                </tbody>
            </table>


        </div>
    </center>

    
    
    


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>


</body>
</html>
