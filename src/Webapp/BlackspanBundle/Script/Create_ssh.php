<?php

// Start script for create the authorization

/*
 * Configuration your database (host, username, password, database_name)
 */
 
$host =               "";
$username =           "";
$password =           "";
$database_name =      "";

/*
 * Server distant
 */
$server = 'blackspan@192.168.105.48';

/*
 * Erase the old file htaccess
 */
$erase = 'rm .htaccess_old';

exec($erase);

/*
 * Copy .htaccess on the folder "Script"
 */
$copy = 'scp -r -p '.$server.':/var/www/.htaccess .';

exec ($copy); 

$path = realpath('.htaccess');

/*
 * Copy 'htaccess' in the folder on application
 */
$file = $path;

/*
 * Write scape in the file.
 * 
 */
$zop = "\n";

$current = file_get_contents($file);


$database = mysql_connect($host, $username, $password) or die('Erreur de connexion' .  mysql_error());

mysql_select_db($database_name, $database)or die ('Erreur de selection de la base de donnees' .  mysql_errno());

/*
 * Select and compare the date
 */
$query = sprintf("SELECT partnerip, sitedest FROM Request WHERE date LIKE CURDATE()");

$result = mysql_query($query);

while ($row = mysql_fetch_assoc($result))
/*
 * Write in the .htaccess file
 */
{
    $row['partnerip'];

    $ip =  'allow from '.$row['partnerip'].' ';

    $new_line = $zop.$ip.$zop;

    file_put_contents($file, $new_line, FILE_APPEND | LOCK_EX  );
}

/*
 * Upload the file 'htaccess' on the folder 
 */
$transfert = 'scp -r -p .htaccess '.$server.':/var/www';

exec($transfert);   

/*
 * Backup the old file '.htacces'on folder 
 */    

$rename = 'mv .htaccess .htaccess_old';

exec($rename);

//End script
