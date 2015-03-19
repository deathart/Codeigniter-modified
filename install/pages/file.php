<h2>Test file</h2>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>
                Name
            </th>
            <th>
                Result
            </th>
            <th>
                Information
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
<h2>test chmod</h2>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>
                Name
            </th>
            <th>
                Result
            </th>
            <th>
                Information
            </th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th>
                config.php
            </th>
            <?php
            $config_file = "../application/config/config.php";
            @chmod($config_file,0777);
            if (is_writable($config_file)) {
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
            $database_file = "../application/config/database.php";
            @chmod($database_file,0777);
            if (is_writable($database_file)) {
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
<p><a class="btn btn-lg btn-success" href="Config" role="button">Config</a></p>