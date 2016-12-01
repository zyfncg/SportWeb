/**
 * Created by ZhangYF on 2016/12/1.
 */
$("#logout").click(function () {
    $.post("../php/businesslogic/checklogin.php",
        {
            action:"logout",
        },
        function(data,status){

            if(data.status=="TRUE"){
                alert(data.status);
                location.herf = "login.html";
            }
        });
});