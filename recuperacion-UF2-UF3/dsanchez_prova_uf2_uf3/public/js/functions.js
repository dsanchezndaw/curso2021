window.onload = function() { init(); };
function init(){

    var script_tag = document.getElementById('functions')
    var user_id = script_tag.getAttribute("user-id");
    var num1 = $(".num1").val(Math.floor(Math.random() * 100));
    var user_name = script_tag.getAttribute("user-name");
    
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
        
        var numero1 = $("#num1").text();
        var numero2 = $("#num2").text();
        var suma = $("#suma").val();
        var sumacion = parseInt(numero1) + parseInt(numero2);
        var _token = $('meta[name=csrf-token]').attr('content');
        var to = 'private';
        var from = user_id;
        //Cookies.set('user', user_name)
        var username = $("#username").val();
        $.ajax({
            url: "https://dawjavi.insjoaquimmir.cat/dsanchez/recuperacion-UF2-UF3/dsanchez_prova_uf2_uf3/public/admin/"+ user_id+"/send",
            type:'POST',
            data: {_token:_token, message:sumacion, to:to, from:from/* , username:username, num1:numero1, num2:numero2 */},
            success: function(data) {
                $("#num1").remove();
                $("#num2").remove();
                $("#suma").val("");
                num = 1;
                if (sumacion == suma) {
                    alert("El usuario "+username+" sabe sumar");

                }else{
                    alert("El usuario "+username+" no sabe sumar");
                }

                
            }
        })

    });
    Echo.private('private').listen('NewMessageNotification', (e) => {
        /* var numero1 = $("#num1").text();
        var numero2 = $("#num2").text();
        var suma = $("#suma").val();
        var sumacion = parseInt(numero1) + parseInt(numero2);
        console.log(sumacion); 
        if (sumacion == suma) {
            alert("El usuario "+user_name+" sabe sumar");

        }else{
            alert("El usuario "+user_name+" no sabe sumar");
        }*/

        //var user = Cookies.get('user')
        alert("El usuario "+e.message.from+" sabe sumar");
        /*console.log(e.message.message)
        console.log(e.message.num1)*/
       
        
    });


    var $noti = $(".notificacion");
    var num = 1;
    Echo.private('public').listen('NewMessageNotification', (e) => {
        $noti.append("<h1 id='num"+num+"'>"+e.message.message+"</h1>")
        num += 1;
    });


} 