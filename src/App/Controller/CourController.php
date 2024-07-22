<?php
// namespace App\Controller;

// use Core\Controller\Controller;
// use Core\Session\SessionInterface;
// use Core\Validator\ValidatorInterface;
// use App\Model\CourModel;
// use App\Model\CoursprofesseurModel;
// use App\Model\UtilisateurModel;
// use App\Model\ModuleModel;
// use App\Model\CourssemestreModel;
// use App\Model\SemestreModel;

// class CourController extends Controller
// {
//     private CourModel $courModel;
//     private CoursprofesseurModel $coursprofesseurModel;
//     private UtilisateurModel $utilisateurModel;
//     private ModuleModel $moduleModel;
//     private CourssemestreModel $courssemestreModel;
//     private SemestreModel $semestreModel;

//     public function __construct(
//         SessionInterface $session,
//         ValidatorInterface $validator,
//         CourModel $courModel,
//         CoursprofesseurModel $coursprofesseurModel,
//         UtilisateurModel $utilisateurModel,
//         ModuleModel $moduleModel,
//         CourssemestreModel $courssemestreModel,
//         SemestreModel $semestreModel
//     ) {
//         parent::__construct($session, $validator);
//         $this->courModel = $courModel;
//         $this->coursprofesseurModel = $coursprofesseurModel;
//         $this->utilisateurModel = $utilisateurModel;
//         $this->moduleModel = $moduleModel;
//         $this->courssemestreModel = $courssemestreModel;
//         $this->semestreModel = $semestreModel;
//     }

//     public function index()
//     {
//         $this->renderView('listercoursprof');
//     }

//     public function show()
//     {
//         // Vérifiez si l'utilisateur est connecté
//         $user = $this->session->get('user');

//         if ($user === null) {
//             // Redirigez vers la page de connexion ou affichez un message d'erreur
//             $this->redirect('/login');
//             return;
//         }

//         // Récupérer l'ID du professeur connecté
//         $professeurId = $user['id']; // Assurez-vous que 'id' est bien la clé dans le tableau utilisateur
//         //var_dump($professeurId);

//         // Récupérer tous les cours du professeur
//         $coursProfesseurs = $this->coursprofesseurModel->findByColumn('utilisateursId', $professeurId);

//         //var_dump($coursProfesseurs);

//         $coursDetails = [];
//         foreach ($coursProfesseurs as $coursProfesseur) {
//             // Récupérer les informations du cours
//             $cours = $this->courModel->find($coursProfesseur->getCours());

//             // Récupérer le module associé au cours
//             $module = $this->moduleModel->find($cours->getModulesId());

//             // Récupérer le semestre associé au cours
//             $coursSemestre = $this->courssemestreModel->findByColumn('coursId', $cours->getId(), true);

//             // Récupérer le libellé du semestre
//             $semestre = $this->semestreModel->find($coursSemestre->getSemestreId());

//             $coursDetails[] = [
//                 'cours' => $cours,
//                 'module' => $module,
//                 'semestre' => $semestre
//             ];
//         }

//         // Afficher les détails des cours
//         $this->renderView('listercoursprof', ['coursDetails' => $coursDetails]);
//     }
// }





// namespace App\Controller;

// use Core\Controller\Controller;
// use Core\Session\SessionInterface;
// use Core\Validator\ValidatorInterface;
// use App\Model\CourModel;
// use App\Model\CoursprofesseurModel;
// use App\Model\ModuleModel;
// use App\Model\CourssemestreModel;
// use App\Model\SemestreModel;

// class CourController extends Controller
// {
//     private CourModel $courModel;
//     private CoursprofesseurModel $coursprofesseurModel;
//     private ModuleModel $moduleModel;
//     private CourssemestreModel $courssemestreModel;
//     private SemestreModel $semestreModel;

//     public function __construct(
//         SessionInterface $session,
//         ValidatorInterface $validator,
//         CourModel $courModel,
//         CoursprofesseurModel $coursprofesseurModel,
//         ModuleModel $moduleModel,
//         CourssemestreModel $courssemestreModel,
//         SemestreModel $semestreModel
//     ) {
//         parent::__construct($session, $validator);
//         $this->courModel = $courModel;
//         $this->coursprofesseurModel = $coursprofesseurModel;
//         $this->moduleModel = $moduleModel;
//         $this->courssemestreModel = $courssemestreModel;
//         $this->semestreModel = $semestreModel;
//     }

//     public function show()
//     {
//         // Vérifiez si l'utilisateur est connecté
//         $user = $this->session->get('user');

//         if ($user === null) {
//             // Redirigez vers la page de connexion ou affichez un message d'erreur
//             $this->redirect('/login');
//             return;
//         }

//         // Récupérer l'ID du professeur connecté
//         $professeurId = $user['id'];

//         // Récupérer tous les cours du professeur
//         $coursProfesseurs = $this->coursprofesseurModel->findByColumn('utilisateursId', $professeurId);

//         $moduleFilter = isset($_POST['module']) ? $_POST['module'] : '';

//         $coursDetails = [];
//         foreach ($coursProfesseurs as $coursProfesseur) {
//             // Récupérer les informations du cours
//             $cours = $this->courModel->find($coursProfesseur->getCours());

//             // Récupérer le module associé au cours
//             $module = $this->moduleModel->find($cours->getModulesId());

//             // Récupérer le semestre associé au cours
//             $coursSemestre = $this->courssemestreModel->findByColumn('coursId', $cours->getId(), true);
//             $semestre = $this->semestreModel->find($coursSemestre->getSemestreId());

//             $coursDetails[] = [
//                 'cours' => $cours,
//                 'module' => $module,
//                 'semestre' => $semestre
//             ];
//         }

//         // Filtrage par module
//         if ($moduleFilter) {
//             $coursDetails = array_filter($coursDetails, function($detail) use ($moduleFilter) {
//                 return strpos(strtolower($detail['module']->getLibelle()), strtolower($moduleFilter)) !== false;
//             });
//         }

//         // Pagination
//         $currentPage = isset($_POST['page']) ? (int)$_POST['page'] : 1;
//         $perPage = 5; // Nombre d'éléments par page
//         $total = count($coursDetails);
//         $offset = ($currentPage - 1) * $perPage;
//         $coursDetailsPaginated = array_slice($coursDetails, $offset, $perPage);

//         $totalPages = ceil($total / $perPage);

//         // Afficher les détails des cours
//         $this->renderView('listercoursprof', [
//             'coursDetails' => $coursDetailsPaginated,
//             'currentPage' => $currentPage,
//             'total' => $total,
//             'perPage' => $perPage,
//             'moduleFilter' => $moduleFilter
//         ]);


        
//     }
// }






namespace App\Controller;

use Core\Controller\Controller;
use Core\Session\SessionInterface;
use Core\Validator\ValidatorInterface;
use App\Model\CourModel;
use App\Model\CoursprofesseurModel;
use App\Model\UtilisateurModel;
use App\Model\ModuleModel;
use App\Model\CourssemestreModel;
use App\Model\SemestreModel;

class CourController extends Controller
{
    private CourModel $courModel;
    private CoursprofesseurModel $coursprofesseurModel;
    private UtilisateurModel $utilisateurModel;
    private ModuleModel $moduleModel;
    private CourssemestreModel $courssemestreModel;
    private SemestreModel $semestreModel;

    public function __construct(
        SessionInterface $session,
        ValidatorInterface $validator,
        CourModel $courModel,
        CoursprofesseurModel $coursprofesseurModel,
        UtilisateurModel $utilisateurModel,
        ModuleModel $moduleModel,
        CourssemestreModel $courssemestreModel,
        SemestreModel $semestreModel
    ) {
        parent::__construct($session, $validator);
        $this->courModel = $courModel;
        $this->coursprofesseurModel = $coursprofesseurModel;
        $this->utilisateurModel = $utilisateurModel;
        $this->moduleModel = $moduleModel;
        $this->courssemestreModel = $courssemestreModel;
        $this->semestreModel = $semestreModel;
    }

    public function index()
    {
        $this->renderView('listercoursprof');
    }

    public function show()
    {
        // Vérifiez si l'utilisateur est connecté
        $user = $this->session->get('user');

        if ($user === null) {
            // Redirigez vers la page de connexion ou affichez un message d'erreur
            $this->redirect('/login');
            return;
        }

        // Récupérer l'ID du professeur connecté
        $professeurId = $user['id']; // Assurez-vous que 'id' est bien la clé dans le tableau utilisateur

        // Pagination
        $page = isset($_POST['page']) ? (int)$_POST['page'] : 1;
        $perPage = 10; // Vous pouvez définir un nombre fixe ou le rendre configurable

        // Filtres
        $moduleFilter = $_POST['module'] ?? '';
        $semestreFilter = $_POST['semestre'] ?? '';

        // Récupérer tous les cours du professeur
        $coursProfesseurs = $this->coursprofesseurModel->findByColumn('utilisateursId', $professeurId);

        $coursDetails = [];
        foreach ($coursProfesseurs as $coursProfesseur) {
            // Récupérer les informations du cours
            $cours = $this->courModel->find($coursProfesseur->getCours());

            // Récupérer le module associé au cours
            $module = $this->moduleModel->find($cours->getModulesId());

            // Récupérer le semestre associé au cours
            $coursSemestre = $this->courssemestreModel->findByColumn('coursId', $cours->getId(), true);

            // Récupérer le libellé du semestre
            $semestre = $this->semestreModel->find($coursSemestre->getSemestreId());

            // Appliquer les filtres
            if (($moduleFilter && stripos($module->getLibelle(), $moduleFilter) === false) ||
                ($semestreFilter && stripos($semestre->getLibelle(), $semestreFilter) === false)) {
                continue;
            }

            $coursDetails[] = [
                'cours' => $cours,
                'module' => $module,
                'semestre' => $semestre
            ];
        }

        $total = count($coursDetails);
        $totalPages = ceil($total / $perPage);
        $offset = ($page - 1) * $perPage;
        $coursDetailsPage = array_slice($coursDetails, $offset, $perPage);

        // Afficher les détails des cours
        $this->renderView('listercoursprof', [
            'coursDetails' => $coursDetailsPage,
            'page' => $page,
            'perPage' => $perPage,
            'total' => $total,
            'totalPages' => $totalPages,
            'moduleFilter' => $moduleFilter,
            'semestreFilter' => $semestreFilter
        ]);
    }
}

