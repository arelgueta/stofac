<!-- INCLUDE BLOCK : header -->
<br>
<div class="container">        

        <!-- START BLOCK : ver_rutas -->
	   <div class="row">
            <!-- <a href="index.php?action=rutas&agregar=si" class="btn btn-success">Agregar</a> -->
            <div class="col-md-12">
                <h4 class="sub-header">Listado de Rutas para clientes unicos</h4>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>Ruta Nro</th>
                          <th>Vendedor_Nombre</th>
                          <th>Vendedor_Apellido</th>
                          <th>Fecha</th>
                          <th>Destino</th>
                          <th>Visitado</th>
                          <th>Factura</th>
                        </tr>
                      </thead>
                      <body>
                        <!-- START BLOCK : fila_rutas -->  
                        <tr>
                          <td>{id_rutas}</td>
                          <td>{uNombre}</td>	
                          <td>{uApellido}</td>	
                          <td>{fecha}</td>
                          <td>{nombreDestino}</td>	
                          <td>{visitado}</td>	 
                          <td>{id_factura}</td>                     
                          <td style="width:150px;"> 
                                <a href="index.php?action=facturas&agregar1=si&id_rutas={id_rutas}&id_cliente={id_cliente}&apellido={apellido}&nombre={nombre}&direccion={direccion}&cuit={cuit}" class="btn btn-sm btn-warning">Facturar</a>

                             <!--   <a href="index.php?action=rutas&eliminar={id_rutas}" id="{id_rutas}" class="btn btn-sm btn-danger" onClick="javascript:return confirm('Esta seguro?');">Eliminar</a>-->
                          </td>      
                        </tr>
                        <!-- END BLOCK : fila_rutas -->
                      </body>
                    </table>
                  </div>   
            </div>                              
        </div>              
        <!-- END BLOCK : ver_rutas -->   
        
	        <!-- START BLOCK : form_rutas -->
        <div class="row">
                <!-- <hr width="120%">  -->
                <h4>{titulo_form}</h4>
        </div>
        <div class="row">    
            <div class="col-md-2"> </div> 
            <div class="col-md-8"> 
                 <form name="form_rutas"  id="form_rutas" role="form" method="post" action="index.php?action=rutas&{que}={id_rutas}">  
                  <div class="row">
                        <div class="col-xs-4">
                            <div class="form-group">
                                <label for="tipo">Cliente</label>
                                <!-- input id="rutas_destino" type="hidden" value="" /-->
                                <select name="rutas_destino" id="rutas_destino" class="form-control" onchange="SetCliente_rutas();" required>
                                        <option value=""></option> 
                                        <!-- START BLOCK : lista_destinos -->
                                                <option value="{id_destino}*{nombreDestino}"{seleccionado_destino}> {id_destino} - {nombreDestino}</option>
                                        <!-- END BLOCK : lista_clientes -->
                                </select> 	                        
                            </div>                    
                        </div>
                        <div class="col-xs-3">                
                            <div class="form-group">
                                <label for="fecha">Fecha</label>
								<div class='input-group date' id='datetimepicker'>
									<input type='text' class="form-control" />
									<span class="input-group-addon">
										<span class="glyphicon glyphicon-calendar"></span>
									</span>
								</div>
									<script type="text/javascript">
										$(function () {
											$('#datetimepicker').datetimepicker();
										});
									</script>
                            </div>
                        </div>
                    </div>    
                    <div class="row" style="background-color:#f9f9f9;">        
                            <div class="col-xs-5">
                                <div class="form-group">
                                    <label for="rutas_usuario">Usuario</label> 
                                    <select name="rutas_usuario" id="rutas_usuario" class="form-control" onchange="SetUsuario_rutas();" required>
                                            <option value=""></option>
                                            <!-- START BLOCK : lista_usr -->
                                                    <option value="{id_usuario}*{usuario}*{nombre}*{apellido}*{descripcion}"{seleccionado_usr}>{id_usuario}-{apellido}-{nombre}</option>
                                            <!-- END BLOCK : lista_usr -->
                                    </select>                        
                                </div>                    
                            </div>
                                                     
                    </div>                                 
                    <button type="submit" class="btn btn-success">{titulo_boton}</button>

               </form> 
            </div>        
            <div class="col-md-2"> </div>    
        </div>
        <!-- END BLOCK : form_rutas -->   
        
        <!-- START BLOCK : form_rutas2 -->
        <div class="row">
                <!-- <hr width="120%">  -->
                <h4>{titulo_form}</h4>
        </div>
        <div class="row">    
            <div class="col-md-3"> </div> 
            <div class="col-md-4"> 
                <form name="form_rutas"  id="form_rutas" role="form" method="post" action="index.php?action=rutas&{que}={id_rutas}">
                    <div class="form-group">
                        <label for="id_usuario">usuario</label>
                        <input type="text" class="form-control" value="{id_usuario}" name="id_usuario" id="id_usuario" required>
                    </div>
                    <div class="form-group">
                        <label for="fecha">Fecha</label>
					
							<div class='input-group date' id='divMiCalendario'>
								<input type='text' value="{fecha}" name="fecha" id="fecha" class="form-control"  readonly/>
								<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
								</span>
							</div>
					
	{literal}
   <script src="views/js/jquery.min.js"></script>
   <script src="views/js/moment.min.js"></script>
   <script src="views/js/bootstrap-datetimepicker.min.js"></script>
   <script src="views/js/bootstrap-datetimepicker.es.js"></script>
   <script type="text/javascript">
     $('#divMiCalendario').datetimepicker({
          format: 'YYYY-MM-DD HH:mm'       
      });
      $('#divMiCalendario').data("DateTimePicker").show();
   </script>
	{literal}
		
                    </div>
                    <div class="form-group">
                        <label for="destino">Direccion</label>
                        <input type="text" class="form-control" value="{destino}" name="destino" id="destino" required>
                    </div>                    
                    <div class="form-group">
                        <label for="visitado">Visitado</label>
                        <input type="text" class="form-control" value="{visitado}" name="visitado" id="visitado" required>
                    </div>
                    <div class="form-group">
                        <label for="id_factura">Factura</label>
                        <input type="text" class="form-control" value="{id_factura}" name="id_factura" id="id_factura" required>
                    </div>
                    <button type="submit" class="btn btn-default">{titulo_boton}</button>

                </form> 
            </div>        
            <div class="col-md-5"> </div>    
        </div>
        <!-- END BLOCK : form_rutas2 -->                   
            
        
</div>
<!-- INCLUDE BLOCK : footer -->