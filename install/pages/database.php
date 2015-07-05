<h2>Configuration database</h2>
<hr />
<form>
    <div class="form-group">
        <span class="Loading" style="display: none;">
             <div class="alert alert-warning text-center" role="alert">Loading</div>
        </span>
        <span class="inputnull" style="display: none;">
            <div class="alert alert-danger text-center" role="alert">Host is null</div>
        </span>
        <span class="success" style="display: none;">
            <div class="alert alert-success text-center" role="alert">Configuration success, Redirect in 3sec</div>
        </span>
        <span class="error" style="display: none;">
            <div class="alert alert-danger text-center" role="alert">Error system</div>
        </span>
        <label for="InputHost">Host</label>
        <input type="text" class="form-control" id="InputHost" placeholder="Host">
        <label for="InputUsername">Username</label>
        <input type="text" class="form-control" id="InputUsername" placeholder="Username">
        <label for="InputPassword">Password</label>
        <input type="password" class="form-control" id="InputPassword" placeholder="Password">
        <label for="InputDatabase">Database</label>
        <input type="text" class="form-control" id="InputDatabase" placeholder="Database">
    </div>
</form>
<p><a class="btn btn-sm btn-success" href="Configuration" role="button"><?php echo $lang['previous']; ?></a> - <span class="btn btn-sm btn-success adddatabase" href="Module" role="button"><?php echo $lang['next']; ?></span></p>