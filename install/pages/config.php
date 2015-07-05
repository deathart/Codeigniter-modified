<h2>Configuration file</h2>
<hr />
<form>
    <div class="form-group">
        <span class="Loading" style="display: none;">
             <div class="alert alert-warning text-center" role="alert"><?php $lang['loading']; ?></div>
        </span>
        <span class="inputnull" style="display: none;">
            <div class="alert alert-danger text-center" role="alert">Security Key is null</div>
        </span>
        <span class="success" style="display: none;">
            <div class="alert alert-success text-center" role="alert">Configuration success, Redirect in 3sec</div>
        </span>
        <span class="error" style="display: none;">
            <div class="alert alert-danger text-center" role="alert">Error system</div>
        </span>
        <label for="InputSecurityKey">Security Key</label>
        <input type="text" class="form-control" id="InputSecurityKey" placeholder="Security Key">
    </div>
</form>
<p><a class="btn btn-sm btn-success" href="File" role="button"><?php echo $lang['previous']; ?></a> - <span class="btn btn-sm btn-success addconfig" href="Database" role="button"><?php echo $lang['next']; ?></span></p>