<?php
$dettes = [];
if(isset($data)){
        $dettes = $data[0];
        $client = $data[1];
    //     echo "<pre>";
    // var_dump($client);
    //     echo "</pre>";
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau Client</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100 p-8">
    <div class=" mx-auto bg-white rounded-xl shadow-lg p-8">
        <div class="flex justify-between items-center mb-6">
            <div>
                <h1 class="text-2xl font-bold">Client: <?= isset($client) ? $client->getFirstname() . ' ' . $client->getName() : '' ?></h1>
            </div>
            <div class="flex items-center space-x-2">
                <span class="font-medium">Tel: </span>
                <span><?= isset($client)? $client->getPhone() : '' ?></span>           
             </div>
        </div>
        <div class="flex justify-center items-center mb-6">
            <h2 class="text-2xl font-bold text-green-800 mb-6">Détails des dettes</h2>

        </div>

        <div class="flex justify-between items-center space-x-4 mb-6">
            <div>
                <h3 class="text-lg font-semibold text-green-800 mb-4">Liste des dettes</h3>
            </div>
            <form action="/dette" method="post" class="gap-4 flex items-center">
                <input type="hidden" name="idclient" value="<?= $client->getId() ?>">
                filtrer
                <select name="etat" id="" class="px-4 py-2 bg-gray-100 border border-gray-300 rounded-lg shadow-md focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 transition duration-300 ease-in-out" onchange="this.form.submit()" >
                    <option value="en cours">filtrer</option>
                    <option value="en cours">En cours</option>
                    <option value="solder" >Solder</option>
                </select>
                <input type="date" name="date" class="px-4 py-2 bg-gray-100 border border-gray-300 rounded-lg shadow-md focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 transition duration-300 ease-in-out" onchange="this.form.submit()">
            </form>
        </div>

        <table class="w-full border-collapse ">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border border-gray-300 px-4 py-2 text-left">Dette</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">montant</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Verser</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Restant</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Date</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">payer</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">liste paiement</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">liste produit</th>
                </tr>
            </thead>
            <tbody class="overflow-hidden">
                <?php foreach($dettes as $dette) :?>
                <tr>
                    <td class="border border-gray-300 px-4 py-2"><?= $dette->getReferentiel() ?></td></td>
                    <td class="border border-gray-300 px-4 py-2"><?= $dette->getMontant() ?></td>
                    <td class="border border-gray-300 px-4 py-2"><?= $dette->getVerser() ?></td>
                    <td class="border border-gray-300 px-4 py-2"><?= $dette->getMontant() - $dette->getVerser() ?></td>
                    <td class="border border-gray-300 px-4 py-2"><?= $dette->getDate()?></td>
                    <td class="border border-gray-300 px-4 py-2 text-center">
                        <form action="/paiement" method="post">
                            <input type="hidden" name="idDette" value="<?= $dette->getId()?>">
                            <input type="hidden" name="idclient" value="<?= $client->getId()?>">
                            <input type="submit" value="payer" name="payer" class="<?php echo $dette->getMontant() - $dette->getVerser() == 0 ? 'hidden' : '' ?>">
                        </form>
                       </td>
                    <td class="border border-gray-300 px-4 py-2">
                    <form action="/liste" method="post">
                    <input type="hidden" name="idDette" value="<?= $dette->getId()?>">
                    <input type="hidden" name="idclient" value="<?= $client->getId()?>">   
                    <button type="submit" class="text-black  font-bold py-2 px-4 rounded">liste paiements</button>
                    </form>
                    </td>
                    <td class="border border-gray-300 px-4 py-2">
                    <form action="/produit" method="post">
                    <input type="hidden" name="idDette" value="<?= $dette->getId()?>" > 
                    <input type="hidden" name="idclient" value="<?= $client->getId()?>" >  
                    <button type="submit" class="text-black  font-bold py-2 px-4 rounded">liste produits</button>
                    </form>
                    </td>
                </tr>
                <?php endforeach; ?>
                <!-- Vous pouvez ajouter plus de lignes ici si nécessaire -->
            </tbody>
        </table>
        <!-- pagination -->
        <div class="flex justify-center mt-4">
            <nav class="flex items-center">
                <a href="#" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-l hover:bg-gray-300">1</a>
            </nav>
    </div>
</body>
</html>