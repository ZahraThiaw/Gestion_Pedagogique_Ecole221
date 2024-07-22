<?php
$produit = null;
// echo "<pre>";
// var_dump($data['produit']);
// echo "</pre>";
if(isset($data['produit'])){
    $produit = $data['produit'];
//    var_dump($data);
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire Client</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-200 p-6">
    <div class="max-w-6xl mx-auto bg-white rounded-lg shadow-md p-6">
        <div class="flex justify-between mb-4">
            <h2 class="text-2xl font-bold">Client: <?= $data['client']->firstname.' '.$data['client']->name; ?></h2>
            <div>
                <span class="text-2xl font-bold ">Tel:</span><p class="text-2xl"><?= $data['client']->phone; ?></p>
</div>
        </div>


        <div class="flex items-center mb-4">
            <form action="<?= WEBROOT ?>/nouvelledette" method="post">
                <input type="hidden" name="id" value="<?= $data['client']->id; ?>">
                <label class="font-bold mr-2">REF:</label>
                <input type="text" class="border rounded px-2 py-1 flex-grow mr-2" name="ref" value="<?= $produit!=null ? $produit->referentiel : ''; ?>">
                <input class="bg-green-800 text-white px-4 py-1 rounded" type="submit" value="OK" name="add">
            </form>
        </div>

        <form action="<?= WEBROOT ?>/nouvelledette" method="post" class="mb-4">
        <div class="flex space-x-4 mb-4 gap-2 flex items-center mb-4">
            <div class="flex-1">
                <input type="hidden" name="idproduit" value="<?=isset($data['produit']) ? $data['produit']->id : ''; ?>">
                <input type="hidden" name="id" value="<?= $data['client']->id; ?>">
                <label class="block font-bold mb-1">libelle</label>
                <input type="text" readonly class="w-full border rounded px-2 py-1" value="<?= $produit ? $produit->libelle : ''; ?>" name="libelle">
            </div>
            <div class="flex-1">
                <label class="block font-bold mb-1">prix</label>
                <input type="number" readonly class="w-full border rounded px-2 py-1" value="<?= $produit ? $produit->prixUnitaire : ''; ?>">
            </div>
            <div class="flex-1">
                <label class="block font-bold mb-1">Qte</label>
                <input type="number" min="0" class="w-full border rounded px-2 py-1" name="qte">
                <p class="text-red-500"><?= isset($data['error']) ? $data['error'] : ''; ?></p>
            </div>
            <div class=" items-end mt-7">
                <input type="submit" class="bg-green-800 text-white px-4 py-1 rounded" value="Ajouter" name="ajouter">
            </div>                    
        </div>
    </form>

        <table class="w-full mb-4">
            <thead>
                <tr class="bg-gray-100">
                    <th class="text-left py-2">Article</th>
                    <th class="text-left py-2">prix</th>
                    <th class="text-left py-2">Qte</th>
                    <th class="text-left py-2">Montant</th>
                </tr>
            </thead>
            <tbody>
                <?php if(isset($data['panier'])): ?>
                    <?php foreach ($data['panier'] as $value): ?>
                        <tr class="border-b">
                            <td class="py-2"><?= $value['produit']->libelle; ?></td>
                            <td class="py-2"><?= $value['produit']->prixUnitaire; ?></td>
                            <td class="py-2"><?= $value['qte']; ?></td>
                            <td class="py-2"><?= $value['produit']->prixUnitaire * $value['qte']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>

        <div class="flex justify-between items-center">
            <form action="<?= WEBROOT ?>/nouvelledette" method="post">
                <input type="hidden" name="id" value="<?= $data['client']->id; ?>">
                <input class="bg-green-800 text-white px-6 py-2 rounded" type="submit" value="Enregistrer" name="enregistrer">
            </form>
            <div class="">
                <span class="font-bold">Total:</span>
                <span class="ml-2"><?= $data['montant']; ?> fr cfa</span>
            </div>
        </div>
    </div>
</body>
</html>