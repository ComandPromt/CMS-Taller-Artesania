<?php

include('../config.php');

include('../funciones.php');

function validar($texto,$float){
	
	$resultado=true;
	
	$texto=str_replace("  "," ",$texto);
	
	$texto=trim($texto);
		
	if(empty($texto)){
		
		$resultado=false;
		
	}
		
	if($resultado && $float && (float)$texto<=0){
							
		$resultado=false;
	
	}
	
	return $resultado;
	
}

	$resultado="";
	
	$calculo=0;
	
	$espacio=0;
	
	// Calculo numero de bolas que caben en un aro

	if(isset($_POST['espacio_bolas']) && isset($_POST['diametro']) && isset($_POST['anchoBola']) && validar($_POST['diametro'],true) && validar($_POST['anchoBola'],true) ){

		if((int)$_POST['enganche']==1){
			
			$espacio=2;
			
		}
		
		$calculo=round(((($_POST['diametro']*3.14)-$espacio)+$_POST['espacio_bolas'])/($_POST['anchoBola']+$_POST['espacio_bolas']));
	
		$resultado='<p>'.ver_tipo('need').' '.$calculo.' '.ver_tipo('pearls');
	
		if((int)$_POST['numero_aros']>1){
			
			$resultado.=" por aro.</p>";
			
			$calculo*=(int)$_POST['numero_aros'];
			
			$resultado.='<p>Para '.(int)$_POST['numero_aros'].' aros '.ver_tipo('need').' '.$calculo.' '.ver_tipo('pearls').'</p>';
			
		}
	
		print $resultado;
		
	}
	
	$_POST['diametro']=0;
	
	$_POST['anchoBola']=0;
	
?>