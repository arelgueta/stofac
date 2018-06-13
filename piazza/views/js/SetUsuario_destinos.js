function SetUsuario_destinos(){
  var cliente = document.getElementById("destinos_usuario").value;
  //alert (cliente);
  var arrayOfStrings = cliente.split('*');
  
  document.getElementById("descripcion").value = arrayOfStrings[4];
 
}