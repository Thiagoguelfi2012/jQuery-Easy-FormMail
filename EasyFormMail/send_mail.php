<?php
// send_mail.php & jquery.EasyFormMail.js - See https://github.com/Thiagoguelfi2012/jQuery-Easy-FormMail for more info
// Copyright (c) 2013 Thiago Valentoni Guelfi
// Open Source - MIT License (MIT)
if (PATH_SEPARATOR == ":") {
    $quebra = "\r\n";
} else {
    $quebra = "\n";
}
if (isset($_POST['to']) && !empty($_POST['to'])) {
    if (!isset($_POST['subject']) || $_POST['subject'] == NULL)
        $_POST['subject'] = "jQuery Easy FormMail";
    if (!isset($_POST['sucess_msg']) || $_POST['sucess_msg'] == NULL)
        $_POST['sucess_msg'] = "Email sent successfully!";

    $msg = "";
    foreach ($_POST as $key => $value) {
        if ($key != "subject" && $key != "to" && $key != "sucess_msg" && $key != "error_msg"
                && $key != "emptyField_msg" && $key != "_utmz" && $key != "_utma") {
            $msg .= ucwords($key) . ": " . $value . $quebra;
        }
    }


    $headers = "MIME-Version: 1.1" . $quebra;
    $headers .= "Content-type: text/plain; charset=iso-8859-1" . $quebra;
    $headers .= "From: " . $_POST['subject'] . $quebra; //E-mail do remetente
    $headers .= "Return-Path: " . $_POST['subject'] . $quebra; //E-mail do remetente
    if (mail($_POST['to'], $_POST['subject'], $msg, $headers, "-r" . $_POST['to'])) {
        ?><script type="text/javascript">alert("<?php echo $_POST['sucess_msg']; ?>")</script><?php
    } else {
        if (!isset($_POST['error_msg']) || $_POST['error_msg'] == NULL) {
            ?><script type="text/javascript">alert(" Could not send the email!\n\ Make sure PHP is installed correctly and\n\ the mail configurations are enabled.")</script><?php
        } else {
            ?><script type="text/javascript">alert("<?php echo $_POST['error_msg']; ?>")</script><?php
        }
    }
} else {
    ?><script type="text/javascript">alert(" You can not send an email without choosing a recipient.\n\ Please set a value for position 'to'.\n\ EX: $('#myForm').EasyFormMail({to: 'recipient@example.com'})")</script><?php
}
?>
