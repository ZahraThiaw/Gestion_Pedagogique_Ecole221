
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de la Dette</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-6xl mx-auto bg-white rounded-lg shadow-md overflow-hidden">
        <div class="bg-green-700 text-white px-6 py-4">
            <h1 class="text-2xl font-bold">Détails de la Dette</h1>
        </div>
        <div class="flex p-2 text-xl text justify-between">
            <h2 class="text-xl font-semibold text-gray-800 mb-3">Client: <?= $data['client']->firstname.' '.$data['client']->name; ?></h2>
            <p class="text-gray-600 mb-6">Tel: <?= $data['client']->phone; ?></p>
        </div>
        <div>
            <h2 class="text-xl font-semibold text-gray-800 mb-3 text-center">Détails de la dette</h2>
            <p class="text-gray-600 mb-6 ml-2">Date: <?= $data['dette']->getDate(); ?></p>
            <p class="text-gray-600 mb-6 ml-2">Montant: <?= $data['dette']->getMontant(); ?></p>
            <p class="text-gray-600 mb-6 ml-2">Verser: <?= $data['dette']->getVerser(); ?></p>
            <p class="text-gray-600 mb-6 ml-2">Restant: <?= $data['dette']->getMontant() - $data['dette']->getVerser(); ?></p>
        </div>
        
        <div class="p-6">
            <div class="mb-6">
                <h2 class="text-xl font-semibold text-gray-800 mb-3">Liste des Produits</h2>
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="py-2 px-4 border-b text-left">Produit</th>
                                <th class="py-2 px-4 border-b text-right">Quantité</th>
                                <th class="py-2 px-4 border-b text-right">Prix Unitaire</th>
                                <th class="py-2 px-4 border-b text-right">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data['produits'] as $produit): ?>
                            <tr>
                                <td class="py-2 px-4 border-b"><?= $produit['produit']->libelle ?></td>
                                <td class="py-2 px-4 border-b text-right"><?= $produit['detail']->getQte()  ?></td>
                                <td class="py-2 px-4 border-b text-right"><?= $produit['produit']->getPrixUnitaire() ?></td>
                                <td class="py-2 px-4 border-b text-right"><?= $produit['produit']->getPrixUnitaire() * $produit['detail']->getQte() ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot class="bg-gray-100">
                            <tr>
                                <td colspan="3" class="py-2 px-4 text-right font-semibold">Total:</td>
                                <td class="py-2 px-4 text-right font-semibold"><?= $data['dette']->getMontant() ?></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>

            
        </div>
    </div>
</body>
</html>