#!/bin/bash

touch /logs/php_errors.log
chown www-data:www-data /logs/php_errors.log

# Setup env variables to docker
printenv | perl -pe 's/^(.+?\=)(.*)$/\1"\2"/g' | cat - /crontab_tmp > /crontab
crontab -u www-data /crontab
cron

# Setup app keys for private repos on bitbucket
git config --global url."https://we_danced_a_lot:8hDp7jeJ8ekTLJMMGMSt@bitbucket.org/".insteadOf "https://bitbucket.org/"

# Install packages
composer --working-dir=/src install
composer global require "phpunit/phpunit=4.5.*"

# Start daemon
php-fpm