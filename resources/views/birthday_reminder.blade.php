<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Rappel d'anniversaire</title>
</head>
<body>
    <h1>Rappel d'anniversaire</h1>
    <p>Bonjour {{ $user->name }},</p>
    <p>L'anniversaire de votre ami(e) {{ $birthday->user->name }} est demain !</p>
    <p>Ne l'oubliez pas !</p>
</body>
</html>
