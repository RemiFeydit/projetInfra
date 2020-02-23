<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Home</title>
</head>
<body>
<?php
if($_GET['run']){
   shell_exec("sudo /var/www/minecraft/commande/start.sh");
}
?>
<nav>
        <div class="nav-wrapper">
            <a href="#" class="brand-logo">Logo</a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="index.php">Home</a></li>
                <li><a href="./pages/console.php">Console</a></li>
                <li><a href="./pages/properties.php">Propriétés</a></li>
                <li><a href="./pages/sauvegarde.php">Sauvegarde</a></li>
            </ul>
        </div>
    </nav>

    <div class="row">
    <div class="col s12 m12">
      <div class="card blue-grey darken-1">
        <div class="card-content white-text">
          <form>
    <a class="waves-effect waves-light btn-large" href="?run=true"><i class="material-icons right">cloud</i>Démarrer le serveur</a>
</form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
