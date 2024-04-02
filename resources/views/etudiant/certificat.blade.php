<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Certificat d'inscription</title>

        <style>
            body {
                font-family: Arial, Helvetica, sans-serif;
                background-color: #fff;
                margin: 0;
                padding: 0;
            }

            .container {
                margin: auto auto;
                background-color: #fff;
                border-radius: 10px;
                padding: 5%;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }
            
            h1 {
                text-align: center;
                font-size: 24px;
            }

            p {
                font-size: 12px;
                line-height: 1.6;
                margin-bottom: 5px;
                color: black;
            }

            .ugb-logo {
                display: block;
                margin: 0 auto 20px;
                width: 100px;
                height: auto;
                
            }

            .signature {
                margin-top: 20px;
                text-align: right;
            }

            .signature img {
                width: 100px;
                height: auto;
                
            }
        </style>
    </head>
    <body>
        <div class="container">
            <img src="{{ public_path('assets/images/logo-ugb.png') }}" class="ugb-logo" alt="">
            <h1>Certificat d'inscription</h1>
            <p style="text-align: center; text-transform: uppercase; margin-bottom: 20px;"><strong>Certifie</strong></p>
            <p>que l'étudiant <strong>{{$student->prenom }} {{ $student->nom }}</strong></p>
            <p>né(e) le : {{$naissance}}</p>
            <p>Numéro Dossier : <strong>{{ $student->code_etudiant}}</strong></p>
            <p>est régulièrement inscrit(e) sous le numéro <strong>{{ $registration->id }}</strong> à</p>
            <p>FORMATION : <strong>{{ $formation->libelle_formation}}</strong></p>
            <p>Niveau : <strong>{{ $niveau->libelle_niveau }}</strong></p>
            <p>pour l'année universitaire : <strong>{{ $annee_academique->libelle_annee_academique }}</strong></p>
            <p>En foi de quoi ce présent certificat est délivré pour servir et valoir ce que de droit.</p>
            <p>Saint-Louis, le <?php echo str_replace("-", "/", $registration->date_inscription);?></p> 
            <div class="signature">
                <p>Signature et cachet</p>
                <p style="margin-top: 50px;">Ciré Sall Ba</p>
            </div> 
        </div>
    </body>
</html>