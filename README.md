jQuery-Easy-FormMail Plugin
====================

Create easy customized FormMail to send email with this Plugin.


USAGE:
======

VIEW FILE "demo.html" FOR MOR DETAILS

        <script>
            $(function(){
                $("#myForm").EasyFormMail({to:"recipient@example.com"});
            })
        </script> 
        <form id="myForm">
            <input name="input1" type="text"/>
            <input name="input2" type="text"/>
            <input name="input3" type="text"/>
            <textarea name="textarea1"></textarea>
            <input value="enviar" type="submit"/>
            <input value="reset" type="reset"/>
        </form>


PARAMS:
=======

THE PLUGIN WORK WITH JSON.THE AVAIlABLE POSITIONS IS

    {
    to:"recipient@example.com",                  // required
    subject: "Your Subject Here",                // not-required
    sucess_msg: "Your Sucess Alert Message Here" // not-required
    }


SERVER REQUIREMENTS:
====================
   - PHP5.0 or greater
   - Email Configurations Activated