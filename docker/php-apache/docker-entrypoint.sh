#!/bin/bash
set -e

# change to application directory
cd /var/www/html


# install dependencies with composer
if [ -f "composer.json" ];then # check if composer.json exists
  printf "\n\ninstalling composer dependencies...\n\n"
  composer install --no-ansi --no-interaction --no-scripts --optimize-autoloader
else

  printf "\n\ncomposer.json not found...skipping dependecy installation\n\n"
fi

# run necessary commands to prepare the application here

php artisan key:generate

##### STOP EDITING #############
# start apache2 service
if [ "$1" = 'apache2-foreground' ]; then
	printf "\n\nLAUNCHING WEB SERVER...\n\n"
    exec apache2-foreground
fi
