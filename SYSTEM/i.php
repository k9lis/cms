<?php
// получение данных об устройстве
$ip = $_SERVER["REMOTE_ADDR"];
$os = $_SERVER["HTTP_USER_AGENT"];
    //счетчик
	       	$r9 = mysql_query(" SELECT * FROM `i` WHERE  ip='$ip' ");
    			$i = mysql_fetch_array($r9);
    	        if(isset($i['ip']) && isset($i['os'])){
    			    $re9 = mysql_query(" SELECT * FROM `i` WHERE ip ");
    			        if (!isset($i['duble'])){ 
    			            $duble = $i['duble']; 
    			        } else { $duble = 1; }  
    	    		$duble = ++$i['duble']; 
        			$id = $i['id'];
        			$i_res1 = mysql_query(" UPDATE `i`SET  duble=$duble WHERE  id=$id "); 
    			} else { 
    			    $i_res = mysql_query(" INSERT INTO `i`(`ip`, `os`, `duble`) VALUES ('$ip','$os','$duble') "); 
        		    }
        		    
        		    
  
//вывод ip адреса
$smarty->assign('ip', $_SERVER["REMOTE_ADDR"].$true_ip);
?>