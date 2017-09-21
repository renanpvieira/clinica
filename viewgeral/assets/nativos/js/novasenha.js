$(document).ready(function () {
    $("form[name='form-novasenha']").submit(function(e) {
        e.preventDefault();
        var form = $(this).serializeArray();
        $.ajax({
            type: "POST",
            url: Site_Url("/admin/nova/novasenha"),
            data: GeraSecurityForm(form),
            success: function (data) {
               // displayFormMsg("#contatomsg", ret.msg);
            }
        }).done(function(data) {
            var ret = $.parseJSON(data);
            displayFormMsg(ret.formValidate, "#nova-msg", ret.msg);
            $('input[name="Imagem"]').val('');  /* TROCANDO A IMAGEM MESMO QUE O USUARIO ACEITE */
            $('input[name="Chave"]').val(ret.chave);
            $('#img-captcha').attr('src', ret.imagem);
        });
        
    });
});

