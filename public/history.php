<?php

    // configuration
    require("../includes/config.php"); 
    
    // stock holdings
    $rows = query("SELECT * FROM history WHERE id = ?", $_SESSION["id"]);
   
    // render history
    render("history.php", ["rows" => $rows, "title" => "History"]);

?>
