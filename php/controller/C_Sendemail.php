<?php

    $to_email = "coszniczego.project@gmail.com";
    $subject = "Simple Email Test via PHP";
    $body = "Hi,nn This is test email send by PHP Script";
    $headers = "From: coszniczego.project@gmail.com";

    if (mail($to_email, $subject, $body, $headers)) {

        echo "Email successfully sent to ".$to_email."...";

    } 
    else{

        header("HTTP/1.1 418 I'm a teapot");

        echo "
        
        <html>
            <h1>418 I'm a teapot</h1><br>
            <p>The HTCPCP Server is a teapot. The responding entity MAY be short and stout.</p>
            <p><a href='https://meetanshi.com/blog/send-mail-from-localhost-xampp-using-gmail/'>How to fix</a></p>
        </html>
        
        ";

    } 
     
    
?>