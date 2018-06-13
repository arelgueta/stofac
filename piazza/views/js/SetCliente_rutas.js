function SetCliente_rutas(){
	console.log('entra');
  var cliente = document.getElementById("rutas_destino").value;
  alert (cliente);
  var arrayOfStrings = cliente.split('*');
  
 // document.getElementById("fecha").value = arrayOfStrings[4];
  document.getElementById("id_destino").value = arrayOfStrings[0];
  document.getElementById("nombreDestino").value = arrayOfStrings[0];
 
}