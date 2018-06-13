function SetCliente_destinos(){
	//console.log('entra');
  var cliente = document.getElementById("destinos_cliente").value;
  //alert (cliente);
  var arrayOfStrings = cliente.split('*');
  
 // document.getElementById("fecha").value = arrayOfStrings[4];
  document.getElementById("direccion").value = arrayOfStrings[3];
  document.getElementById("id_cliente").value = arrayOfStrings[0];
 
}