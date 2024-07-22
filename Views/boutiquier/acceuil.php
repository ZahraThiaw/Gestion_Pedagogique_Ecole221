
<?php

use Core\Session\Session;

$clients = null;
$montant = 0;
$verser = 0;
if(isset($data['errors'])){
    $errors = $data['errors'];
     var_dump($errors);

}


if(isset($data[0])){
    $clients = $data[0];
      $montant = $data['montant'];
      $verser = $data['verser'];

     
}
//var_dump(/var/www/html/MonApp2/public/img/upload/<?= $clients!=null ?  $clients[0]->photo : 'https://via.placeholder.com/150'

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des clients</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100 p-8">
     
    <div class="max-w-7xl mx-auto flex space-x-8">
        <!-- Formulaire d'enregistrement -->
        <div class="bg-white p-8 rounded-xl shadow-lg w-1/2">
            <h2 class="text-3xl  font-semibold mb-6 text-gray-800">Enregistrement</h2>
            <form class="space-y-6 relative" action="/accueil" method="POST"  enctype="multipart/form-data">
                <div>
                    <label for="nom" class="block text-sm font-medium text-gray-700 mb-1">Nom</label>
                    <input type="text" id="nom" name="nom" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent transition duration-200" value="">
                    <p class="text-red-500"><?php if(isset($errors['nom'])) echo $errors['nom'][0]; ?></p>

                </div>
                <div>
                    <label for="prenom" class="block text-sm font-medium text-gray-700 mb-1">Prénom</label>
                    <input type="text" id="prenom" name="prenom" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent transition duration-200" value="" >
                    <p class="text-red-500"><?php if(isset($errors['prenom'])) echo $errors['prenom'][0]; ?></p>
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input type="text" id="email" name="email" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent transition duration-200" value="">
                    <p class="text-red-500"><?php if(isset($errors['email'])) echo $errors['email'][0]; ?></p>
                </div>
                <div>
                    <label for="tel" class="block text-sm font-medium text-gray-700 mb-1">Tel</label>
                    <input type="tel" id="telephone" name="telephone" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent transition duration-200" value="">
                    <p class="text-red-500"><?php if(isset($errors['telephone'])) echo $errors['telephone'][0]; ?></p>
                </div>
                <div>
                    <label for="photo" class="block text-sm font-medium text-gray-700 mb-1">Photo</label>
                    <input type="file" id="photo" name="photo" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent transition duration-200" value="">
                    <p class="text-red-500"><?php if(isset($errors['photo'])) echo $errors['photo']; ?></p>
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="w-1/3   right-0 py-3 px-4 bg-green-800 from-purple-500 to-indigo-600 text-white font-medium rounded-lg shadow-md hover:from-purple-600 hover:to-indigo-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-105" value="">
                        Enregistrer
                    </button>
                </div>
            </form>
        </div>

        <!-- Informations du client -->
        <div class="bg-white p-8 rounded-xl shadow-lg w-1/2">
            <div class="flex justify-between items-center mb-6">
                <form action="/client" method="POST"> 
                    <input type="tel" placeholder="Tel" class="flex-grow mr-4 px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent transition duration-200" name="tel" value="<?= $clients!=null ? $clients->phone : '' ?>">
                    <button class="px-6 py-2 bg-green-800 from-purple-500 to-indigo-600 text-white font-medium rounded-lg shadow-md hover:from-purple-600 hover:to-indigo-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-105">
                        OK
                    </button>
                </form>
            </div>
            <div class="mb-6">
                <div class="w-full bg-gray-100 text-center py-2 rounded-lg text-lg font-semibold text-gray-700">
                    Client
                </div>
            </div>
            <div class="flex justify-between mb-6">
                <form action="/nouvelledette" method="POST">
                    <input type="hidden" name="id" value="<?= $clients!=null ? $clients->id : '' ?>">
                    <button class="px-6 py-2 bg-green-800 from-green-500 to-green-600 text-white font-medium rounded-lg shadow-md hover:from-green-600 hover:to-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-105" type="submit">
                        Nouvelle
                    </button>
                </form>
                <form action="/mesdettes" method="POST">
                    <input type="hidden" name="id" value="<?= $clients!=null ? $clients->id : '' ?>">
                    <button class="px-6 py-2 bg-green-800 from-red-500 to-red-600 text-white font-medium rounded-lg shadow-md hover:from-red-600 hover:to-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-105">
                        Dette
                    </button>
                </form>
            </div>
            <div class="flex space-x-6 mb-6">
                <div class="w-1/3">
                    <img src="/img/upload/<?= $clients!=null ? $clients->photo : '' ?>" alt="Image" class="rounded-lg shadow-md" style="width: 150px; height: 150px;">
                </div>

                <div class="w-full space-y-2">
                    <p><strong class="text-gray-700">Nom:</strong> <span class="text-gray-600"><?= $clients!=null ? $clients->name : '' ?></span></p>
                    <p><strong class="text-gray-700">Prénom:</strong> <span class="text-gray-600"><?= $clients!=null ? $clients->firstname : '' ?></span></p>
                    <p><strong class="text-gray-700">Email:</strong> <span class="text-gray-600"><?= $clients!=null ? $clients->login :  '' ?></span></p>
                </div>
            </div>
            <div class="space-y-2 bg-gray-50 p-4 rounded-lg">
                <p><strong class="text-gray-700">Total dette:</strong> <span class="text-red-600"><?=  $montant?> Fr cfa</span></p>
                <p><strong class="text-gray-700">Montant versé:</strong> <span class="text-green-600"><?=    $verser ?> Fr cfa</span></p>
                <p><strong class="text-gray-700">Montant restant:</strong> <span class="text-orange-600"><?=    $montant - $verser  ?> Fr cfa</span></p>
            </div>
        </div>
    </div>
</body>
</html>