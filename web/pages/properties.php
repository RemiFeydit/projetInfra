<!DOCTYPE html>
<html lang="en">

<?php include '/var/www/minecraft/readFile.php';?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Propriétés</title>
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
        <div class="col s12 m12">
            <form class="col s12" method="post" action="../getValue.php">
                <div class="card blue-grey darken-4">
                    <div class="card-content white-text">
                        <div class="row">
                            <div class="col s12 m6">
                                <div class="card blue-grey darken-3">
                                    <div class="card-content white-text">
                                        <span class="card-title">Propriétés :</span>
                                        <div class="row">
                                            <div class="input-field col s6">
                                                <input class="white-text" id="motd"
                                                    type="text" class="validate" name="motd" value ="<?php echo $motd;?>">
                                                <label class="grey-darken-4-text  active" for="motd">MOTD :</label>
                                            </div>
                                            <div class="input-field col s6">
                                                <input class="white-text" id="slots" name="slots"
                                                    type="text" name="slots" value ="<?php echo $slots;?>">
                                                <label class="grey-darken-4-text active" for="slots">Slots :</label>
                                            </div>
                                            <div class="input-field col s6">
                                                <input class="white-text" id="mapName" type="text"
                                                    name="mapName" value ="<?php echo $mapName;?>">
                                                <label class="grey-darken-4-text active" for="mapName">Nom de la map
                                                    :</label>
                                            </div>
                                            <div class="input-field col s6">
                                                <input class="white-text" id="renderDistance"
                                                    type="text" name="renderDistance" value ="<?php echo $viewDistance;?>">
                                                <label class="grey-darken-4-text active" for="renderDistance">Render
                                                    Distance
                                                    :</label>
                                            </div>

                                            <div class="input-field col s6">
                                                <label class="grey-darken-4-text active" for="renderDistance">Difficulté
                                                    :</label><br>
                                                <select name="difficulty" class="browser-default">
                                                    <option id="difficulty0" value="peaceful">Paisible</option>
                                                    <option id="difficulty1" value="easy">Facile</option>
                                                    <option id="difficulty2" value="normal">Normal</option>
                                                    <option id="difficulty3" value="hard">Difficile</option>
                                                </select>
                                                
                                            </div>

                                            <div class="input-field col s6">
                                            <label class="grey-darken-4-text active" for="renderDistance">Mode de
                                                    jeu :
                                                    :</label><br>
                                                <select name ="gamemode" class="browser-default">
                                                    <option id="gamemode0" value="survival">Survie</option>
                                                    <option id="gamemode1" value="creative">Créatif</option>
                                                    <option id="gamemode2" value="adventure">Aventure</option>
                                                    <option id="gamemode3" value="spectator">Spectateur</option>
                                                </select>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12 m6">
                                    <div class="card blue-grey darken-3">
                                        <div class="card-content white-text">
                                            <span class="card-title">Propriétés :</span>
                                            <p>
                                                <label>
                                                    <input type="checkbox" class="filled-in" name="whitelist" id="whitelist"/>
                                                    <span class="white-text">WhiteList</span>
                                                </label>
                                            </p>
                                            <p>
                                                <label>
                                                    <input type="checkbox" class="filled-in" name="onlineMod" id="onlineMod"/>
                                                    <span class="white-text">Online Mode</span>
                                                </label>
                                            </p>
                                            <p>
                                                <label>
                                                    <input type="checkbox" class="filled-in"
                                                        name="structureGeneration" id="structureGeneration"/>
                                                    <span class="white-text">Génération de structure</span>
                                                </label>
                                            </p>
                                            <p>
                                                <label>
                                                    <input type="checkbox" class="filled-in" name="commandBlock" id="commandBlock"/>
                                                    <span class="white-text">Commande blocs</span>
                                                </label>
                                            </p>
                                            <p>
                                                <label>
                                                    <input type="checkbox" class="filled-in" name="nether" id="nether"/>
                                                    <span class="white-text">Nether</span>
                                                </label>
                                            </p>
                                            <p>
                                                <label>
                                                    <input type="checkbox" class="filled-in" name="pvp" id="pvp"/>
                                                    <span class="white-text">PvP</span>
                                                </label>
                                            </p>
                                            <p>
                                                <label>
                                                    <input type="checkbox" class="filled-in" name="pnj" id="pnj"/>
                                                    <span class="white-text">PNJ</span>
                                                </label>
                                            </p>
                                            <p>
                                                <label>
                                                    <input type="checkbox" class="filled-in" name="monsters" id="monsters"/>
                                                    <span class="white-text">Monstre</span>
                                                </label>
                                            </p>
                                            <p>
                                                <label>
                                                    <input type="checkbox" class="filled-in" name="animals" id="animals"/>
                                                    <span class="white-text">Animaux</span>
                                                </label>
                                            </p>
                                            <p>
                                                <label>
                                                    <input type="checkbox" class="filled-in" name="hardcoreMod" id="hardcoreMod"/>
                                                    <span class="white-text">Mode Hardcore</span>
                                                </label>
                                            </p>
                                            <p>
                                                <label>
                                                    <input type="checkbox" class="filled-in"
                                                        name="enableFly" id="enableFly"/>
                                                    <span class="white-text">Empêcher l'expulsion pour fly</span>
                                                </label>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="btn waves-effect waves-light" type="submit" name="submit">Submit
                            <i class="material-icons right">send</i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
</body>
<script>
    switch ("<?php echo $difficulty?>") {
        case "peaceful":
            document.getElementById("difficulty0").setAttribute("selected", '');
            break;
        case "easy":
            document.getElementById("difficulty1").setAttribute("selected", '');
            break;
        case "normal":
            document.getElementById("difficulty2").setAttribute("selected", '');
            break;
        case "hard":
            document.getElementById("difficulty3").setAttribute("selected", '');
            break;
    }

    switch ("<?php echo $gamemode?>") {
        case "survival":
            document.getElementById("gamemode0").setAttribute("selected", '');
            break;
        case "creative":
            document.getElementById("gamemode1").setAttribute("selected", '');
            break;
        case "adventure":
            document.getElementById("gamemode2").setAttribute("selected", '');
            break;
        case "spectator":
            document.getElementById("gamemode3").setAttribute("selected", '');
            break;
    }

    if(<?php echo $whitelist?>){
        document.getElementById("whitelist").setAttribute("checked", '');
    }

    if(<?php echo $structureGeneration?>){
        document.getElementById("structureGeneration").setAttribute("checked", '');
    }

    if(<?php echo $pvp?>){
        document.getElementById("pvp").setAttribute("checked", '');
    }

    if(<?php echo $pnj?>){
        document.getElementById("pnj").setAttribute("checked", '');
    }

    if(<?php echo $monsters?>){
        document.getElementById("monsters").setAttribute("checked", '');
    }

    if(<?php echo $hardcoreMod?>){
        document.getElementById("hardcoreMod").setAttribute("checked", '');
    }

    if(<?php echo $onlineMod?>){
        document.getElementById("onlineMod").setAttribute("checked", '');
    }

    if(<?php echo $nether?>){
        document.getElementById("nether").setAttribute("checked", '');
    }

    if(<?php echo $animals?>){
        document.getElementById("animals").setAttribute("checked", '');
    }

    if(<?php echo $enableFly?>){
        document.getElementById("enableFly").setAttribute("checked", '');
    }

    if(<?php echo $commandBlock?>){
        document.getElementById("commandBlock").setAttribute("checked", '');
    }
</script>
</html>
