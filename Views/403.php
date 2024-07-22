<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>403 - Accès interdit</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body class="bg-gradient-to-r from-red-400 to-orange-300 min-h-screen flex items-center justify-center px-4">
    <div class="max-w-lg w-full text-center">
        <h1 class="text-9xl font-bold text-white mb-4">403</h1>
        <p class="text-2xl font-medium text-gray-800 mb-8">Accès interdit</p>
        <div class="space-y-4">
            <p class="text-gray-700">Désolé, vous n'avez pas l'autorisation d'accéder à cette page.</p>
            <a href="/login" class="inline-block bg-white text-red-600 font-semibold px-6 py-3 rounded-lg shadow-md hover:bg-red-600 hover:text-white transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-105">
                Retour à l'accueil
            </a>
        </div>
    </div>
</body>
</html>