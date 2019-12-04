#!/bin/bash
set -e

# change to application directory
cd /var/www/html


# install dependencies with composer
if [ -f "composer.json" ];then # check if composer.json exists

  composer install --no-ansi --no-interaction --no-scripts --optimize-autoloader
else

  echo "composer.json not found...skipping dependecy installation"
fi

# run necessary commands to prepare the application here



##### STOP EDITING #############
# start apache2 service
if [ "$1" = 'apache2-foreground' ]; then

    exec apache2-foreground
fi
