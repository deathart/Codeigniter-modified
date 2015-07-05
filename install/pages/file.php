<h2><?php echo $lang['testfolder']; ?></h2>
<hr />
<table class="table table-bordered">
    <thead>
        <tr>
            <th>
                <?php echo $lang['name']; ?>
            </th>
            <th>
                <?php echo $lang['result']; ?>
            </th>
            <th>
                <?php echo $lang['info']; ?>
            </th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th>
                System folder
            </th>
            <?php 
            if (is_dir('../system/')) {
                echo ('<td class="success">OK</td><td></td>');
            }
            else {
                echo ('<td class="danger">NOT OK</td><td></td>');
                exit;
            }
            ?>
        </tr>
        <tr>
            <th>
                Application folder
            </th>
            <?php 
            if (is_dir('../application/')) {
                echo ('<td class="success">OK</td><td></td>');
            }
            else {
                echo ('<td class="danger">NOT OK</td><td></td>');
                exit;
            }
            ?>
        </tr>
    </tbody>
</table>
<h2><?php echo $lang['testfile']; ?></h2>
<hr />
<table class="table table-bordered">
    <thead>
        <tr>
            <th>
                <?php echo $lang['name']; ?>
            </th>
            <th>
                <?php echo $lang['result']; ?>
            </th>
            <th>
                <?php echo $lang['info']; ?>
            </th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th>
                config.php
            </th>
            <?php
            @chmod("../application/config/config.php",0777);
            if (is_writable("../application/config/config.php")) {
                echo ('<td class="success">OK</td><td></td>');
            }
            else {
                echo ('<td class="danger">NOT OK</td><td></td>');
                exit;
            }
            ?>
        </tr>
        <tr>
            <th>
                database.php
            </th>
            <?php
            @chmod("../application/config/database.php",0777);
            if (is_writable("../application/config/database.php")) {
                echo ('<td class="success">OK</td><td></td>');
            }
            else {
                echo ('<td class="danger">NOT OK</td><td></td>');
                exit;
            }
            ?>
        </tr>
        <tr>
            <th>
                routes.php
            </th>
            <?php
            @chmod("../application/config/routes.php",0777);
            if (is_writable("../application/config/routes.php")) {
                echo ('<td class="success">OK</td><td></td>');
            }
            else {
                echo ('<td class="danger">NOT OK</td><td></td>');
                exit;
            }
            ?>
        </tr>
        <tr>
            <th>
                facebook.php
            </th>
            <?php
            @chmod("../application/config/facebook.php",0777);
            if (is_writable("../application/config/facebook.php")) {
                echo ('<td class="success">OK</td><td></td>');
            }
            else {
                echo ('<td class="danger">NOT OK</td><td></td>');
                exit;
            }
            ?>
        </tr>
        <tr>
            <th>
                tweet.php
            </th>
            <?php
            @chmod("../application/config/tweet.php",0777);
            if (is_writable("../application/config/tweet.php")) {
                echo ('<td class="success">OK</td><td></td>');
            }
            else {
                echo ('<td class="danger">NOT OK</td><td></td>');
                exit;
            }
            ?>
        </tr>
    </tbody>
</table>
<p><a class="btn btn-sm btn-success" href="Require" role="button"><?php echo $lang['previous']; ?></a> - <a class="btn btn-sm btn-success" href="Configuration" role="button"><?php echo $lang['next']; ?></a></p>