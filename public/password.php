<?php

    // configuration
    require("../includes/config.php");
    
    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("password_form.php", ["title" => "Change Password"]);
    }
    
    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // TODO
        // validate submissions
        // validate username entry
        if (empty($_POST["oldpassword"]))
        {
            render("password_form.php", ["title" => "Change Password", "rerror" => "You must provide your old password"]);
            return false;
        }
        // validate password has been entered
        if (empty($_POST["newpassword"]))
        {
            render("password_form.php", ["title" => "Change Password", "rerror" => "You must provide a new password"]);
            return false;
        }
        if (($_POST["newpassword"]) != ($_POST["confirmation"]))
        {
            render("password_form.php", ["title" => "Change Password", "rerror" => "Your passwords must match"]);
            return false;
        }
        // query database for user
        $rows = query("SELECT * FROM users WHERE id = ?", $_SESSION["id"]);

        // if we found user, check password
        if (count($rows) == 1)
        {
            // first (and only) row
            $row = $rows[0];

            // compare hash of user's input against hash that's in database
            if (crypt($_POST["oldpassword"], $row["hash"]) == $row["hash"])
            {
                //
                $newpassword = htmlspecialchars($_POST["newpassword"]);
                // insert new password into database
                $result = query("UPDATE users SET hash = ? WHERE id = ?", crypt($newpassword), $_SESSION["id"]);
                if ($result === false) {    
                    render("password_form.php", ["title" => "Change Password", "rerror" => "Registration unsuccessful, please try a different password"]);
                }
                // return to portfolio
                redirect("index.php");
            }
            else 
            {
                render("password_form.php", ["title" => "Change Password", "rerror" => "Your passwords must match"]);
                return false;
            }
        }       
    }   
?>
