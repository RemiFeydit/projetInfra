cd /var/www/minecraft/minecraftServer/
sed -i 's/false/true/g' eula.txt
sed -i 's/enable-rcon=false/enable-rcon=true/g' server.properties
sed -i 's/rcon.password=/rcon.password=azerty/g' server.properties
java -Xmx1024M -Xms1024M -jar server.jar -nogui > log.txt &
