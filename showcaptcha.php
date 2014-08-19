<?php
require_once("recaptchalib.php");
$publickey = "6LdoWecSAAAAAMrJTcyN4TeS46irGO0m2pi6yrx9";
// show the captcha
echo recaptcha_get_html($publickey);
?>