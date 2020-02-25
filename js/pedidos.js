function cargarOptionClientes(){

    $.ajax({
        type: "POST",
        url: "util/pedidos/optionClientes.php",
        //data: {},
        dataType: 'json',
        beforeSend: function(){
            $("#clientes").empty();
        },
        error: function(request, status, error){
            alert(request.responseText);
        },
        success: function(respuesta){
            switch(respuesta.estado){
                case 1:
                
                    //console.log(respuesta);
                    var opciones = respuesta.data;

                    if( opciones.length > 0 ){
                         var opcSelect = '';

                         for(var f = 0; f < opciones.length; f++ ){
                            opcSelect += '<option ';
                            opcSelect += ' value="'+opciones[f]['usuario']+'" >';
                            opcSelect += opciones[f]['nombre'];
                            opcSelect += '</option>';
                         }

                         $("#clientes").html(opcSelect);
                    }

                    break;
                case 2:
                    $('#myModalWarningBody').html(respuesta.mensaje);
                    $('#myModalWarning').modal('show');            
                    break;
                default:
                    alert("Se ha producido un error");
                    break;
            }
        }
    });

}

function mostrarDatosProductos(){

    $.ajax({
        //async: true,
        type: "POST",
        url: "util/pedidos/queryProductos.php",
        //data: {},
        dataType: 'json',
        beforeSend: function(){
            $("#cntTablaProductos").hide();
            $("#cargandoProductos").html('<img src="img/system/cargando.gif" height="70" width="70">');
        },
        error: function(request, status, error){
            alert(request.responseText);
        },
        success: function(respuesta){
            $("#cargandoProductos").html('');
            $("#cntTablaProductos").show();

            var mydata = respuesta.data;
            
            var t = $("#tablaProductos").DataTable({
                destroy: true,
                data: mydata,
                columns: [
                    {"data":'row'},
                    {"data":'btn_gestion', className: "text-center"},                    
                    {"data":'btn_img', className: "text-center"},
                    {"data":'idproducto', className: "text-center"},
                    {"data":'nombre', className: "text-left"},
                    {"data":'stock', className: "text-center"},
                    {"data":'precio', className: "text-right"},
                ],
                "columnDefs": [
                    {
                        "searchable": false,
                        "orderable": false,
                        "targets": [0] // Para que el numero no tenga orden solo es un indice
                    }
                ],
                "order": [[0, 'asc']], // asc - desc
                "language":{
                    "url":"lib/js/DataTables/DataTables-1.10.18/Spanish.json"
                },
                "pagingType": "full_numbers" // Para colocar el First & Last
            });

            t.on( 'order.dt search.dt', function () {
                t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                    cell.innerHTML = i+1;
                } );
            } ).draw();
        },
        //complete: function(){}
    });

}

function limpiarFormCarrito(){
    $("#formCarrito").trigger("reset");
    $("#detalleCarrito").html('<tr><td colspan="20" class="text-center">SIN PRODUCTOS</td></tr>');
}

function mostrarDetalleCarrito(){
    var cliente = $("#cliente").val();

    $.ajax({
        type: "POST",
        url: "util/pedidos/detalleCarrito.php",
        data: {
            cliente:cliente
        },
        dataType: 'json',
        beforeSend: function(){
            $("#detalleCarrito").html('<tr><td colspan="20" class="text-center"><img src="img/system/cargando.gif" height="70" width="70"></td></tr>');
        },
        error: function(request, status, error){
            alert(request.responseText);
        },
        success: function(respuesta){
            switch(respuesta.estado){
                case 1:                
                    //console.log(respuesta);
                    var detalle = respuesta.data;
                    var cuerpoDetalle = '';

                    $("#total").val(respuesta.total_pedido);

                    if( detalle.length > 0 ){

                        for(var f=0; f < detalle.length; f++){
                            cuerpoDetalle += '<tr>';
                            cuerpoDetalle += '<td class="text-center">'+detalle[f]['btn_gestion']+'</td>';
                            cuerpoDetalle += '<td class="text-center">'+detalle[f]['btn_img']+'</td>';
                            cuerpoDetalle += '<td class="text-center">'+detalle[f]['idproducto']+'</td>';
                            cuerpoDetalle += '<td class="text-left">'+detalle[f]['nombre']+'</td>';
                            cuerpoDetalle += '<td class="text-center">'+detalle[f]['estado']+'</td>';
                            cuerpoDetalle += '<td class="text-center">'+detalle[f]['stock']+'</td>';
                            cuerpoDetalle += '<td class="text-right">'+detalle[f]['precio']+'</td>';
                            cuerpoDetalle += '<td class="text-center">'+detalle[f]['cantidad']+'</td>';
                            cuerpoDetalle += '<td class="text-right">'+detalle[f]['subtotal']+'</td>';
                            cuerpoDetalle += '<td class="text-right">'+detalle[f]['impuesto']+'</td>';
                            cuerpoDetalle += '<td class="text-right">'+detalle[f]['valor_impuesto']+'</td>';
                            cuerpoDetalle += '<td class="text-right">'+detalle[f]['total']+'</td>';
                            cuerpoDetalle += '</tr>';
                        }

                    }else{
                        cuerpoDetalle += '<tr>';
                        cuerpoDetalle += '<td colspan="20" class="text-center">SIN PRODUCTOS</td>';
                        cuerpoDetalle += '</tr>';
                    }

                    $("#detalleCarrito").html(cuerpoDetalle);

                    break;
                case 2:
                    $('#myModalWarningBody').html(respuesta.mensaje);
                    $('#myModalWarning').modal('show');            
                    break;
                default:
                    alert("Se ha producido un error");
                    break;
            }
        }
    });
}

function mostrarDatosPedidos(){

    $.ajax({
        //async: true,
        type: "POST",
        url: "util/pedidos/queryPedidos.php",
        //data: {},
        dataType: 'json',
        beforeSend: function(){
            $("#cntTabla").hide();
            $("#cargando").html('<img src="img/system/cargando.gif" height="70" width="70">');
        },
        error: function(request, status, error){
            alert(request.responseText);
        },
        success: function(respuesta){
            $("#cargando").html('');
            $("#cntTabla").show();

            var mydata = respuesta.data;
            
            var t = $("#tablaPedidos").DataTable({
                destroy: true,
                data: mydata,
                columns: [
                    {"data":'row'},
                    {"data":'btn_visualizar', className: "text-center"},                    
                    {"data":'btn_facturar', className: "text-center"},
                    {"data":'btn_cancelar', className: "text-center"},
                    {"data":'idpedcab', className: "text-center"},
                    {"data":'cliente', className: "text-center"},
                    {"data":'nombre', className: "text-left"},
                    {"data":'direccion', className: "text-left"},
                    {"data":'estado', className: "text-center"},
                    {"data":'numero_factura', className: "text-center"},
                    {"data":'total', className: "text-right"}
                ],
                "columnDefs": [
                    {
                        "searchable": false,
                        "orderable": false,
                        "targets": [0] // Para que el numero no tenga orden solo es un indice
                    }
                ],
                "order": [[0, 'asc']], // asc - desc
                "language":{
                    "url":"lib/js/DataTables/DataTables-1.10.18/Spanish.json"
                },
                "pagingType": "full_numbers" // Para colocar el First & Last
            });

            t.on( 'order.dt search.dt', function () {
                t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                    cell.innerHTML = i+1;
                } );
            } ).draw();
        },
        //complete: function(){}
    });

}

function graficarDetallePedido(cabecera, detalle){
    $("#pedido_detalle").html('<div class="col-md-12 text-center"><img src="img/system/cargando.gif" height="70" width="70"></div>');

    var pedido_detalle = '';

    pedido_detalle += '<div class="row">';
    pedido_detalle += '<div class="col-md-6">';

    pedido_detalle += '<div class="form-group">';
    pedido_detalle += '<label>Código Cliente</label>';
    pedido_detalle += '<input type="text" class="form-control" value="'+cabecera.cliente+'" disabled>';
    pedido_detalle += '</div>';

    pedido_detalle += '<div class="form-group">';
    pedido_detalle += '<label>Estado</label>';
    pedido_detalle += '<input type="text" class="form-control" value="'+cabecera.estado+'" disabled>';
    pedido_detalle += '</div>';

    pedido_detalle += '<div class="form-group">';
    pedido_detalle += '<label>Dirección</label>';
    pedido_detalle += '<textarea class="form-control" disabled>'+cabecera.direccion+'</textarea>';
    pedido_detalle += '</div>';

    pedido_detalle += '</div>';
    pedido_detalle += '<div class="col-md-6">';

    pedido_detalle += '<div class="form-group">';
    pedido_detalle += '<label>Nombre Cliente</label>';
    pedido_detalle += '<input type="text" class="form-control" value="'+cabecera.nombre+'" disabled>';
    pedido_detalle += '</div>';

    pedido_detalle += '<div class="form-group">';
    pedido_detalle += '<label>Número Factura</label>';
    pedido_detalle += '<input type="text" class="form-control" value="'+cabecera.numero_factura+'" disabled>';
    pedido_detalle += '</div>';

    pedido_detalle += '<div class="form-group">';
    pedido_detalle += '<label>Total Pedido</label>';
    pedido_detalle += '<input type="text" class="form-control" value="'+cabecera.total+'" disabled>';
    pedido_detalle += '</div>';

    pedido_detalle += '</div>';
    pedido_detalle += '</div>';

    ////////////////////////////////////////////////////////

    pedido_detalle += '<div class="row">';
    pedido_detalle += '<div class="col-md-12">';
    pedido_detalle += '<div class="table-responsive">';

    pedido_detalle += '<table class="table table-striped table-bordered display" width="100%">';

    pedido_detalle += '<thead>';
    pedido_detalle += '<tr>';
    pedido_detalle += '<th>IMAGEN</th>';
    pedido_detalle += '<th>CODIGO</th>';
    pedido_detalle += '<th>NOMBRE</th>';
    pedido_detalle += '<th>PRECIO</th>';
    pedido_detalle += '<th>CANTIDAD</th>';
    pedido_detalle += '<th>SUBTOTAL</th>';
    pedido_detalle += '<th>IMPUESTO %</th>';
    pedido_detalle += '<th>VALOR IMPUESTO</th>';
    pedido_detalle += '<th>TOTAL</th>';
    pedido_detalle += '</tr>';
    pedido_detalle += '</thead>';
    pedido_detalle += '<tbody>';

    if( detalle.length > 0 ){
        
        for(var f = 0; f < detalle.length; f++){
            pedido_detalle += '<tr>';
            pedido_detalle += '<td class="text-center">'+detalle[f]['btn_img']+'</td>';
            pedido_detalle += '<td class="text-center">'+detalle[f]['idproducto']+'</td>';
            pedido_detalle += '<td class="text-left">'+detalle[f]['nombre']+'</td>';
            pedido_detalle += '<td class="text-right">'+detalle[f]['precio']+'</td>';
            pedido_detalle += '<td class="text-center">'+detalle[f]['cantidad']+'</td>';
            pedido_detalle += '<td class="text-right">'+detalle[f]['subtotal']+'</td>';
            pedido_detalle += '<td class="text-right">'+detalle[f]['impuesto']+'</td>';
            pedido_detalle += '<td class="text-right">'+detalle[f]['valor_impuesto']+'</td>';
            pedido_detalle += '<td class="text-right">'+detalle[f]['total']+'</td>';
            pedido_detalle += '</tr>';
        }

    }else{
        pedido_detalle += '<tr>';
        pedido_detalle += '<td colspan="20" class="text-center">SIN PRODUCTOS</td>';
        pedido_detalle += '</tr>';
    }

    pedido_detalle += '</tbody>';
    pedido_detalle += '</table>';
    pedido_detalle += '</div>';
    pedido_detalle += '</div>';
    pedido_detalle += '</div>';

    $("#pedido_detalle").html(pedido_detalle);
}

$(document).ready(function (){
    
    cargarOptionClientes();
    mostrarDatosProductos();
    mostrarDatosPedidos();

    $("#consultar").click(function (){
        mostrarDatosPedidos();
    });

    $("#consultar_productos").click(function (){
        mostrarDatosProductos();
    });

    $("#agregarProducto").click(function (){
        var cliente = $("#cliente").val();

        if( cliente != '' ){
            $('#myModalProductos').modal('show');
        }else{
            $('#myModalWarningBody').html("Seleccione un cliente para añadir productos");
            $('#myModalWarning').modal('show');   
        }
    });

    $("#limpiarFormCarrito").click(function (){
        limpiarFormCarrito();
    });

    $("#formClientes").submit(function (){

        limpiarFormCarrito();

        var cliente = $("#clientes option:selected").val();
        var nombre = $("#clientes option:selected").text();

        $("#cliente").val(cliente);
        $("#nombre").val(nombre);

        mostrarDetalleCarrito();

        return false;
    });

    $("#tablaProductos").on("click",".gestion_agregar_producto", function(event){
        $("#myModalProductos").modal("hide");

        var tableInt = $("#tablaProductos").DataTable();
        var datos = tableInt.row( $(this).closest('tr') ).data();

        setTimeout(function(){
            $('#gs_idproducto').val(datos['idproducto']);
            $('#gs_nombre').val(datos['nombre']);
            $('#gs_precio').val(datos['precio']);
            $('#gs_cantidad').attr({
                "max": datos['stock']
            });
            $('#gs_cantidad').val(1);

            var d = new Date();

            if( datos['tiene_imagen'] == 'SI' ){
                $("#gs_imagen").attr('src','img/productos/'+datos['idproducto']+'.png?v='+d.getTime());
            }else{
                $("#gs_imagen").attr('src','img/productos/error.png?v='+d.getTime());
            }

            $("#myModalGestionProducto").modal("show");
        }, 500);
    });

    $("#formGestionProducto").submit(function (){
        $("#myModalGestionProducto").modal("hide");

        var cliente = $("#cliente").val();
        var idproducto = $("#gs_idproducto").val();
        var cantidad = $("#gs_cantidad").val();

        $.ajax({
            asyn: false,
            type: "POST",
            url: "util/pedidos/agregarProducto.php",
            data: {
                cliente:cliente,
                idproducto:idproducto,
                cantidad:cantidad
            },
            dataType: 'json',
            //beforeSend: function(){},
            error: function(request, status, error){
                alert(request.responseText);
            },
            success: function(respuesta){
                switch(respuesta.estado){
                    case 1:                
                        //console.log(respuesta);
                        mostrarDetalleCarrito();
                        break;
                    case 2:
                        $('#myModalWarningBody').html(respuesta.mensaje);
                        $('#myModalWarning').modal('show');            
                        break;
                    default:
                        alert("Se ha producido un error");
                        break;
                }
            }
        });

        return false;
    });

    $("#tablaProductos, #detalleCarrito, #pedido_detalle").on("click",".gestion_mostrar_imagen", function(event){
        var idproducto = $(this).data('idproducto');
        var d = new Date();

        $("#imagen_producto").attr('src','img/productos/'+idproducto+'.png?v='+d.getTime());

        $("#myModalImagenProducto").modal("show");
    });

    $("#detalleCarrito").on("click",".eliminar_producto", function(event){
        var cliente = $("#cliente").val();
        var idproducto = $(this).data('idproducto');
        
        $.ajax({
            asyn: false,
            type: "POST",
            url: "util/pedidos/eliminarCarritoProducto.php",
            data: {
                cliente:cliente,
                idproducto:idproducto
            },
            dataType: 'json',
            //beforeSend: function(){},
            error: function(request, status, error){
                alert(request.responseText);
            },
            success: function(respuesta){
                switch(respuesta.estado){
                    case 1:                
                        //console.log(respuesta);
                        mostrarDetalleCarrito();
                        break;
                    case 2:
                        $('#myModalWarningBody').html(respuesta.mensaje);
                        $('#myModalWarning').modal('show');            
                        break;
                    default:
                        alert("Se ha producido un error");
                        break;
                }
            }
        });
    });

    $("#formCarrito").submit(function (){

        var cliente = $("#cliente").val();
        var direccion = $("#direccion").val();

        $.ajax({
            asyn: false,
            type: "POST",
            url: "util/pedidos/crearPedido.php",
            data: {
                cliente:cliente,
                direccion:direccion
            },
            dataType: 'json',
            //beforeSend: function(){},
            error: function(request, status, error){
                alert(request.responseText);
            },
            success: function(respuesta){
                switch(respuesta.estado){
                    case 1:                
                        limpiarFormCarrito();
                        mostrarDatosProductos();
                        mostrarDatosPedidos();

                        $('#myModalSuccessBody').html(respuesta.mensaje);
                        $('#myModalSuccess').modal('show');

                        $('.nav-tabs a[href="#home"]').tab('show');
                        break;
                    case 2:
                        $('#myModalWarningBody').html(respuesta.mensaje);
                        $('#myModalWarning').modal('show');            
                        break;
                    default:
                        alert("Se ha producido un error");
                        break;
                }
            }
        });

        return false;
    });

    $("#tablaPedidos").on("click",".cancelar_pedido", function(event){
        var tableInt = $("#tablaPedidos").DataTable();
        var datos = tableInt.row( $(this).closest('tr') ).data();

        $("#idpedcab_cancelar").val(datos['idpedcab']);

        $("#myModalCancelarPedido").modal("show");
    });

    $("#formCancelarPedido").submit(function (){
        $("#myModalCancelarPedido").modal("hide");

        var idpedcab = $("#idpedcab_cancelar").val();

        $.ajax({
            asyn: false,
            type: "POST",
            url: "util/pedidos/cancelarPedido.php",
            data: {
                idpedcab:idpedcab
            },
            dataType: 'json',
            //beforeSend: function(){},
            error: function(request, status, error){
                alert(request.responseText);
            },
            success: function(respuesta){
                switch(respuesta.estado){
                    case 1:
                        $('#myModalSuccessBody').html(respuesta.mensaje);
                        $('#myModalSuccess').modal('show');
                        break;
                    case 2:
                        $('#myModalWarningBody').html(respuesta.mensaje);
                        $('#myModalWarning').modal('show');            
                        break;
                    default:
                        alert("Se ha producido un error");
                        break;
                }
            },
            complete: function(){
                mostrarDatosPedidos();
            }
        });

        return false;
    });

    $("#tablaPedidos").on("click",".visualizar_pedido", function(event){
        var tableInt = $("#tablaPedidos").DataTable();
        var datos = tableInt.row( $(this).closest('tr') ).data();

        var idpedcab = datos['idpedcab'];

        //alert(idpedcab);
        $.ajax({
            //asyn: false,
            type: "POST",
            url: "util/pedidos/detallePedido.php",
            data: {
                idpedcab:idpedcab
            },
            dataType: 'json',
            //beforeSend: function(){},
            error: function(request, status, error){
                alert(request.responseText);
            },
            success: function(respuesta){
                switch(respuesta.estado){
                    case 1:                
                        //console.log(respuesta);
                        $('.nav-tabs a[href="#menu2"]').tab('show');
                        graficarDetallePedido(respuesta.cabecera, respuesta.detalle);
                        break;
                    case 2:
                        $('#myModalWarningBody').html(respuesta.mensaje);
                        $('#myModalWarning').modal('show');            
                        break;
                    default:
                        alert("Se ha producido un error");
                        break;
                }
            }
        });
    });

    $("#tablaPedidos").on("click",".facturar_pedido", function(event){
        var tableInt = $("#tablaPedidos").DataTable();
        var datos = tableInt.row( $(this).closest('tr') ).data();

        $("#idpedcab_facturar").val(datos['idpedcab']);

        $("#myModalFacturarPedido").modal("show");
    });

    $("#formFacturarPedido").submit(function (){
        $("#myModalFacturarPedido").modal("hide");

        var idpedcab = $("#idpedcab_facturar").val();
        
        $.ajax({
            asyn: false,
            type: "POST",
            url: "util/pedidos/facturarPedido.php",
            data: {
                idpedcab:idpedcab
            },
            dataType: 'json',
            //beforeSend: function(){},
            error: function(request, status, error){
                alert(request.responseText);
            },
            success: function(respuesta){
                switch(respuesta.estado){
                    case 1:
                        $('#myModalSuccessBody').html(respuesta.mensaje);
                        $('#myModalSuccess').modal('show');
                        break;
                    case 2:
                        $('#myModalWarningBody').html(respuesta.mensaje);
                        $('#myModalWarning').modal('show');            
                        break;
                    default:
                        alert("Se ha producido un error");
                        break;
                }
            },
            complete: function(){
                mostrarDatosPedidos();
            }
        });

        return false;
    });

});