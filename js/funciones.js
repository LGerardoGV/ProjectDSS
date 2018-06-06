	function verificarK(valor){
		if(valor<1){
			document.getElementById('k').value = 1;
		}
		if(valor>99){
			document.getElementById('k').value = 99;
		}
	}

	function verificarJ(valor){
		var k = document.getElementById('k').value;

		if(valor<1){
			document.getElementById('j').value = 1;
		}
		if(valor>(99-k)){
			document.getElementById('j').value = 99-k;
		}
	}

	function validarAlfa(valor){
		if(valor<0){
			document.getElementById('alfa').value = 0;
		}
		if(valor>1){
			document.getElementById('alfa').value = 1;
		}
	}

	function loChido(){

		var opc = document.getElementById('opciones').value;
		var k =  document.getElementById('k').value;
		var j =  document.getElementById('j').value;
		var alfa =  document.getElementById('alfa').value;

		if(opc.length == 0 || k.length == 0 || j.length == 0 || alfa.length == 0){
			alert("El formulario esta incompleto");
			return false;
		}
	}
