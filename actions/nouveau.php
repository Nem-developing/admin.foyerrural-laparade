    <?php
    session_start();

    if(!isset($_SESSION['utilisateur'])) {
      header('Location: ../connexion.php');
      exit();
    }
    ?> 
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
            <title>FRL - Nouveau</title>
        </head>
        <body>
        
            
        <!-- Menu -->

            <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarColor02">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="../index.php">Accueil</a>
                        </li>
                </div>
            </nav>
            
            
            
        <?php
        include "../config/config.php"; // Import des données de connexion.
        date_default_timezone_set('UTC');   // On informe mysql de la zone temporelle souhaitée.
        $datefr = $_POST['datefr'];       // On récupère les informations du formulaire précédent.
        $dateeng = $_POST['dateeng'];
        $heurefr = $_POST['heurefr'];
        $heureeng = $_POST['heureeng'];
        $evenementfr = $_POST['evenementfr'];
        $evenementeng = $_POST['evenementeng'];
        $lieufr = $_POST['lieufr'];
        $lieueng = $_POST['lieueng'];

        echo "$datefr, $dateeng, $heurefr, $heureeng, $evenementfr, $evenementeng, $lieufr, $lieueng";    


        (int) $erreur = 0;

        if (!$ip) {
            $ip = "0.0.0.0";    // Si l'utilisateur utilise un proxy ; La fonction Remote addr peut dysfonctionner ; C'est une mesure de sécurité.
        }


        // Rechercher remplacer dans les chaines comportant du texte. 
        // --> Suite aux erreurs quand nous rentrons un apostrophe.
        // --> Donc nous remplaçons les apostrophes en apostrophes-antislash.
        // = ' devien '\


        $rechercher = "'"; 
        $remplacer = "\'"; 
        
        $datefrok = str_replace($rechercher,$remplacer,$datefr);
        $dateengok = str_replace($rechercher,$remplacer,$dateeng);
        $heurefrok = str_replace($rechercher,$remplacer,$heurefr);
        $heureengok = str_replace($rechercher,$remplacer,$heureeng);
        $evenementfrok = str_replace($rechercher,$remplacer,$evenementfr);
        $evenementengok = str_replace($rechercher,$remplacer,$evenementeng);
        $lieufrok = str_replace($rechercher,$remplacer,$lieufr);
        $lieuengok = str_replace($rechercher,$remplacer,$lieueng);



        //  Connexion à la base de donnée.
        $mysqli = new mysqli("$hotedeconnexion", "$utilisateur", "$motdepasse", "$basededonnee");
        if ($mysqli->connect_errno) {
            echo "<div class='alert alert-danger' role='alert'> Echec lors de la connexion à MySQL ! </div>";   // Affichage de l'erreur.
            echo "<div class='alert alert-danger' role='alert'> Erreur N°$mysqli->errno : $mysqli->error.</div>";    // Affichage de l'erreur.
            $erreur = $erreur + 1;
        }


        // Envoie des informations du formulaire dans la table actufr.
        if (!$mysqli->query("INSERT INTO `actufr` (`date`, `heure`, `evenement`, `lieu`, `etat`) VALUES ('$datefrok', '$heurefrok', '$evenementfrok', '$lieufrok', '0');")) {
            echo "<div class='alert alert-danger' role='alert'> Echec lors l'inssertion des éléments dans la table 'tickets' ! </div>";    // Affichage de l'erreur.
            echo "<div class='alert alert-danger' role='alert'> Erreur N°$mysqli->errno : $mysqli->error.</div>";    // Affichage de l'erreur.
            $erreur = $erreur + 1;
        }
        
        // Envoie des informations du formulaire dans la table actueng.
        if (!$mysqli->query("INSERT INTO `actueng` (`date`, `heure`, `evenement`, `lieu`, `etat`) VALUES ('$dateengok', '$heureengok', '$evenementengok', '$lieuengok', '0');")) {
            echo "<div class='alert alert-danger' role='alert'> Echec lors l'inssertion des éléments dans la table 'tickets' ! </div>";    // Affichage de l'erreur.
            echo "<div class='alert alert-danger' role='alert'> Erreur N°$mysqli->errno : $mysqli->error.</div>";    // Affichage de l'erreur.
            $erreur = $erreur + 1;
        }
        
        

        if ($erreur === 0) {    // test de la présence d'erreurs ou non.
            echo "pas d'erreurs";
            header('Location: ../index.php');
            exit();
        } else {
            echo "<h1>Il semble y avoir une erreur, veuillez vous référer à l'alerte au dessus !</h1>";
        }
        ?>




            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
        </body>
    </html>