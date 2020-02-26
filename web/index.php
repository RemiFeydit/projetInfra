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
  shell_exec('sudo /var/www/minecraft/commandes/start.sh');

  header('Location: ./pages/console.php');
}
?>
<nav>
        <div class="nav-wrapper">
            <a href="./index.php" class="brand-logo">Minecrouft</a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="index.php">Home</a></li>
                <li><a href="./pages/console.php">Console</a></li>
                <li><a href="./pages/properties.php">Propriétés</a></li>
                <li><a href="./pages/sauvegarde.php">Sauvegarde</a></li>
            </ul>
        </div>
    </nav>

    <div class="row">
    <div class="col s12 m6">
      <div class="card blue-grey darken-1">
        <div class="card-content white-text">
          <form>
    <a class="waves-effect waves-light btn-large" id="btnServeur" href="?run=true"><i class="material-icons right">power</i>Démarrer le serveur</a>
</form>
<p id='etatServ'></p>
        </div>
      </div>
    </div>
    <div class="col s12 m6">
        <div class="card blue-grey darken-1">
          <div class="card-content white-text">
            <span class="card-title">Changement de version :</span>
            <label class="white-text">Quelle version voulez-vous utiliser ?</label>
            <form method="post" action="">
  <select class="browser-default" name ="version">
  <?php
  $section = file_get_contents('/var/www/minecraft/commandes/listeVersion.txt', FALSE);
  $lines = explode("\n", $section);
  var_dump($section);
  foreach ($lines as $key => $line) {
    $line = explode("=", $line);
?>
    <option value="<?= $line[0] ?>"><?= $line[0]?></option>
<?php } ?> 

  </select>
  <p><br>
  <label>
    <input type="checkbox" class="filled-in" name="saveBeforeChangeV" id="saveBeforeChangeV"/>
    <span class="white-text">Sauvegarde du monde avant le changement de version ?</span>
  </label>
  </p><br>
      <button class="btn waves-effect waves-light" type="submit" name="submit" value='submit'>Changer de version<i class="material-icons right">send</i>
      </button>
  </form>
        </div>
      </div>
    </div>
  </div>
</body>
<?php

$isOn = shell_exec('ss -tunlp | grep 25565');
$rconisOn = shell_exec('ss -tunlp | grep 25575');

if($isOn != '' && $rconisOn != ''){
  echo '<script> document.getElementById("btnServeur").setAttribute("class", "waves-effect waves-light btn-large disabled")</script>';
  echo '<script> document.getElementById("etatServ").innerText = "Le serveur est démarré"</script>';
}else if($isOn != '' && $rconisOn == ''){
  echo '<script> document.getElementById("btnServeur").setAttribute("class", "waves-effect waves-light btn-large disabled")</script>';
  echo '<script> document.getElementById("etatServ").innerText = "Le serveur est en cours de démarrage"</script>';
}else{
  echo '<script> document.getElementById("etatServ").innerText = "Le serveur est éteint"</script>';
}


if(!empty($_POST["saveBeforeChangeV"])){
  $_POST["saveBeforeChangeV"] = true;
}else{
  $_POST["saveBeforeChangeV"] = false;
}

if($_POST['submit'] && $_POST["saveBeforeChangeV"]){
	shell_exec('echo Y | sudo /var/www/minecraft/commandes/changeVersion.sh '. $_POST["version"] . ' true');
	echo $monDebug;
}else if($_POST['submit'] && !$_POST["saveBeforeChangeV"]){
  shell_exec('sudo /var/www/minecraft/commandes/changeVersion.sh '. $_POST["version"]);
}

?>
</html>
