jQuery Easy FormMail Plugin
====================

    Create forms easily to send email with jQuery Easy FormMail plugin!
    EX: $("#myForm").EasyFormMail({to:"recipient@example.com"});


USAGE:
======

VIEW FILE "demo.html" FOR MORE DETAILS

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
        <script src="EasyFormMail/jquery.easyFormMail.js"></script>
        <script>
            $(function(){
                $("#myForm").EasyFormMail({to:"recipient@example.com"});
            })
        </script> 
        <form id="myForm">
            <input class="required" name="input1" type="text"/>
            <input name="input2" type="text"/>
            <input name="input3" type="text"/>
            <textarea name="textarea1"></textarea>
            <input value="enviar" type="submit"/>
            <input value="reset" type="reset"/>
        </form>


PARAMETERS:
===========

THE PLUGIN WORK WITH JSON. THE AVAIlABLE POSITIONS IS

    {
    to:"recipient@example.com",                                          // required
    subject: "Your Subject",                                             // not-required
    sucess_msg: "Your Sucess Alert Message",                             // not-required
    error_msg: "Your Error Alert Message",                               // not-required
    emptyField_msg: "Your Error Message when required field is empty"    // not-required
    }


CLASSES:
========

class="required"        // Required field to send mail



SERVER REQUIREMENTS:
====================

   - PHP5.0 or greater
   - Email Configurations Activated


LICENSE:
=========

    Copyright (c) 2013 Thiago Valentoni Guelfi
    Open Source - MIT License (MIT)