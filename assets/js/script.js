$(document).ready(function () {
    
    var base_url = window.location.protocol+"//"+window.location.host;
    
    /**
     * Captcha Ajax
     */
    $(".captchaTest").click(function(){
        var captcha = $("#InputCaptchaTest").val();
        if (!captcha) {
            alert('Thank you filling the fields');
        }
        else {
            $.ajax({
                type: "POST", // methode de transmission des données au fichier php
                url: base_url+"/fr/Welcome/AjaxCaptcha", // url du fichier php
                data : "&captcha=" + captcha,
                success: function(msg){
                    if (msg == "1") {

                        alert('Captcha OK');

                    }
                    else {

                        alert('Captcha NOT OK');

                    }
                }
            });
        }
    });
    
    /**
     * Gravatar Lib
     */
    $(".gravatarTest").click(function(){
        
        var email = $("#InputGravatarTest").val();
        
        if (!email) {
            alert('Thank you filling the fields');
        }
        else {
            $("#dvgravatar").show();

            $(".ajax_box_gravatar").load(base_url+"/fr/Welcome/AjaxGravatar/"+email, function(){ 
                
                $(".InputGravatarHTML").hide();
                $("#dvgravatar").hide();

            });
        }
    });
    
});