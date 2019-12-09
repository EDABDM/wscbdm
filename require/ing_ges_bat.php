<?

	$IPServer=$_SERVER['SERVER_NAME'];
	if($IPServer == "10.1.1.3" or $IPServer == "intranet" or $IPServer == "10.1.1.11" or $IPServer == "localhost")
		{$dt=array("10.1.1.11","doie94k%%","root1","psfh45fTT","root@1","db34cat","bdm_cat","//10.1.1.11/");}
	else
		{$dt=array("db593569643.db.1and1.com","db568235935.db.1and1.com","dbo593569643","dbo593584643","CatV2-b25d&m@gral-2015.bADin","CatV2-b55d6&y@gral-2015.bADn5","db593569643","https://www.bdmex.com/");}
	$i=0; foreach ($dt as $val) {$c="dt".$i;define($c,$val); $i++;}
    define("clv","encryptacion bdmex 201509");

	$nom_bat=array('iuc','icr','log');
	$delif_bat0=array('Ident','ubenutzer','pschlussel','kunde','abschnitt','nombre','apellido','cuenta','dominio','activo','ps','createdate','recuperacion');
	$delif_bat1=array('CONTRIBUYENTE','CLIENTE','NIVEL_PRECIO','PP');
	$delif_bat2=array('Ident','ubenutzer','sesion','ip_connect','activo','createdate','endate');

	class DB extends mysqli{
		public function __construct($host, $usuario, $contraseña, $bd) {
				parent::__construct($host, $usuario, $contraseña, $bd);
				if (mysqli_connect_error())
					die('Error de Conexión('.mysqli_connect_errno().')'.mysqli_connect_error());
		}
	}


function cbd0(){
	$mysql = new DB(dt0, dt2, dt4, dt6);
	$mysql->set_charset ("utf8");
	return $mysql;
}

function qry($tafa,$cafa,$don,$acti){
	if($don=="" || is_null($don)){$condicion="WHERE 1=1";}else{$condicion=" WHERE ".$don;}
	if($acti=="u"){$qry="UPDATE `".$tafa."` SET ".$cafa.$condicion;}
	if($acti=="s"){$qry="SELECT ".$cafa." FROM `".$tafa."` ".$condicion;}
	if($acti=="i"){$qry="INSERT INTO ".$tafa." ".$cafa." VALUES ".$don;}
  $mysql = cbd0();
	$answer = $mysql->query($qry);
	if (!$answer){ $answer="Error: ".$mysql->error; }
	$mysql->close();
	return array($qry,$answer);
}


function acc($ub,$ch){
	global $nom_bat; global $delif_bat0; global $delif_bat2;  global $delif_bat1;
	$rs_qry=qry($nom_bat[0]," CASE WHEN count(*) = 1 THEN 'UP' ELSE 'DOWN' END AS ANS, `".$delif_bat0[5]."`, `".$delif_bat0[6]."`, `".$delif_bat0[3]."`, `".$delif_bat0[4]."`",$delif_bat0[1]."='".dm($ub,0)."' and ".$delif_bat0[2]."='".dm($ch,0)."'",'s');
	$cam = $rs_qry[1]->fetch_assoc();
	if($cam['ANS']== 'UP'){st();
	//$np=qry($nom_bat[1],"`".$delif_bat1[2]."`","CONCAT(".$delif_bat1[1].",'=',".$delif_bat1[0].")='".mysql_result($rs_qry[1],0,$delif_bat0[3])."'","s");$_SESSION['np']=mysql_result($np[1],0,$delif_bat1[2]);$_SESSION['tipo']=mysql_result($rs_qry[1],0,$delif_bat0[4]);
	$np=qry($nom_bat[1],"`".$delif_bat1[2]."`,`".$delif_bat1[3]."`","CONCAT(".$delif_bat1[1].",'=',".$delif_bat1[0].")='".$cam[$delif_bat0[3]]."'","s");
	$cam2 = $np[1]->fetch_assoc();
	$_SESSION['pp']=$cam2[$delif_bat1[3]];$_SESSION['np']=$cam2[$delif_bat1[2]];$_SESSION['tipo']=$cam[$delif_bat0[4]];
	$valin="('".dm($ub,0)."','".session_id()."','".$_SERVER['REMOTE_ADDR']."','S','".date('y/m/d G:i:s')."')";
	$u=qry($nom_bat[2],"(`".$delif_bat2[1]."`, `".$delif_bat2[2]."`, `".$delif_bat2[3]."`, `".$delif_bat2[4]."`, `".$delif_bat2[5]."`) ",$valin,'i');
	$_SESSION['ub'] = dm($ub,0);
	return  array('0',$_SESSION['id']=session_id(),$cam[$delif_bat0[5]]." ".$cam[$delif_bat0[6]]);
	}
	else { return false;}
}

function rec($rec,$ub){
	global $nom_bat; global $delif_bat0;
	qry($nom_bat[0],"`".$delif_bat0[12]."`='".$rec."'","`".$delif_bat0[1]."`='".dm($ub,0)."'",'u');
	$rs_qry=qry($nom_bat[0],"`".$delif_bat0[7]."` as c, `".$delif_bat0[8]."` AS m","`".$delif_bat0[1]."`='".dm($ub,0)."' AND `".$delif_bat0[12]."`='".$rec."'",'s');
	$cam = $rs_qry[1]->fetch_assoc();
	return dm($cam["c"],2)."@".dm($cam["m"],2);
}

function upc($campos){
	global $nom_bat; global $delif_bat0;
	for($i=0;$i<count($campos);$i++) {
		$fields=explode(';',str_replace('p9Tbxdvg5dXN',';',str_replace('qcbhldvg5dXN',';',str_replace('oszjxN7p0eeS',';',$campos[$i]))));$dato=dm($fields[1],0);$datos=dm($fields[1],1);
		if( dm($fields[0],2) == "contrase�a uno de dos"){$dat["9"]= $dato;}
		if( dm($fields[0],2) == "dominio"){$dat["0"]=  $datos;}
		if( dm($fields[0],2) == "dos de dos contrase�a"){$dat["3"]= $dato;}
		if( dm($fields[0],2) == "cuenta"){$dat["7"]=  $datos;}
		if( dm($fields[0],2) == "Pregunta"){$dat["8"]=  $fields[1];}
		if( dm($fields[0],2) == "Nombre"){$dat["5"]=  $fields[1];}
		if( dm($fields[0],2) == "respuesta uno"){$dat["6"]=  $dato;}
		if( dm($fields[0],2) == "Last name"){$dat["1"]=  $fields[1];}
		if( dm($fields[0],2) == "segunda respuesta"){$dat["4"]=  $dato;}
		if( dm($fields[0],2) == "nombre de usuarios"){$dat["2"]= $dato;}
	}
	if($dat["3"]==$dat["9"] && $dat["6"]==$dat["4"]){
	$valin="('".$dat[0]."','".$dat[1]."','".$dat[2]."','".$dat["8"]."|;|".$dat[4]."','".$dat[5]."','".$dat[7]."','".$dat[9]."','S','".date('y/m/d G:i:s')."','000=XAXX010101000','Publico')";
	$delifin="(".$delif_bat0[8].",".$delif_bat0[6].",".$delif_bat0[1].",".$delif_bat0[10].",".$delif_bat0[5].",".$delif_bat0[7].",".$delif_bat0[2].",".$delif_bat0[9].",".$delif_bat0[11].",".$delif_bat0[3].",".$delif_bat0[4].")";
	$rs_qry=qry($nom_bat[0],$delifin,$valin,'i');
	if ($rs_qry[1]==1){return array(array("Respuesta"=>"Cuenta dada de alta"));}
	else {return array(array("Respuesta"=>"No se pudo dar de alta la cuenta"));}
	}
	else {return array(array("Respuesta"=>"No se pudo dar de alta la cuenta"));}
}

function rus($ub){st();
	global $nom_bat; global $delif_bat0;global $delif_bat2;
	if(isset($_SESSION['id'])){$rs_qry=qry($nom_bat[0]."` inner join ".$nom_bat[2]." on ".$nom_bat[0].".".$delif_bat0[1]."=".$nom_bat[2].".`".$delif_bat2[1]," CASE WHEN count(*) = 1 THEN 'UP' ELSE 'DOWN' END AS ANS",$nom_bat[2].".".$delif_bat2[4]."='s' and ".$nom_bat[2].".".$delif_bat2[2]."='".$_SESSION['id']."' and ".$nom_bat[0].".".$delif_bat0[2]."='".dm($ub,0)."'",'s'); }
	else{$rs_qry=qry($nom_bat[0]," CASE WHEN count(*) = 1 THEN 'UP' ELSE 'DOWN' END AS ANS",$delif_bat0[1]."='".dm($ub,0)."'",'s');}
	$cam = $rs_qry[1]->fetch_assoc();
	if($cam["ANS"] == 'UP'){return  array(array("Respuesta"=>"1"));}
	else { return  array(array("Respuesta"=>"0"));}
}

function ruc($ub,$crecu){
	global $nom_bat; global $delif_bat0;
	$rs_qry=qry($nom_bat[0]," CASE WHEN count(*) > 0 THEN 'UP' ELSE 'DOWN' END AS ANS",$delif_bat0[1]."='".dm($ub,0)."' AND ".$delif_bat0[12]."='".$crecu."'",'s');
	$cam = $rs_qry[1]->fetch_assoc();
	if($cam["ANS"] == 'UP'){return  array(array("Respuesta"=>"1"));}
	else { return  array(array("Respuesta"=>"0"));}
}

function auc($ub,$rec,$np){st();
	global $nom_bat; global $delif_bat0;
	if(isset($_SESSION['id'])){$rs_qry=qry($nom_bat[0],"`".$delif_bat0[2]."`='".dm($np,0)."'","`".$delif_bat0[2]."`='".dm($ub,0)."' AND 'ChpSus1'='".$rec."'",'u');}
	else {$rs_qry=qry($nom_bat[0],"`".$delif_bat0[2]."`='".dm($np,0)."'","`".$delif_bat0[1]."`='".dm($ub,0)."' AND `".$delif_bat0[12]."`='".$rec."'",'u');}
	if (strpos($rs_qry[1], 'Error:') !== false){return array(array("Respuesta"=>"1"));}
	else {return array(array("Respuesta"=>"0"));}
}

function dm($st,$t){
	require_once ('crypt.php'); if($t==0){return enpt($st);} else if($t==1){return cry($st,clv);} else if($t==2){return dec($st,clv);} else {return false;}
}

function st(){session_start();}



/*
echo $ar=acc(md5("rquiroz@bdmex.com"),md5("23444"));
echo $ar[4];
/*
$f=$delif_bat0[1].",".$delif_bat0[2];
$rs_qry=qry($nom_bat[0],$f,"",'s');
echo mysql_num_rows($rs_qry[1]);
echo acc("rquiroz@bdmex.com","Rafael@2");
*/
?>
