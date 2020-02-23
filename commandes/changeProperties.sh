#!/bin/bash

propriete=$1
modification=$2

cd ./minecraftServer
valeurActuelle=$(grep $propriete ./server.properties | head -1 | cut -d'=' -f2)
sed -i "s/${propriete}=${valeurActuelle}/${propriete}=${modification}/g" server.properties
