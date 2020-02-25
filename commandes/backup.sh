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
                borg delete ../backupMinecraft/backup::"$nomSauvegarde"_`date "+%H-%M.%d-%m-%Y"`_$(cat versionActuelle.txt) 
                borg create ../backupMinecraft/backup::"$nomSauvegarde"_`date "+%H-%M.%d-%m-%Y"`_$(cat versionActuelle.txt) $(grep level-name ./server.properties | cut -d'=' -f2)
				echo "$nomSauvegarde"_`date "+%H-%M.%d-%m-%Y"`_$(cat versionActuelle.txt)>>../backupMinecraft/listeBackup.txt
                ;;
	    	server.properties)
                borg delete ../backupMinecraft/backup::"$nomSauvegarde"_`date "+%H-%M.%d-%m-%Y"`_$(cat versionActuelle.txt) 
                borg create ../backupMinecraft/backup::"$nomSauvegarde"_`date "+%H-%M.%d-%m-%Y"`_$(cat versionActuelle.txt)  server.properties
				echo "$nomSauvegarde"_`date "+%H-%M.%d-%m-%Y"`_$(cat versionActuelle.txt)>>../backupMinecraft/listeBackup.txt
                ;;
             all)
                borg delete ../backupMinecraft/backup::$(grep level-name ./server.properties | cut -d'=' -f2)_`date "+%H-%M.%d-%m-%Y"`_$(cat versionActuelle.txt) 
                borg create ../backupMinecraft/backup::$(grep level-name ./server.properties | cut -d'=' -f2)_`date "+%H-%M.%d-%m-%Y"`_$(cat versionActuelle.txt)  $(grep level-name ./server.properties | cut -d'=' -f2)
				echo $(grep level-name ./server.properties | cut -d'=' -f2)_`date "+%H-%M.%d-%m-%Y"`_$(cat versionActuelle.txt)>>../backupMinecraft/listeBackup.txt
                borg delete ../backupMinecraft/backup::server.properties_`date "+%H-%M.%d-%m-%Y"`_$(cat versionActuelle.txt) 
                borg create ../backupMinecraft/backup::server.properties_`date "+%H-%M.%d-%m-%Y"`_$(cat versionActuelle.txt)  server.properties
				echo server.properties_`date "+%H-%M.%d-%m-%Y"`_$(cat versionActuelle.txt)>>../backupMinecraft/listeBackup.txt
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
                borg extract ../backupMinecraft/backup::"$nomSauvegarde"_$(cat versionActuelle.txt) 
                ;;
		server.properties)
                borg extract ../backupMinecraft/backup::"$nomSauvegarde"_$(cat versionActuelle.txt) 
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
			cd ../backupMinecraft
			rm -rf listeBackup.txt
            echo Tous vos backup ont bien été supprimés !
        else
            echo Suppression en cours...
            borg $action ../backupMinecraft/backup::"$elementSauvegarde"
		sed -i "/$elementSauvegarde/d" ../backupMinecraft/listeBackup.txt
		echo "$elementSauvegarde"
            echo Votre backup \"$elementSauvegarde\" a bien été supprimé !
        fi
        ;; 
    *)
        echo Erreur
        ;;
esac
