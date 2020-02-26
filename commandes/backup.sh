#!/bin/bash

action=$1
elementSauvegarde=$2
nomSauvegarde=$3
datebackup=$4

#s'assurer que le dossier backup existe
if test -d /var/www/minecraft/backupMinecraft/backup
    then
    if test -f /var/www/minecraft/backupMinecraft/backup/config
        then
        echo Rappel: vos backup sont enregistrés dans /var/www/minecraft/backupMinecraft/backup
        echo ''
    else 
        echo Vos backup seront enregistré dans /var/www/minecraft/backupMinecraft/backup
        echo ''
        borg init -e none /var/www/minecraft/backupMinecraft/backup
    fi
else
    echo Vos backup seront enregistré dans /var/www/minecraft/backupMinecraft/backup
    echo ''
    borg init -e none /var/www/minecraft/backupMinecraft/backup
fi


#action réalisé en fonction des paramètres
case $action in
    "save")
	    echo Sauvegarde en cours...
        cd /var/www/minecraft/minecraftServer
        case $elementSauvegarde in
            world)
                borg delete /var/www/minecraft/backupMinecraft/backup::"$nomSauvegarde"_`date "+%H-%M.%d-%m-%Y"`_$(cat versionActuelle.txt) 
                borg create /var/www/minecraft/backupMinecraft/backup::"$nomSauvegarde"_`date "+%H-%M.%d-%m-%Y"`_$(cat versionActuelle.txt) $(grep level-name ./server.properties | cut -d'=' -f2)
				echo "$nomSauvegarde"_`date "+%H-%M.%d-%m-%Y"`_$(cat versionActuelle.txt)>>/var/www/minecraft/backupMinecraft/listeBackup.txt
                ;;
	    	server.properties)
                borg delete /var/www/minecraft/backupMinecraft/backup::"$nomSauvegarde"_`date "+%H-%M.%d-%m-%Y"`_$(cat versionActuelle.txt) 
                borg create /var/www/minecraft/backupMinecraft/backup::"$nomSauvegarde"_`date "+%H-%M.%d-%m-%Y"`_$(cat versionActuelle.txt)  server.properties
				echo "$nomSauvegarde"_`date "+%H-%M.%d-%m-%Y"`_$(cat versionActuelle.txt)>>/var/www/minecraft/backupMinecraft/listeBackup.txt
                ;;
             all)
                borg delete /var/www/minecraft/backupMinecraft/backup::$(grep level-name ./server.properties | cut -d'=' -f2)_`date "+%H-%M.%d-%m-%Y"`_$(cat versionActuelle.txt) 
                borg create /var/www/minecraft/backupMinecraft/backup::$(grep level-name ./server.properties | cut -d'=' -f2)_`date "+%H-%M.%d-%m-%Y"`_$(cat versionActuelle.txt)  $(grep level-name ./server.properties | cut -d'=' -f2)
				echo $(grep level-name ./server.properties | cut -d'=' -f2)_`date "+%H-%M.%d-%m-%Y"`_$(cat versionActuelle.txt)>>/var/www/minecraft/backupMinecraft/listeBackup.txt
                borg delete /var/www/minecraft/backupMinecraft/backup::server.properties_`date "+%H-%M.%d-%m-%Y"`_$(cat versionActuelle.txt) 
                borg create /var/www/minecraft/backupMinecraft/backup::server.properties_`date "+%H-%M.%d-%m-%Y"`_$(cat versionActuelle.txt)  server.properties
				echo server.properties_`date "+%H-%M.%d-%m-%Y"`_$(cat versionActuelle.txt)>>/var/www/minecraft/backupMinecraft/listeBackup.txt
                ;; 
             *)
                echo "Erreur: seul les world et server.properties sont sauvegardés."
                ;;
        esac
	    
	    echo Sauvegarde Effectuée !
      	;;
    "list")
        borg $action /var/www/minecraft/backupMinecraft/backup
        ;;
    "restore")
        echo Extraction du contenue du backup \"$nomSauvegarde\" en cours...
        cd /var/www/minecraft/minecraftServer
                borg extract /var/www/minecraft/backupMinecraft/backup::"$elementSauvegarde"_$(cat versionActuelle.txt) 
        echo Extraction terminée !
        ;; 
    "delete")
        if test "$elementSauvegarde" = "all"
            then
            echo Suppression en cours...
            borg $action /var/www/minecraft/backupMinecraft/backup
			cd /var/www/minecraft/backupMinecraft
			rm -rf listeBackup.txt
            echo Tous vos backup ont bien été supprimés !
        else
            echo Suppression en cours...
            borg $action /var/www/minecraft/backupMinecraft/backup::"$elementSauvegarde"
		sed -i "/$elementSauvegarde/d" /var/www/minecraft/backupMinecraft/listeBackup.txt
		echo "$elementSauvegarde"
            echo Votre backup \"$elementSauvegarde\" a bien été supprimé !
        fi
        ;; 
    *)
        echo Erreur
        ;;
esac
