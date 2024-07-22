<?php
namespace Core\Recu;
require 'vendor/autoload.php';

use Dompdf\Dompdf;

class RecuDette {
    public function savePDF($htmlContent, $outputDir, $filename = 'document.pdf') {
        // Crée une instance de Dompdf
        $dompdf = new Dompdf();
        
        // Charge le contenu HTML
        $dompdf->loadHtml($htmlContent);
        
        // (Optionnel) Définit la taille et l'orientation du papier
        $dompdf->setPaper('A4', 'portrait');
        
        // Rend le HTML en PDF
        $dompdf->render();
        
        // Chemin complet du fichier
        $filePath = rtrim($outputDir, '/') . '/' . $filename;

        // Enregistre le fichier PDF dans le dossier spécifié
        file_put_contents($filePath, $dompdf->output());
        
        return $filePath;
    }
}

// // Usage example:
// $htmlContent = '<div style="width: 600px; height: 400px; background-color: lightgrey; text-align: center;">
//     <h1>Hello, World!</h1>
//     <p>This is a sample PDF document generated from HTML content.</p>
// </div>';

// $pdfGenerator = new PDFGenerator();
// $pdfGenerator->downloadPDF($htmlContent);
