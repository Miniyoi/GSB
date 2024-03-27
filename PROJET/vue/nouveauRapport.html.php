<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="Vue/output.css"/>
        <title>Nouveau Rapport</title>
    </head>
    <body class="bg-gradient-to-br from-blue-600 to-blue-400 h-screen">
        <form method='post'>
            <h1><strong>Nouveau Rapport</strong></h1>
            <div class="flex flex-row justify-center">
                <label for="dateVisite">Date de la visite</label>
                <input type="date" name="dateVisite" id="dateVisite">
            </div>
            <div>
                <label for="medecin">Médecin</label>
                <select name="medecin" id="medecin">
                    <?php
                        foreach($listeMedecins as $m){
                            print("<option value='".$m["id"]."'>".$m["nom"]." ".$m["prenom"]."</option>");
                        }
                    ?>
                </select>
            </div>
            <div>
                <label for="motif">Motif</label>
                <select name="motif" id="motif">
                    <option value="1">Consultation régulière</option>
                    <option value="2">Visite annuelle</option>
                    <option value="3">Alergies</option>
                    <option value="4">Migraines</option>
                    <option value="5">Toux persistante</option>
                    <option value="6">Problème de peau</option>
                    <option value="7">Douleurs aux genoux</option>
                    <option value="8">Douleurs au dos</option>
                </select>
            </div>
            <div>
                <label for="bilan">Bilan</label>
                <textarea name="bilan" id="bilan" cols="30" rows="10"></textarea>
            </div>
            <div>
                <input type="submit" value="Valider">
            </div>
        </form>
        <a href="./?action=menuPrincipal">Retour</a>
    </body>
</html>