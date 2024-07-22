<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire Client</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-3xl mx-auto bg-gray-200 rounded-xl shadow-lg p-8">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Client</h1>
            <div class="flex items-center space-x-2">
                <span class="font-medium">Tel:</span>
                <input type="tel" class="px-3 py-1 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent">
            </div>
        </div>

        <div class="mb-6 flex items-center space-x-4">
            <label class="font-medium">REF:</label>
            <input type="text" class="flex-grow px-3 py-1 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent">
            <button class="px-4 py-1 bg-green-600 text-white font-medium rounded-md shadow-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition duration-300 ease-in-out">
                OK
            </button>
        </div>

        <div class="grid grid-cols-3 gap-4 mb-6">
            <div>
                <label class="block font-medium mb-1">libelle</label>
                <input type="text" class="w-full px-3 py-1 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent">
            </div>
            <div>
                <label class="block font-medium mb-1">prix</label>
                <input type="text" class="w-full px-3 py-1 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent">
            </div>
            <div class="flex items-end space-x-2">
                <div class="flex-grow">
                    <label class="block font-medium mb-1">Qte</label>
                    <input type="text" class="w-full px-3 py-1 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent">
                </div>
                <button class="px-4 py-1 bg-green-600 text-white font-medium rounded-md shadow-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition duration-300 ease-in-out">
                    OK
                </button>
            </div>
        </div>

        <table class="w-full mb-6">
            <thead>
                <tr class="bg-gray-300">
                    <th class="px-4 py-2 text-left">Article</th>
                    <th class="px-4 py-2 text-left">prix</th>
                    <th class="px-4 py-2 text-left">Qte</th>
                    <th class="px-4 py-2 text-left">Montant</th>
                </tr>
            </thead>
            <tbody>
                <!-- Les lignes du tableau seront ajoutées dynamiquement ici -->
            </tbody>
        </table>

        <div class="flex justify-between items-center mb-6">
            <button class="px-6 py-2 bg-blue-600 text-white font-medium rounded-md shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-300 ease-in-out">
                Enregistrer
            </button>
            <div class="font-medium">
                Total: <span id="total">0</span>
            </div>
        </div>
    </div>
</body>
</html>