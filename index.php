

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Contactez-moi !</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.3/jquery.min.js"></script>
        <link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="Styles/style.css">
        <link rel="stylesheet" href="Styles/reset.css">
        <script src="js/script.js"></script>
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
                <form id="contact-form" method="post" action="" role="form">
                  
                <!--Client-side validation with "required" in input-->
                        <div class="form-element">
                            <label for="firstname">Prénom <span class="important-infos">*</span></label>
                            <input type="text" id="firstname" name="firstname"  class="form-control" placeholder="Votre prénom" >
                            <p class="comments"></p>
                        </div>
    
                        <div class="form-element">
                            <label for="name">Nom <span class="important-infos">*</span></label>
                            <input type="text" id="name" name="name" class="form-control" placeholder="Votre nom">
                            <p class="comments"></p>
                        </div>
                   

                        <div class="form-element">
                            <label for="email">Email <span class="important-infos">*</span></label>
                            <input type="email"  id="email" name="email" class="form-control" placeholder="Votre email">
                            <p class="comments"></p>
                        </div>
    
                        <div class="form-element">
                            <label for="phone">Téléphone <span class="important-infos"></span></label>
                            <input type="tel" id="phone" name="phone" class="form-control" placeholder="Votre téléphone">
                            <p class="comments"></p>
                        </div>
 
                    <div class="form-element-message">
                        <label for="message">Message <span class="important-infos">*</span></label>
                        <textarea id="message" name="message" class="form-control" placeholder="Votre message"></textarea>
                        <p class="comments"></p>
                    </div>

                    <p class="important-infos">
                        * Ces informations sont requises.
                    </p> 
                    <input type="submit" class="form-btn" value="Envoyer">
                </form>
            </div>
        </div>
            
    </body>
    </html>