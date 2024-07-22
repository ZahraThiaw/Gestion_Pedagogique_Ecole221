
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paiement Réussi</title>
    <script src="https://cdn.tailwindcss.com"></script>
<div class="bg-white p-8 rounded-lg shadow-md text-center absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 max-w-md w-full">
        <div class="mb-6">
            <svg class="mx-auto h-16 w-16 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
        </div>
        <h1 class="text-2xl font-bold text-gray-800 mb-4">Paiement Réussi !</h1>
        <p class="text-gray-600 mb-6">Votre paiement a été traité avec succès. Merci pour votre transaction.</p>
        <div class="mb-4">
            <p class="text-lg font-semibold text-gray-700">Montant payé : <span class="text-green-600"><?php echo $data[0]; ?> Fr cfa</span></p>
        </div>
        <button onclick="window.history.back()" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition duration-300 ease-in-out">
            Retour
        </button>
    </div>
