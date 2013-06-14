// send_mail.php & jquery.EasyFormMail.js - See https://github.com/Thiagoguelfi2012/jQuery-Easy-FormMail for more info
// Copyright (c) 2013 Thiago Valentoni Guelfi
(function($) {
    $.fn.EasyFormMail = function(o){
        var s = $.extend({
            to: null,                           // [string] Receiver, or receivers of the mail. The formatting of this string must comply with RFC 2822. Some examples are: user@example.com user@example.com, anotheruser@example.com
            subject: null,                      // [string]   optional subject for email
            sucess_msg: null                    // [string]   optional sucess message when the email is sucefully sent
   
        }, o);
        return this.each(function(i, widget){
            // Busca o botao submit do form
            var submitBtn = $(widget).find("[type='submit']");
            submitBtn.each(function(j,elementSubmit){
                $(elementSubmit).bind("click",function(submit){
                    //  PARA O EVENTO DE ENVIO DO FORM
                    submit.preventDefault();
                    // ABRE A VARIAVEL data EXTENDENDO OS DADOS DE s
                    var data = $.extend(s, o);
                    //  BUSCA OS CAMPOS A SEREM ENVIADOS EMAIL
                    var internalElements = $(widget).find("[type!='submit']").not("[type='reset']").not("[type='button']");
                    internalElements.each(function(k,element){
                        var position = $(element).attr("name");
                        var value = $(element).val();
                        data[position] = value;
                    });
                    $.post("EasyFormMail/send_mail.php", data, function(result, responseType){
                        $("html").append(result);
                    })
                })
            });
       
        });
    };
})(jQuery);
