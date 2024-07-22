<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body class="bg-white from-purple-500 to-indigo-600 h-screen flex items-center justify-center">
    <div class="bg-gray-100 p-10 rounded-2xl shadow-2xl w-full max-w-xl">
        <h1 class="text-3xl font-semibold mb-8 text-center text-gray-800">Bienvenue</h1>
        <?php if (isset($errors) && is_array($errors)): ?>
        <ul>
            <?php foreach ($errors as $error): ?>
                <li class="text-red-500"><?php echo htmlspecialchars(is_array($error) ? implode(', ', $error) : (string)$error); ?></li>
            <?php endforeach; ?>
        </ul>
        <?php endif; ?>
        <form action="/login" method="post" class="space-y-6">
            
            <div>
                <label for="username" class="block text-sm font-medium text-gray-700 mb-1">Nom d'utilisateur</label>
                <input type="text" id="username" name="username" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent transition duration-200" placeholder="Entrez votre nom d'utilisateur">

            </div>
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Mot de passe</label>
                <input type="password" id="password" name="password" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent transition duration-200" placeholder="Entrez votre mot de passe">
            </div>
            <div>
                <button type="submit" class="w-full py-3 px-4 bg-purple-700 text-white font-medium rounded-lg shadow-md hover:from-purple-600 hover:to-indigo-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 focus:ring-offset-purple-200 transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-105">
                    Se connecter
                </button>
            </div>
        </form>
        <div class="mt-6 text-center">
            <a href="#" class="text-sm text-purple-700 hover:text-purple-800 transition duration-200">Mot de passe oublié ?</a>
        </div>
    </div>
</body>
</html>
