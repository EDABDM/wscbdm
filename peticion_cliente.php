<?php

  $parametros = array(
      'location' => 'http://wsc.bdmex.com',
      'uri' => 'urn:BDM',
      'login' => 'rquiroz@bdmex.com',
      'password' => 'rquiroz2',
      'trace'    => true
  );

    
  $sw = new SOAPClient(null, $parametros);

  try{
   /*
    $res = $sw->get_Articulo("602937");//"MK41000"
   
    if(!is_string($res))
      foreach ($res as $var => $val)
        echo "$var: $val<br>";
    else echo $res; 
   */
	//$sw -> auth('MjAxNy0b1f8f849730022d98e9d6b1c037948f8f1O3wNS0xMg'); //Conexion cliente 002=DAR850124AR8
	$sw -> auth('MjAxNy0b1f8f849730702d98e9d6b1c037948f8f1O3wNS0xMg'); // Conexion cliente 070=OEDG540329HG3
    $res = $sw->get("articulo", "F32943");
    //var_dump($res);

    if(is_array($res)){
      echo "Artículo: $res[Articulo]<br>";
      echo "Descripción: $res[Descripcion]<br>";
      echo "Marca: $res[Marca]<br>";
      echo "Grupo: $res[Grupo]<br>";
      echo "Proveedor: $res[Proveedor]<br>";
      echo "Disponibilidad: $res[Disponibilidad]<br>";
      echo "Existencias: $res[Existencias]<br>";
      echo "Precio: $res[Precio]<br>";
      echo "Precio con oferta: $res[Precio_Oferta]<br>";
    }
    if(is_string($res)) echo $res;

  }
  catch(Exception $e){
    var_dump($e);
  }
  
//Obtener clave de autenticacion//

echo get_pass("002=DAR850124AR8","2019-12-09");

function get_pass($x, $y){
      $blow = '$2y$07$'.strrev(substr(md5("rquiroz@bdmex.com"),0,22));
      $pass = substr(md5("rquiroz@bdmex.com"),0,10).substr($x,0,strpos($x,"=")).crypt("Password_WSC", $blow);
      $pass = str_replace("$2y$07$", "", $pass);
      $pass = substr($pass,0,36);
      $pass = substr(base64_encode($y),0,7).$pass.substr(base64_encode($y),7,7);
      return $pass;
    }

?>
