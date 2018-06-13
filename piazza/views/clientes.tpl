<!-- INCLUDE BLOCK : header -->
<br>
<div class="container">        

        <!-- START BLOCK : ver_clientes -->
        <div class="row">
            <a href="index.php?action=clientes&agregar=si" class="btn btn-success">Agregar</a>

            <div class="col-md-12">
                <h4 class="sub-header">Listado de Clientess</h4>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Nombre</th>
                          <th>Apellido</th>
                          <th>Direccion</th>
                          <th>destino</th>
                          <th>Telefono</th>
                          <th>email</th>     
                          <th>Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                        <!-- START BLOCK : fila_clientes -->  
                        <tr>
                          <td>{id_cliente}</td>
                          <td>{nombre}</td>	
                          <td>{apellido}</td>
                          <td>{direccion}</td>	 
                          <td>{nombreDestino}</td>
                          <td>{telefono}</td>
                          <td>{email}</td>                          
                          <td style="width:150px;">
                                <a href="index.php?action=clientes&buscar={id_cliente}" class="btn btn-sm btn-warning">Editar</a>
                                <a href="index.php?action=clientes&eliminar={id_cliente}" id="del-{id_cliente}" class="btn btn-sm btn-danger" onClick="javascript:return confirm('Esta seguro?');">Eliminar</a>
                          </td>      
                        </tr>
                        <!-- END BLOCK : fila_clientes -->
                      </tbody>
                    </table>
                  </div>   
            </div>                              
        </div>              
        <!-- END BLOCK : ver_clientes -->   
                
        <!-- START BLOCK : form_clientes -->
        <div class="row">
                <!-- <hr width="120%">  -->
                <h4>{titulo_form}</h4>
        </div>
        <div class="row">    
            <div class="col-md-3"> </div> 
            <div class="col-md-4"> 
                <form name="form_clientes"  id="form_clientes" role="form" method="post" action="index.php?action=clientes&{que}={id_cliente}">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" value="{nombre}" name="nombre" id="nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="apellido">Apellido</label>
                        <input type="text" class="form-control" value="{apellido}" name="apellido" id="apellido" required>
                    </div>
                    <div class="form-group">
                        <label for="direccion">Direccion</label>
                        <input type="text" class="form-control" value="{direccion}" name="direccion" id="direccion" required>
                    </div>                    
                    <div class="form-group">
                        <label for="id_destino">Destino</label>
                     <input id="id_destino" type="hidden" value="" />
                                <select name="id_destino" id="id_destino" class="form-control" onchange="SetDestino();" required>
                                        <option value=""></option>
									<!-- START BLOCK : lista_destinos -->
                                                <option value="{id_destino}*{nombreDestino}*"{seleccionado_cliente}>{id_destino} - {nombreDestino}</option>
									<!-- END BLOCK : lista_destinos -->
                                       </select> 	                        
					
					<!--	<input type="text" class="form-control" value="{id_destino}" name="id_destino" id="id_destino" required> -->
                    
					
					</div>
                    <div class="form-group">
                        <label for="telefono">Telefono</label>
                        <input type="text" class="form-control" value="{telefono}" name="telefono" id="telefono" required>
                    </div>
                    <div class="form-group">
                        <label for="email">email</label>
                        <input type="text" class="form-control" value="{email}" name="email" id="email" required>
                    </div>

                    <button type="submit" class="btn btn-default">{titulo_boton}</button>

                </form> 
            </div>        
            <div class="col-md-5"> </div>    
        </div>
        <!-- END BLOCK : form_clientes -->                   
            
        
</div>
<!-- INCLUDE BLOCK : footer -->