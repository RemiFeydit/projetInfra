#!/bin/bash

version=$1

function start {
    version=$1

    lienVersion=$(grep $version listeVersion.txt | cut -d'=' -f2)

    if ! test -z $lienVersion
        then

        echo Voulez vous sauvegarder le monde et les propriétés de la version actuelle ?
        echo Vous pourrez tout récupérer en revenant à cette version.
        read reponse

        if test $reponse == "y"
            then
            ./backup.sh save all
        elif ! test $reponse == "n"
            then
            echo "Veuillez répondre par y pour oui ou par n pour non."
            return 0
        fi

        rm -rf ../minecraftServer
        mkdir ../minecraftServer
        cd ../minecraftServer
        wget $lienVersion
        echo $version>versionActuelle.txt
	echo 'eula=true'>eula.txt

    else
        echo "Erreur: Cette version n'existe pas."
    fi
}

start $version