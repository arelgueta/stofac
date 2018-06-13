<!-- INCLUDE BLOCK : header -->
<br>
<div class="container">        

        <!-- START BLOCK : ver_productos -->
        <div class="row">
            <a href="index.php?action=productos&agregar=si" class="btn btn-success">Agregar</a>

            <div class="col-md-12">
                <h4 class="sub-header">Listado de Productos</h4>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Nombre</th>
                          <th>Precio</th>
                          <th>Stock</th>
                          <th>Categoria</th>
                          <th>Codigo</th>
                          <th>Foto</th>
                          <th>Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                        <!-- START BLOCK : fila_productos -->  
                        <tr>
                          <td>{id_producto}</td>
                          <td>{nombre}</td>	
                          <td>{precio}</td>
                          <td>{stock}</td>	 
                          <td>{categoria}</td>
                          <td>{codigo}</td>
                          <td><img src="views/img/{foto}" class="img-thumbnail img-circle" style="height:70px" alt="Responsive image"></td>
                          <td style="width:150px;">
                                <a href="index.php?action=productos&buscar={id_producto}" class="btn btn-sm btn-warning">Editar</a>
                                <a href="index.php?action=productos&eliminar={id_producto}" id="del-{id_producto}" class="btn btn-sm btn-danger" onClick="javascript:return confirm('Esta seguro?');">Eliminar</a>
                          </td>      
                        </tr>
                        <!-- END BLOCK : fila_productos -->
                      </tbody>
                    </table>
                  </div>   
            </div>                              
        </div>              
        <!-- END BLOCK : ver_productos -->   
                
        <!-- START BLOCK : form_productos -->
        <div class="row">
                <!-- <hr width="120%">  -->
                <h4>{titulo_form}</h4>
        </div>
        <div class="row">    
            <div class="col-md-3"> </div> 
            <div class="col-md-4"> 
                <form name="form_productos"  id="form_productos" role="form" method="post" enctype="multipart/form-data" action="index.php?action=productos&{que}={id_producto}">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" value="{nombre}" name="nombre" id="nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="precio">Precio</label>
                        <input type="text" class="form-control" value="{precio}" name="precio" id="precio" required>
                    </div>
                    <div class="form-group">
                        <label for="stock">Stock</label>
                        <input type="text" class="form-control" value="{stock}" name="stock" id="stock" required>
                    </div>
                    <div class="form-group">
                        <label for="categoria">Categoria</label>
                        
                        <select name="categoria" id="categoria" class="form-control" required>
                                <option value=""></option>
                                <!-- START BLOCK : lista_categoria -->
                                        <option value="{id_categoria}"{seleccionado_categoria}>{id_categoria}-{nombre}</option>
                                <!-- END BLOCK : lista_categoria -->
                        </select> </td>	                        
                    </div>
                    <div class="form-group">
                        <label for="codigo">Codigo</label>
                        <input type="text" class="form-control" value="{codigo}" name="codigo" id="codigo" required>
                    </div>
                                
                                <!--  https://davidwalsh.name/basic-file-uploading-php -->

                    <div class="form-group">
                        <label for="foto">Foto</label>
                        <INPUT TYPE='hidden' name='MAX_FILE_SIZE' value='10000000'>
                        <input type="file" class="form-control" value="{foto}" name="foto" id="foto" >
                    </div>

                    <button type="submit" class="btn btn-default">{titulo_boton}</button>

                </form> 
            </div>        
            <div class="col-md-5"> </div>    
        </div>
        <!-- END BLOCK : form_productos -->                   
            
        
</div>
<!-- INCLUDE BLOCK : footer -->