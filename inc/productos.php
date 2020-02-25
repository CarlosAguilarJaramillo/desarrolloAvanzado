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
                        <table id="tablaProductos" class="table cell-border stripe display" width="100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>GESTION</th>
                                    <th>CODIGO</th>
                                    <th>TIENE IMAGEN</th>
                                    <th>NOMBRE</th>
                                    <th>DESCRIPCION</th>
                                    <th>ESTADO</th>
                                    <th>IMPUESTO</th>
                                    <th>STOCK</th>
                                    <th>PRECIO</th>
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
            <div class="well well-md">
                <span>(*) Campos obligatorios</span>
                <br><br>
                <strong>Requisitos para la imagen de los productos:</strong>
                <ul>
                    <li>Formato (PNG)</li>
                    <li>Peso (50 KB) como máximo</li>
                </ul>
            </div>
            <form role="form" id="formProducto">
                <div class="row">
                    <div class="col-md-6 text-center">
                        <div class="form-group">
                            <img src="img/productos/error.png" id="imagen_producto" class="img-thumbnail" alt="Imagen producto" height="320" width="320">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="idproducto">IdProducto</label>
                            <input autocomplete="off" type="number" id="idproducto" class="form-control" value="0" disabled>
                        </div>
                        <div class="form-group">
                            <label for="nombre">Nombre (*)</label>
                            <input autocomplete="off" maxlength="90" type="text" id="nombre" class="form-control" placeholder="Ingrese un nombre" required>
                        </div>
                        <div class="form-group">
                            <label>Estado (*)</label>
                            <div>
                                <label class="radio-inline">
                                    <input type="radio" name="estado" value="ACTIVO" checked>ACTIVO
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="estado" value="INACTIVO">INACTIVO
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="impuesto">Impuesto (*)</label>
                            <select class="form-control" id="impuesto" required>
                                <option value="SI" selected>SI</option>
                                <option value="NO">NO</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="imagen_subir">Imagen</label>
                            <input type="file" id="imagen_subir" accept="image/png">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="precio">Precio (*)</label>
                            <input autocomplete="off" type="number" id="precio" class="form-control" step="0.01" min="0.01" max="999999999999" value="0.01" required>
                        </div>
                        <div class="form-group">
                            <label for="stock">Stock (*)</label>
                            <input autocomplete="off" type="number" id="stock" class="form-control" step="1" min="0" max="999999999999" value="0" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="descripcion">Descripción (*)</label>
                            <textarea maxlength="90" id="descripcion" class="form-control" placeholder="Ingrese una descripción" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 form-group">
                        <button type="reset" id="limpiarFormProducto" class="btn btn-block btn-info">Nuevo</button>
                    </div>
                    <div class="col-md-6 form-group">
                        <button type="submit" id="submitFormProducto" class="btn btn-block btn-success">Guardar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>