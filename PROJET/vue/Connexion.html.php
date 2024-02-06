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
        <link rel="stylesheet" href="Vue/output.css"/>
        <title>Connexion</title>
    </head>
    <body class="bg-gradient-to-br from-black to-gray-700 h-screen">
        <div class="flex flex-row justify-center">
            <div class="border-2 border-white rounded-xl m-3 p-3 w-1/2">
                <h1 class="text-2xl text-white text-center">CONNEXION</h1>
                <form class="flex flex-col items-center" method="post" action="./?action=connexion" onsubmit="return validerConnexion();">
                    <input class="w-48 m-3 p-2" type="text" placeholder="Login" name="login" id="login"/>
                    <div class="relative">
                        <input class="w-48 m-3 p-2" type="password" placeholder="Password" name="mdp" id="mdp"/>
                        <button type="button" id="togglePassword" class="absolute inset-y-0 right-0 p-2 outline-none">
                            <img id="toggleImage" alt="Afficher" src="Vue/img/oeil_barre.png" class="w-8 h-8 mr-2">
                        </button>
                        <script>
                            // Sélectionnez la boîte de texte du mot de passe, le bouton "Afficher/Masquer" et l'image
                            var mdpInput = document.getElementById("mdp");
                            var togglePasswordButton = document.getElementById("togglePassword");
                            var toggleImage = document.getElementById("toggleImage");

                            // Écoutez l'événement clic sur le bouton "Afficher/Masquer"
                            togglePasswordButton.addEventListener("click", function () {
                                if (mdpInput.type === "password") {
                                    mdpInput.type = "text";
                                    toggleImage.src = "Vue/img/oeil.png"; // Image pour masquer le mot de passe
                                    toggleImage.alt = "Masquer";
                                } else {
                                    mdpInput.type = "password";
                                    toggleImage.src = "Vue/img/oeil_barre.png"; // Image pour afficher le mot de passe
                                    toggleImage.alt = "Afficher";
                                }
                            });
                        </script>
                    </div>

                    <input class="text-white text-xl border-[1px] border-white rounded-md bg-slate-700 hover:bg-slate-500 hover:cursor-pointer p-5" type="submit" value="Se connecter"/>
                </form>
            </div>
        </div>
        <div class="flex flex-row justify-center">
            <a href="./?action=inscription" class="text-center text-white text-2xl hover:text-gray-200 hover:border-b-2 border-gray-200">INSCRIPTION</a>
        </div>
    </body>
</html>