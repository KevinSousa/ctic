$(document).ready(function(){

    function sublist(){

        var url = window.location.href;
        url = url.split("/");
        preUrl = url[2];


        var idProblem = $("#typeProblem").val();
        if (idProblem != ""){
            console.log(idProblem);
            $.ajax({
                url: "http://"+preUrl+"/subLista/list/"+idProblem,
                success: function(data) {
                    var sublistas = [];
                    try {
                        sublistas = JSON.parse(data);
                    } catch (err) {
                        sublistas = data;
                    }
                    console.log(sublistas);
                    $('#sublist').html('<option></option>');

                    for (i = 0; i < sublistas.length; i++) {
                        var option = `
                            <option value='${sublistas[i].sub_id}'>${sublistas[i].sub_nome}</option>
                        `;
                        $('#sublist').append(option);
                    }
                }
            });    
        } else{
            $('#sublist').html('<option></option>');
        }
    }

    $("#typeProblem").on("change", sublist);    
})