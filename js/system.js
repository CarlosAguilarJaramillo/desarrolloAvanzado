function logoutSession(){
    document.location = 'util/system/logout.php';
}

$(document).ready(function (){
    var param_timeout = $("#param_timeout").val();

    setInterval(logoutSession, ( parseInt(param_timeout) * 60000 ));

    if( typeof Highcharts !== 'undefined' ){
        Highcharts.setOptions({
            lang: {
                printChart: "Imprimir",
                downloadCSV: "Descargar CSV"
            }
        });
    }

});