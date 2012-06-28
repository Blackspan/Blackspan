<?php

// Start script for delete the authorization
/*
 * Configuration your database (host, username, password, database_name)
 */

$db =           "";
$username =     "";
$password =     "";
$database_name = "";

/*
 * Server connexion
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
$copy = 'scp -r -p ' . $server . ':/var/www/.htaccess .';

exec($copy);

/*
 * Copy 'htaccess' in the folder on application
 */
$path = realpath('.htaccess');

$file = $path;

/*
 * Write scape in the file.
 *
 */
$zop = "\n";

$current = file_get_contents($file);

$database = mysql_connect($db, $username, $password) or die('Erreur de connexion' . mysql_error());

mysql_select_db($database_name, $database)
        or die('Erreur de selection de la base de donn�es' . mysql_errno());

$query = sprintf(
        "SELECT partnerip, sitedest FROM Request WHERE dateend=CURRENT_DATE();");

$result = mysql_query($query);

while ($row = mysql_fetch_assoc($result)) {
    $row['partnerip'];
    $row['sitedest'];
    $odd = 'Directory /var/www/' . $row['sitedest'] . ' ';
    $add = 'allow from ' . $row['partnerip'] . ' ';

    $filePath = $path;
    $lignes = file($filePath);

    foreach ($lignes as $num => $data) {
        if (strpos($data, $add) === 0) {
            $lignes[$num];
            unset($lignes[$num]);
        }
    }

    $filename = $path;
    $handle = fopen($filename, "w");
    fclose($handle);
    $handle = fopen($filePath, 'a');
    fwrite($handle, implode($lignes));
    fclose($handle);
}

/*
 * Upload the file 'htaccess' on the folder of prisma
 */
$transfert = 'scp -r -p .htaccess ' . $server . ':/var/www';

exec($transfert);
/*
 * Backup the old file '.htacces'on folder
 */

$rename = 'mv .htaccess .htaccess_old';

exec($rename);

//End script

