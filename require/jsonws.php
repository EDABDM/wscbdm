<?php

	$_REQUEST['qNXT0Q=='] = 1;
	$_REQUEST['m8rc'] = MD5($_SERVER['PHP_AUTH_USER']);
	$_REQUEST['rMjW'] = MD5($_SERVER['PHP_AUTH_PW']);
	
	include("ing_ges_bat.php");

	if(isset($_REQUEST['qNXT0Q=='])){
		$rs_acc=acc($_REQUEST['m8rc'],$_REQUEST['rMjW']);
		$dat=array(array("Nombre"=>$rs_acc[2],"sesion"=>$rs_acc[1]));
	}


?>
