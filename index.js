$(document).ready(function(){
$("#submit_button").on("click", function(){
    var spinner = '<div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div>';
    $("#test").html(spinner).fadeOut(1000);
    $("form").hide();
    var password = $("#password").val();  
    var username = $("#username").val();
    $.ajax({
        type:'POST',
        url:'login.php',
        data:{
            password:password,
            username:username
        },
        success: function(response,data){
            $("#result").delay(10000).fadeIn().html(response);
        }
    });  
});

});

