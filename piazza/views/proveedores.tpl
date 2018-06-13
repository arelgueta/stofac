<!-- INCLUDE BLOCK : header -->
<br>
<div class="container">        

        <!-- START BLOCK : ver_proveedores -->
        <div class="row">
            <a href="index.php?action=proveedores&agregar=si" class="btn btn-success">Agregar</a>

            <div class="col-md-12">
                <h4 class="sub-header">Listado de Proveedores</h4>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Nombre</th>
                          <th>Apellido</th>
                          <th>Direccion</th>
                          <th>Fec. Nac.</th>
                          <th>Telefono</th>
                          <th>cuit</th> 
                          <th>email</th>     
                          <th>Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                        <!-- START BLOCK : fila_proveedores -->  
                        <tr>
                          <td>{id_proveedor}</td>
                          <td>{nombre}</td>	
                          <td>{apellido}</td>
                          <td>{direccion}</td>	 
                          <td>{fecha_nacimiento}</td>
                          <td>{telefono}</td>
                          <td>{cuit}</td> 
                          <td>{email}</td>                          
                          <td style="width:150px;">
                                <a href="index.php?action=proveedores&buscar={id_proveedor}" class="btn btn-sm btn-warning">Editar</a>
                                <a href="index.php?action=proveedores&eliminar={id_proveedor}" id="{id_proveedor}" class="btn btn-sm btn-danger" onClick="javascript:return confirm('Esta seguro?');">Eliminar</a>
                          </td>      
                        </tr>
                        <!-- END BLOCK : fila_proveedores -->
                      </tbody>
                    </table>
                  </div>   
            </div>                              
        </div>              
        <!-- END BLOCK : ver_proveedores -->   
                
        <!-- START BLOCK : form_proveedores -->
        <div class="row">
                <!-- <hr width="120%">  -->
                <h4>{titulo_form}</h4>
        </div>
        <div class="row">    
            <div class="col-md-3"> </div> 
            <div class="col-md-4"> 
                <form name="form_proveedores"  id="form_proveedores" role="form" method="post" action="index.php?action=proveedores&{que}={id_proveedor}">
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
                        <label for="fecha_nacimiento">Fec. Nacimiento</label>
                        <input type="text" class="form-control" value="{fecha_nacimiento}" name="fecha_nacimiento" id="fecha_nacimiento" required>
                    </div>
                    <div class="form-group">
                        <label for="telefono">Telefono</label>
                        <input type="text" class="form-control" value="{telefono}" name="telefono" id="telefono" required>
                    </div>                   
                    <div class="form-group">
                        <label for="cuit">Num. Cuit</label>
                        <input type="text" class="form-control" value="{cuit}" name="cuit" id="cuit" required>
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
        <!-- END BLOCK : form_proveedores -->                   
            
        
</div>
<!-- INCLUDE BLOCK : footer -->