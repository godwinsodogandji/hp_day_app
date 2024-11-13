<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anniversaires à venir</title>
    <!-- Lien vers le fichier TailwindCSS (assurez-vous que Tailwind est bien intégré dans le projet) -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">

    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold text-center text-blue-600 mb-6">Anniversaires à venir</h1>

        @if ($upcomingBirthdays->isEmpty())
            <p class="text-center text-lg text-gray-600">Aucun anniversaire à venir dans les 7 prochains jours.</p>
        @else
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white shadow-md rounded-lg">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">Nom de l'utilisateur</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">Date d'anniversaire</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">Rappel envoyé</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($upcomingBirthdays as $birthday)
                            <tr class="border-b">
                                <td class="px-6 py-4 text-sm text-gray-800">{{ $birthday->user->name }}</td>
                                <td class="px-6 py-4 text-sm text-gray-800">{{ \Carbon\Carbon::parse($birthday->date)->format('d/m/Y') }}</td>
                                <td class="px-6 py-4 text-sm">
                                    @if($birthday->notification_sent)
                                        <span class="text-green-500 font-semibold">Rappel envoyé</span>
                                    @else
                                        <span class="text-yellow-500 font-semibold">Rappel non envoyé</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif

        <!-- Bouton pour rediriger vers l'action de rappel (optionnel) -->
        <div class="text-center mt-6">
            <a href="{{ route('upcoming-birthdays') }}" class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-300">Rafraîchir la liste</a>
        </div>
    </div>

</body>

</html>
