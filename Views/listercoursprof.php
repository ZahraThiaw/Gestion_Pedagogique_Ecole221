<?php
require_once '../Views/layout/header.php';
?>

<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

<div class="max-w-8xl mx-auto bg-white p-10 rounded-xl shadow-md overflow-hidden mt-10">
    <!-- <form method="post" action="" class="mb-4">
        <div class="flex justify-between mb-4">
            <input type="text" name="module" value="<?= htmlspecialchars($moduleFilter ?? '') ?>" placeholder="Filtrer par module" class="p-2 border border-gray-300 rounded-md">
            <input type="text" name="semestre" value="<?= htmlspecialchars($semestreFilter ?? '') ?>" placeholder="Filtrer par semestre" class="p-2 border border-gray-300 rounded-md">
            <button type="submit" class="bg-blue-500 text-white p-2 rounded-md">Filtrer</button>
        </div>
    </form> -->

    <table class="min-w-full bg-white border border-gray-300">
        <thead>
            <tr class="bg-gray-200 text-gray-700">
                <th class="py-2 px-4 border-r border-gray-300">Nom du cours</th>
                <th class="py-2 px-4 border-r border-gray-300">Nombre d'heures Global</th>
                <th class="py-2 px-4 border-r border-gray-300">Semestre</th>
                <th class="py-2 px-4 border-r border-gray-300">Module</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($coursDetails as $detail): ?>
                <tr class="text-center border border-gray-300">
                    <td class="py-4 px-4 border-r border-gray-300"><?= htmlspecialchars($detail['cours']->getLibelle()) ?></td>
                    <td class="py-4 px-4 border-r border-gray-300"><?= htmlspecialchars($detail['cours']->getNbrHeureGlobal()) ?></td>
                    <td class="py-4 px-4 border-r border-gray-300"><?= htmlspecialchars($detail['semestre']->getLibelle()) ?></td>
                    <td class="py-4 px-4 border-r border-gray-300"><?= htmlspecialchars($detail['module']->getLibelle()) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Pagination -->
    <?php if ($total > 0) : ?>
        <div class="flex justify-center mt-4">
            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <form action="" method="POST" class="inline">
                    <input type="hidden" name="module" value="<?= htmlspecialchars($moduleFilter ?? '') ?>">
                    <input type="hidden" name="semestre" value="<?= htmlspecialchars($semestreFilter ?? '') ?>">
                    <button type="submit" name="page" value="<?= $i ?>" class="border px-3 py-1 <?= $i == $page ? 'bg-purple-600 text-white' : 'bg-white text-purple-600'; ?>">
                        <?= $i ?>
                    </button>
                </form>
            <?php endfor; ?>
        </div>
    <?php endif; ?>
</div>

</body>
</html>
