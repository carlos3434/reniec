echo "DB_CONNECTION=mysql" >> ./.env
echo "DB_HOST=${MYSQLCS_CONNECT_STRING%:*}" >> ./.env
echo "DB_PORT=${MYSQLCS_MYSQL_PORT}" >> ./.env
echo "DB_DATABASE=${MYSQLCS_CONNECT_STRING##*/}" >> ./.env
echo "DB_USERNAME=${MYSQLCS_USER_NAME}" >> ./.env
echo "DB_PASSWORD=${MYSQLCS_USER_PASSWORD}" >> ./.env
tail -f storage/logs/laravel.log &
apache2-run public