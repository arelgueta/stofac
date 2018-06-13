<!-- INCLUDE BLOCK : header -->
<br>
<div class="container">        

        <!-- START BLOCK : ver_destinos -->
	   <div class="row">
            <a href="index.php?action=destinos&agregar=si" class="btn btn-success">Agregar</a>
            <div class="col-md-12">
                <h4 class="sub-header">Listado de Destinos</h4>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>Destino Nro</th>
                          <th>Nombre</th>
                        </tr>
                      </thead>
                      <tbody>
                        <!-- START BLOCK : fila_destinos -->  
                        <tr>
                          <td>{id_destino}</td>
                          <td>{nombreDestino}</td>	                           
                          <td style="width:150px;">
								<a href="index.php?action=destinos&eliminar={id_destino}" id="del-{id_usuario}" class="btn btn-sm btn-danger" onClick="javascript:return confirm('Esta seguro?');">Eliminar</a>
                          </td>               
                              
                        </tr>
                        <!-- END BLOCK : fila_destinos -->
                      </tbody>
                    </table>
                  </div>   
            </div>                              
        </div>              
        <!-- END BLOCK : ver_destinos -->   
        
	        <!-- START BLOCK : form_destinos -->
        <div class="row">
                <!-- <hr width="120%">  -->
                <h4>{titulo_form}</h4>
        </div>
        <div class="row">    
            <div class="col-md-2"> </div> 
            <div class="col-md-8"> 
                 <form name="form_destinos"  id="form_destinos" role="form" method="post" action="index.php?action=destinos&{que}={id_destinos}">  
                 
                    <div class="row" style="background-color:#f9f9f9;">        
                            <div class="col-xs-5">
                                <div class="form-group">
                                    <label for="destinos_usuario">Nombre</label> 
										<input type="text" class="form-control" value="{nombre}" name="nombre" id="nombre" >
                                    </select>                        
                                </div>                    
                            </div>
                                                     
                    </div>                                 
                    <button type="submit" class="btn btn-success">{titulo_boton}</button>

               </form> 
            </div>        
            <div class="col-md-2"> </div>    
        </div>
        <!-- END BLOCK : form_destinos -->   
        
</div>
<!-- INCLUDE BLOCK : footer -->