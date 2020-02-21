<?php

$motd = $_POST["motd"];
$slots = $_POST["slots"];
$mapName = $_POST["mapName"];
$renderDistance = $_POST["renderDistance"];
$difficulty = $_POST["difficulty"];
$gamemode = $_POST["gamemode"];

if(!empty($_POST["whitelist"])){
    $_POST["whitelist"] = true;
}else{
    $_POST["whitelist"] = false;
}

if(!empty($_POST["onlineMod"])){
    $_POST["onlineMod"] = true;
}else{
    $_POST["onlineMod"] = false;
}

if(!empty($_POST["structureGeneration"])){
    $_POST["structureGeneration"] = true;
}else{
    $_POST["structureGeneration"] = false;
}

if(!empty($_POST["monsters"])){
    $_POST["monsters"] = true;
}else{
    $_POST["monsters"] = false;
}

if(!empty($_POST["whitelist"])){
    $_POST["commandBlock"] = true;
}else{
    $_POST["commandBlock"] = false;
}

if(!empty($_POST["nether"])){
    $_POST["nether"] = true;
}else{
    $_POST["nether"] = false;
}

if(!empty($_POST["pvp"])){
    $_POST["pvp"] = true;
}else{
    $_POST["pvp"] = false;
}

if(!empty($_POST["pnj"])){
    $_POST["pnj"] = true;
}else{
    $_POST["pnj"] = false;
}

if(!empty($_POST["animals"])){
    $_POST["animals"] = true;
}else{
    $_POST["animals"] = false;
}

if(!empty($_POST["hardcoreMod"])){
    $_POST["hardcoreMod"] = true;
}else{
    $_POST["hardcoreMod"] = false;
}

if(!empty($_POST["advancement"])){
    $_POST["advancement"] = true;
}else{
    $_POST["advancement"] = false;
}

if(!empty($_POST["enableFly"])){
    $_POST["enableFly"] = true;
}else{
    $_POST["enableFly"] = false;
}

$whitelist = $_POST["whitelist"];
$onlineMod = $_POST["onlineMod"];
$structureGeneration = $_POST["structureGeneration"];
$commandBlock = $_POST["commandBlock"];
$nether = $_POST["nether"];
$pvp = $_POST["pvp"];
$pnj = $_POST["pnj"];
$monsters = $_POST["monsters"];
$animals = $_POST["animals"];
$hardcoreMod = $_POST["hardcoreMod"];
$advancement = $_POST["advancement"];
$enableFly = $_POST["enableFly"];

// shell_exec("./changePropertie.sh motd $motd");
// shell_exec("./changePropertie.sh max-players $slots");
// shell_exec("./changePropertie.sh level-name $mapName");
// shell_exec("./changePropertie.sh view-distance $renderDistance");
// shell_exec("./changePropertie.sh difficulty $difficulty");
// shell_exec("./changePropertie.sh gamemode $gamemode");


// shell_exec("./changePropertie.sh white-list $whitelist");
// shell_exec("./changePropertie.sh online-mode $onlineMode");
// shell_exec("./changePropertie.sh generate-structures $structureGeneration");
// shell_exec("./changePropertie.sh enable-command-block $commandeBlock");
// shell_exec("./changePropertie.sh allow-nether $nether");
// shell_exec("./changePropertie.sh allow-pvp $pvp");
// shell_exec("./changePropertie.sh spawn-npcs $pnj");
// shell_exec("./changePropertie.sh spawn-monsters $monsters");
// shell_exec("./changePropertie.sh spawn-animals $animals");
// shell_exec("./changePropertie.sh hardcore $hardcoreMode");
// shell_exec("./changePropertie.sh announce-player-achievements $advancement");
// shell_exec("./changeProperties.sh allow-flight $enableFly")

?>