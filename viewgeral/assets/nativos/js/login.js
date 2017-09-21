$(document).ready(function () {
    $("form[name='form-login']").submit(function(e) {
        e.preventDefault();
        var form = $(this).serializeArray();
        $.ajax({
            type: "POST",
            url: Site_Url("/admin/login/logar"),
            data: GeraSecurityForm(form),
            success: function (data) {
               // displayFormMsg("#contatomsg", ret.msg);
            }
        }).done(function(data) {
            var ret = $.parseJSON(data);
            if(ret.formValidate){
                window.location = ret.url;
            }else{
              displayFormMsg(false, "#login-msg", ret.msg);  
            }
        });
        
    });
});

