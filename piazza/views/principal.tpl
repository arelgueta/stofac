<!-- INCLUDE BLOCK : header -->
<br>
<div class="container">
    <div class="row"><br></div>
    <br>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-4">     

                <!-- START BLOCK : form_login -->
                <h4 class="sub-header">Inicio de sesion</h4>
                
                    <form role="form" method="post"  action="index.php?action=login" method="POST">
                            <div class="form-group">
                                <label for="usuario">Usuario</label>
                                <input type="text" class="form-control" value="" name="usuario" id="usuario" required>
                            </div>
                            <div class="form-group">
                                <label for="clave">Clave</label>
                                <input type="password" class="form-control" value="" name="clave" id="clave" required>
                            </div>

                            <button type="submit" class="btn btn-default">Aceptar</button>

                    </form>           
                <!-- END BLOCK : form_login -->
                
                <!-- START BLOCK : bienvenido -->
                    <h2 class="sub-header"><i>PIAZZA</i></h2><br>
                    <h3 class="subheader"><i>Bombas Industriales</i><h3>
		    <h4 class="sub-header">Bienvenido</h4>
                <!--    <p> Bienvenido! Has iniciado sesion: {usuario_logeado}</p> -->
                    <p> <a href="index.php" class="btn btn-success">{ingreso}</a></p>
                <!-- END BLOCK : bienvenido -->           
                
                <!-- START BLOCK : mensaje -->
                    <h4 class="sub-header">Error</h4>
                    <p> Se presento el siguiente error: {err_msg}</p>
                    <p> <a href="index.php?action=" class="btn btn-success">Login</a></p>
                <!-- END BLOCK : mensaje -->                 
                
            </div>
            <div class="col-md-5"></div>
        </div>
</div>
<!-- INCLUDE BLOCK : footer -->
