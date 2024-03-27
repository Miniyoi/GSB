<script>
    var visiteurs = <?php echo json_encode($listeVisiteurs); ?>;
    visiteurs.forEach(visiteur =>{
            console.log("visiteur login: "+visiteur["login"]+" visiteur mdp: "+visiteur["mdp"]);
    });

    function validerConnexion() {

        var login = document.getElementById("login").value;
        var mdp = document.getElementById("mdp").value;
        var visiteurs = <?php echo json_encode($listeVisiteurs) ?>;

        
        // Regex pour vérifier que le login ne contient que des lettres, des chiffres et des caractères underscore (_)
        var loginRegex = /^[a-zA-Z0-9_]+$/;

        // Regex pour vérifier que le mot de passe ne contient que des lettres, des chiffres et des caractères spéciaux autorisés
        var mdpRegex = /^[a-zA-Z0-9!@#\$%\^&\*\(\)_\+{}\[\]:;<>,\.\?~\-=]+$/;
        if (login == "" || mdp == "") {
            alert("Veuillez remplir tous les champs");
            return false;
        }
        
        if (login.length < 2 || login.length > 20) {
            alert("Le login doit contenir entre 2 et 20 caractères");
            return false;
        }

        if (mdp.length < 4 || mdp.length > 20) {
            alert("Le mot de passe doit contenir entre 4 et 20 caractères");
            return false;
        }

        if (login.indexOf(" ") != -1) {
            alert("Le login ne doit pas contenir d'espace");
            return false;
        }

        if (mdp.indexOf(" ") != -1) {
            alert("Le mot de passe ne doit pas contenir d'espace");
            return false;
        }

        if (!loginRegex.test(login)) {
            alert("Le login ne doit contenir que des lettres, des chiffres et des caractères underscore (_)");
            return false;
        }

        if (!mdpRegex.test(mdp)) {
            alert("Le mot de passe ne doit contenir que des lettres, des chiffres et des caractères spéciaux autorisés");
            return false;
        }


    
        var noLogin = true; 
        for (var i = 0; i < visiteurs.length; i++) {
            var visiteur = visiteurs[i];
            if (visiteur["login"] === login) {
                noLogin = false;
                break; 
            }
        }
        if (noLogin) {
            alert("Le login n'existe pas");
            return false;
        }

        
        
        var noMpd = true; // Initialisez la variable à true

        for (var i = 0; i < visiteurs.length; i++) {
            var visiteur = visiteurs[i];
            if (visiteur["login"] === login) {
                if (visiteur["mdp"] === mdp) {
                    noMpd = false;
                    break; // Mot de passe correct, sortez de la boucle
                }
            }
        }
        if (noMpd) {
            alert("Le mot de passe est incorrect");
            return false;
        }
        
        return true;    
    }
</script>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Connexion</title>
    </head>
    <body>
        <div class="container">
            <div>
                <h1>CONNEXION</h1>
                <form method="post" action="./?action=connexion" onsubmit="return validerConnexion();">
                    <input type="text" placeholder="Login" name="login" id="login"/>
                    <div class="relative">
                        <input type="password" placeholder="Password" name="mdp" id="mdp"/>
                    </div>
                    <input type="submit" value="Se connecter"/>
                </form>
            </div>
        </div>
        <div>
            <a href="./?action=Inscription">INSCRIPTION</a>
        </div>
    </body>
</html>