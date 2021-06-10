<?php
/* First-reading on the page, labels are empty */
    $firstname = $name = $email = $phone = $message = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $firstname = verifyInput($_POST["firstname"]);
        $name = verifyInput ($_POST["name"]);
        $email = verifyInput ($_POST["email"]);
        $phone = verifyInput ($_POST["phone"]);
        $message = verifyInput ($_POST["message"]);
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
                  
                        <div class="form-element">
                            <label for="firstname">Prénom <span class="important-infos">*</span></label>
                            <input type="text" id="firstname" name="firstname" class="form-control" placeholder="Votre prénom" 
                            value="<?php echo $firstname; ?>">
                            <p class="comments">Message d'erreur</p>
                        </div>
    
                        <div class="form-element">
                            <label for="name">Nom <span class="important-infos">*</span></label>
                            <input type="text" id="name" name="name" class="form-control" placeholder="Votre nom"
                            value="<?php echo $name; ?>">
                            <p class="comments">Message d'erreur</p>
                        </div>
                   

                        <div class="form-element">
                            <label for="email">Email <span class="important-infos">*</span></label>
                            <input type="text" id="email" name="email" class="form-control" placeholder="Votre email"
                            value="<?php echo $email; ?>">
                            <p class="comments">Message d'erreur</p>
                        </div>
    
                        <div class="form-element">
                            <label for="phone">Téléphone <span class="important-infos"></span></label>
                            <input type="text" id="phone" name="phone" class="form-control" placeholder="Votre téléphone"
                            value="<?php echo $phone; ?>">
                            <p class="comments">Message d'erreur</p>
                        </div>
 
                    <div class="form-element-message">
                        <label for="message">Message <span class="important-infos">*</span></label>
                        <textarea id="message" nam="message" class="form-control" placeholder="Votre message"><?php echo $message; ?></textarea>
                        <p class="comments">Message d'erreur</p>
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