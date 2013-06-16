// send_mail.php & jquery.EasyFormMail.js - See https://github.com/Thiagoguelfi2012/jQuery-Easy-FormMail for more info
// Copyright (c) 2013 Thiago Valentoni Guelfi
// Open Source - MIT License (MIT)
(function($) {
    $.fn.EasyFormMail = function(o){
        var s = $.extend({
            to: null,                           // [string] Receiver, or receivers of the mail. The formatting of this string must comply with RFC 2822. Some examples are: user@example.com user@example.com, anotheruser@example.com
            subject: null,                      // [string]   optional subject for email
            sucess_msg: null,                   // [string]   optional sucess alert message when the email is sucefully sent
            error_msg: null,                    // [string]   optional error alert message when the email is not sent
            emptyField_msg: null                // [string]   optional error message when one or more fields is required and empty
   
        }, o);
        return this.each(function(i, widget){
            // Busca os elementos internos do form a serem enviados
            var internalElements = $(widget).find("[type!='submit']").not("[type='reset']").not("[type='button']");
            // Busca o botao reset do form
            var resetBtn = $(widget).find("[type='reset']");
            resetBtn.each(function(t,elementReset){
                $(elementReset).bind("click",function(submit){
                    internalElements.removeAttr("style");
                })
            });
            // Busca o botao submit do form
            var submitBtn = $(widget).find("[type='submit']");
            submitBtn.each(function(j,elementSubmit){
                $(elementSubmit).bind("click",function(submit){
                    var sendMail = true;
                    //  PARA O EVENTO DE ENVIO DO FORM
                    submit.preventDefault();
                    // ABRE A VARIAVEL data EXTENDENDO OS DADOS DE s
                    var data = $.extend(s, o);
                    if(data.emptyField_msg==""||data.emptyField_msg==null)
                        data.emptyField_msg = " can not be empty!";
                    //  BUSCA OS CAMPOS A SEREM ENVIADOS EMAIL
                    internalElements.each(function(k,element){
                        var classes = $(element).attr("class");
                        var position = $(element).attr("name");
                        var value = $(element).val();
                        // verifica campos class="required" vazios
                        if(classes && classes.indexOf("required")!=-1 &&( value==""|| value==position+data.emptyField_msg)){
                            $(element).attr("style","border-color:red;").val(position+data.emptyField_msg)
                            .on("focus",function(){
                                $(element).removeAttr("style").val("");
                            });
                            sendMail = false;
                        }
                        data[position] = value;
                    });
                    // envia o email
                    if(sendMail){
                        $.post("EasyFormMail/send_mail.php", data, function(result, responseType){
                            $("html").append(result);
                        })
                    }
                })
            });
       
        });
    };
})(jQuery);
