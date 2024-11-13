<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rappel d'anniversaire</title>
    
</head>

<body class="bg-gray-100 py-8">

    <div class="max-w-lg mx-auto bg-white p-8 rounded-lg shadow-xl">
        <!-- Titre de l'email -->
        <h1 class="text-3xl font-semibold text-blue-600 text-center mb-6">Rappel d'anniversaire</h1>

        <!-- Contenu principal -->
        <div class="text-lg text-gray-800 mb-6">
            <p>Bonjour {{ $user->name }},</p>
            <p class="mt-2">Un petit rappel : l'anniversaire de votre ami(e) <strong>{{ $birthday->user->name }}</strong> est demain !</p>
            <p class="mt-4">Ne l'oubliez pas, et pensez à lui souhaiter un joyeux anniversaire !</p>
        </div>
    </div>

</body>

</html>
