<?php
  session_start();
  if(!isset($_SESSION['id'])) header("Location: index.php");
  class Datos{

    private $_permisison = false;
    private $_usuario;
    private $_mensaje;
    private $_np;
    private $_pp;
    private $_ub;
    private $_error = " verifíque sus datos<br><br>";


    function __construct(){
      $this->_usuario = $_SESSION['user'];
      $this->_np = $_SESSION['np'];
      $this->_pp = $_SESSION['pp'];
      $this->_ub = $_SESSION['ub'];
    }


    public function auth($pass1){
      include("require/ing_ges_bat.php");
      $q = qry("iuc","*","ubenutzer = '$this->_ub'", "s");
      if($q[1]->num_rows > 0){
        $c = $q[1]->fetch_assoc();
        foreach ($c as $var => $val){ ${$var} = $val; }
        if($webservice != "S") return "ERROR x01: ".$this->_error; //ACCESO DENEGADO AL WEBSERVICE
        else{
          $pass2 = $this->get_pass($kunde, $fecha_wsc);
          if($pass1 != $pass2) return "ERROR x02: ".$this->_error; //LAS CONTRASEÑAS NO COINCIDEN
          else{
            $lDate = date("Y-m-d h:i:s");
            $this->_permisison = true;
            $u = qry("iuc","lastDate='$lDate'","ubenutzer = '$this->_ub'", "u");
            return "Autenticación correcta<br><br>";
          }
        }
      }
      else return "ERROR x03: ".$this->_error; //USUARIO NO ENCONTRADO
    }

    private function get_pass($x, $y){
      $blow = '$2y$07$'.strrev(substr(md5($this->_usuario),0,22));
      $pass = substr(md5($this->_usuario),0,10).substr($x,0,strpos($x,"=")).crypt("Password_WSC", $blow);
      $pass = str_replace("$2y$07$", "", $pass);
      $pass = substr($pass,0,36);
      $pass = substr(base64_encode($y),0,7).$pass.substr(base64_encode($y),7,7);
      return $pass;
    }

    public function sumar($x,$y){
      if($this->_permisison){
        return $x+$y;
      }
      else{
        return "Autentica tu cuenta antes de solicitar información";
      }
    }


    public function get($fun, $articulo){
      if($fun == 'articulo') return $this->get_articulo($articulo);
      if($fun == 'todo') return $this->get_articulos();
      //if($fun == 'aplicativos') $this->get_aplicativos($articulo)
    }



    public function get_articulo($articulo){
      if($this->_permisison){
        include("require/art_ges_bat.php");
        $mysql = cbd0();
        $answer = $mysql->query("CALL ws_articulo('$articulo','$this->_np','$this->_pp')");
        if (!$answer){ $cam = "Error:  ".$mysql->error. " $this->_np $this->_pp"; }
        else{
          if($answer->num_rows>0){
            $cam = $answer->fetch_assoc();
            if($cam['Existencias'] > 5) $cam['Existencias'] = 5;
          }
          else $cam = "El artículo '$articulo' no existe";
        }
        session_destroy();
        return $cam;
      }
      else{
        return "Autentica tu cuenta antes de solicitar información";
      }
    }

    public function get_articulos(){
      if($this->_permisison){        
        include("require/art_ges_bat.php");
        $mysql = cbd0();
        $answer = $mysql->query("CALL ws_art('todo','".$this->_np."','".$this->_pp."')");        
        if (!$answer)
          $response = "Error:  ".$mysql->error;
        else{            
          while($rows[] = $answer->fetch_assoc());
          array_pop($rows);
          $response = $rows;
        }
        session_destroy();        
        return $response;
      }
      else{
        return "Autentica tu cuenta antes de solicitar información";
      }

    }



    public function test($x, $y){
      if($x=="bdm123"){
        include("require/ing_ges_bat.php");
        if($y == 1) $q = qry("iuc","*","", "s");
        if($y == 2) $q = qry("iuc","*","Id='107'", "s");
        $res = "";
        while ($c = $q[1]->fetch_assoc()){
          foreach ($c as $var => $val){
            $res .= "$var => $val<br>";
          }
          $res .= "<br><br>//////////////////////////////////////////////<br><br>";
        }
        return $res;
      }
    }



  }

  $server = new SoapServer(null,array('uri' => 'urn:BDM'));
  $server->setClass('Datos');
  $server->setPersistence(SOAP_PERSISTENCE_SESSION);
  $server->handle();

?>
