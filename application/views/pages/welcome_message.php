<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div id="container">
    <h1>{function:title_for_layout}</h1>
    <div id="body">
        <p>The page you are looking at is being generated dynamically by CodeIgniter.</p>
        <p>If you would like to edit this page you'll find it located at:</p>
        <code>application/views/welcome_message.php</code>
        <p>The corresponding controller for this page is found at:</p>
        <code>application/controllers/Welcome.php</code>
        <p>If you are exploring CodeIgniter for the very first time, you should start by reading the <a href="user_guide/">User Guide</a>.</p>
    </div>
</div>
<div id="container">
    <h1>Test Captcha</h1>
    <div id="body">
        <p><?php echo $captcha; ?></p>
        <p><input type="text" id="InputCaptchaTest" /></p>
        <p><span class="captchaTest" style="cursor: pointer;">Submit</span></p>
    </div>
</div>
<p class="footer"><?php echo $ci_version ?></p>