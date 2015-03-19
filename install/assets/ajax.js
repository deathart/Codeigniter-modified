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
                data : "securitykey=" + SecurityKey,
                success: function(msg){
                    if (msg == 1) {
                        $(".error").hide();
                        $(".success").show();
                        setTimeout(window.location.href=window.location.protocol+"//"+window.location.host+"/install/Database",3000);
                    }
                    else {
                        $(".error").show();
                    }
                }

            });
        }
        
    });
        
    $(".adddatabase").click(function() {
        
        $(".Loading").show();
        
        var Host = $("#InputHost").val();
        var Username = $("#InputUsername").val();
        var Password = $("#InputPassword").val();
        var Database = $("#InputDatabase").val();
        
        if (Host === "") {
            $(".Loading").hide();
            $(".inputnull").show();
        }
        else {
            $(".inputnull").hide();
            $(".Loading").hide();
            $.ajax({ // fonction permettant de faire de l'ajax

                type: "POST", // methode de transmission des données au fichier php
                url: "class/ajax.class.php", // url du fichier php
                data : "Host=" + Host + '&username=' + Username + '&password=' + Password + '&database=' + Database,
                success: function(msg){
                    if (msg == 1) {
                        $(".error").hide();
                        $(".success").show();
                        setTimeout(window.location.href=window.location.protocol+"//"+window.location.host+"/install/Finish",3000);
                    }
                    else {
                        $(".error").show();
                    }
                }

            });
        }
        
    });
    
});