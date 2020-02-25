<!-- Modal Productos -->
<div class="modal fade" id="myModalProductos" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content panel-primary">
            <div class="modal-header panel-heading">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Productos</h4>
            </div>
            <div class="modal-body text-center" id="myModalProductosBody">
                <div class="row">
                    <div class="col-md-3 form-group">
                        <button type="button" class="btn btn-block btn-success" id="consultar_productos">Buscar</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div id="cargandoProductos" class="text-center"></div>
                    </div>
                    <div id="cntTablaProductos" class="col-md-12">
                        <div class="table-responsive">
                            <table id="tablaProductos" class="table cell-border stripe display" width="100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>GESTION</th>
                                        <th>IMAGEN</th>
                                        <th>CODIGO</th>
                                        <th>NOMBRE</th>
                                        <th>STOCK</th>
                                        <th>PRECIO</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal Gestion Producto -->
<div class="modal fade" id="myModalGestionProducto" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <form role="form" id="formGestionProducto">
            <div class="modal-content panel-success">
                <div class="modal-header panel-heading">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Productos</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group text-center">
                        <img src="img/productos/error.png" id="gs_imagen" class="img-thumbnail" width="320" height="320" alt="Imagen producto">
                    </div>
                    <div class="form-group">
                        <label for="gs_idproducto">ID Producto</label>
                        <input type="text" id="gs_idproducto" value="0" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="gs_nombre">Nombre</label>
                        <input type="text" id="gs_nombre" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="gs_precio">Precio</label>
                        <input type="text" id="gs_precio" value="0" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="gs_cantidad">Cantidad</label>
                        <input type="number" id="gs_cantidad" class="form-control" min="1" max="10" step="1" value="1" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-success pull-right">Agregar</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Modal Imagen Producto -->
<div class="modal fade" id="myModalImagenProducto" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content panel-info">
            <div class="modal-header panel-heading">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Imagen Productos</h4>
            </div>
            <div class="modal-body">
                <div class="form-group text-center">
                    <img src="img/productos/error.png" id="imagen_producto" class="img-thumbnail" width="320" height="320" alt="Imagen producto">
                </div>                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal Cancelar Pedido -->
<div class="modal fade" id="myModalCancelarPedido" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <form role="form" id="formCancelarPedido">
            <div class="modal-content panel-danger">
                <div class="modal-header panel-heading">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Cancelar Pedido</h4>
                </div>
                <div class="modal-body text-center">
                    <strong>¿Estás segudo de cancelar el pedido?</strong>
                    <input type="hidden" id="idpedcab_cancelar" value="0">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger pull-left">Cancelar</button>
                    <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Modal Facturar Pedido -->
<div class="modal fade" id="myModalFacturarPedido" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <form role="form" id="formFacturarPedido">
            <div class="modal-content panel-warning">
                <div class="modal-header panel-heading">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Facturar Pedido</h4>
                </div>
                <div class="modal-body text-center">
                    <strong>¿Estás segudo de facturar el pedido?</strong>
                    <input type="hidden" id="idpedcab_facturar" value="0">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-warning pull-left">Facturar</button>
                    <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </form>
    </div>
</div>
<h1><?php echo $varAcceso['nombre']; ?></h1>
<ul class="nav nav-tabs nav-justified">
    <li class="active"><a data-toggle="tab" href="#home">Visualizar</a></li>
    <li><a data-toggle="tab" href="#menu1">Gestión</a></li>
    <li><a data-toggle="tab" href="#menu2">Detalle</a></li>
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
                        <table id="tablaPedidos" class="table cell-border stripe display" width="100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>VISUALIZAR</th>
                                    <th>FACTURAR</th>
                                    <th>CANCELAR</th>
                                    <th>ID PEDIDO</th>
                                    <th>CLIENTE</th>
                                    <th>NOMBRE CLIENTE</th>
                                    <th>DIRECCIÓN</th>
                                    <th>ESTADO</th>
                                    <th>NUMERO FACTURA</th>
                                    <th>TOTAL</th>
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
            <div class="row page-header">
                <form role="form" id="formClientes">
                    <div class="col-md-6 form-group">
                        <select id="clientes" class="form-control" required></select>
                    </div>
                    <div class="col-md-6 form-group">
                        <button type="submit" class="btn btn-block btn-primary">Consultar</button>
                    </div>
                </form>
            </div>
            <form role="form" id="formCarrito">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="cliente">Código Cliente</label>
                            <input type="text" id="cliente" class="form-control" value="" disabled>
                        </div>
                        <div class="form-group">
                            <label for="direccion">Dirección</label>
                            <textarea maxlength="200" id="direccion" class="form-control" required></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nombre">Nombre Cliente</label>
                            <input type="text" id="nombre" class="form-control" value="" disabled>
                        </div>
                        <div class="form-group">
                        <label for="total">Total Pedido</label>
                            <input type="text" id="total" class="form-control" value="0" disabled>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 form-group">
                        <button type="submit" class="btn btn-block btn-danger">Crear Pedido</button>
                    </div>
                    <div class="col-md-4 form-group">
                        <button type="reset" id="limpiarFormCarrito" class="btn btn-block btn-info">Nuevo</button>
                    </div>
                    <div class="col-md-4 form-group">
                        <button type="button" id="agregarProducto" class="btn btn-block btn-success">Agregar Producto</button>
                    </div>
                </div>
            </form>
            <div class="row">
                <div id="cntTablaCarrito" class="col-md-12">
                    <div class="table-responsive">
                        <table id="tablaCarrito" class="table table-bordered stripe display" width="100%">
                            <thead>
                                <tr>
                                    <th>GESTION</th>
                                    <th>IMAGEN</th>
                                    <th>CODIGO</th>
                                    <th>NOMBRE</th>
                                    <th>ESTADO</th>
                                    <th>STOCK</th>
                                    <th>PRECIO</th>
                                    <th>CANTIDAD</th>
                                    <th>SUBTOTAL</th>
                                    <th>IMPUESTO %</th>
                                    <th>VALOR IMPUESTO</th>
                                    <th>TOTAL</th>
                                </tr>
                            </thead>
                            <tbody id="detalleCarrito">
                                <tr>
                                    <td colspan="20" class="text-center">SIN PRODUCTOS</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="menu2" class="row tab-pane fade">
        <br>
        <div id="pedido_detalle" class="col-md-12">
            <div class="panel panel-warning">
                <div class="panel-body text-center bg-warning">
                    <strong>Seleccione un pedido para visualizar el detalle</strong>
                </div>
            </div>
        </div>
    </div>
</div>