<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
	<title>{function:title_for_layout}</title>
        <?php if(isset($includes_for_layout['css']) AND count($includes_for_layout['css']) > 0):
            foreach($includes_for_layout['css'] as $css): ?>
                <link rel="stylesheet" type="text/css" href="<?php echo $css['file']; ?>"<?php echo ($css['options'] === NULL ? '' : ' media="' . $css['options'] . '"'); ?>>
            <?php endforeach;
        endif;
        ?>
    </head>
    <body>
        <?php echo $content_for_layout; ?>
        <?php
        if(isset($includes_for_layout['js']) AND count($includes_for_layout['js']) > 0): 
            foreach($includes_for_layout['js'] as $js): 
                if($js['options'] === NULL OR $js['options'] == 'footer'): ?>
                    <script type="text/javascript" src="<?php echo $js['file']; ?>"></script>
                <?php endif; 
            endforeach; 
        endif; 
        ?>
    </body>
</html>