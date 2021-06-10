<?php
/* First-reading on the page, labels are empty */
    $firstname = $name = $email = $phone = $message = "";
    $firstnameError = $nameError = $emailError = $phoneError = $messageError = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $firstname = verifyInput($_POST["firstname"]);
        $name = verifyInput ($_POST["name"]);
        $email = verifyInput ($_POST["email"]);
        $phone = verifyInput ($_POST["phone"]);
        $message = verifyInput ($_POST["message"]);

        /* Server-side validation with error messages */
        if(empty($firstname)) {
            $firstnameError = "Je veux connaitre ton prénom !";
        }

        if(empty($name)) {
            $nameError = "Ton nom m'intéresse aussi, tu ne t'échapperas pas !";
        }

        if(empty($message)) {
            $messageError = "Que veux tu me dire ?";
        }

        if(!isEmail($email)) {
            $emailError = "T'essaies de me rouler ? Ce n'est pas un email ça !";
        }

        if(!isPhone($phone)) {
            $phoneError = " Que des chiffres, stp ...";
        }
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

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Contactez-moi !</title>
        <link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="Styles/style.css">
        <link rel="stylesheet" href="Styles/reset.css">
    </head>

    <body>

        <div class="container">
            <div class="separating-line"></div>
            <div class="title-container">
                <h2 class="title">Contactez-moi</h2>
            </div>
        </div>

        <div class="form-container">
            <div class="cases">
                <!-- Second reading, when we clic on submit button : the page return the if condition -->
                <!-- htmlspecialchars can protects against xss flaws-->
                <form id="contact-form" method="post" action="<?php echo htmlspecialchars ($_SERVER['PHP_SELF']); ?>" role="form">
                  
                <!--Client-side validation with "required" in input-->
                        <div class="form-element">
                            <label for="firstname">Prénom <span class="important-infos">*</span></label>
                            <input type="text" id="firstname" name="firstname"  class="form-control" placeholder="Votre prénom" 
                            value="<?php echo $firstname; ?>">
                            <p class="comments"><?php echo $firstnameError; ?></p>
                        </div>
    
                        <div class="form-element">
                            <label for="name">Nom <span class="important-infos">*</span></label>
                            <input type="text" id="name" name="name" class="form-control" placeholder="Votre nom"
                            value="<?php echo $name; ?>">
                            <p class="comments"><?php echo $nameError; ?></p>
                        </div>
                   

                        <div class="form-element">
                            <label for="email">Email <span class="important-infos">*</span></label>
                            <input type="email"  id="email" name="email" class="form-control" placeholder="Votre email"
                            value="<?php echo $email; ?>">
                            <p class="comments"><?php echo $emailError; ?></p>
                        </div>
    
                        <div class="form-element">
                            <label for="phone">Téléphone <span class="important-infos"></span></label>
                            <input type="tel" id="phone" name="phone" class="form-control" placeholder="Votre téléphone"
                            value="<?php echo $phone; ?>">
                            <p class="comments"><?php echo $phoneError; ?></p>
                        </div>
 
                    <div class="form-element-message">
                        <label for="message">Message <span class="important-infos">*</span></label>
                        <textarea id="message" name="message" class="form-control" placeholder="Votre message"><?php echo $message; ?></textarea>
                        <p class="comments"><?php echo $messageError; ?></p>
                    </div>

                    <p class="important-infos">
                        * Ces informations sont requises.
                    </p>

                  
                    <input type="submit" class="form-btn" value="Envoyer">

                   <p class="thank-you">Votre message a bien été envoyé.</p>

                </form>
            </div>
        </div>
            
    </body>
    </html>