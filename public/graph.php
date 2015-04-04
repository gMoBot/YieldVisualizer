<?php

    // configuration
    require("../includes/config.php");
    
    // yields
    $rows = query("SELECT * FROM yrs WHERE id = ?", $_SESSION["id"]);

    // stock positions
    $positions = [];
    foreach ($rows as $row)
    {
    	$positions[] = [
            "bname" => $row["bname"],
		"info" => array(
	 	"fif" => $row["b2015"],
		"fou" => $row["b2014"],
		"thr" => $row["b2013"],
		"twl" => $row["b2012"],
		"ele" => $row["b2011"],
		"ten" => $row["b2010"]
	)
	];
    }
        //render form
	// output articles as JSON (pretty-printed for debugging convenience
    header("Content-type: application/json");
    print(json_encode($positions, JSON_PRETTY_PRINT));
	//echo json_encode($positions);
        //renderg("graph_form.php");

?>   
