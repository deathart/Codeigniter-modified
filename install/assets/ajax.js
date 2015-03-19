$(document).ready(function () {
    
    $(".addconfig").click(function() {
        
        $(".Loading").show();
        
        var SecurityKey = $("#InputSecurityKey").val();
        
        if (SecurityKey === "") {
            $(".Loading").hide();
            $(".inputnull").show();
        }
        else {
            $(".inputnull").hide();
            $(".Loading").hide();
            $.ajax({ // fonction permettant de faire de l'ajax

                type: "POST", // methode de transmission des données au fichier php
                url: "class/ajax.class.php", // url du fichier php
                data : "&securitykey=" + SecurityKey,
                success: function(msg){
                    if (msg == 1) {
                        $(".error").hide();
                        $(".success").show();
                        var obj = window.location.href=window.location.protocol+"//"+window.location.host+"/install/Database";
                        console.log(obj);
                        //setTimeout(obj,3000);
                    }
                    else {
                        $(".error").show();
                    }
                }

            });
        }
        
    });
    
});