<?php

function random_string($length, $letters_only = false) {
	
  $str = '';

  if (!$letters_only) {
	  
    while (strlen($str) <= $length) {
		
      $str .= md5(uniqid(rand(), true));
	  
    }

    return substr($str, 0, $length);
  }

  for ($i = 0; $i < $length; $i++) {
	  
    switch (mt_rand(1, 2)) {
		
      case 1:
      
		$str .= chr(mt_rand(65, 90));
        
       break;
		
      case 2:
      
		$str .= chr(mt_rand(97, 122));
        
       break;
		
    }
	
  }

  return $str;
  
}

function salted_hash($value, $salt = null, $length = 9, $hash_algo = 'md5') {
  
  if ($salt === null) {
    $salt = random_string($length);
  }

  $salt = substr($salt, 0, $length);

  if (!function_exists('hash') && $hash_algo == 'md5') {
    $hash = md5($salt . $value);
  }

  else {
    $hash = hash($hash_algo, $salt . $value);
  }

  return $salt . ':' . $hash;
  
}

function secure_compare($a, $b) {
	
  if (strlen($a) !== strlen($b)) {
    return false;
  }
  
  $result = 0;
  
  for ($i = 0; $i < strlen($a); $i++) {
	  
    $result |= ord($a[$i]) ^ ord($b[$i]);
	
  }
  
  return $result == 0;
  
}

function compare_passwords($plain, $hashed) {

  if (strpos($hashed, ':') === false) {
	  
    return secure_compare(md5($plain), $hashed);
	
  }

  return secure_compare(salted_hash($plain, $hashed), $hashed);
  
}

function ver_dato($tipo){
	
	$user_fun = new Userfunction();
		
	return $user_fun->idioma($tipo,'spanish');
	
}

function limpiar(){
	
	print '<hr class="mt-2 mb-3"/>';
	
}

function diametro(){
	
	print '								<svg
   width="45"
   height="55"
   version="1.1"
   id="svg53"
   sodipodi:docname="icon.svg"
   inkscape:version="1.1 (c68e22c387, 2021-05-23)"
   xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape"
   xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd"
   xmlns="http://www.w3.org/2000/svg"
   xmlns:svg="http://www.w3.org/2000/svg">
  <defs
     id="defs57" />
  <sodipodi:namedview
     id="namedview55"
     pagecolor="#ffffff"
     bordercolor="#666666"
     borderopacity="1.0"
     inkscape:pageshadow="2"
     inkscape:pageopacity="0.0"
     inkscape:pagecheckerboard="0"
     showgrid="false"
     inkscape:zoom="3.235"
     inkscape:cx="28.593509"
     inkscape:cy="82.380216"
     inkscape:window-width="1280"
     inkscape:window-height="897"
     inkscape:window-x="-8"
     inkscape:window-y="-8"
     inkscape:window-maximized="1"
     inkscape:current-layer="layer1" />
  <g
     id="layer1">
    <g
       id="g2098"
       transform="matrix(0.45418392,0,0,0.49268084,1.4282029,1.4539147)">
      <ellipse
         cx="44.205364"
         cy="53.307457"
         fill="none"
         fill-rule="evenodd"
         id="path31"
         rx="40.219383"
         ry="49.975842"
         stroke="#000000"
         stroke-miterlimit="4"
         stroke-width="1.73881"
         transform="matrix(0.99995066,0.00993381,-0.00988027,0.99995119,0,0)" />
      <path
         d="M 75.72872,5.5204657 10.030787,100.20114"
         fill="none"
         id="path947-1"
         stroke="#000000"
         stroke-miterlimit="4"
         stroke-width="0.40279"
         style="stroke-width:1.50632;stroke-miterlimit:4;stroke-dasharray:none" />
    </g>
  </g>
</svg>';
	
}

function calculo(){
	
	print '
	
<div id="tipo_estado" style="width:100%;" class="flotar_izquierda">

	<div class="flotar_izquierda">
	
		<h4>'.ver_dato('calculo').':</h4>
	
	</div>

	<div style="padding-left:5px;" class="flotar_izquierda">

		<h4 id="tipo_calculo">'.ver_dato('enganche_simple').'</h4>

	</div>

	<div class="flotar_derecha" style="margin-right:20px;" >
	
		<img id="imagen_resultado" class="imagen" />
	
	</div>

</div>

<div class="limpiar flotar_izquierda">

	<h4>'.ver_dato('diametro').':</h4>
	
</div>

<div style="padding-top:20px;" class="espacio flotar_izquierda">

	<h4 id="diametro"></h4>

</div>

<div id="width_bola" class="limpiar flotar_izquierda">

	<h4>'.ver_dato('grosor').':</h4>
	
</div>

<div style="padding-top:20px;" class="espacio flotar_izquierda">

	<h4 id="grosor-bola"></h4>
	
</div>

<div class="limpiar flotar_izquierda" style="padding-top:10px;padding-left:5px;padding-bottom:20px;">

	<h4 id="resultado"></h4>

</div>

<script>

	var ozConversion = document.querySelector(".ozInput");
	
	var cmInchConversion = document.querySelector(".inInput");
	
	var cmInput = document.querySelector(".cmInput");
	
	var inchResult = document.querySelector(".inchResult");
	
	cmInput.oninput = cmToIn;
	
	inchResult.oninput = inToCm;

</script>';

}

function redireccionar($ruta){

	echo '<script>location.href="'.$ruta.'";</script>';
	 
	header('Location: '.$ruta);
	 
}

?>