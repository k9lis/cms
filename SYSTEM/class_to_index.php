<?php
class incl {
    function session_inc($method, $action) {
            if (isset($method)) {                    //если параметр существует то,
            include "SYSTEM/index/$action.php";     // подключаем файл
        }
    }
    
    function guest($user_name){
        if (!isset($user_name)){ //если пользователь не авторезирован, то он гость 
         $_SESSION['name'] = 'Гость';
         $_SESSION['group'] = 'guest';
        }
    }
    function page($param){
        if (empty($param)){
          	$_GET['s'] = 'static';
	        $_GET['id'] = '1'; 
        }
    }
}
?>