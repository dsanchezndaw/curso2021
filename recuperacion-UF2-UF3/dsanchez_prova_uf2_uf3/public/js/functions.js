/* window.onload = function() { init(); };
function init(){

    var script_tag = document.getElementById('functions')
    var user_id = script_tag.getAttribute("user-id");
    var num1 = $(".num1").val(Math.floor((Math.random() * 100) + 1));
    var num2 = $(".num2").val(Math.floor((Math.random() * 100) + 1));   

    $(".boton").click(function(e){
        e.preventDefault();
        num1 = $(".num1").val(Math.floor((Math.random() * 100) + 1));
        num2 = $(".num2").val(Math.floor((Math.random() * 100) + 1)); 
        
        console.log(num1.val());
        console.log(num2.val());

    })

    Echo.private('user.'+user_id).listen('NewMessageNotification', (e) => {
        alert(e.message.message);
    });
} */

window.onload = function() { init(); };
function init(){

    var script_tag = document.getElementById('functions')
    var user_id = script_tag.getAttribute("user-id");

    Echo.private('user.'+user_id).listen('NewMessageNotification', (e) => {
        alert(e.message.message);
    });
}