



function validar () {
	var fecha = document.getElementById('fecha').value;
	var hora = document.getElementById('hora').value;
	var doc = document.getElementById('doc').value;
	var servicio = document.getElementById('servicio').value;
	var request =  get_XmlHttp();
	request.open("POST", "generarcita.php", true);
	var parametro="accion=validar&fecha="+fecha+"&hora=" + hora + "&doc=" + doc + "&servicio=" + servicio;
    request.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    request.send(parametro);
	        
	request.onreadystatechange = function()
	{
		if (request.readyState == 4)
		{
			var respuesta = request.responseText;
			if(respuesta==1){
				enviar();
			}else{
				alert("Fallo de operación");
			}
		}
	}

}


function enviar () {
	var fecha = document.getElementById('fecha').value;
	var hora = document.getElementById('hora').value;
	var doc = document.getElementById('doc').value;
	var servicio = document.getElementById('servicio').value;
	var request =  get_XmlHttp();
	request.open("POST", "generarcita.php", true);
	var parametro="accion=enviar&fecha="+fecha+"&hora=" + hora + "&doc=" + doc + "&servicio=" + servicio;
    request.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    request.send(parametro);
	        
	request.onreadystatechange = function()
	{
		if (request.readyState == 4)
		{
			var respuesta = request.responseText;
			alert (respuesta);
		}
	}
}




      function get_XmlHttp()
    {
        // Crea la variable que contendrá la instancia del objeto  XMLHttpRequest (inicialmente con un valor nulo)
        var xmlHttp = null;

        if(window.XMLHttpRequest)
        {       // para Forefox, IE7+, Opera, Safari, ...
                xmlHttp = new XMLHttpRequest();
        }
        else if(window.ActiveXObject)
             {  // para Internet Explorer 5 or 6
                xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
            }

        return xmlHttp;
    }


function cambia () {
	document.informacion.periodista.disabled = !document.informacion.opcion[0].checked;
	document.informacion.fuente.disabled = document.informacion.opcion[0].checked;
	document.informacion.externo.disabled = document.informacion.opcion[0].checked;	
}

