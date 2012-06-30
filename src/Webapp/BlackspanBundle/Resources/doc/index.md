Getting Started With Blackspan
==================================

Blackspan is an application developed with the framework Symfony2. 

If you already use the framework Symfony2, you can deploy the application. 
Otherwise, configure the following link Symfony2

http://symfony.com/doc/current/reference/requirements.html

## Prerequisites

This version of the web application requires Symfony 2.0.x If you are using Symfony
1.0.x, please use the 2.0.15 release of the web application.


## Installation

Installation is a quick 8 step process:

1. Download the web application Blackspan with git.
2. Create and configugre the databases.
3. Create and configure the web server apache
4. Deploy the symlink and update the tables in database
5. Install and configure ssh
6. Configure the crontab for launch the script
7. Personalize the script of verification
8. Create Users for the web app

### Step 1: Download the web application

Install Git. (If you don't install git, please install)

apt-get install git

Download Web app.

git clone git://github.com/Blackspan/Blackspan.git

Folder

mkdir  /webapp

mv Blackspan /webapp/

chown www-data:www-data /webapp/Blackspan


### Step 2: Create and configure the databases

Create the database name "bsp"
(You can use PhpMyadmin or the command unix for create the database)

Create the user of databse blackspan
(Use PhpMyadmin for create user "blackspan" password "spanblack")

## You can personalize the parameters if you want. This is the sample of
   configuration.

If you create and configure the database, please update the file of configuration.

Edit Blackspan/app/config/parameter.ini
```php
[parameters]
    database_driver="pdo_mysql"
    database_host="localhost"
    database_port="3306"
    database_name="bsp"
    database_user="blackspan"
    database_password="spanblack"
    mailer_transport="smtp"
    mailer_host="smtp.blackspan.me"
    mailer_user="admin"
    mailer_password="admin"
    locale="en"
    secret="a9e1fd44f44e33cc0afcd6c22a241f1010"
````
You are finish configure database for the web application.


####### Step 3: Create and configure the web werver apache

(If you don't install apache server, please install now)

Install apache (for debian and ubuntu)

apt-get install apache2

Create the virtualhost for the web app

cp /etc/apache2/sites-avalaibles/default /etc/apache2/sites-avalaibles/blackspanvhost
(The command create a copy file default in apache)

<VirtualHost *:80>
        ServerAdmin blackspan@blackspan.fr
        DocumentRoot /sites/Blackspan/
        <Directory />
                Options FollowSymLinks
                AllowOverride All
        </Directory>
        <Directory /sites/Blackspan/web/>
                DirectoryIndex app.php
                Options Indexes FollowSymLinks MultiViews
                AllowOverride All
                Order allow,deny
                allow from all
        </Directory>
        ScriptAlias /cgi-bin/ /usr/lib/cgi-bin/
        <Directory "/usr/lib/cgi-bin">
                AllowOverride None
                Options +ExecCGI -MultiViews +SymLinksIfOwnerMatch
                Order allow,deny
                Allow from all
        </Directory>
        ErrorLog ${APACHE_LOG_DIR}/error_blackspan.log
        LogLevel warn
        CustomLog ${APACHE_LOG_DIR}/access_blackspan.log combined
        ServerSignature Off
</VirtualHost>

Activate the link

a2enssite blackspanvhost

and restart the web server

/etc/init.d/apache2 restart|reload


**Warning:**
You can test  the web app on the browser, you must see the homepage for authentication.
But we can't connect beacause we don't create the users. Just for a test begin to continued.



###### step 4 : Deploy the symlink and update the tables in database

Please launch th command of symfony2 for deploy the symlink

php app/console assets:install web --symlink

        And 

php app/console doctrine:schema:update --force

This command is used to update the database an create the tables for the storage of the
informations in the web application.
Symfony2 facilitate the different tasks with integrated controls in the framework.
This is very good option.

You can to verify in the databases, all the tables are create for make start the web application.



####### Step 5 : Install and configure ssh

(If you don't install ssh server, please install because the web application
start with the service. )

Install and generate the public key rsa 

    apt-get install ssh

    after the install launche this command

    ssh-keygen -t rsa

The keys id_rsa.pub and id_rsa are store in /root/.ssh/

Configure ssh

    This step is very simple. Because the objective is to configure the automatical connection in the
    remote server  than the web app must manages the authorization with the htaccess files.
    For established the connection, you must send the id_rsa.pub in the remote server to authorize the connection

Send the id_rsa.pub
    
    scp id_rsa.pub user@remote_server:/user/.ssh        -------> Send the id_rsa.pub on folder /user/.ssh/ to remote server

    cat id_rsa.pub >> authorized_keys                   -------> Add to authorize the automatical connection.

Test the connection

    You can test the connection to remote server

    ssh user@remote_server                              --------> The connection must be established without ask the password

    If you don't configure the ssh, you are the link for help

http://www.tutoriels-video.fr/connexion-ssh-sans-mot-passe-keygen/
    --> This is a movie tutorial explain ssh 


 **Warning:**
 You must configure the remote server in /Blackspan/src/Webapp/BlackspanBundle/Script/Create_ssh.php and Delete_ssh.php
 Please also configure the database on the same file


####### Step 6 :  Configure the crontab for launch the script

**Note:**
You must personalize the scripts in the web application

Sample: Config my script Create_ssh.php

``` php
<?php

// Start script for create the authorization

/*
 * Configuration your database (host, username, password, database_name)
 */
 
$host =               "localhost";
$username =           "blackspan";
$password =           "spanblack";
$database_name =      "bsp";

/*
 * Remote server
 */
$server = 'user@remote_server';

/*
 * Erase the old file htaccess
 */
$erase = 'rm .htaccess_old';

exec($erase);

/*
 * Copy .htaccess on the folder "Script"
 */
$copy = 'scp -r -p '.$server.':/var/www/.htaccess .';   // The htaccess is placed in my remote server. This is the root folder in the website
                                                        // You can personalize the link if you want
exec ($copy); 

$path = realpath('.htaccess');

```

    Config my script Delete_ssh.php

``` php

<?php

// Start script for delete the authorization
/*
 * Configuration your database (host, username, password, database_name)
 */

$db =           "localhost";
$username =     "blackspan";
$password =     "spanblack";
$database_name = "bsp";

/*
 * Server connexion
 */
$server = 'user@remote_server';

/*
 * Erase the old file htaccess
 */
$erase = 'rm .htaccess_old';

exec($erase);

/*
 * Copy .htaccess on the folder "Script"
 */
$copy = 'scp -r -p ' . $server . ':/var/www/.htaccess .';   // The same file on the root folder in remote server.
                                                            // We don't explain the all contents in the script because you can modify if you want
exec($copy);
``` 

**Note:**
This is the most important to configure the script, otherwise the web application don't start.

### Configure crontab
Launch this command

    crontab -e

    Copy this request in crontab
    /*
    * This command launch the request each day in 00:01
    */
    1 0 * * * php /sites/blackspan/src/Itandlabs/BlackspanBundle/Script/Create_ssh.php

    /*
    * This command launch the request each day in 23:58
    */
    58 23 * * * php /sites/blackspan/src/Itandlabs/BlackspanBundle/Script/Delete_ssh.php


######## Step 7. Personalize the script of verification

**Note:** **Warning:**
The objective in script is to personalize the root folder. For the moment the web app is the beta test.
Please contact me if you are the problems


####### Step 8. Create Users for the web app

I uses the FOSUserBundle for the part authentication.
For create an user launch the command

    php app/console fos:user:create

**Note:**
Now you can use the application.

Thanks you