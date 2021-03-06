<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div id="wrapper">
<div id="container">
    <h1>{function:title_for_layout}</h1>
    <div id="body">
        <p>The page you are looking at is being generated dynamically by CodeIgniter.</p>
        <p>If you would like to edit this page you'll find it located at:</p>
        <code>application/views/pages/welcome_message.php</code>
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
<div id="container">
    <h1>Gravatar</h1>
    <div id="body">
        <div class="InputGravatarHTML">
            <p>Please input email :</p>
            <p><input type="email" id="InputGravatarTest" /></p>
            <p><span class="gravatarTest" style="cursor: pointer;">Submit</span></p>
        </div>
        <div class="ajax_box_gravatar">
            <div style="display:none" id="dvgravatar">
                <p>Loading...</p>
            </div>
        </div>
    </div>
</div>
<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds - <?php echo $ci_version ?></p>
</div>