apt-get update && apt-get upgrade
apt-get install default-jdk -y
apt-get install apache2 -y
ufw allow 'Apache'
mkdir /var/www/minecraft
mkdir /var/www/minecraft/minecraftServer
cd /var/www/minecraft/minecraftServer
wget https://launcher.mojang.com/v1/objects/e9f105b3c5c7e85c7b445249a93362a22f62442d/server.jar -O /var/www/minecraft/minecraft_server1_15.jar
chmod +x minecraft_server1_15.jar
ufw allow 25565
java -Xmx1024M -Xms1024M -jar minecraft_server1_15.jar -nogui
sed -i 's/false/true/g' eula.txt
java -Xmx1024M -Xms1024M -jar minecraft_server1_15.jar -nogui
