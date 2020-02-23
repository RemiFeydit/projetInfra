<?php

$motd = $_POST["motd"];
$slots = $_POST["slots"];
$mapName = $_POST["mapName"];
$renderDistance = $_POST["renderDistance"];
$difficulty = $_POST["difficulty"];
$gamemode = $_POST["gamemode"];

if(!empty($_POST["whitelist"])){
    $_POST["whitelist"] = 'true';
}else{
    $_POST["whitelist"] = 'false';
}

if(!empty($_POST["onlineMod"])){
    $_POST["onlineMod"] = 'true';
}else{
    $_POST["onlineMod"] = 'false';
}

if(!empty($_POST["structureGeneration"])){
    $_POST["structureGeneration"] = 'true';
}else{
    $_POST["structureGeneration"] = 'false';
}

if(!empty($_POST["monsters"])){
    $_POST["monsters"] = 'true';
}else{
    $_POST["monsters"] = 'false';
}

if(!empty($_POST["nether"])){
    $_POST["nether"] = 'true';
}else{
    $_POST["nether"] = 'false';
}

if(!empty($_POST["pvp"])){
    $_POST["pvp"] = 'true';
}else{
    $_POST["pvp"] = 'false';
}

if(!empty($_POST["pnj"])){
    $_POST["pnj"] = 'true';
}else{
    $_POST["pnj"] = 'false';
}

if(!empty($_POST["animals"])){
    $_POST["animals"] = 'true';
}else{
    $_POST["animals"] = 'false';
}

if(!empty($_POST["hardcoreMod"])){
    $_POST["hardcoreMod"] = 'true';
}else{
    $_POST["hardcoreMod"] = 'false';
}

if(!empty($_POST["enableFly"])){
    $_POST["enableFly"] = 'true';
}else{
    $_POST["enableFly"] = 'false';
}

if(!empty($_POST["commandBlock"])){
   $_POST["commandBlock"] = 'true';
}else{
   $_POST["commandBlock"] = 'false';
}

if(!is_numeric($slots) || !is_numeric($renderDistance)){
    header('Location: ./pages/propriété.php');
}

$whitelist = $_POST["whitelist"];
$onlineMod = $_POST["onlineMod"];
$structureGeneration = $_POST["structureGeneration"];
$nether = $_POST["nether"];
$pvp = $_POST["pvp"];
$pnj = $_POST["pnj"];
$monsters = $_POST["monsters"];
$animals = $_POST["animals"];
$hardcoreMod = $_POST["hardcoreMod"];
$enableFly = $_POST["enableFly"];
$commandBlock = $_POST["commandBlock"];

shell_exec("sudo ./commandes/changeProperties.sh motd '$motd'");
shell_exec("sudo ./commandes/changeProperties.sh max-players $slots");
shell_exec("sudo ./commandes/changeProperties.sh level-name '$mapName'");
shell_exec("sudo ./commandes/changeProperties.sh view-distance $renderDistance");
shell_exec("sudo ./commandes/changeProperties.sh difficulty $difficulty");
shell_exec("sudo ./commandes/changeProperties.sh gamemode $gamemode");

shell_exec("sudo ./commandes/changeProperties.sh enable-command-block $commandBlock");
shell_exec("sudo ./commandes/changeProperties.sh white-list $whitelist");
shell_exec("sudo ./commandes/changeProperties.sh online-mode $onlineMod");
shell_exec("sudo ./commandes/changeProperties.sh generate-structures $structureGeneration");
shell_exec("sudo ./commandes/changeProperties.sh allow-nether $nether");
shell_exec("sudo ./commandes/changeProperties.sh pvp $pvp");
shell_exec("sudo ./commandes/changeProperties.sh spawn-npcs $pnj");
shell_exec("sudo ./commandes/changeProperties.sh spawn-monsters $monsters");
shell_exec("sudo ./commandes/changeProperties.sh spawn-animals $animals");
shell_exec("sudo ./commandes/changeProperties.sh hardcore $hardcoreMod");
shell_exec("sudo ./commandes/changeProperties.sh allow-flight $enableFly");

header('Location: ./pages/properties.php');
?>
