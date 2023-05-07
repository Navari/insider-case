### Project

### Setup project environment
- you can run this command after clone git repository
- after clone repository you have to run those two command to build your environment on docker
- ``docker-compose up -d --build``
- ``docker-compose exec php /bin/bash bin/install.sh``
- ``docker-compose exec php php artisan db:seed``
- when commands done you will have running project with php8, nginx, mysql@8 in your localhost
- project: ``http://localhost:8009/``
- mysql: ``http://localhost:3396/``
