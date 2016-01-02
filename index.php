<?php
session_start();
require "setup.php"; //Подключаем SMARTY
include "SYSTEM/config.php"; //подключаемся к базе
include "SYSTEM/class_to_index.php"; //Подключаем классы для index.php
$smarty = new Smarty; //объект шаблонитизатора SMARTY

$session_inc = new incl;
$session_inc->guest($_SESSION['name']);//создаем сессию гостя для неавторизированного пользователя
$session_inc->session_inc($_POST['session'], session); //если мы получили данные о том что пользователь вошел, подключаем файл авторизации
$session_inc->session_inc($_GET['o'], session); //если пользователь нажал выход, переиминовываем сессию в гостя
$session_inc->session_inc($_POST['send'], reg); //если пользователь закончил ввод данных для регистрации, отправляем эти данные на проверку и добавление в базу в файл reg.php
$session_inc->page($_GET); //Если страница не указана, выводим главную

include "SYSTEM/index/page.php";

//Подключаем счетсчик
include "SYSTEM/i.php";

// подключаем подвал
$smarty->display('THEME/footer.tpl'); 

?>