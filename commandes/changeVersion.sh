#!/bin/bash

version=$1
save=$2

function start {
    version=$1

    lienVersion=$(grep $version listeVersion.txt | cut -d'=' -f2)

    if ! test -z $lienVersion
        then

        echo Voulez vous sauvegarder le monde et les propriétés de la version actuelle ?
        echo Vous pourrez tout récupérer en revenant à cette version.

        if test $save == "true"
            then
            ./backup.sh save all
        fi

        rm -rf ../minecraftServer
        mkdir ../minecraftServer
        cd ../minecraftServer
        wget $lienVersion
        echo $version>versionActuelle.txt
	java -Xmx1024M -Xms1024M -jar server.jar -nogui

    else
        echo "Erreur: Cette version n'existe pas."
    fi
}

start $version
