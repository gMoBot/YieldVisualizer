<?php

    // configuration
    require("../includes/config.php");
    
    // else if user reached page via POST (as by submitting a form via POST)
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        //
        if (empty($_POST["number"]))
        {
            apologize("You must provide a valid number of shares");
            return false;
        }
        if (empty($_POST["symbol"]))
        {
            apologize("You must select a valid stock symbol");
            return false;
        }
        // ensure user typed a positive integer
        if (boolval(preg_match("/^\d+$/", $_POST["number"])) !== true)
        {
            apologize("You may only sell whole, positive values of shares, not fractions thereof");
            return false;
        }
        
        // else begin sell trade   
        $symbol = htmlspecialchars($_POST["symbol"]);
        // find user's shares held
        $shares = query("SELECT shares FROM portfolio WHERE id = ? AND symbol = ?", $_SESSION["id"], $symbol);  
        
        if ($_POST["number"] > $shares[0]["shares"])
        {
            apologize("You may only sell up to the number of shares you own");
            return false;
        }
        // find current price
        $stock = lookup($symbol);
        
        // determine value of user's shares
        $value = $stock["price"] * $_POST["number"]; 
        
        // $shares[0]["shares"];
        
        // delete sold shares from user's portfolio
        query("UPDATE portfolio SET shares = shares - ? WHERE id = ? AND symbol = ?", $_POST["number"], $_SESSION["id"], $symbol);
        
        // add share value to cash position
        query("UPDATE users SET cash = cash + ? WHERE id = ?", $value, $_SESSION["id"]);
        
        // specify trade type
        $trade = 'SELL'; 
        
        // ensure stock symbol is uppercase
        $stocksymbol = strtoupper($symbol);
        
        // add trade to user's history
        query("INSERT INTO history (id, type, symbol, shares, price, time) VALUES (?, ?, ?, ?, ?, NOW())", $_SESSION["id"], $trade, $stocksymbol, $_POST["number"], $stock["price"]); 
        
        // return to portfolio
        redirect("/");
    }
    // if user did not submit form
    else
    {
        //get user's stocks
        $rows = query("SELECT * FROM portfolio WHERE id = ?", $_SESSION["id"]);
        
        // stock symbols variable
        $stocks = [];
            
        foreach ($rows as $row)
        {
            // hold symbols
            $stock = $row["symbol"];
            $stocks[] = $stock;
        }
        
        // render sell form
        render("sell_form.php", ["stocks" => $stocks, "title" => "Sell"]);
    }
?>    
