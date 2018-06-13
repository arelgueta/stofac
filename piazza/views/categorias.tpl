<!-- INCLUDE BLOCK : header -->
<br>
<div class="container">        

        <!-- START BLOCK : ver_categorias -->
        <div class="row">
            <a href="index.php?action=categorias&agregar=si" class="btn btn-success">Agregar</a>

            <div class="col-md-12">
                <h4 class="sub-header">Listado de Categorias</h4>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Nombre</th>
                          <th>Descripcion</th>
                          <th>Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                        <!-- START BLOCK : fila_categorias -->  
                        <tr>
                          <td>{id_categoria}</td>
                          <td>{nombre}</td>	
                          <td>{descripcion}</td>
                          <td style="width:150px;">
                                <a href="index.php?action=categorias&buscar={id_categoria}" class="btn btn-sm btn-warning">Editar</a>
                                <a href="index.php?action=categorias&eliminar={id_categoria}" id="del-{id_categoria}" class="btn btn-sm btn-danger" onClick="javascript:return confirm('Esta seguro?');">Eliminar</a>
                          </td>      
                        </tr>
                        <!-- END BLOCK : fila_categorias -->
                      </tbody>
                    </table>
                  </div>   
            </div>                              
        </div>              
        <!-- END BLOCK : ver_categorias -->   
                
        <!-- START BLOCK : form_categorias -->
        <div class="row">
                <!-- <hr width="120%">  -->
                <h4>{titulo_form}</h4>
        </div>
        <div class="row">    
            <div class="col-md-3"> </div> 
            <div class="col-md-4"> 
                <form name="form_categorias"  id="form_categorias" role="form" method="post" action="index.php?action=categorias&{que}={id_categoria}">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" value="{nombre}" name="nombre" id="nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripcion</label>
                        <input type="text" class="form-control" value="{descripcion}" name="descripcion" id="descripcion" required>
                    </div>

                    <button type="submit" class="btn btn-default">{titulo_boton}</button>

                </form> 
            </div>        
            <div class="col-md-5"> </div>    
        </div>
        <!-- END BLOCK : form_categorias -->                   
            
        
</div>
<!-- INCLUDE BLOCK : footer -->