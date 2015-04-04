<div>
    <img alt="Under Construction" src="/img/construction.gif"/>
</div>
<div>
    <table class="table table-striped">
        <thead>
            <tr>
                <td>Trade Type</td>
                <td>Symbol</td>
                <td>Shares Traded</td>
                <td>Share Price</td>
                <td>Time of Trade</td>
            </tr>
        </thead>
        <?php foreach ($rows as $row): ?>
        
           <tr>
               <td><?= $row["type"] ?></td>
               <td><?= $row["symbol"] ?></td>
               <td><?= $row["shares"] ?></td>
               <td>$<?= $row["price"] ?></td>
               <td><?= $row["time"] ?></td>
           </tr>
        
        <?php endforeach ?>
    </table>
</div>
<div>
    <a href="logout.php">Log Out</a>
</div>
<div>
    or <a href="quote.php">Get Stock Quote</a>
</div>
