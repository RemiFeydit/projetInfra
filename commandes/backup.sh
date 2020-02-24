#!/bin/bash

action=$1
elementSauvegarde=$2
nomSauvegarde=$3
datebackup=$4

#s'assurer que le dossier backup existe
if test -d ../backupMinecraft/backup
    then
    if test -f ../backupMinecraft/backup/config
        then
        echo Rappel: vos backup sont enregistrés dans ../backupMinecraft/backup
        echo ''
    else 
        echo Vos backup seront enregistré dans ../backupMinecraft/backup
        echo ''
        borg init -e none ../backupMinecraft/backup
    fi
else
    echo Vos backup seront enregistré dans ../backupMinecraft/backup
    echo ''
    borg init -e none ../backupMinecraft/backup
fi


#action réalisé en fonction des paramètres
case $action in
    "save")
	    echo Sauvegarde en cours...
        cd ../minecraftServer
        case $elementSauvegarde in
            world)
                borg delete ../backupMinecraft/backup::"$nomSauvegarde"_`date "+%d\%m\%Y"`_$(cat versionActuelle.txt) 
                borg create ../backupMinecraft/backup::"$nomSauvegarde"_`date "+%d\%m\%Y"`_$(cat versionActuelle.txt) $(grep level-name ./server.properties | cut -d'=' -f2)
                ;;
	    	server.properties)
                borg delete ../backupMinecraft/backup::"$nomSauvegarde"_`date "+%d\%m\%Y"`_$(cat versionActuelle.txt) 
                borg create ../backupMinecraft/backup::"$nomSauvegarde"_`date "+%d\%m\%Y"`_$(cat versionActuelle.txt)  server.properties
                ;;
             all)
                borg delete ../backupMinecraft/backup::$(grep level-name ./server.properties | cut -d'=' -f2)_`date "+%d\%m\%Y"`_$(cat versionActuelle.txt) 
                borg create ../backupMinecraft/backup::$(grep level-name ./server.properties | cut -d'=' -f2)_`date "+%d\%m\%Y"`_$(cat versionActuelle.txt)  $(grep level-name ./server.properties | cut -d'=' -f2)
                borg delete ../backupMinecraft/backup::server.properties_`date "+%d\%m\%Y"`_$(cat versionActuelle.txt) 
                borg create ../backupMinecraft/backup::server.properties_`date "+%d\%m\%Y"`_$(cat versionActuelle.txt)  server.properties
                ;; 
             *)
                echo "Erreur: seul les world et server.properties sont sauvegardés."
                ;;
        esac
	    
	    echo Sauvegarde Effectuée !
      	;;
    "list")
        borg $action ../backupMinecraft/backup
        ;;
    "restore")
        echo Extraction du contenue du backup \"$nomSauvegarde\" en cours...
        cd ../minecraftServer
        case $elementSauvegarde in
            world)
                borg extract ../backupMinecraft/backup::"$nomSauvegarde"_"$datebackup"_$(cat versionActuelle.txt) 
                ;;
		server.properties)
                borg extract ../backupMinecraft/backup::"$nomSauvegarde"_"$datebackup"_$(cat versionActuelle.txt) 
                ;;
             *)
                echo "Erreur: seul les world et server.properties sont sauvegardés."
                ;;
        esac
        echo Extraction terminée !
        ;; 
    "delete")
        if test "$elementSauvegarde" = "all"
            then
            echo Suppression en cours...
            borg $action ../backupMinecraft/backup
            echo Tous vos backup ont bien été supprimés !
        else
            echo Suppression en cours...
            borg $action ../backupMinecraft/backup::"$nomSauvegarde"_`date "+%d\%m\%Y"`_$(cat versionActuelle.txt)
            echo Votre backup \"$nomSauvegarde\" a bien été supprimé !
        fi
        ;; 
    *)
        echo Erreur
        ;;
esac
