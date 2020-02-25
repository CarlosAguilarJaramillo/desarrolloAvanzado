function mostrarDatos(){

    $.ajax({
        //async: true,
        type: "POST",
        url: "util/productos/query.php",
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
            
            var t = $("#tablaProductos").DataTable({
                destroy: true,
                data: mydata,
                columns: [
                    {"data":'row'},
                    {"data":'btn_gestion', className: "text-center"},
                    {"data":'idproducto', className: "text-center"},
                    {"data":'tiene_imagen', className: "text-center"},
                    {"data":'nombre', className: "text-left"},
                    {"data":'descripcion', className: "text-left"},
                    {"data":'estado', className: "text-center"},
                    {"data":'impuesto', className: "text-center"},
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

function limpiarFormProducto(){
    $('#formProducto').trigger("reset");
    $("#idproducto").val('0');
    $("#imagen_subir").val('');

    var d = new Date();
    $("#imagen_producto").attr('src','img/productos/error.png?v='+d.getTime());
}

$(document).ready(function (){

    mostrarDatos();

    $("#consultar").click(function (){
        mostrarDatos();
    });   
    
    $("#limpiarFormProducto").click(function (){
        limpiarFormProducto();
    });

    $("#tablaProductos").on("click",".gestion_update", function(event){
        var tableInt = $("#tablaProductos").DataTable();
        var datos = tableInt.row( $(this).closest('tr') ).data();
        //console.log(datos);
        $("#idproducto").val(datos['idproducto']);
        $("#nombre").val(datos['nombre']);
        $("#stock").val(datos['stock']);
        $("#precio").val(datos['precio']);
        $('#impuesto option[value="'+datos['impuesto']+'"]').prop("selected", true);
        $('input:radio[name=estado][value="'+datos['estado']+'"]').prop("checked", true);
        $("#descripcion").val(datos['descripcion']);
        $("#imagen_subir").val('');
        
        $("#imagen_subir").removeAttr('src');

        var d = new Date();

        if( datos['tiene_imagen'] == 'SI' ){
            $("#imagen_producto").attr('src','img/productos/'+datos['idproducto']+'.png?v='+d.getTime());
        }else{
            $("#imagen_producto").attr('src','img/productos/error.png?v='+d.getTime());
        }
        
        $('.nav-tabs a[href="#menu1"]').tab('show');
    });

    $("#formProducto").submit(function (){
        var idproducto = $("#idproducto").val();
        var nombre = $("#nombre").val();
        var stock = $("#stock").val();
        var precio = $("#precio").val();
        var estado = $("input:radio[name=estado]:checked").val();
        var impuesto = $("#impuesto option:selected").val();
        var descripcion = $("#descripcion").val();
        var imagen_subir = $("#imagen_subir").val();

        var img_flag = false;
        var img_msn = '';

        if( imagen_subir != '' ){
            imagen_subir = $("#imagen_subir")[0].files[0];
            var imagen_subirVal = $("#imagen_subir").val().toLowerCase();
            var imagen_subirSize = imagen_subir.size;

            if(
                imagen_subirVal.lastIndexOf('png') == -1 ||
                imagen_subirSize > ( 50 * 1024 )
            ){
                img_msn = 'Solo puede cargar imagen a los productos de formato (PNG) y de tamaño (50 KB) como máximo';
                $("#imagen_subir").val('');
            }else{
                img_flag = true;
            }

        }else{
            img_flag = true;
        }

        if( img_flag ){

            var formData = new FormData();

            formData.append('idproducto',idproducto);
            formData.append('nombre',nombre);
            formData.append('stock',stock);
            formData.append('precio',precio);
            formData.append('estado',estado);
            formData.append('impuesto',impuesto);
            formData.append('descripcion',descripcion);

            if( imagen_subir != '' ){
                formData.append('imagen_subir',imagen_subir);
            }

            $.ajax({
                async: false,
                type: "POST",
                url: "util/productos/gestion.php",
                data: formData,
                dataType: 'json',
                cache: false,
                processData:false,
                contentType: false,
                //beforeSend: function(){},
                error: function(request, status, error){
                    alert(request.responseText);
                },
                success: function(respuesta){
                    switch(respuesta.estado){
                        case 1:
                            $('#myModalSuccessBody').html(respuesta.mensaje);
                            $('#myModalSuccess').modal('show');
    
                            $('.nav-tabs a[href="#home"]').tab('show');
                            mostrarDatos();
                            limpiarFormProducto();
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
                //complete: function(){}
            });

        }else{
            $('#myModalWarningBody').html(img_msn);
            $('#myModalWarning').modal('show');   
        }

        return false;
    });

});