$('#agregaRuta').click(function(){
	alert("Entre");
	var id_destino = $('#id_destino').val();
	var fecha = parseFloat($('#fechas').val());
	var destino = parseFloat($('#destino').val());
 
	$('<div class="row"><div class="col-xs-5"><div class="form-group"><input type="text" class="form-control" value="'+ id_destino+' - '+usuario +'" name="id_destino'+cuentaInputs+'" id="id_destino'+cuentaInputs+'" readonly></div></div>'+'"<div class="col-xs-2"><div class="form-group"><input type="text" class="form-control" value="'+fecha+'" name="fecha'+cuentaInputs+'" id="fecha'+cuentaInputs+'" readonly></div></div>'+'<div class="col-xs-2"><div class="form-group"><input type="text" class="form-control" value="'+destino+'" name="destino'+cuentaInputs+'" id="destino'+cuentaInputs+'"readonly></div></div>+</div>').appendTo('#inputs_rec');        
	$('#id_destino').val('');
	$('#fecha').val('');
	$('#destino').val('');

	cuentaInputs++;
});