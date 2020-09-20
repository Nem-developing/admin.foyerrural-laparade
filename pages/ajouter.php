<?php
session_start();

if(!isset($_SESSION['utilisateur'])) {
  header('Location: ../connexion.php');
  exit();
}
?> 
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <title>ADMIN-FRL | Nouvel évenement</title>
    </head>
    <body>

        <!-- Formulaire de création d'un nouvel évenement -->

        <div id="page">
            
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
            
            <center>
                <p class="h1">Création d'un nouvel énvennement</p>
                
                <!-- Affichage de la partie français et la partie anglaise-->
                <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">Français</th>
                    <th scope="col">Anglais</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                  </tr>
                </tbody>
              </table>
                <form action="../actions/nouveau.php" method="post">
                   
                    
                        <div class="row">
                          <div class="col">
                            <input type="text" class="form-control" placeholder="Date" name="datefr" required>
                          </div>
                          <div class="col">
                            <input type="text" class="form-control" placeholder="Date" name="dateeng" required>
                          </div>
                        </div>
                    <br>
                        <div class="row">
                          <div class="col">
                            <input type="text" class="form-control" placeholder="Heure" name="heurefr" required>
                          </div>
                          <div class="col">
                            <input type="text" class="form-control" placeholder="Hour" name="heureeng" required>
                          </div>
                        </div>
                    <br>
                        <div class="row">
                          <div class="col">
                            <input type="text" class="form-control" placeholder="Événement" name="evenementfr" required>
                          </div>
                          <div class="col">
                            <input type="text" class="form-control" placeholder="Event" name="evenementeng" required>
                          </div>
                        </div>
                    <br>
                        <div class="row">
                          <div class="col">
                            <input type="text" class="form-control" placeholder="Lieu" name="lieufr" required>
                          </div>
                          <div class="col">
                            <input type="text" class="form-control" placeholder="Place" name="lieueng" required>
                          </div>
                        </div>
                    <br>
                    
                    <button type="submit" class="btn btn-primary btn-lg btn-block" value="ok">Créer le ticket</button>
                </form>
            </center>

        </div>




        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    </body>
</html>