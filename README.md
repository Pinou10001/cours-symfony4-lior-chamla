# Project

Symfony 4 curse by Lior Chamla (https://learn.web-develop.me/courses/symfony-4-les-fondamentaux-par-la-pratique/).

Using Symfony & SASS.

Available in [symbnb.martinsoenen.com](http://symbnb.martinsoenen.com).


# Docker Boilerplate

Made by [Martin Soenen](https://github.com/Pinou10001) & available on [GitHub](https://github.com/Pinou10001/Docker-boilerplate-PHP-FPM-MySQL-Composer-PHPMyAdmin-Nginx-MailHog).

Containers created in a base of [phpdocker.io](https://phpdocker.io).

  | Services installed in this boilerplate | Installation container |
  |----------------------------------------|------------------------|
  | PHP & PHP-FPM                          | php                    |
  | NGINX                                  | nginx                  |
  | MySQL                                  | mysql                  |
  | PHPMyAdmin                             | phpmyadmin             |
  | Composer                               | php                    |
  | Node & NPM                             | php                    |
  | MailHog                                | mailhog                |


## Install

Build the Docker containers : `docker-compose build`.  
Once this is done, you can run the containers : `docker-compose up -d`.  

At the first launch after building the containers, wait a few seconds for MySQL to launch properly.

The project is now available if you go to the URL `localhost` !  
If you want to have a better URL, you can add the following line to your hosts file `127.0.0.1 ${PROJECT_URL}` and the project will be available on the URL you set in the PROJECT_URL line of your .env file !  


## Accessing services

To access PHPMyAdmin, just go to the port 81 of your project.  
To access MailHog, just go to the port 82 of your project.  

For obvious security reasons, it is not recommended to use these ports for a production environment.  

To access Composer, you must enter the PHP container : `docker-compose exec php bash`. You will then be able to do your Composer commands.  

Be careful, the IP address of the database is the name of the container. The address to indicate in the configuration files of your framework/CMS is therefore : `mysql`.  

## Docker-compose cheatsheet

  * Start the containers by watching their logs : `docker-compose up`
  * Start the containers in the background : `docker-compose up -d`
  * Stop the containers : `docker-compose stop`
  * Kill the containers : `docker-compose kill`
  * Delete the containers : `docker-compose rm`
  * Stop and delete the containers : `docker-compose down`
  * Check the status of the containers : `docker-compose ps`
  * Watch the container logs : `docker-compose logs`
  * Making a command in a container : `docker-compose exec CONTAINER_NAME COMMAND` where `COMMAND` is your command. Examples :  
    - Open a console in the php-fpm container : `docker-compose exec php bash`
    - Open the Symfony console : `docker-compose exec php bin/console`
