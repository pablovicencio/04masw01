//Agrergar Actor
$(document).on("click", "#BotonAgregarActor", function () {

        var idActor = $("#Actor").val();
        var nomActor = $("#Actor option:selected" ).text();

          var nuevafila= "<tr><td>" +
          idActor + "</td><td>" +
          nomActor + "</td></tr>"

          $("#tabla_actores").append(nuevafila);  
});

$(document).on("click", "#BotonCrear", function () {
        
            var TableData = new Array();
    
            $('#tabla_actores tr').each(function(row, tr){
                TableData[row]={
                  "actor" : $(tr).find('td:eq(0)').text()
                }

            }); 
            TableData.shift();  // first row will be empty - so remove
            TableData = $.toJSON(TableData);
            //console.log(TableData);
            var titulo = $("#Titulo").val();
            var plataforma = $("#Plataforma").val();
            var director = $("#Director").val();
            //console.log(fec_rut);
            $('#tbConvertToJSON').val('JSON array: \n\n' + TableData.replace(/},/g, "},\n"));
            $.ajax({
                type: "POST",
                url: "../../controllers/serieControllerNew.php",
                data:   { "data" : TableData, "titulo":titulo,"plataforma":plataforma,"director":director},
                cache: false,
                success: function(respuesta){
            alert(respuesta);
            window.location='lista.php';
        }

            });
            
        });
