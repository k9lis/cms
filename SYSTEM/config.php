<?php

error_reporting(0);
$dbhost = 'localhost';		// имя сервера БД
$dbname = 'valeriy42_skazochnik';			// имя БД
$dbuser = 'root';			// имя пользователя БД
$dbpasswd = '';		// пароль пользователя



mysql_connect($dbhost,$dbuser,$dbpasswd);
mysql_select_db($dbname);
mysql_query ("set character_set_client='utf8'"); 
mysql_query ("set character_set_results='utf8'"); 
mysql_query ("set collation_connection='utf8_general_ci'");

/* информация о сайте
$title = 'K9lis';
$description = 'Описание сайта';
$info = '<p>&copy Валерий Ожерельев<br>';
*/

?>