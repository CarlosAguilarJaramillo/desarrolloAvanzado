<h1><?php echo $varAcceso['nombre']; ?></h1>
<div class="row">
    <div class="col-md-12">
        <div class="page-header">
            <div class="page-header well well-sm">
            (!) Primero seleccione el usuario y luego guarde el permiso a los accesos 
            </div>
            <form role="form" class="form-horizontal" id="formUsuarios">
                <div class="form-group">
                    <label for="usuarios" class="col-md-3 control-label">Usuarios (!)</label>
                    <div class="col-md-9">
                        <select id="usuarios" class="form-control" required></select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-offset-3 col-md-9">
                        <button type="submit" class="btn btn-block btn-success">Consultar</button>
                    </div>
                </div>
            </form>
            <hr>
            <form role="form" class="form-horizontal" id="formGuardarPermisos">
                <div class="form-group">
                    <label for="usuario" class="col-md-3 control-label">Usuario</label>
                    <div class="col-md-9">
                        <input type="text" id="usuario" class="form-control" disabled/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="nombre" class="col-md-3 control-label">Nombre</label>
                    <div class="col-md-9">
                        <input type="text" id="nombre" class="form-control" disabled/>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-offset-3 col-md-9">
                        <button type="reset" id="limpiarFormGuardarPermisos" class="btn btn-block btn-default">Limpiar</button>
                        <button type="submit" id="submitFormGuardarPermisos" class="btn btn-block btn-danger">Guardar</button>
                    </div>
                </div>
            </form>
        </div>
        <div id="sys_menu" class="col-md-offset-3 col-md-9"></div>
    </div>
</div>