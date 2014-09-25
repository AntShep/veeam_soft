Zend Framework 2 Job Application
=======================

Introduction
------------
This is a simple, skeleton application using the ZF2 MVC layer and module
systems.

Installation
------------

Using Composer (recommended)
----------------------------
The recommended way to get a working copy of this project is to clone the repository
and use `composer` to install dependencies using the `create-project` command:

    curl -s https://getcomposer.org/installer | php --
    php composer.phar create-project -sdev --repository-url="https://packages.zendframework.com" zendframework/skeleton-application path/to/install

Alternately, clone the repository and manually invoke `composer` using the shipped
`composer.phar`:

    cd my/project/dir
    git clone git://github.com/zendframework/ZendSkeletonApplication.git
    cd ZendSkeletonApplication
    php composer.phar self-update
    php composer.phar install

Web Server Setup
----------------
### Install ssh-server
    sudo apt-get install openssh-server

### Run updates
    sudo apt-get update
    sudo apt-get upgrade -y

### Install build-essential and curl
    sudo aptitude install build-essential -y
    sudo apt-get install curl -y

### Install lamp server
    sudo tasksel install lamp-server
    sudo chown -R [username]:[username] /var/www

### Apache Setup

To setup apache, setup a virtual host to point to the public/ directory of the
project and you should be ready to go! It should look something like below:

    <VirtualHost *:80>
        ServerName [domain name]
        DocumentRoot /var/www/[project path]
        <Directory /var/www/[project path]>
            # enable the .htaccess rewrites
            AllowOverride All
            Require all granted
        </Directory>
    </VirtualHost>

Job Application Setup
---------------------
Copy project files from GitHub (https://github.com/AntShep/veem_soft) into document root

Create data base `veem` into MySql and run nex command to create tables:
    ./vendor/bin/doctrine-module orm:schema-tool:update --force
    ./vendor/bin/doctrine-module orm:validate-schema

Insert into config/autoload/local.php login and password for access to database
        'doctrine' => array(
            'connection' => array(
                'orm_default' => array(
                    'params' => array(
                        'user'     => '[user]',
                        'password' => '[password]',
                    )
                )
            ),
        ),

Import veem.sql file into your database



Congratulation. You can use this Application!!!
===============================================
