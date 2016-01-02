<?php
session_start();



		$id = $_GET['id'];
		$r = mysql_query(" SELECT * FROM `static` WHERE id=$id ");
		while ($pages = mysql_fetch_array($r)) {
		    
                $smarty->assign('title', $pages['title']);                                                        //устанавливаем имя страницы
				$smarty->assign('title2', strip_tags($pages['title']));                                          //устанавливаем имя страницы
				
				if ($_SESSION['name'] != 'Гость') {
				    $smarty->assign('out', 'index.php?o=out'); 
				    $smarty->assign('out2', 'Выход');
				    $smarty->assign('comments', '<a href="index.php?c=comments">Коментарии</a>');
				} else { $smarty->assign('out', '#'); $smarty->assign('out2', 'Авторизация'); }
				
				
				$smarty->assign('user', $_SESSION['name']);
				$smarty->display('THEME/head.tpl');                                                            // подключаем шапку
				$smarty->assign('page', $pages['page']);                                                      //станавливаем переменную для текста контента
				$smarty->assign('script2', $pages['script']);
				$smarty->display('THEME/page.tpl');                                                          // подключаем тело
				
		} 




?>





















