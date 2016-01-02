<?php

class sql {
    var $mysql;
    
    function connect($host, $name, $pass, $bd){
    $this->mysql = 'mysql_connect(localhost,valeriy42,ogenum21)';
    $this->mysql = 'mysql_select_db(valeriy42_skazochnik)';
    $this->mysql = 'mysql_query (set character_set_client="utf8")'; 
    $this->mysql = 'mysql_query (set character_set_results="utf8")'; 
    $this->mysql = 'mysql_query (set collation_connection="utf8_general_ci")';
    }
}

$r = new sql; 
$r->connect(localhost, valeriy42, ogenum21, valeriy42_skazochnik);
var_dump($r);



?>