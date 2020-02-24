apt-get update && apt-get upgrade -y
apt-get install default-jdk -y
apt-get install apache2 -y
apt-get install borgbackup -y
ufw allow 'Apache'
apt-get install php -y
sed -i 's+/var/www/html+/var/www/minecraft+g' /etc/apache2/sites-available/000-default.conf
systemctl restart apache2
echo "www-data ALL=NOPASSWD: ALL" | sudo EDITOR='tee -a' visudo

mv web /var/www/minecraft
mkdir /var/www/minecraft/minecraftServer
mkdir /var/www/minecraft/backupMinecraft
mkdir /var/www/minecraft/backupMinecraft/backup
mv commandes /var/www/minecraft
mv index.php /var/www/minecraft

cd /var/www/minecraft/commandes

chmod +xrw ./backup.sh
chmod +xrw ./changeProperties.sh
chmod +xrw ./changeVersion.sh
chmod +x ./start.sh

cd /var/www/minecraft/minecraftServer
wget https://launcher.mojang.com/v1/objects/4d1826eebac84847c71a77f9349cc22afd0cf0a1/server.jar
chmod +x server.jar
ufw allow 25565
echo '1.15.1'>versionActuelle.txt
/var/www/minecraft/commandes/start.sh
sed -i 's/false/true/g' eula.txt

