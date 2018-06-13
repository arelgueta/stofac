<!-- INCLUDE BLOCK : header -->
<br>
<div class="container">        

        <!-- START BLOCK : ver_recibos -->
        <div class="row">
            <a href="index.php?action=recibos&agregar=si" class="btn btn-success">Agregar</a>

            <div class="col-md-12">
                <h4 class="sub-header">Listado de Recibos</h4>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Proveedor</th>
                          <th>Fecha</th>
                          <th>Total</th>                        
                           <th>Acciones</th> 
                        </tr>
                      </thead>
                      <tbody>
                        <!-- START BLOCK : fila_recibos -->  
                        <tr>
                          <td>{id_recibo}</td>
                          <td>{proveedor}</td>	
                          <td>{fecha}</td>
                          <td>{total}</td>	                         
                          <td style="width:150px;">
                              <a href="index.php?action=comprobantes1&imprimir={id_recibo}" class="btn btn-sm btn-warning" target="_blank">Imprimir</a>
                               <!-- 
                                <a href="index.php?action=recibos&buscar={id_recibo}" class="btn btn-sm btn-warning">Editar</a>
                                <a href="index.php?action=recibos&eliminar={id_recibo}" id="del-{id_usuario}" class="btn btn-sm btn-danger" onClick="javascript:return confirm('Esta seguro?');">Eliminar</a>
                              -->
                          </td>      
                        </tr>
                        <!-- END BLOCK : fila_recibos -->
                      </tbody>
                    </table>
                  </div>   
            </div>                              
        </div>              
        <!-- END BLOCK : ver_recibos -->   
                
        <!-- START BLOCK : form_recibos -->
        <div class="row">
                <!-- <hr width="120%">  -->
                <h4>{titulo_form}</h4>
        </div>
        <div class="row">    
            <div class="col-md-2"> </div> 
            <div class="col-md-8"> 
                 <form name="form_recibo"  id="form_recibo" role="form" method="post" action="index.php?action=recibos&{que}={id_recibo}">  
                <!-- <form name="form_recibo"  id="form_recibo" role="form" method="post" action="inserta2.php"> -->
                    <div class="row">
                        <div class="col-xs-4">
                            <div class="form-group">
                                <label for="tipo">Proveedor</label>
                                 <input id="rec_id_proveedor" type="hidden" value="" />
                                <select name="rec_proveedor" id="rec_proveedor" class="form-control" onchange="SetProveedor();" required>
                                        <option value=""></option>
                                        <!-- START BLOCK : lista_proveedores -->
                                                <option value="{id_proveedor}*{apellido}*{nombre}*{direccion}*{cuit}"{seleccionado_proveedor}>{id_proveedor}-{apellido}, {nombre}</option>
                                        <!-- END BLOCK : lista_proveedores -->
                                </select> 	                        
                            </div>                    
                        </div>
                        <div class="col-xs-3">                
                            <div class="form-group">
                                <label for="rec_cuit">Cuit</label>
                                <input type="text" class="form-control" value="{cuit}" name="rec_cuit" id="rec_cuit" readonly>
                            </div>
                        </div>
                        <div class="col-xs-5">    
                            <div class="form-group">
                                <label for="rec_direccion">Domicilio</label>
                                <input type="text" class="form-control" value="{direccion}" name="rec_direccion" id="rec_direccion" readonly>
                            </div>
                        </div>
                    </div>    
                    <div class="row" style="background-color:#f9f9f9;">        
                            <div class="col-xs-5">
                                <div class="form-group">
                                    <input id="rec_id_producto" type="hidden" value="0" />
                                    <input id="rec_nombre_prod" type="hidden" value="0" />
                                    <input id="rec_stock_prod" type="hidden" value="0" />
                                    
                                    <label for="rec_producto">Producto</label> 
                                    <select name="rec_producto" id="rec_producto" class="form-control" onchange="SetProducto_rec();" >
                                            <option value=""></option>
                                            <!-- START BLOCK : lista_productos -->
                                                    <option value="{id_producto}$*${nombre}$*${precio}$*${stock}"{seleccionado_producto}>{id_producto}-{nombre}</option>
                                            <!-- END BLOCK : lista_productos -->
                                    </select>                        
                                </div>                    
                            </div>
                            <div class="col-xs-2">                
                                <div class="form-group">
                                    <label for="rec_cantidad">Cantidad</label>
                                    <input type="text" class="form-control" value="{cantidad}" name="rec_cantidad" id="rec_cantidad" >
                                </div>
                            </div>
                            <div class="col-xs-2">    
                                <div class="form-group">
                                    <label for="rec_precio">Precio</label>
                                    <input type="text" class="form-control" value="{precio}" name="rec_precio" id="rec_precio" readonly>
                                </div>
                            </div>
                            <div class="col-xs-3">    
                                <div class="form-group">
                                    <br />
                                    <input id="agrega_rec" type="button" value="Cargar Producto" />
                                </div>
                            </div>                                
                    </div>             
                                
                    <div id="elementos_rec">
                        <div id="inputs_rec">
                            <div class="row">    
                            <div class="col-xs-5"><div class="form-group"><label for="rec_cantidad">Producto</label></div></div>
                            <div class="col-xs-2"><div class="form-group"><label for="rec_cantidad">Cantidad</label></div></div>
                            <div class="col-xs-2"><div class="form-group"><label for="rec_precio">Precio</label></div></div>
                            <div class="col-xs-2"><div class="form-group"><label for="rec_subtotal">Sub Total</label></div></div>                            
                            </div>
                        </div>
                    </div> 
                            
                    <!--         
                    <div id="elementos_rec">
                        <div id="inputs_rec">
                            <div class="row">    
                            <div class="col-xs-3"><div class="form-group"><label for="rec_cantidad">Cantidad</label><input type="text" class="form-control" value="{cantidad}" name="rec_cantidad" id="rec_cantidad" required></div></div>
                            <div class="col-xs-2"><div class="form-group"><label for="rec_precio">Precio</label><input type="text" class="form-control" value="{precio}" name="rec_precio" id="rec_precio" readonly></div></div>
                            <div class="col-xs-2"><div class="form-group"><label for="rec_subtotal">Sub Total</label><input type="text" class="form-control" value="{subtotal}" name="rec_subtotal" id="rec_subtotal" readonly></div></div>                            
                            </div>
                        </div>
                    </div>                              
                    -->
                    
                    <div class="row" >        
                            <div class="col-xs-9 text-right">    
                                <div class="form-group">
                                    <label for="rec_total">TOTAL</label>
                                </div>
                            </div>         
                            <div class="col-xs-3">    
                                <div class="form-group">                                    
                                    <input type="text" class="form-control" value="0" name="rec_total" id="rec_total" readonly>
                                </div>
                            </div>                         
                    </div>   
                    
                    <button type="submit" class="btn btn-success">{titulo_boton}</button>

                </form> 
            </div>        
            <div class="col-md-2"> </div>    
        </div>
        <!-- END BLOCK : form_recibos -->                   
            
        
</div>
<!-- INCLUDE BLOCK : footer -->