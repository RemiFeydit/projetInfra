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
<nav>
        <div class="nav-wrapper">
            <a href="#" class="brand-logo">Logo</a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="../index.php">Home</a></li>
                <li><a href="console.php">Console</a></li>
                <li><a href="properties.php">Propriétés</a></li>
                <li><a href="sauvegarde.php">Sauvegarde</a></li>
            </ul>
        </div>
    </nav>
    <div class="row">
    <?php
    $files = array_diff(scandir('/var/www/minecraft/backupMinecraft/backup'), array('..', '.'));
    foreach($files as $key => $file) {
    ?>
    <div class="col s12 m6">
      <div class="card blue-grey darken-1">
        <div class="card-content white-text">
          <span class="card-title">Nom du fichier :</span>
          <a class="btn disabled"><?=$file?></a>
          <p><span class="card-title">Date :</span></p>
          <a class="btn disabled"><?= date("F d Y H:i:s.", filemtime('/var/www/minecraft/backupMinecraft/backup/'.$file));?></a>
        </div>
        <div class="card-action">
        <button class="btn waves-effect waves-light blue" type="submit" name="action">Restore
    <i class="material-icons right">restore</i>
  </button>
  <button class="btn waves-effect waves-light red" type="submit" name="action">Delete
    <i class="material-icons right">delete</i>
  </button>
        </div>
      </div>
    </div>
    <?php } ?>
  </div>
  
    
</body>
</html>
            