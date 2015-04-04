<?php

    // configuration
    require("../includes/config.php");
    
    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("register_form.php", ["title" => "Register"]);
    }
    
    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // TODO
        // validate submissions
        // validate username entry
        if (empty($_POST["username"]))
        {
            render("register_form.php", ["title" => "Register", "rerror" => "You must provide your username"]);
            return false;
        }
        // validate password has been entered
        if (empty($_POST["password"]))
        {
            render("register_form.php", ["title" => "Register", "rerror" => "You must provide a password"]);
            return false;
        }
        if (($_POST["password"]) != ($_POST["confirmation"]))
        {
            render("register_form.php", ["title" => "Register", "rerror" => "Your passwords must match"]);
            return false;
        }
        $username = htmlspecialchars($_POST["username"]);
        $password = htmlspecialchars($_POST["password"]);
        $result = query("INSERT INTO users (username, hash) VALUES( ?, ?)", $username, crypt($password));
        if ($result === false) {    
            render("register_form.php", ["title" => "Register", "rerror" => "Registration unsuccessful, please try a different username"]);
            }
        else 
        {
            $rows = query("SELECT LAST_INSERT_ID() AS id");
            $id = $rows[0]["id"];
            $_SESSION["id"] = $id;
            redirect("index.php");
        }       
    }   
?>
