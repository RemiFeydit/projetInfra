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
            <a href="../index.php" class="brand-logo">Minecrouft</a>
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
    if(!file_exists('/var/www/minecraft/backupMinecraft/listeBackup.txt')){
      ?>
      <div class="col s12 m6">
      <div class="card blue-grey darken-1">
        <div class="card-content white-text">
          <span class="card-title">Il n' y a pas de sauvegarde
          </span>
        </div>
        </div>
      </div>
      <div class="col s12 m6">
        <div class="card blue-grey darken-1">
          <div class="card-content white-text">
            <span class="card-title">Sauvegarde :</span>
            <label class="white-text">Que voulez-vous sauvegarder ?</label>
            <form method="post" action="">
  <select class="browser-default" name ="toSave">
    <option value="all">Le monde et les propriétés</option>
    <option value="world">Le monde</option>
    <option value="properties">Les propriétés</option>
  </select>
        <div class="input-field">
        <label class="white-text">Nom de la sauvegarde ?</label>
          <input class="white-text" name="saveName" id="saveName" type="text" class="validate" value="world">
        </div>
      <button class="btn waves-effect waves-light" type="submit" name="submit" value='submit'>Sauvegarder<i class="material-icons right">save</i>
      </button>
  </form>
        </div>
      </div>
    </div>
    <?php
    }else{
      $content = file_get_contents('/var/www/minecraft/backupMinecraft/listeBackup.txt', FALSE);
      if($content == ''){
        shell_exec('sudo rm /var/www/minecraft/backupMinecraft/listeBackup.txt');
        ?>
    <div class="col s12 m16">
      <div class="card blue-grey darken-1">
        <div class="card-content white-text">
          <span class="card-title">Il n' y a pas de sauvegarde</span>
        </div>
        </div>
      </div>
    </div>
    <div class="col s12 m6">
        <div class="card blue-grey darken-1">
          <div class="card-content white-text">
            <span class="card-title">Sauvegarde :</span>
            <label class="white-text">Que voulez-vous sauvegarder ?</label>
            <form method="post" action="">
  <select class="browser-default" name ="toSave">
    <option value="all">Le monde et les propriétés</option>
    <option value="world">Le monde</option>
    <option value="server.properties">Les propriétés</option>
  </select>
        <div class="input-field">
        <label class="white-text">Nom de la sauvegarde ?</label>
          <input class="white-text" name="saveName" id="saveName" type="text" class="validate" value="world">
        </div>
      <button class="btn waves-effect waves-light" type="submit" name="submit" value='submit'>Sauvegarder<i class="material-icons right">save</i>
      </button>
  </form>
        </div>
      </div>
    </div>
    <?php
      }else{
        ?>
        <div class="col s12 m12">
        <div class="card blue-grey darken-1">
          <div class="card-content white-text">
            <span class="card-title">Sauvegarde :</span>
            <label class="white-text">Que voulez-vous sauvegarder ?</label>
            <form method="post" action="">
  <select class="browser-default" name ="toSave">
    <option value="all">Le monde et les propriétés</option>
    <option value="world">Le monde</option>
    <option value="properties">Les propriétés</option>
  </select>
        <div class="input-field">
        <label class="white-text">Nom de la sauvegarde ?</label>
          <input class="white-text" name="saveName" id="saveName" type="text" class="validate" value="world">
        </div>
      <button class="btn waves-effect waves-light" type="submit" name="submit" value='submit'>Sauvegarder<i class="material-icons right">save</i>
      </button>
  </form>
        </div>
      </div>
    </div>
    <?php
        $files = explode("\n", $content);
        foreach($files as $key => $file) {
          $fileName = explode("_", $file);
          $dateEntiere = explode("_", $file)[1];
          $date = str_replace("-", "/", explode(".", $dateEntiere)[1]);
          $heure = str_replace("-", "h", explode(".", $dateEntiere)[0]);
          $fileName = $fileName[0] . "_" . $fileName[1];
          
        ?>

      <div class="col s12 m6">
        <div class="card blue-grey darken-1">
          <div class="card-content white-text">
            <span class="card-title">Nom du fichier :</span>
            <a class="btn disabled"><?=$file?></a>
            <p><span class="card-title">Date :</span></p>
            <a class="btn disabled"><?=$date . " " . $heure; ?></a>
          </div>
          <div class="card-action">
          <form>
      <a class="waves-effect waves-light btn blue" href="?restore=<?=$fileName ?>"><i class="material-icons right">restore</i>Restaurer</a>
      <a class="waves-effect waves-light btn red" href="?delete=<?=$file ?>"><i class="material-icons right">delete</i>Supprimer</a>
  </form>
          </div>
        </div>
      </div>
  <?php } 
      }
  }
  ?>
  </div>
<?php

if(!empty($_GET['restore'])){
	putenv('LANG=en_US.UTF-8');
  shell_exec('echo Y | sudo /var/www/minecraft/commandes/backup.sh restore '. $_GET['restore']);
	echo $monDebug;
}

if(!empty($_GET['delete'])){
  shell_exec('echo Y | sudo /var/www/minecraft/commandes/backup.sh delete ' . $_GET['delete']);
}
echo strpos($_POST['saveName'], " ");
if(isset($_POST['submit']) && $_POST['saveName'] == ""){
  echo '<script> alert("Veuillez rentrer une valeur dans le nom de la sauvegarde"); </script>';
}else if ($_POST['submit'] && strpos($_POST['saveName'], " ") !== false){
  echo '<script> alert("Veuillez rentrer une valeur dans le nom de la sauvegarde (sans espaces)"); </script>';
}else if ($_POST['submit']){
	shell_exec('echo Y | sudo /var/www/minecraft/commandes/backup.sh save ' . $_POST['toSave'] . ' ' . $_POST['saveName']);
}
?>   
</body>
</html>
            
