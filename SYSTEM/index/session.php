<?php
session_start();
include "../config.php";
include "classes/class_to_reg.php";
include "classes/class_to_session.php";


if (isset($_GET['o']) == 'out'){
        $out = new Sessions;
		$out->Out();
} else {

//----Убираем возможные теги/-----
$s = new Sessions;
$clear = new Reg;
$s->login = $_POST['login'];
$s->pass = md5(md5($_POST['pass']));
$s->Create();


	
}

?>