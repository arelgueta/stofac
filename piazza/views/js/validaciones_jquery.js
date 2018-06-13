/*funciones para validar formularios */
$(function(){
    
      $("#form_productos").on('submit', function(){    

            var nombres = $('#nombre').val();
            if( nombres == null || nombres.length == 0 || /^\s+$/.test(nombres) ) {
                    alert(' El campo nombre no puede estar vacio');
              return false;
            }	
            
            if(nombres.length >= 50 ) {
                    alert(' El campo NOMBRE no puede ser mayor a 50 caracteres');
                    return false;
            } else {
                    return true;
            }            

            var precio = $('#precio').val();
            if( isNaN(precio) ) {
              alert(' El campo precio debe ser numerico');
              return false;
            }	
            
            var stock = $('#stock').val();
            if( isNaN(stock) ) {
              alert(' El campo stock debe ser numerico');
              return false;
            }            
      }); 
      
      $("#form_clientes").on('submit', function(){    

            var nombres = $('#nombre').val();
            if( nombres == null || nombres.length == 0 || /^\s+$/.test(nombres) ) {
                    alert(' El campo nombre no puede estar vacio');
              return false;
            }	
            
            if(nombres.length >= 50 ) {
                    alert(' El campo NOMBRE no puede ser mayor a 50 caracteres');
                    return false;
            } else {
                    return true;
            }            

            var apellidos = $('#apellido').val();
            if( apellidos == null || apellidos.length == 0 || /^\s+$/.test(apellidos) ) {
                    alert(' El campo nombre no puede estar vacio');
              return false;
            }	
            
            if(apellidos.length >= 50 ) {
                    alert(' El campo APELLIDO no puede ser mayor a 50 caracteres');
                    return false;
            } else {
                    return true;
            } 
            
            var email = $('#email').val();
            if( /^\w+([\.\+\-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(email) ) {
                alert(' El campo email esta bien');
                return true;
            }  else {
                alert(' El campo email no corresponde a un email valido');
                return false;                
            }            
      });  
      
      
        var cuentaInputs = $('#elementos').children().length;
        
        $('#agrega').click(function(){
            var id_producto = $('#fac_id_producto').val();
            var producto = $('#fac_nombre_prod').val();
            var stock = parseFloat($('#fac_stock_prod').val());
            var precio = parseFloat($('#fac_precio').val());
            var cantidad = parseFloat($('#fac_cantidad').val()); 
			var total = $('#fac_total').val();
			//var total_final=parseFloat(0);

            if (cantidad > 0 && id_producto != ''){                
                if (cantidad < stock){
					var subtotal = precio * cantidad;
                    
                $(	'<div class="row"><div class="col-xs-5"><div class="form-group"><input type="text" class="form-control" value="'+ id_producto +' - '+ producto +'" name="det_prod'+cuentaInputs+'" id="det_prod'+cuentaInputs+'" readonly></div></div>'+
										'<div class="col-xs-2"><div class="form-group"><input type="text" class="form-control" value="'+cantidad+'" name="det_cantidad'+cuentaInputs+'" id="det_cantidad'+cuentaInputs+'" readonly></div></div>'+
										'<div class="col-xs-2"><div class="form-group"><input type="text" class="form-control" value="'+precio+'" name="det_precio'+cuentaInputs+'" id="det_precio'+cuentaInputs+'" readonly></div></div>'+
										'<div class="col-xs-2"><div class="form-group"><input type="text" class="form-control" value="'+subtotal+'" name="det_subtotal'+cuentaInputs+'" id="det_subtotal'+cuentaInputs+'" readonly></div></div></div>').appendTo('#inputs');
					var total_final = parseFloat(total) + parseFloat(subtotal);
					            
            //blaqueo los input y actualizo el total 
            
				$('#fac_id_producto').val('');
				$('#fac_producto').val('');
				$('#fac_nombre_prod').val('');
				$('#fac_precio').val('');
				$('#fac_cantidad').val('');  
				$('#fac_codigo').val('');  
				$('#fac_total').val(parseFloat(total_final));

					cuentaInputs++;
                
                }else {
                    alert ('No hay suficiente stock para la cantidad: '  + cantidad + ', siendo el stock actual: ' + stock);
					
					$('#fac_id_producto').val('');
					$('#fac_producto').val('');
					$('#fac_nombre_prod').val('');
					$('#fac_precio').val('');
					$('#fac_cantidad').val('');  
					$('#fac_codigo').val('');  
					//$('#fac_total').val(parseFloat(total_final));
					//var total_final =0;
                   // return false;
                }            
            }else {
                alert ('Indique cantidad');
               // return false;
            }

         });
         
         
        $('#enviar').click(function(){
                $('#datos').submit();
        });	
        
        
      //verifico el envio de la factura  
      $("#form_factura").on('submit', function(){    
          
            
      });         
 

       var cuentaInputs_rec = $('#elementos_rec').children().length;
        
        $('#agrega_rec').click(function(){
            var id_producto = $('#rec_id_producto').val();
            var producto = $('#rec_nombre_prod').val();
            var stock = parseFloat($('#rec_stock_prod').val());
            var precio = parseFloat($('#rec_precio').val());
            var cantidad = parseFloat($('#rec_cantidad').val()); 
            var subtotal = precio * cantidad;
            var total = $('#rec_total').val();
            

            //if (cantidad > 0 && id_producto != ''){                
               // if (cantidad < stock){
                    
                $('<div class="row"><div class="col-xs-5"><div class="form-group"><input type="text" class="form-control" value="'+ id_producto +' - '+ producto +'" name="det_prod'+cuentaInputs_rec+'" id="det_prod'+cuentaInputs_rec+'" readonly></div></div>'+
'<div class="col-xs-2"><div class="form-group"><input type="text" class="form-control" value="'+cantidad+'" name="det_cantidad'+cuentaInputs_rec+'" id="det_cantidad'+cuentaInputs_rec+'" readonly></div></div>'+
'<div class="col-xs-2"><div class="form-group"><input type="text" class="form-control" value="'+precio+'" name="det_precio'+cuentaInputs_rec+'" id="det_precio'+cuentaInputs_rec+'" readonly></div></div>'+
'<div class="col-xs-2"><div class="form-group"><input type="text" class="form-control" value="'+subtotal+'" name="det_subtotal'+cuentaInputs_rec+'" id="det_subtotal'+cuentaInputs_rec+'" readonly></div></div></div>').appendTo('#inputs_rec');
                
                //}else {
                  //  alert ('No hay suficiente stock para la cantidad indicada '  + cantidad + '-' + stock);
                   // return false;
              //  }            
            //}else {
              //  alert ('Indique cantidad');
               // return false;
            //}
            
            //blaqueo los input y actualizo el total 
            var total_final = parseFloat(total) + parseFloat(subtotal);
            
            $('#rec_id_producto').val('');
            $('#rec_producto').val('');
            $('#rec_nombre_prod').val('');
            $('#rec_precio').val('');
            $('#rec_cantidad').val('');  
            $('#rec_total').val(parseFloat(total_final));

            cuentaInputs_rec++;
         });
  
});

function SetCliente(){
  var cliente = document.getElementById("fac_cliente").value;
  //alert (cliente);
  var arrayOfStrings = cliente.split('*');
  
  document.getElementById("fac_id_cliente").value = arrayOfStrings[0];
  document.getElementById("fac_cuit").value = arrayOfStrings[4];
  document.getElementById("fac_direccion").value = arrayOfStrings[3];
 
}

function SetProducto(){
  var producto = document.getElementById("fac_producto").value;
  //alert (cliente); 
  var arrayOfStrings = producto.split('$*$');
  
  document.getElementById("fac_id_producto").value = arrayOfStrings[0];
  document.getElementById("fac_nombre_prod").value = arrayOfStrings[1];
  document.getElementById("fac_precio").value = arrayOfStrings[2];
  document.getElementById("fac_stock_prod").value = arrayOfStrings[3];
  document.getElementById("fac_codigo").value = arrayOfStrings[4];
 
}

function SetProveedor(){
  var producto = document.getElementById("rec_proveedor").value;
  //alert (cliente); 
  var arrayOfStrings = producto.split('*');
  
  document.getElementById("rec_id_proveedor").value = arrayOfStrings[0];
  document.getElementById("rec_cuit").value = arrayOfStrings[4];
  document.getElementById("rec_direccion").value = arrayOfStrings[3];
 
}
function SetProducto_rec(){
  var producto = document.getElementById("rec_producto").value;
  //alert (cliente); 
  var arrayOfStrings = producto.split('$*$');
  
  document.getElementById("rec_id_producto").value = arrayOfStrings[0];
  document.getElementById("rec_nombre_prod").value = arrayOfStrings[1];
  document.getElementById("rec_precio").value = arrayOfStrings[2];
  document.getElementById("rec_stock_prod").value = arrayOfStrings[3];
 
}