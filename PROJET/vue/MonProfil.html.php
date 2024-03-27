<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="Vue/output.css"/>
        <title>Profil de <?php print($login)?></title>
    </head>
    <body class="bg-gradient-to-br from-blue-600 to-blue-400 h-screen">
        <h1><strong>Mon profil</strong></h1>
        <div>
            <a href="./?action=nouveauRapport">Créer un nouveau rapport de visite</a>
        </div>
        <a href="./?action=Deconnexion" id='Retour'>Deconnexion</a>
    </body>
</html>