<!-- INCLUDE BLOCK : header -->
<br>
<div class="container">        

        <!-- START BLOCK : ver_piezas -->
        <div class="row">
            <a href="index.php?action=piezas&agregar=si" class="btn btn-success">Agregar</a>

            <div class="col-md-12">
                <h4 class="sub-header">Listado de Piezas</h4>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Cliente</th>
                          <th>Fecha</th>
                          <th>Total</th>                        
                           <th>Acciones</th> 
                        </tr>
                      </thead>
                      <tbody>
                        <!-- START BLOCK : fila_piezas -->  
                        <tr>
                          <td>{id_pieza}</td>
                          <td>{cliente}</td>	
                          <td>{fecha}</td>
                          <td>{total}</td>	                         
                          <td style="width:150px;">
								<a href="index.php?action=comprobantes&imprimir={id_factura}" class="btn btn-sm btn-warning" target="_blank">Imprimir</a> 
								<a href="index.php?action=piezas&eliminar={id_pieza}" id="del-{id_usuario}" class="btn btn-sm btn-danger" onClick="javascript:return confirm('Esta seguro?');">Eliminar</a>
                          </td>      
                        </tr>
                        <!-- END BLOCK : fila_íezas -->
                      </tbody>
                    </table>
                  </div>   
            </div>                              
        </div>              
        <!-- END BLOCK : ver_piezas -->   
                
        <!-- START BLOCK : form_piezas -->
        <div class="row">
                <!-- <hr width="120%">  -->
                <h4>{titulo_form}</h4>
        </div>
        <div class="row">    
            <div class="col-md-2"> </div> 
            <div class="col-md-8"> 
                 <form name="form_pieza"  id="form_pieza" role="form" method="post" action="index.php?action=piezas&{que}={id_pieza}">  
                <!-- <form name="form_factura"  id="form_factura" role="form" method="post" action="inserta2.php"> -->
                    <div class="row">
                        <div class="col-xs-4">
                            <div class="form-group">
                                <label for="tipo">Producto</label>
                                 <input id="fac_id_cliente" type="hidden" value="" />
/* Cambiar! */                        <select name="fac_cliente" id="fac_cliente" class="form-control" onchange="SetCliente();" required>
                                        <option value=""></option>
                                        <!-- START BLOCK : lista_piezas2 -->
                                                <option value="{id_pieza}"{seleccionado_cliente}>{id_pieza} - {nombre}</option>
                                        <!-- END BLOCK : lista_piezas2 -->
                                </select> 	                        
                            </div>                    
                        </div>
                    </div>    
                    <div class="row" style="background-color:#f9f9f9;">        
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <input id="fac_id_producto" type="hidden" value="0" />
                                    <input id="fac_nombre_prod" type="hidden" value="0" />
                                    <input id="fac_stock_prod" type="hidden" value="0" />
                                    
                                    <label for="fac_producto">Pieza en Producto</label> 
                                    <select name="fac_producto" id="fac_producto" class="form-control" onchange="SetProducto();" >
                                            <option value=""></option>
                                            <!-- START BLOCK : lista_piezas -->
                                                   <option value="{id_pieza}"{seleccionado_producto}>{id_pieza} - {nombre}</option>
                                            <!-- END BLOCK : lista_piezas -->
                                    </select>                        
                                </div>                    
                            </div>							
                            <div class="col-xs-4">                
                                <div class="form-group">
                                    <label for="piez_cantidad">Cantidad</label>
                                    <input type="text" class="form-control" value="{cantidad}" name="piez_cantidad" id="piez_cantidad" >
                                </div>
                            </div>
                            <div class="col-xs-3">    
                                <div class="form-group">
                                    <br />
                                    <input id="agrega" type="button" value="Cargar Producto" />
                                </div>
                            </div>                                
                    </div>             
                                
                    <div id="elementos">
                        <div id="inputs">
                            <div class="row">    
                            <div class="col-xs-5"><div class="form-group"><label for="fac_cantidad">Producto</label></div></div>
                            <div class="col-xs-4"><div class="form-group"><label for="fac_cantidad">Pieza</label></div></div>
                            <div class="col-xs-3"><div class="form-group"><label for="fac_precio">Cantidad necesaria</label></div></div>
                            <!-- <div class="col-xs-2"><div class="form-group"><label for="fac_subtotal">Sub Total</label></div></div>-->
                            </div>
                        </div>
                    </div> 
                            
                    <!--         
                    <div id="elementos">
                        <div id="inputs">
                            <div class="row">    
                            <div class="col-xs-3"><div class="form-group"><label for="fac_cantidad">Cantidad</label><input type="text" class="form-control" value="{cantidad}" name="fac_cantidad" id="fac_cantidad" required></div></div>
                            <div class="col-xs-2"><div class="form-group"><label for="fac_precio">Precio</label><input type="text" class="form-control" value="{precio}" name="fac_precio" id="fac_precio" readonly></div></div>
                            <div class="col-xs-2"><div class="form-group"><label for="fac_subtotal">Sub s Total</label><input type="text" class="form-control" value="{subtotal}" name="fac_subtotal" id="fac_subtotal" readonly></div></div>                            
                            </div>
                        </div>
                    </div>                              
                    -->
                    
                   <!-- <div class="row" >        
                            <div class="col-xs-9 text-right">    
                                <div class="form-group">
                                    <label for="fac_total">TOTAL</label>
                                </div>
                            </div>         
                            <div class="col-xs-3">    
                                <div class="form-group">                                    
                                    <input type="text" class="form-control" value="0" name="fac_total" id="fac_total" readonly>
                                </div>
                            </div>                         
                    </div>  --> 
                    
                    <button type="submit" class="btn btn-success">{titulo_boton}</button>

                </form> 
            </div>        
            <div class="col-md-2"> </div>    
        </div>
        <!-- END BLOCK : form_piezas -->                   
            
        
</div>
<!-- INCLUDE BLOCK : footer -->
