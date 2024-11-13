
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rappel Anniversaire</title>
</head>
<body>
    <h1>🎉 Rappel d'anniversaire ! 🎉</h1>
    <p>Bonjour {{ $user->username }},</p>
    <p>C'est un petit rappel pour vous dire que l'anniversaire de votre ami(e) {{ $birthday->user->username }} approche !</p>
    <p>Son anniversaire est demain, le {{ \Carbon\Carbon::parse($birthday->date)->format('d/m/Y') }}.</p>
    <p>N'oubliez pas de lui envoyer vos meilleurs vœux ! 🎂</p>
    <p>Bien à vous,</p>
    <p>L'équipe des rappels d'anniversaires</p>
</body>
</html>
