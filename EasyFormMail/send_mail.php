<?php
// send_mail.php & jquery.EasyFormMail.js - See https://github.com/Thiagoguelfi2012/jQuery-Easy-FormMail for more info
// Copyright (c) 2013 Thiago Valentoni Guelfi
// Open Source - MIT License (MIT)

if (PATH_SEPARATOR == ":") {
    $quebra = "\r\n";
} else {
    $quebra = "\n";
}
if (isset($_REQUEST['to']) && !empty($_REQUEST['to'])) {
    if (!isset($_REQUEST['subject']) || $_REQUEST['subject'] == NULL)
        $_REQUEST['subject'] = "jQuery Easy FormMail";
    if (!isset($_REQUEST['sucess_msg']) || $_REQUEST['sucess_msg'] == NULL)
        $_REQUEST['sucess_msg'] = "Email sent successfully!";

    $msg = "";
    foreach ($_REQUEST as $key => $value) {
        if ($key != "subject" && $key != "to" && $key != "sucess_msg" && $key != "error_msg"
                && $key != "emptyField_msg" && $key != "_utmz" && $key != "_utma") {
            $msg .= ucwords($key) . ": " . $value . $quebra;
        }
    }


    $headers = "MIME-Version: 1.1" . $quebra;
    $headers .= "Content-type: text/plain; charset=iso-8859-1" . $quebra;
    $headers .= "From: " . $_REQUEST['subject'] . $quebra; //E-mail do remetente
    $headers .= "Return-Path: " . $_REQUEST['subject'] . $quebra; //E-mail do remetente
    if (mail($_REQUEST['to'], $_REQUEST['subject'], $msg, $headers, "-r" . $_REQUEST['to'])) {
        ?><script type="text/javascript">alert("<?php echo $_REQUEST['sucess_msg']; ?>")</script><?php
    } else {
        if (!isset($_REQUEST['error_msg']) || $_REQUEST['error_msg'] == NULL) {
            ?><script type="text/javascript">alert(" Could not send the email!\n\ Make sure PHP is installed correctly and\n\ the mail configurations are enabled.")</script><?php
        } else {
            ?><script type="text/javascript">alert("<?php echo $_REQUEST['error_msg']; ?>")</script><?php
        }
    }
} else {
    ?><script type="text/javascript">alert(" You can not send an email without choosing a recipient.\n\ Please set a value for position 'to'.\n\ EX: $('#myForm').EasyFormMail({to: 'recipient@example.com'})")</script><?php
}
?>
