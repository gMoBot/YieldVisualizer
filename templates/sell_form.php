<form action="sell.php" method="post">
    <fieldset>  
        <div class="control-group">
            <select name="symbol">
            <option value=''>Stock...</option>
                <?php foreach ($stocks as $symbol)
                {
                    echo("<option value='$symbol'>" . $symbol . "</option>");
                }
                ?>
            </select>
        </div>
        <div class="control-group">
            <button type="submit" class="btn btn-default">Sell</button>
            <input type="text" name="number" class="form-control" placeholder="Number of shares">
        </div>
    </fieldset>
</form>

<div>
    <a href="logout.php">Log Out</a>
</div>

<a href="javascript:history.go(-1);">Back</a>
