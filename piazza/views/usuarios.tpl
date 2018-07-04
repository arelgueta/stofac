<!-- INCLUDE BLOCK : header -->
<br>
<div class="container">        

        <!-- START BLOCK : ver_usuarios -->
        <div class="row">
            <a href="index.php?action=usuarios&agregar=si" class="btn btn-success">Agregar</a>

            <div class="col-md-12">
                <h4 class="sub-header">Listado de Usuarios</h4>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Usuario</th>
             <!--             <th>Clave</th>   -->
                          <th>Nombre</th>
                          <th>Apellido</th>
                          <th>email</th>
                          <th>Tipo</th>                          
                          <th>Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                        <!-- START BLOCK : fila_usuarios -->  
                        <tr>
                          <td>{id_usuario}</td>
                          <td>{usuario}</td>	
                  <!--        <td>{clave}</td>  -->
                          <td>{nombre}</td>
                          <td>{apellido}</td>	
                          <td>{email}</td>
                          <td>{descripcion}</td>                          
                          <td style="width:150px;">
                                <a href="index.php?action=usuarios&buscar={id_usuario}" class="btn btn-sm btn-warning">Editar</a>
                                <a href="index.php?action=usuarios&eliminar={id_usuario}" id="del-{id_usuario}" class="btn btn-sm btn-danger" onClick="javascript:return confirm('Esta seguro?');">Eliminar</a>
                          </td>      
                        </tr>
                        <!-- END BLOCK : fila_usuarios -->
                      </tbody>
                    </table>
                  </div>   
            </div>                              
        </div>              
        <!-- END BLOCK : ver_usuarios -->   
                
        <!-- START BLOCK : form_usuarios -->
        <div class="row">
                <!-- <hr width="120%">  -->
                <h4>{titulo_form}</h4>
        </div>
        <div class="row">    
            <div class="col-md-3"> </div> 
            <div class="col-md-4"> 
                <form name="form_usuarios"  id="form_usuarios" role="form" method="post" action="index.php?action=usuarios&{que}={id_usuario}">
                    <div class="form-group">
                        <label for="usuario">ID# Usuario</label>
                        <input type="text" class="form-control" value="{id_usuario}" name="id_usuario" id="usuario" readonly>
                    </div>
                    <div class="form-group">
                        <label for="usuario">Usuario</label>
                        <input type="text" class="form-control" value="{usuario}" name="usuario" id="usuario" required>
                    </div>
                    <div class="form-group">
                        <label for="clave">Clave</label>
                        <input type="password" class="form-control" value="{clave}" name="clave" id="clave" required>
                    </div>
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" value="{nombre}" name="nombre" id="nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="apellido">Apellido</label>
                        <input type="text" class="form-control" value="{apellido}" name="apellido" id="apellido" required>
                    </div>
                    <div class="form-group">
                        <label for="email">email</label>
                        <input type="text" class="form-control" value="{email}" name="email" id="email" required>
                    </div>       
                    <div class="form-group">
                        <label for="tipo">Tipo</label>
                        
                        <select name="tipo" id="tipo" class="form-control" required>
                                <option value=""></option>
                                <!-- START BLOCK : lista_tipo -->
                                        <option value="{id_tipo}"{seleccionado_tipo}>{id_tipo}-{descripcion}</option>
                                <!-- END BLOCK : lista_tipo -->
                        </select> </td>	                        
                    </div>                    
                    <button type="submit" class="btn btn-default">{titulo_boton}</button>

                </form> 
            </div>        
            <div class="col-md-5"> </div>    
        </div>
        <!-- END BLOCK : form_usuarios -->                   
            
        
</div>
<!-- INCLUDE BLOCK : footer -->
