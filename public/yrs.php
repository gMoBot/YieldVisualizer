<?php

    // configuration
    require("../includes/config.php");
    
    // else if user reached page via POST (as by submitting a form via POST)
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        //
        if (empty($_POST["bname"] || $_POST["bsize"]))
        {
            apologize("You must include all block information");
            return false;
        }

        // calculate yield per acre and bname
	$bname = strtolower(htmlspecialchars($_POST["bname"]));
	$b2015 = $_POST["2015"] / $_POST["bsize"];
	$b2014 = $_POST["2014"] / $_POST["bsize"];
	$b2013 = $_POST["2013"] / $_POST["bsize"];
	$b2012 = $_POST["2012"] / $_POST["bsize"];
	$b2011 = $_POST["2011"] / $_POST["bsize"];
	$b2010 = $_POST["2010"] / $_POST["bsize"];
        
        // update yield table
        $result = query("INSERT INTO yrs (id, bname, bsize, b2015, b2014, b2013, b2012, b2011, b2010) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)", $_SESSION["id"], $bname, $_POST["bsize"], $b2015, $b2014, $b2013, $b2012, $b2011, $b2010);  
    	
	// update yrs table
	// update data form to capture values
	//query("INSERT INTO yrs () VALUES()");

        // return to portfolio
        redirect("/");
    }
    // if user did not submit form
    else
    {
        // render buy form
        render("yrs_form.php", ["title" => "Data"]);
    }
?>    
