<!-- INCLUDE BLOCK : header -->
<br>
<div class="container">        

        <!-- START BLOCK : ver_rutas -->
        <div class="row">
            <a href="index.php?action=rutas&agregar=si" class="btn btn-success">Agregar</a>

            <div class="col-md-12">
                <h4 class="sub-header">Listado de Rutas</h4>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>Ruta Nro</th>
                          <th>Usuario</th>
                          <th>Fecha</th>
                          <th>Destino</th>
                          <th>Visitado</th>
                          <th>Factura</th>
                        </tr>
                      </thead>
                      <tbody>
                        <!-- START BLOCK : fila_rutas -->  
                        <tr>
                          <td>{id_rutas}</td>
                          <td>{id_usuario}</td>	
                          <td>{fecha}</td>
                          <td>{destino}</td>	 
                          <td>{id_factura}</td>                     
                          <td style="width:150px;">
                                <a href="index.php?action=rutas&buscar={id_rutas}" class="btn btn-sm btn-warning">Editar</a>
                                <a href="index.php?action=rutas&eliminar={id_rutas}" id="del-{id_rutas}" class="btn btn-sm btn-danger" onClick="javascript:return confirm('Esta seguro?');">Eliminar</a>
                          </td>      
                        </tr>
                        <!-- END BLOCK : fila_rutas -->
                      </tbody>
                    </table>
                  </div>   
            </div>                              
        </div>              
        <!-- END BLOCK : ver_rutas -->   
        
	        <!-- START BLOCK : form_rutas2 -->
        <div class="row">
                <!-- <hr width="120%">  -->
                <h4>{titulo_form}</h4>
        </div>
        <div class="row">    
            <div class="col-md-2"> </div> 
            <div class="col-md-8"> 
                 <form name="form_rutas2"  id="form_rutas2" role="form" method="post" action="index.php?action=rutas&{que}={id_rutas}">  
                    <div class="row">
                        <div class="col-xs-4">
                            <div class="form-group">
                                <label for="tipo">Usuario</label>
                                <select name="id_usuario" id="id_usuario" class="form-control" onchange="SetUsuario();" required>
                                         <!-- START BLOCK : lista_usuarios -->
                                                <option value="{id_usuario}*{usuario}*{clave}*{nombre}*{apellido}*{email}*{id_tipo}">{id_usuario}-{apellido}</option>
                                        <!-- END BLOCK : lista_usuarios -->
                                </select> 	                        
                            </div>                    
                        </div>
                        <div class="col-xs-3">                
                            <div class="form-group">
                                <label for="usuario_apellido">Apellido</label>
                                <input type="text" class="form-control" value="{apellido}" name="usuario_apellido" id="usuario_apellido" readonly>
                            </div>
                        </div>
                        <div class="col-xs-5">    
                            <div class="form-group">
                                <label for="usuario_usr">Tipo</label>
                                <input type="text" class="form-control" value="{usuario}" name="usuario_usr" id="usuario_usr" readonly>
                            </div>
                        </div>
                    </div>    
                    <div class="row" style="background-color:#f9f9f9;">        
                            <div class="col-xs-5">
                                <div class="form-group">
                                    <input id="id_usuario" type="hidden" value="0" />
                                    <input id="nombre_prod" type="hidden" value="0" />
                                    <input id="rutas_stock_prod" type="hidden" value="0" />
                                    
                                    <label for="ewc_ruta">Destino</label> 
                                    <select name="usuario_ruta" id="usuario_ruta" class="form-control" onchange="SetRuta_ruta();" >
                                            <option value=""></option>
                                            <!-- START BLOCK : lista_rutas -->
                                                    <option value="{id_rutas}$*${id_usuario}$*${fecha}$*${destino}*${visitado}*${id_factura}"{seleccionada_ruta}>{id_rutas}-{destino}</option>
                                            <!-- END BLOCK : lista_rutas -->
                                    </select>                        
                                </div>                    
                            </div>
                            <div class="col-xs-2">                
                                <div class="form-group">
                                    <label for="usuario_fecha">Fecha</label>
                                    <input type="text" class="form-control" value="{fecha}" name="usuario_fecha" id="usuario_fecha" >
                                </div>
                            </div>
                            <div class="col-xs-3">    
                                <div class="form-group">
                                    <br />
                                    <input id="agrega_rec" type="button" value="Cargar Ruta" />
                                </div>
                            </div>                                
                    </div>             
                                
                    <div id="elementos_rec">
                        <div id="inputs_rec">
                            <div class="row">    
                            <div class="col-xs-5"><div class="form-group"><label for="usuario_destino">Destino</label></div></div>
                            <div class="col-xs-2"><div class="form-group"><label for="usuario_fecha">Fecha</label></div></div>                           
                            </div>
                        </div>
                    </div> 
					<button type="submit" class="btn btn-success">{titulo_boton}</button>
				</form> 
            </div>        
            <div class="col-md-2"> </div>    
        </div>
        <!-- END BLOCK : form_rutas2 -->   
        
        <!-- START BLOCK : form_rutas -->
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
        <!-- END BLOCK : form_rutas -->                   
            
        
</div>
<!-- INCLUDE BLOCK : footer -->