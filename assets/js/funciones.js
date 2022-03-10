
function loguear(){
	
	var parametros = {"user":document.getElementById('fname').value,"pass":document.getElementById('fpass').value};
	
	$.ajax({
		
		data:parametros,
		
		url:'utils/entrada.php',
		
		type: 'post',

		success: function (response) {

			var respuesta=response.split(" ");

			document.cookie = "taller_user="+respuesta[0];
			
			document.cookie = "taller_pass="+respuesta[1];
			
			document.location.reload();
	
		}
		
	});	
	
}

function registrar(){
	
	var parametros = {"user":document.getElementById('usuario').value,"pass":document.getElementById('password').value};

	$.ajax({
		
		data:parametros,
		
		url:'utils/registro.php',
		
		type: 'post',

		success: function (response) {
			alert('test '+response);

	
		}
		
	});	
}

function entrar(){
		
	try {
		
		$("#navButton").click();
		
		$("#entrar").modal().show();
		
	}
	
	catch (exception_var) {

	}
		
}

function registro(){
		
	try {
		
		$("#navButton").click();
		
		$("#registrar").modal().show();
		
	}
	
	catch (exception_var) {

	}
		
}

function cmToIn(){
	
    result = this.value/2.54;
	
    x = result.toFixed(4);
	
    inchResult.value = x;
	
}

function inToCm(){
	
    result = this.value * 2.54;
	
    cmInput.value = result;
	
}

function dangles(){
	
	var modo=document.querySelector('input[name="modo_dangles"]:checked').value;
	
	var radio_dangles=parseInt(document.getElementById("diametro_dangles").value);
	
	radio_dangles/=2;
	
	var parametros = {"radio":radio_dangles,"espacio":parseInt(document.getElementById("espacio_dangles").value),"altura_triangulo":parseFloat(document.getElementById("altura_dangles").value),"base_triangulo":parseFloat(document.getElementById("base_triangulo").value),"modo":modo};
	
	$.ajax({
		
		data:parametros,
		
		url:'calculadora/calculo_dangles.php',
		
		type: 'post',

		success: function (response) {
			
			document.getElementById("resultado_dangles").innerHTML=response;

		}
		
	});
}

function resultado(){
	
	ver_tipo();
		
	var tipo=document.getElementById('tipo').value;
	
	var diametro=document.getElementById('in_diametro').value;
	
	var anchoBola=document.getElementById('in_grosor').value;
	
	var numero_aros=document.getElementById('num_aros').value;
	
	var numero_aros=document.getElementById('num_aros').value;
	
	var espacio_bolas=document.getElementById('espacio_bolas').value;
	
	var enganche=0;
		
	if(document.getElementById('con_enganche').checked){
		
		enganche=1;
		
	}

	switch(tipo){
		
		case "n_bolas":
		
			numeroBolas(diametro,anchoBola,numero_aros,enganche,espacio_bolas);
						
		break;
		
		case "abombamiento":
		
			abombamiento(document.getElementById('medida_1').value,document.getElementById('medida_2').value,diametro,enganche,anchoBola);
		
		break;
		
		case "enganche_simple":
					
			longitud_cuerda(diametro,enganche,1);
			
		break;
		
		case "enganche_doble":
		
			longitud_cuerda(diametro,enganche,2);
		
		break;
		
	}
		
}
	
function abombamiento(medida_1,medida_2,diametro,enganche,anchoBola) {

	var parametros = {"medida1":medida_1,"medida2":medida_2,"diametro":diametro,"enganche":enganche,"grosorBola":anchoBola};
	
	$.ajax({
		
		data:parametros,
		
		url:'calculadora/abombamiento.php',
		
		type: 'post',

		success: function (response) {
	
			document.getElementById("resultado").innerHTML=response;

		}
		
	});
	
}

function longitud_cuerda(diametro,enganche,modo) {
	
	var parametros = {"medidaDiametro":diametro,"enganche":enganche,"modo":modo};
	
	$.ajax({
		
		data:parametros,
		
		url:'calculadora/longitud_cuerda.php',
		
		type: 'post',

		success: function (response) {
					
			document.getElementById("resultado").innerHTML=response;

		}
		
	});
	
}

function numeroBolas(diametro,anchoBola,numero_aros,enganche,espacio_bolas) {
	
	var parametros = {"diametro":diametro,"anchoBola":anchoBola,"numero_aros":numero_aros,"enganche":enganche,"espacio_bolas":espacio_bolas};
	
	$.ajax({
		data:parametros,
		url:'calculadora/nbolas.php',
		type: 'post',

		success: function (response) {  
		
			document.getElementById("resultado").innerHTML=response;

		}
		
	});
	
}

function ver_tipo(){
	
	var valorDiametro=document.getElementById('in_diametro').value;
	
	var valorGrosorBola=document.getElementById('in_grosor').value;
	
	if(parseFloat(valorDiametro)>0){

		document.getElementById('diametro').innerHTML=valorDiametro+' cm';
	
	}
	
	else{
		
		document.getElementById('diametro').innerHTML="";
		
	}
	
	if(parseFloat(valorGrosorBola)>0){

		document.getElementById('grosor-bola').innerHTML=valorGrosorBola+' cm';
	
	}
	
	else{
		
		document.getElementById('grosor-bola').innerHTML="";
		
	}
	
	var tipo=document.getElementById('tipo').value;
	
	var imagen='';
	
	var argumentos=[];

	switch(tipo){
		
		case "enganche_simple":
		
			imagen='simple.png';
		
		break;
		
		case "enganche_doble":
		
			imagen='doble.png';
		
		break;
		
		case "n_bolas":
		
			imagen='nbolas.png';
			
			
			
		break;
		
		case "abombamiento":
		
			imagen='abombamiento.png';
		
		break;
		
	}
		
	argumentos.push(tipo);
	
	var parametros = {"tipo":argumentos[0]};
	
	$.ajax({
		
		data:parametros,
		
		url:'calculadora/ver_dato.php',
		
		type: 'post',
	
		success: function (response) {

			document.getElementById("tipo_calculo").innerHTML=response;
	
		}
		
	});
	
	document.getElementById("imagen_resultado").src = 'assets/img/'+imagen;	
	
}