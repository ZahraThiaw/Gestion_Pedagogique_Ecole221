<?php 
$paiements = $data[2];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Paiements</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Liste des Paiements</h1>
        
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <div class="flex justify-between items-center text-gray-800 ">
            <div class="p-4">
                    <h2>Client: <?= $data[1]->firstname .' '. $data[1]->name ?></h2>
                </div>
                <div>
                    Dette: <?= $data[0]->getReferentiel() ?>
                </div>
                <div class="p-4">
                    <h2>telephone: <?= $data[1]->phone ?></h2>
                </div>
        </div>    
            <table class="w-full">
                <thead class="bg-gray-200">
                    <tr>
                       <th class="px-4 py-2 text-left text-gray-600">Referentiel</th>
                        <th class="px-4 py-2 text-left text-gray-600">Montant</th>
                        <th class="px-4 py-2 text-left text-gray-600">Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($paiements as $paiement): ?>
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-4 py-2"><?=  $paiement->referentiel ?></td>
                        <td class="px-4 py-2"><?=  $paiement->montant ?></td>
                        <td class="px-4 py-2"><?=  $paiement->date ?></td>
                    </tr>
                    <?php endforeach; ?>
                    
                    <!-- Ajoutez plus de lignes ici pour plus de paiements -->
                </tbody>
            </table>
           
        </div>
    </div>
</body>
</html>