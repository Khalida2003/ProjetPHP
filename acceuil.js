<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>VOYAGE DE REVE</title>
    <script>
        
        function monCode()
        {
            let myCode = document.getElementById('code');
            myCode.innerHTML = "<label>Code : </label><input type='password'><br>";
        }

        function choixprop()
        {  
           var maPays = document.getElementById('pays'),
               valeure = "compatible",  
               country = " ";

         if (document.getElementById("1").checked && (document.getElementById("2").checked || document.getElementById("3").checked || document.getElementById("4").checked || document.getElementById("5").checked) === true)
                 { valeure = "incompatible";  }
         if (document.getElementById("5").checked && (document.getElementById("2").checked || document.getElementById("3").checked || document.getElementById("4").checked || document.getElementById("1").checked) === true)
                 { valeure = "incompatible";  }  
            for (var i = 0; i < maPays.options.length; i++)
            {if (maPays.options[i].selected === true) { country = country + maPays.options[i].value + "  " ; } }
            alert("Cher " + document.getElementById('nom').value + "\n" + " votre voyage sera le: " + "\n" +
                  document.getElementById('date').value +
                   " à "  + country + "\n" +
                   " , vous avez reserve " + document.getElementById('peaples').value + " place" + "\n" +
                   " , et le choix d'assurance est " +  valeure);
           
        }
        

    </script>
    <style>
        h1{
            color: rgba(255, 174, 53, 0.938);
        }
    </style>
</head>
<body background="webinar.jpg">
    <h1 align="center"><strong>VOYAGE DE REVE</strong></h1>
    <form>
        <label>NOM PRENOM:</label><input type="texte" name="nomPrenom" id="nom" >
        <label>Date Depart</label><input type="texte" name="DateDepart" id="date"><br>
        <label>DEPART POUR</label><br>
        <select name="placeDeparet" id="pays" size="4" multiple>
            <option value="EGYPTE">EGYPTE</option>
            <option value="MALAISIE">MALAISIE</option>
            <option value="TURQUIE">TURQUIE</option>
            <option value="CHINE">CHINE</option>
        </select><br>
        <label>Nbre Personnes :</label>
        <input type="texte" name="nbrePersonnes" id="peaples"><br>
        <label>OPTIONS ASSURANCE:</label><br>
        <input type="checkbox" name="optionAssurance" value="Sans" id="1">Sans<br>
        <input type="checkbox" name="optionAssurance1" value="Medicale" id="2">Medicale<br>
        <input type="checkbox" name="optionAssurance2" value="MedicaleRapatriment" id="3">Medicale-Rapatriment<br>
        <input type="checkbox" name="optionAssurance3" value="Vol" id="4">Vol<br>
        <input type="checkbox" name="optionAssurance4" value="TousRisques" id="5">Tous Risques<br>
        <label>Mode PAIEMENT</label><br>
        <input type="radio" name="modePaiement" value="MasterCard" id="MasterCard" onclick="monCode()">Master Card<br>
        <input type="radio" name="modePaiement" value="CarteVisa" id="CarteVisa" onclick="monCode()">Carte Visa<br>
        <input type="radio" name="modePaiement" value="VirementElectronique" id="VirementElectronique">Virement Electronique<br>
        <p id="code"></p>
        <label>ADRESSE</label><br>
        <textarea name="adresse" rows="7" cols="100" id="adresse"></textarea><br>
        <input type="submit" name="envoyer" value="Envoyer">
        <input type="reset" name="effacer" value="Effacer">
        <input type="button" name="info" value="Info" onclick="choixprop()">
    </form>
</body>
</html>





