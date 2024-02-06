<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>
<body>
    <h1>Formulaire d'inscription</h1>

    <form action="?action=processForm" method="post">
        <label for ="nom">Nom :</label>
        <input type ="text" id ="nom" name ="nom" required><br>

        <label for ="prenom">Prénom :</label>
        <input type ="text" id="prenom" name="prenom" required><br>

        <label for="logins">Nom du logins :</label>
        <input type="text" id="logins" name="logins" required><br>

        <label for ="mdp">Mot de passe :</label>
        <input type="password" id="mdp" name="mdp" required><br>

        <label for="adresse">Adresse :</label>
        <input type="text" id="adresse" name="adresse" required><br>

        <label for ="CP">Code postal :</label>
        <input type ="text" id ="CP" name ="CP" required><br>

        <label for ="ville">Ville :</label>
        <input type ="text" id ="ville" name ="ville" required><br>

        <label for ="dateEmbauche">Date d'embauche :</label>
        <input type="date" id="dateEmbauche" name="dateEmbauche" required><br>
        
        <input type="submit" value="S'inscrire">
    </form>
</body>
</html>
