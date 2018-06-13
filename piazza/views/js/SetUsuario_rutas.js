function SetUsuario_rutas(){
  var cliente = document.getElementById("rutas_usuario").value;
  //alert (cliente);
  var arrayOfStrings = cliente.split('*');
  
  document.getElementById("descripcion").value = arrayOfStrings[4];
 
}