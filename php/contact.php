<?php
    $array= array("firstname" => "", "name" => "", "email" => "", "phone" => "", "message" => "",
            "firstnameError" => "", "nameError" => "","emailError" => "","phoneError" => "","messageError" => "",
            "isSuccess" => false);

  
    $emailTo = "bateau871@gmail.com";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $array ["firstname"] = verifyInput($_POST["firstname"]);
        $array ["name"] = verifyInput ($_POST["name"]);
        $array ["email"] = verifyInput ($_POST["email"]);
        $array ["phone"] = verifyInput ($_POST["phone"]);
        $array ["message"] = verifyInput ($_POST["message"]);
        $array ["isSuccess"] = true;
        $emailText= "";

        /* Server-side validation with error messages */
        if(empty($array ["firstname"])) {
            $array ["firstnameError"] = "Je veux connaitre ton prénom !";
            $array ["isSuccess"] = false;
        } else // \n allows you to go to the line 
        {
            $emailText .= "Firstname: {$array ["firstname"]}\n";
        }
           

        if(empty($array ["name"])) {
            $array ["nameError"] = "Ton nom m'intéresse aussi, tu ne t'échapperas pas !";
            $array ["isSuccess"] = false;
        } else 
        {
            $emailText .= "Name: {$array ["name"]}\n";
        }

        if(!isEmail($array ["email"])) {
            $array ["emailError"] = "T'essaies de me rouler ? Ce n'est pas un email ça !";
            $array ["isSuccess"] = false;
        } else 
        {
            $emailText .= "Email: {$array ["email"]}\n";
        }

        if(!isPhone($array ["phone"])) {
            $array ["phoneError"] = " Ce que je demande c'est un numéro, pas une lettre ...";
            $array ["isSuccess"] = false;
        } else 
        {
            $emailText .= "Phone: {$array ["phone"]}\n";
        }

        if(empty($array ["message"])) {
            $array ["messageError"] = "Que veux tu me dire ?";
            $array ["isSuccess"] = false;
        } else 
        {
            $emailText .= "Message: {$array ["message"]}\n";
        }

        if($array ["isSuccess"]) 
        {
            $headers = "From: {$array ["firstname"]} {$array ["name"]} <{$array ["email"]}>\r\nReply-to: {$array ["email"]}";
            mail($emailTo, "Un message de votre site", $emailText, $headers);
        }
        echo json_encode($array);
    }

    function isPhone($var) {
        return preg_match("/^[0-9]*$/", $var);
    }

    function isEmail($var) {
        return filter_var($var, FILTER_VALIDATE_EMAIL);
    }

    function verifyInput($var) {
        // trim() function removes whitespace and other predefined characters from both sides of a string.
        // stripslashes() function removes backslashes added by the addslashes() function.
        // htmlspecialchars() function converts some predefined characters to HTML entities.
        $var = trim($var);
        $var = stripslashes($var);
        $var = htmlspecialchars($var);
        return $var;
    }
?>