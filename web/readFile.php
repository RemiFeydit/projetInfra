<?php
$section = file_get_contents('/var/www/minecraft/minecraftServer/server.properties', FALSE);
$lines = explode("\n", $section);


function startsWith ($string, $startString) 
{ 
    $len = strlen($startString); 
    return (substr($string, 0, $len) === $startString); 
}

foreach ($lines as $key => $line) {
    if(startsWith($line, "motd")){
        $motd = explode("=", $line)[1];
    }

    if(startsWith($line, "max-players")){
        $slots = explode("=", $line)[1];
    }

    if(startsWith($line, "level-name")){
        $mapName = explode("=", $line)[1];
    }

    if(startsWith($line, "allow-nether")){
        $nether = explode("=", $line)[1];
    }

    if(startsWith($line, "spawn-npcs")){
        $pnj = explode("=", $line)[1];
    }

    if(startsWith($line, "white-list")){
        $whitelist = explode("=", $line)[1];
    }

    if(startsWith($line, "spawn-animals")){
        $animals = explode("=", $line)[1];
    }

    if(startsWith($line, "hardcore")){
        $hardcoreMode = explode("=", $line)[1];
    }

    if(startsWith($line, "online-mode")){
        $onlineMode = explode("=", $line)[1];
    }

    if(startsWith($line, "pvp")){
        $pvp = explode("=", $line)[1];
    }

    if(startsWith($line, "difficulty")){
        $difficulty = explode("=", $line)[1];
    }

    if(startsWith($line, "enable-command-block")){
        $commandeBlock = explode("=", $line)[1];
    }

    if(startsWith($line, "gamemode")){
        $gamemode = explode("=", $line)[1];
    }

    if(startsWith($line, "spawn-monsters")){
        $monsters = explode("=", $line)[1];
    }

    if(startsWith($line, "generate-structures")){
        $structureGeneration = explode("=", $line)[1];
    }

    if(startsWith($line, "view-distance")){
        $viewDistance = explode("=", $line)[1];
    }

    if(startsWith($line, "allow-flight")){
        $enableFly = explode("=", $line)[1];
    }
}
?>