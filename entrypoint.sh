#!/bin/bash

# This script grants all the necessary permissions to be able to modify the minecraft-data folder
if [ -d /var/www/html/minecraft-data ]; then
    chmod -R 777 /var/www/html/minecraft-data
fi

exec "$@"
