<br/><br/
><form action="data.php" method="post">
    <fieldset>  
        <div class="control-group">
            <select name="year">
            <option value=''>Year</option>
            <option value='2015'>2015</option>
  	    <option value='2014'>2014</option>
	    <option value='2013'>2013</option>
	    <option value='2012'>2012</option>
	    <option value='2011'>2011</option>
	    <option value='2010'>2010</option>
            </select>
        </div>
    <div class="form-group">
        <input autofocus class="form-control" name="btotal" placeholder="total block yield" type="text"/>
        <input autofocus class="form-control" name="bname" class="form-control" placeholder="block name" type="text">
		<div class="control-group">
            <select name="btype">
            <option value=''>type</option>
            <option value='tart'>tart</option>
  	    <option value='sweet'>sweet</option>
	    <option value='balaton'>balaton</option>
            </select>
        </div>
        <input autofocus class="form-control" name="bsize" placeholder="block size" type="number" step="any"/>
        <button type="submit" class="btn btn-default">Submit</button>
    </div>
    </fieldset>
</form>

<div>
    <a href="logout.php">Log Out</a>
</div>

<a href="javascript:history.go(-1);">Back</a>
