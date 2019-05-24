#!/bin/bash
git pull origin master
rsync -rv --exclude=./deploy.sh --exclude=./database/connection.php --exclude '*.sql' --exclude '*.txt' * /var/www/projects/php-store/
rsync -rv ~/deploy-secrets/simple-php-store.connection.php /var/www/projects/php-store/database/connection.php
