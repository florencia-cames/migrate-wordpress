<?php

$dominio_viejo = 'dom_viejo';
$dominio_nuevo = 'dom_nuevo';

/*Fijaste que en algunos casos los registros terminan en / ejemplo http://www.example.com/ o  http://www.example.com */
$link = mysql_connect('localhost', 'mysql_user', 'mysql_password');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
//Select db
$db_selected = mysql_select_db('db_name', $link);


$sql = "UPDATE wp_options SET option_value = REPLACE(option_value,'$dominio_viejo','$dominio_nuevo');";
// Perform Query
$result = mysql_query($sql);
	
$sql = "UPDATE wp_posts
SET post_content = REPLACE(post_content,'$dominio_viejo','$dominio_nuevo');";
// Perform Query
$result = mysql_query($sql);
	
$sql = "UPDATE wp_posts
SET guid = REPLACE(guid,'$dominio_viejo','$dominio_nuevo');";
// Perform Query
$result = mysql_query($sql);
	
$sql = "UPDATE wp_postmeta
SET meta_value = REPLACE(meta_value,'$dominio_viejo','$dominio_nuevo');";
// Perform Query
$result = mysql_query($sql);

echo 'Connected successfully. wordpress DB was updated';
mysql_close($link);

?>