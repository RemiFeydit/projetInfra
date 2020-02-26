#!/bin/bash

version=$1
save=$2

function start {
    version=$1

    lienVersion=$(grep $version /var/www/minecraft/commandes/listeVersion.txt | cut -d'=' -f2)

    if ! test -z $lienVersion
        then

        if test $save == "true"
            then
            /var/www/minecraft/commandes/backup.sh save all
        fi

        rm -rf /var/www/minecraft/minecraftServer
        mkdir /var/www/minecraft/minecraftServer
        cd /var/www/minecraft//minecraftServer
        wget $lienVersion
        echo $version>versionActuelle.txt
	java -Xmx1024M -Xms1024M -jar server.jar -nogui

    else
        echo "Erreur: Cette version n'existe pas."
    fi
}

start $version
