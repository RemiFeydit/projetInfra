apt-get update && apt-get upgrade
apt-get install default-jdk -y
apt-get install apache2 -y
ufw allow 'Apache'

mkdir /var/www/minecraft
mkdir /var/www/minecraft/minecraftServer
mkdir /var/www/minecraft/backupMinecraft/backup
mv commandes /var/www/minecraft

cd /var/www/minecraft/commandes

chmod +xrw ./backup.sh
chmod +xrw ./changeProperties.sh
chmod +xrw ./changeVersion.sh
chmod +x ./start.sh

cd /var/www/minecraft/minecraftServer
wget https://launcher.mojang.com/v1/objects/e9f105b3c5c7e85c7b445249a93362a22f62442d/server.jar -O /var/www/minecraft/minecraft_server1_15.jar
chmod +x minecraft_server1_15.jar
ufw allow 25565
echo 'eula=true'>eula.txt
