# Projet Infra/SI B2 Gestion Serveur Minecraft
## Présentation du projet

Le but de notre projet est d'avoir notre propre serveur minecraft sous Ubuntu que l'on peut entièrement gérer via une page web.  
  
Nous pouvons donc via la page web :
* Démarrer/Éteindre le serveur 
* Accéder à la console Minecraft
* Changer de version en 2 clics
* Changer les propriétés du serveur (nom du monde, max de joueur, difficulté ...)
* Faire facilement des backup du monde et du serveur.properties

Toutes les interaction faites depuis la page web sont en fait le lancement de commandes Bash. Il est d'ailleur possible de gérer simplement le serveur directement via le terminal grâce à des scripts bash.  

En bonus, nous aurions aimé créer notre propre serveur git avec déploiement automatique.

## Installation 

Clonez ce repository dans le dossier de votre choix.  
  
Déplacez vous ensuite dans le dossier : `cd projetInfra`.  

Nous avons créer un script `run.sh` pour tout installer automatiquement.  
Il faut d'abord lui donner les droits necessaire : `chmod +xwr run.sh`.  
Vous devez maintenant l'exécuter en sudo : `sudo ./run.sh`.  

L'installation va prendre un petit moment. Il est normal de voir des erreurs comme une erreur sur le fichier eula.
Une fois que le script a fini de s'exécuter, l'installation est terminé.

Tous les fichiers nécessaire ce trouvent dans `/var/www/minecraft`.

## Utilisation du projet

Ouvrez une page web à l'adresse localhost.  
Vous allez atterir à l'accueil permettant de lancer le serveur ou de changer de version.  
Cliquez sur lancer le serveur, cela va vous rediriger vers une autre page contenant la console minecraft. Il faut attendre un petit moment pour que la console soit fonctionnelle, le temps que le serveur minecraft se soit bien lancé.  
  
Maintenant que le serveur minecraft est lancé vous pouvez sur votre client lancer minecraft (vérifiez que vous avez bien la même version que celle du serveur).
Dans multijoueur, faites ajouter un serveur. Vous devez rentrer l'adresse ip de votre serveur (`ip a` pour la connaître) suivit de `:25565`. Cela peut par exemple donner `192.168.22.4:25565`.  

Il n'y a plus qu'à vous connecter et voila !

Pensez avant de changer de version, le serveur.properties ou de faire une backup à d'abord éteindre le serveur.  

Pour les restauration, vous ne pouvez bien entendu restorer que les backup de la même version que votre serveur.  

Pour les version, seul les version écrite dans le fichier `/var/www/minecraft/commandes/listeVersion.txt` sont disponible. Pour en rajouter rajouter une ligne sous le format version:lienTelechargement par exemple `1.15.1:lienTelechargement`. Notez que les liens de téléchargement de version doivent provenir de https://mcversions.net/ pour assurer un fonctionnement optimal. Veillez à bien mettre une voersion par ligne.

Si vous préférez des lignes de commandes, vous pouvez exécuter les script en sudo dans `/var/www/minecrft/commandes`:

* Démarrer le serveur : `sudo ./start.sh`.
* Changez les propriétés : `sudo ./changeProperties.sh nomDeLaPropriete nouvelleValeur` par exemple `sudo ./changeProperties.sh max-players 16`.
* Changer de version : `sudo changeVersion.sh version` par exempke `sudo changeVersion.sh 1.15.1`. Vous pouvez rajouter `true` si vous voulez save le world et server.properties avant de changer de version : `sudo changeVersion.sh 1.15.1 true`.
* gestion Backup :
    * Faire une backup : 
        * Backup du world : `sudo ./backup.sh save world nomDeLaBackup`.
        * Backup du server.properties : `sudo ./backup.sh save server.properties nomDeLaBackup`.
        * Backup server.properties et world en même temps : `sudo ./backup.sh save all` (le nom des sauvegarde seront celui du world actuelle et server.properties).
    * Lister les backup : `sudo ./backup.sh list`
    * Restorer une backup : `sudo ./backup.sh restore nomBackup_dateBackup` par exemple `sudo ./backup.sh restore world2_11-23.26-02-2020`. Le format de date est `"+%H-%M.%d-%m-%Y"`
    * Supprimer une backup : `sudo ./backup.sh delete nomBackup_dateBackup_versionMinecraftBackup` par exemple `sudo ./backup.sh restore world2_11-23.26-02-2020_1.15.1`
    * Supprimer toutes les backups : `sudo ./backup.sh delete all` (Il vous sera demander d'entrer YES pour confirmer la suppression. Écrire 'yes' au lieu de 'YES ne fonctionnera pas)

## Maintenir à jour ce serveur

Rien de plus simple, pour les version minecraft, comme dit précédemment vous pouvez rajouter toutes celles que vous souhaitez.  
Il se peut juste que vous devrez mettre à jour java. Pour ce faire : `sudo update-alternatives --config javac`. 
Ceci va lister les versions disponibles, et vous n'aurez plus qu'à choisir la plus récente.
