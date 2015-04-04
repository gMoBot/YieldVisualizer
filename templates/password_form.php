<form action="password.php" method="post">
    <fieldset>
        <div class="form-group">
            <input class="form-control" name="oldpassword" placeholder="Old Password" type="password"/>
        </div>
        <div class="form-group">
            <input class="form-control" name="newpassword" placeholder="New Password" type="password"/>
        </div>
        <div class="form-group">
            <input class="form-control" name="confirmation" placeholder="Confirmation" type="password"/>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-default">Change Password</button>
        </div>
    </fieldset>
</form>
<div>
    <a href="javascript:history.go(-1);">Back</a>
</div>
<br>
<div>
        <?php if (isset($rerror)): ?>
             <p class="lead text-danger"><?= htmlspecialchars($rerror) ?></p>            
        <?php else: ?>
            <p></p>
        <?php endif ?>
   
</div>
