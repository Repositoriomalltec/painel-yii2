$(document).ready(function(){
var formData;
	$('.container').on('submit' , 'form[name="cadForm"]', function (event) {
	   // var img = $('form[name="cadForm"]').find(".loading").hide();

        event.preventDefault();
        formData = new FormData($(this)[0]);
         $.ajax({
            url: $('form[name="cadForm"]').attr('action'),
            dataType: "json",
            type: 'POST',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
             success: function (responseText) {
                 console.log(responseText);
                 if (responseText.acao_java == 'create') {
                     $('.aviso').html(responseText.msg).fadeIn('slow');
                     /* Limpa e oculta a div com 1 segundo e meio. */
                     window.setTimeout(function () {
                         $('.aviso').empty().fadeOut(1000);
                         $('input[type=text],textarea').val("");
                         $('form[name="cadForm"]').find(".has-success").removeClass('has-success');
                     }, 3000);
                 } else if(responseText.acao_java == 'update'){
                     $('.aviso').html(responseText.msg).fadeIn('slow');
                     window.setTimeout(function () {
                         $('.aviso').empty().fadeOut(1000);
                         $('form[name="cadForm"]').find(".has-success").removeClass('has-success');
                        // $(location).href(responseText.urlRedirect);
                        window.location.href = responseText.urlRedirect;
                     }, 3000);
                 }
             },
            beforeSend: function(){$('.aviso').empty().html("Aguarde...")},
            complete: function(){},
            error:function(e){console.log("Erro no processamento");}
         });
        return false;
    });
}); //fim do documento