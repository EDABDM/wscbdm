<?php

function enpt($dta){
return str_replace('$2a$10$kwuYitSLyYFmn4IgJAUU6.','',crypt($dta, '$2a$10$kwuYitSLyYFmn4IgJAUU6$'));
}

function cry($string, $key) {
   $result = '';
   for($i=0; $i<strlen($string); $i++) {
      $char = substr($string, $i, 1);
      $keychar = substr($key, ($i % strlen($key))-1, 1);
      $char = chr(ord($char)+ord($keychar));
      $result.=$char;

   }
   return base64_encode($result);
}
function dec($string, $key) {
   $result = '';
   $string = base64_decode($string);
   for($i=0; $i<strlen($string); $i++) {
      $char = substr($string, $i, 1);
      $keychar = substr($key, ($i % strlen($key))-1, 1);
      $char = chr(ord($char)-ord($keychar));
      $result.=$char;
   }
   return $result;
}

?>
