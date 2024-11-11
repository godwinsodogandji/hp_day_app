<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenue !</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap');

        body {
            font-family: 'Roboto', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100 text-gray-700">
    <div class="max-w-md mx-auto mt-10 bg-white rounded-lg shadow-lg overflow-hidden">
        <div class="p-6">
            <h1 class="text-2xl font-bold mb-4 text-center">Bienvenue sur notre plateforme, {{ $username }}!</h1>
            <p class="mb-4">Votre inscription a été réussie. Voici vos informations de connexion :</p>
            <div class="bg-gray-50 p-4 rounded-md mb-4">
                <p><strong>Pseudo :</strong> {{ $username }}</p>
                <p><strong>Mot de passe :</strong> <strong class="text-blue-600">{{ $password }}</strong></p>
            </div>
            <p class="mb-4 text-center">Vous pouvez vous connecter en utilisant le bouton ci-dessous :</p>
            <div class="flex justify-center">
                <a href="{{ route('login') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition duration-200">
                    Se connecter
                </a>
            </div>
        </div>
    </div>
</body>
</html>