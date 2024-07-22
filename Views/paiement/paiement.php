<?php
$client = $data[0];
 $dette = $data[1];

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de Paiement</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden md:max-w-2xl">
        <div class="p-8">
            <h2 class="text-2xl font-bold text-green-800 mb-6">Détails du Paiement</h2>
            
            <div class="space-y-4 mb-6">
                <div>
                    <label for="client" class="block text-xl font-medium text-gray-700">Client: <?= $client->firstname ?> <?= $client->name ?></label>
               </div>
                <div>
                    <label for="tel" class="block text-xl font-medium text-gray-700">Tél: <?= $client->phone ?></label>
                </div>
            </div>

            <div class="bg-gray-50 p-4 rounded-lg mb-6">
                <div class="space-y-4">
                    <div>
                        <label for="montant" class="block text-xl font-medium text-gray-700">Montant:<?= $dette->getMontant() ?></label>
                   </div>
                    <div>
                        <label for="montant-verse" class="block text-xl font-medium text-gray-700">Montant versé: <?= $dette->getVerser() ?></label>
                    </div>
                    <div>
                        <label for="montant-restant" class="block text-xl font-medium text-gray-700">Montant restant: <?= $dette->getMontant() - $dette->getVerser()?></label>
                   </div>
                </div>
            </div>

            <div class="bg-green-50 p-4 rounded-lg">
                <h3 class="text-lg font-semibold text-green-800 mb-4">Nouveau paiement</h3>
                <form action="" method="post">
                <input type="hidden" name="idclient" value="<?= $client->id ?>">

                <div class="mb-4">
                    <label for="montantPaye" class="block text-sm font-medium text-gray-700">Montant:</label>
                    <input type="number" id="montantPaye" name="montantPaye" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50 py-2 px-3" min="0">
                </div>
                <div class="flex justify-end">
                    <button class="w-1/3 bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition duration-150 ease-in-out">
                            OK
                        </button>
                </div>
                <input type="hidden" name="idDette" value="<?= $dette->getId()?>">
                </form>
            </div>
        </div>
    </div>
</body>
</html>