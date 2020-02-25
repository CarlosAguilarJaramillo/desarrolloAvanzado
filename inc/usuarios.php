<h1><?php echo $varAcceso['nombre']; ?></h1>
<ul class="nav nav-tabs nav-justified">
    <li class="active"><a data-toggle="tab" href="#home">Visualizar</a></li>
    <li><a data-toggle="tab" href="#menu1">Gestión</a></li>
</ul>
<div class="tab-content">
    <div id="home" class="row tab-pane fade in active">
        <div class="col-md-12">
            <div class="row page-header">
                <div class="col-md-12 form-group">
                    <button type="button" class="btn btn-block btn-primary" id="consultar">Consultar</button>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div id="cargando" class="text-center"></div>
                </div>
                <div id="cntTabla" class="col-md-12">
                    <div class="table-responsive">
                        <table id="tablaUsuarios" class="table cell-border stripe display" width="100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>GESTION</th>
                                    <th>USUARIO</th>
                                    <th>NOMBRE</th>
                                    <th>TIPO USUARIO</th>
                                    <th>EMAIL</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="menu1" class="row tab-pane fade">
        <br>
        <div class="col-md-12">
            <div class="alert alert-warning alert-dismissable">
                <ul>
                    <li>(*) Campos obligatorios</li>
                    <li>Al crear un usuario, se establecera (<?php echo $parametro['claveusuario'];?>)</li>
                </ul>
            </div>
            <form role="form" id="formUsuario">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="usuario">Usuario (*)</label>
                            <input type="text" id="usuario" maxlength="40" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="nombre">Nombre (*)</label>
                            <input type="text" id="nombre" maxlength="150" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tipo_usuario">Tipo usuario</label>
                            <select id="tipo_usuario" class="form-control">
                                <option value="ADMINISTRADOR" selected="selected">ADMINISTRADOR</option>
                                <option value="VENDEDOR">VENDEDOR</option>
                                <option value="CLIENTE">CLIENTE</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="email">Email (*)</label>
                            <input type="email" id="email" maxlength="100" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 form-group">
                        <button type="reset" id="limpiarFormUsuario" class="btn btn-block btn-info">Nuevo</button>
                    </div>
                    <div class="col-md-6 form-group">
                        <button type="submit" id="submitFormUsuario" class="btn btn-block btn-success">Guardar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>