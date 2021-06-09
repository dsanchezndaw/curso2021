window.onload = function() { init(); };
function init(){

    var script_tag = document.getElementById('functions')
    var user_id = script_tag.getAttribute("user-id");
    var num1 = $(".num1").val(Math.floor(Math.random() * 100));
    
    $(".boton").click(function(event){
        event.preventDefault();
        var _token = $('meta[name=csrf-token]').attr('content');
        var to = 'public';
        var from = user_id;
        num1 = $(".num1").val();
        
        $.ajax({
            url: "https://dawjavi.insjoaquimmir.cat/dsanchez/recuperacion-UF2-UF3/dsanchez_prova_uf2_uf3/public/admin/"+ user_id+"/send",
            type:'POST',
            data: {_token:_token, message:num1, to:to, from:from},
            success: function(data) {
                console.log("Mensaje enviado");
                num1 = $(".num1").val(Math.floor(Math.random() * 100));
            }
        })
    });

    $(".enviar").click(function(event){
        event.preventDefault();
        var header = $('.notificacion');
        var numero = $("#num").text();
        var suma = $("#suma").val();
        for(var i = 0; i < header.length; i++){
            console.log(numero[i]);
                
        }
        console.log(suma);

    });

    var script_tag = document.getElementById('functions')
    var user_id = script_tag.getAttribute("user-id");
    var $noti = $(".notificacion");

    Echo.private('public').listen('NewMessageNotification', (e) => {
        $noti.prepend("<h1 id='num'>"+e.message.message+"</h1>")
        
    });
} 

