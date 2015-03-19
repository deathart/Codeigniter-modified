$(document).ready(function () {
    
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
                url: window.location.protocol+"//"+window.location.host+"/fr/Welcome/AjaxCaptcha", // url du fichier php
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
    
});