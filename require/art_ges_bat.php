<?

class DB extends mysqli{
	public function __construct($host, $usuario, $contraseña, $bd) {
			parent::__construct($host, $usuario, $contraseña, $bd);
			if (mysqli_connect_error())
				die('Error de Conexión('.mysqli_connect_errno().')'.mysqli_connect_error());
	}
}

header("Content-Type: text/html; charset=utf-8");
	$IPServer=$_SERVER['SERVER_NAME'];
	if($IPServer == "10.1.1.3" or $IPServer == "intranet" or $IPServer == "10.1.1.11" or $IPServer == "localhost")
		{$dt=array("10.1.1.11","doie94k%%","root1","psfh45fTT","root@1","db34cat","bdm_cat","//10.1.1.11/");
		 $dt=array("10.1.1.3","doie94k%%","rquiroz","psfh45fTT","Rafael@22","db34cat","Chino","//10.1.1.3/");}
	else
		{$dt=array("db597586105.db.1and1.com","db568235935.db.1and1.com","dbo597586105","dbo593569643","BD@cc3ss0&tos-cat@10.2015&10","CatV2-b55d6&y@gral-2015.bADn5","db597586105","https://www.bdmex.com/");}
	$i=0; foreach ($dt as $val) {$c="dt".$i;define($c,$val); $i++;}
    define("clv","encryptacion bdmex 201509");
    $nom_bat=array('CAT_find_apl');

function cbd0(){
	$mysql = new DB(dt0, dt2, dt4, dt6);
	$mysql->set_charset ("latin1");
	return $mysql;
}

function tab($table){
	$mysql = cbd0();
  $qColumnNames = $mysql->query("SHOW COLUMNS FROM ".$table) or die("Error ".$mysql->error);
  $col="(";
  while($colname = $qColumnNames->fetch_assoc()){
    $cols[] = $colname['Field'];
	 	$col .= "`".$colname['Field']."`,";
  }
	$fields=rtrim($col,",").")";
	$mysql->close();
	foreach ($cols as $var => $val) { echo "<br>$var = $val"; }
  return $cols;
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

function fdat($campo){
	$campos=explode('Nftq',$campo);
	for($i=0;$i<count($campos);$i++) {
		$fiel=explode('|',$campos[$i]);
		for($g=0;$g<count($fiel);$g++) {
			$f[$fiel[0]]=$fiel[1];
		}
	}
	return $f;
}

function search($info){
	$dbtable=array('CAT_find_apl','SIS_Coment','SIS_Cruce','SIS_Articulos','search','precio','search_Lista','aplicaciones','search_print');
	$cps = array(
		"0" => "`Articulo`",
		"1" => "`Descripcion_corta`",
		"2" => "`No_Proveedor`",
		"3" => "`Precio`",
		"4" => "`Disp_Label`",
		"5" => "`Coment`",
		"6" => "`Marca`",
		"7" => "`Ano`",
		"8" => "`Modelo`",
		"9" => "`MOTOR`",
		"10" => "`HP`",
		"11" => "`Ano_fin`",
		"12" => "`Ano_ini`",
		"13" => "`Art_Grupo`",
		"14" => "`Art_Marca`",
		"15" => "`NIVEL_PRECIO`",
		"16" => "`Imagen`",
		"17" => "`Publicar`",
		"18" => "`Anulado`",
		"19" => "`Referencia`",
		"20" => "`Fabricante`",
		"21" => "`Cls_Des`",
		"22" => "`Art_Proveedor`",
		"23" => "`Disp_Label_pub`",
		"24" => "`Oferta`",
		"25" => "`OfertaP`",
		"26" => "`Publico`",
		"27" => "`APL`",
		"28" => "`OE`"
	);

/* Variable Default */
	$apl = "CONCAT(".$cps[6].",'>',".$cps[7].",'>',".$cps[8].",'>',".$cps[9].",'>',".$cps[10].")";
	$Dr='';
	if(!isset($_SESSION['pp'])){$pp=0;} else{$pp=$_SESSION['pp'];}
	if(!isset($_SESSION['np'])){$np='p'; $st='n';} else{$np=$_SESSION['np'];$st='s';}
	IF(!ISSET($info["ref"])){$info["ref"]="";}
	IF(!ISSET($info["ord"])||$info["ord"]==10||$info["ord"]=='undefined'){$info["ord"]=2;}
	$Or= " ORDER BY ".$cps[$info["ord"]];

/* Filtros */
	if(isset($info['ft'])){$fil=fdat($info['ft']);}
	if(!isset($fil['li'])){$Fll="";} else {
		$lit=explode('-',$fil['li']); $flit="";
		for($g=0;$g<count($lit);$g++) {$flit.= $cps[9]."='".$lit[$g]."' or"; }
	$Fll=" and (".rtrim($flit,"or").")";}
	if(!isset($fil['hp'])){$Flh="";} else {
		$hps=explode('-',$fil['hp']); $fhps="";
		for($g=0;$g<count($hps);$g++) {$fhps.= $cps[10]."='".$hps[$g]."' or"; }
	$Flh=" and (".rtrim($fhps,"or").")";}
	if(!isset($fil['gr'])){$Flc="";} else {
		$ctg=explode('-',$fil['gr']); $fctg="";
		for($g=0;$g<count($ctg);$g++) {$fctg.= $cps[13]."='".$ctg[$g]."' or"; }
	$Flc=" and (".rtrim($fctg,"or").")";}
	if(!isset($fil['mr'])){$Flm="";} else {
		$mar=explode('-',$fil['mr']); $fmar="";
		for($g=0;$g<count($mar);$g++) {$fmar.= $cps[14]."='".$mar[$g]."' or"; }
	$Flm=" and (".rtrim($fmar,"or").")";}
	if(!isset($fil['de'])){$Fld="";} else {
		$bdes=$fil['de'];
		$des=explode(' ',$fil['de']); $fdes=""; $btdes="";
		for($g=0;$g<count($des);$g++) {if(substr($des[$g],-1)=='s'){$btdes.=rtrim($des[$g],"s")."%";} else {$btdes.=$des[$g]."%";} }
		$fdes.= $cps[1]." like '%".$btdes."' or";
	$Fld=" and (".rtrim($fdes,"or").")";}

	$Fl=$Fll.$Flh.$Flc.$Flm.$Fld;
	$Wh= "1=1 ";
	$Wac=$Fll.$Flh.$Flm.$Fld;
	$Wam=$Fll.$Flh.$Flc.$Fld;
	$Wal=$Flh.$Flc.$Flm.$Fld;
	$Wah=$Fll.$Flc.$Flm.$Fld;


/* Resultados */
IF($info["ref"]!="" ){
	if($info["ref"]=="new"){$Wh=$cps[21]."='des'";} //$Or.=" LIMIT 0,25";

	else if($info["ref"]=="ofr"){
		$Or=" LIMIT 0,500";
		$RC=qry($dbtable[5],$cps[0], $cps[15]."='OFERTAS' or ".$cps[15]."='GANAMAS' ".$Or,"s");

		while ($x = $RC[1]->fetch_assoc()) { $ar = str_replace("`","",$cps[0]);   $Dr = $Dr.$cps[0]."='".$x["$ar"]."' or "; }
		$Wh=rtrim($Dr.$cps[2]."='".$info["ref"]."' or ".$cps[0]."='".$info["ref"]."'",'or ');
	}

	else if(isset($info["det"])){$Wh=$cps[2]."='".$info["ref"]."'";}


	else if($info["ref"]=="Busqueda directa"){ }

	else{
	$RC=qry($dbtable[2],$cps[2],"replace(".$cps[19].",' ','') like '%".str_replace(" ","%",$info["ref"])."' or replace(`Referencia`,' ','') like '%".str_replace(" ","%",$info["ref"])."%' or replace(".$cps[2].",' ','') like '%".str_replace(" ","%",$info["ref"])."%' or replace(".$cps[2].",' ','') like '%".str_replace("E","%",str_replace("B","%",str_replace("F","%",str_replace("b","%",str_replace("e","%",str_replace("f","%",str_replace(" ","%",$info["ref"])))))))."%' GROUP BY ".$cps[2]." ORDER BY ".$cps[2],"s");
	while ($x = $RC[1]->fetch_assoc()) {  $pr = str_replace("`","",$cps[2]); $Dr = $Dr.$cps[2]."='".$x["$pr"]."' or "; }
	$Wh=rtrim($Dr.$cps[2]."='".$info["ref"]."' or ".$cps[0]."='".$info["ref"]."'",'or ');
	}

	$Gr= " GROUP BY ".$cps[0].",".$cps[1].",".$cps[2];
	$WGO= "(".$Wh.") ".$Fl.$Gr.$Or;

}
ELSE IF($info["sma"] == "" && $info["sye"]== "" && $info["smo"]==""){
	$Q=qry($dbtable[0],$cps[6],"1=1 and `Activo`<>'N' GROUP BY ".$cps[6]." ORDER BY ".$cps[6],'s');
}
ELSE IF($info["sma"]!="" && $info["sye"]== "" && $info["smo"]==""){
	$Q=qry($dbtable[0],$cps[7],$cps[6]."='".$info['sma']."' and `Activo`<>'N' GROUP BY ".$cps[7]." ORDER BY ".$cps[7]." desc",'s');
}
ELSE IF($info["sma"]!="" && $info["sye"]!= "" && $info["smo"]==""){
	$Q=qry($dbtable[0],$cps[8],$cps[6]."='".$info['sma']."' and ".$cps[7]."='".$info['sye']."' and `Activo`<>'N' GROUP BY ".$cps[8]." ORDER BY ".$cps[8],'s');
}
ELSE IF($info["sma"]!="" && $info["sye"]!= "" && $info["smo"]!=""){
	$Wh=$cps[6]."='".$info["sma"]."' and ".$cps[7]."='".$info["sye"]."' and ".$cps[8]."='".$info["smo"]."' and `Activo`<>'N'";
	$Gr= " GROUP BY ".$cps[0].",".$cps[1].",".$cps[2];
	$WGO=$Wh.$Fl.$Gr.$Or;

	$Rl=qry($dbtable[4],$cps[9],$Wh.$Wal." GROUP BY ".$cps[9]." ORDER BY ".$cps[9],'s');
	$Rh=qry($dbtable[4],$cps[10],$Wh.$Wah." GROUP BY ".$cps[10]." ORDER BY ".$cps[10],'s');

	$Rlt=qry($dbtable[4],$cps[9],$Wh.$Flc.$Flm." GROUP BY ".$cps[9],'s');
	$Rht=qry($dbtable[4],$cps[10],$Wh.$Flc.$Flm." GROUP BY ".$cps[10],'s');
}

IF(isset($Q)){
	//echo $Q[0];
	while($row = $Q[1]->fetch_array()){ $dm[] = $row; }
	echo json_encode($dm);
}
ELSE{
		$precio=" '' as Precio";
		$oferta=" '' as Oferta";
		$dbtable6=$dbtable[6];
		$addinfo="";
		if ($pp > 0){$pp=1-($pp/100);} else {$pp=1;}
		if ( $np=='p' && $info["ref"]=="ofr"){$np = 'PUBLICO';}
		if (isset($info["p"])){$np = 'PUBLICO';$dbtable6=$dbtable[8];$addinfo=", ".$cps[27]." as Tapl,".$cps[28];}
	    if ($np != 'p' ){
			$dl=1;$Of=$cps[24];$Pr=$cps[3];  if($np == 'LD'){$dl=0.8*$pp;} else if ($np == 'LE'){$dl=0.9*$pp;}else if ($np == 'PUBLICO'){$Of=$cps[25];$Pr=$cps[26];}else if ($np == 'EX'){$dl=1*.8/0.75/0.9;}
			$precio="CONCAT('$ ', FORMAT( ".$Pr."*".$dl.", 2)) as Precio ";
			$oferta="CASE WHEN ".$Of.">0 THEN CONCAT('$ ', FORMAT( ".$Of.", 2)) ELSE '' END as Oferta ";
    	}

	$R0=qry($dbtable6,$cps[0].",".$cps[1].",".$cps[2].",".$cps[16]." as img, ".$cps[13].",".$apl." AS apl, CASE WHEN '".$st."'='s' and '".$np."'<>'PUBLICO' THEN ".$cps[4]." WHEN '".$st."'='s' and '".$np."'='PUBLICO' THEN ".$cps[23]." ELSE '' END as st".",".$precio.",".$oferta.",".$cps[21].$addinfo, $WGO ,"s");
	$RA=qry($dbtable[4],$cps[13],$Wh.$Wac." GROUP BY ".$cps[13]." ORDER BY ".$cps[13],'s');
	$RM=qry($dbtable[4],$cps[14],$Wh.$Wam." GROUP BY ".$cps[14]." ORDER BY ".$cps[14],'s');

	//echo $RC[0];
	//echo $Ar[0];
	//echo $R0[0];
	/*
	while ($qi = $R0[1]->fetch_assoc()) {
		foreach ($qi as $var => $val) {
			echo "$var->$val<br>";
		}
	}
	*/
	//echo $RA[0];

	$ror = array(); $rar = array();$rma = array();$com = array();$apl = array(); $cru=array();$i=0;$rml=array();$rmh=array();$art=array("Art" => $R0[1]->num_rows);
	if(isset($R0[1])){
			while($row = $R0[1]->fetch_assoc()){
    	$ror[] = $row;}
	}

 	if($ror == null || $ror == ""){$ror= array(array("Descripcion_corta" =>"La referencia no existe favor de verificar"));}

 	if(isset($RA[1])){
 	while($row = $RA[1]->fetch_assoc()){
    	$rar[] = $row;}
	}
	if(isset($RM[1])){
 	while($row = $RM[1]->fetch_assoc()){
    	$rma[] = $row;}
	}

	if(isset($Rl[1])){ $r=0;
	$r= $Rl[1]->num_rows;
	$rt=$Rlt[1]->num_rows;
 	while($row = $Rl[1]->fetch_assoc()){
    	$rml[] = $row;}
    for($g=0;$g<$r;$g++) {
	    $rml[$g]["row"]=$r;
		$rml[$g]["rowt"]=$rt;}
	}

	if(isset($Rh[1])){$r=0;
	$r=$Rh[1]->num_rows;
	$rt=$Rht[1]->num_rows;
 	while($row = $Rh[1]->fetch_array()){
    	$rmh[] = $row;}
    	for($g=0;$g<$r;$g++) {
	    $rmh[$g]["row"]=$r;
		$rmh[$g]["rowt"]=$rt;
		}
	}

	if($bdes!=""){$desarray=array(array("busdes" =>$bdes));}
	$tit=array(array("Tit" =>str_replace('//','/',str_replace('-','',$fil['ti']))));


	if(isset($info["det"])){
		if(!isset($info["p"])){
		$Cr=qry($dbtable[2],$cps[19],$cps[2]."='".$info["ref"]."' and ".$cps[20]."='OE'",'s');
		$QN=qry($dbtable[1],"CAST(Comentario AS CHAR(10000) CHARACTER SET utf8) AS coment",$cps[2]."='".$info["ref"]."' and ".$cps[17]."='s' and ".$cps[18]."='n'",'s');
		$Ap=qry($dbtable[4],$cps[6].",".$cps[8].",".$cps[9].",".$cps[11].",".$cps[12],$cps[2]."='".$info["ref"]."' GROUP BY ".$cps[6].",".$cps[8].",".$cps[9].",".$cps[11].",".$cps[12],'s');

		// $QN[0];
		// $Ap[0];
		// $Cr[0];

		if($QN[1]->num_rows > 0){
			while($row = $QN[1]->fetch_assoc()){
		    $com[] = array_map('utf8_encode', $row);}

	    }
	    else{$com= array(array("coment" =>"No hay observaciones"));}
	   if($Ap[1]->num_rows > 0){
			while($row = $Ap[1]->fetch_assoc()){
		    $apl[] = $row;}

	    }
	    else{$apl= array(array("coment" =>"No hay aplicaciones"));}
	     if($Cr[1]->num_rows > 0){
			while($row = $Cr[1]->fetch_assoc()){
		    $cru[] = $row;
		    }

	    }
	    else{$cru= array(array("Referencia" =>"No hay numeros disponibles"));}
	    $data= array($ror,$apl,$com,$cru);
		}
		else {
			$Cr=qry($dbtable[2],"min(".$cps[19].") as Referencia",$cps[2]."='".$info["ref"]."' and ".$cps[20]."='OE' ORDER BY ".$cps[19],'s');
			$Ap=qry($dbtable[7],$cps[27],$cps[2]."='".$info["ref"]."' LIMIT 4",'s');

			if($Cr[1]->num_rows > 0){
				while($row = $Cr[1]->fetch_assoc()){
		    	$cru[] = $row;}
	    	}
	    	else{$cru= array(array("Referencia" =>"No hay numeros disponibles"));}

	    	if($Ap[1]->num_rows > 0){
				while($row = $Ap[1]->fetch_assoc()){
		    	$apl[] = $row;}
	    	}
	    	else{$apl= array(array("APL" =>"No hay numeros disponibles"));}
	    	$data=array($cru,$apl,$tit);
		}
	}
	else{$data= array($ror,$rar,$rma,$rml,$rmh,array($art),$desarray,$tit);}

	if(isset($info['p'])){return $data;}
	else{echo json_encode($data);}
	}
}


if(isset($_REQUEST['test'])){	
	$mysql = cbd0();
    $answer = $mysql->query("CALL ws_art('todo','LE','4.00')");
    if($answer) echo "bien";
    else        echo "mal";

}

?>
