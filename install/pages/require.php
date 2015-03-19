<div class="text-center"><h2>Php require</h2></div>
<hr />
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
                PHP Version
            </th>
            <?php 
            if (version_compare(PHP_VERSION, '5.4', '>=')) {
                echo ('<td class="success">OK</td><td>The minimum version of php require is 5.4</td>');
            }
            else {
                echo ('<td class="danger">NOT OK</td><td>The minimum version of php require is 5.4</td>');
                exit;
            }
            ?>
        </tr>
        <tr>
            <th>
                Variable superglobal
            </th>
            <td class="success">
                OK
            </td>
            <td>
                
            </td>
        </tr>
        <tr>
            <th>
                PDO extension
            </th>
            <?php
            if (extension_loaded('pdo')) {
                echo ('<td class="success">OK</td>');
            }
            else {
                echo ('<td class="danger">NOT OK</td>');
                exit;
            }
            ?>
            <td>
                
            </td>
        </tr>
        <tr>
            <th>
                MySQLi extension
            </th>
            <?php
            if (extension_loaded('mysqli')) {
                echo ('<td class="success">OK</td>');
            }
            else {
                echo ('<td class="danger">NOT OK</td>');
                exit;
            }
            ?>
            <td>
                
            </td>
        </tr>
    </tbody>
</table>
<p><a class="btn btn-sm btn-success" href="Home" role="button">Previous</a> - <a class="btn btn-sm btn-success" href="File" role="button">Next</a></p>