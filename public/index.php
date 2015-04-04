<?php

    // configuration
    require("../includes/config.php"); 
    
    // yields
    $rows = query("SELECT * FROM yield WHERE id = ?", $_SESSION["id"]);
    // stock positions
    $positions = [];
    foreach ($rows as $row)
    {
    	$positions[] = [
            "year" => $row["year"],
            "btotal" => $row["btotal"],
            "bname" => $row["bname"],
	    "btype" => $row["btype"],
	    "bsize" => $row["bsize"],
	    "byielda" => $row["byielda"],
        ];
    }
    // render portfolio
    render("portfolio.php", ["positions" => $positions, "title" => "Business Data"]);

?>
