<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Gestion Pédagogique Ecole221</title>
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-80 bg-purple-700 text-gray-800 flex flex-col shadow-lg">
            <div class="p-4 border-b border-gray-200 mb-10">
                <h2 class="text-lg font-semibold text-center text-2xl text-white">Menu</h2>
            </div>
            <ul class="flex-grow mt-10">
                <li class="mt-8 flex justify-center">
                    <a href="/listercoursprof" class="block w-4/5 py-2 px-4 border-2 border-white text-white rounded-lg hover:bg-purple-900 hover:text-white text-2xl text-center">Cours</a>
                </li>
                <li class="mt-8 flex justify-center">
                    <a href="/listersessiondecours" class="block w-4/5 py-2 px-4 border-2 border-white text-white rounded-lg hover:bg-purple-900 hover:text-white text-2xl text-center">Session de Cours</a>
                </li>
                <li class="mt-8 flex justify-center">
                    <a href="index.php?page=heures" class="block w-4/5 py-2 px-4 border-2 border-white text-white rounded-lg hover:bg-purple-900 hover:text-white text-2xl text-center">Heures de cours</a>
                </li>
            </ul>
        </div>

        <!-- Main content -->
        <div class="flex-1 flex flex-col rounded-lg px-4">
            <!-- Header -->
            <div class="bg-purple-700 shadow-md p-4 flex items-center justify-between rounded-b-lg">
                <div class="flex items-center">
                    <!-- <img src="user_photo_url.jpg" alt="Photo de l'utilisateur" class="h-10 w-10 rounded-full"> -->
                    <div class="ml-4">
                        <!-- <p class="text-purple-700 text-2xl font-semibold">Zahra Thiaw</p>
                        <p class="text-purple-700 text-2xl font-semibold">Zahra</p> -->
                    </div>
                </div>
                <div>
                    <h1 class="text-white text-2xl font-bold">Bienvenue sur la Gestion Pédagogique Ecole221</h1>
                </div>
                <div>
                    <a href="/logout" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-700 transition-colors">Déconnexion</a>
                </div>
            </div>

            <!-- Page Content -->
        <div class="p-5 flex-1 overflow-x-auto">
                
            
