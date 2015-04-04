<br/><br/>
<div>
    <form action="yrs.php">
	<input type="submit" value ="Add Data">
    </form>
<span>
	<form action="test.php">
	<input type="submit" value ="Analyze Records">
    	</form>
</span>
</div>
    <table class="table table-striped">
        <thead>
            <tr>
                <td>Year</td>
                <td>Block Total Yield</td>
                <td>Bname</td>
                <td>Btype</td>
		<td>Bsize</td>
		<td>Byield/Acre</td>
            </tr>
        </thead>
        <?php foreach ($positions as $position): ?>
        
           <tr>
               <td><?= $position["year"] ?></td>
               <td><?= $position["btotal"] ?></td>
               <td><?= $position["bname"] ?></td>
	       <td><?= $position["btype"] ?></td>
	       <td><?= $position["bsize"] ?></td>
	       <td><?= $position["byielda"] ?></td>
           </tr>
        
        <?php endforeach ?>
    </table>
</div>
<div>
    <a href="logout.php">Log Out</a>
</div>
<div>
    or <a href="password.php">Change Password</a>
</div>
